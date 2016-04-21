<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Controllers\Controller;
use App\Cargos;
use App\Empleados;
use App\User;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Requests;
use Response;

class EmpleadosController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->empleado = Empleados::find($route->getParameter('empleados'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleados::with(array('nombreCargo'))->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = array('' => "Seleccione") + \DB::table('cargos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('empleados.new', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            /************* GUARDAMOS LOS DATOS DEL EMPLEADO ********************/
            if(!empty($request->file('file')))
            {
                //obtenemos el campo file definido en el formulario
                $file = $request->file('file');

                //obtenemos el nombre del archivo
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();

                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('empleados')->put($nombre,  \File::get($file));
            }

            else
            {
                $nombre = '';
            }
            $separar            = explode('/', $request['fecha_ingreso']);
            $fechaIngresoSql    = $separar[2].'-'.$separar[1].'-'.$separar[0];
            $campos = [
                'name'              => $request['name'], 
                'cedula'            => $request['cedula'],
                'rif'               => $request['rif'],
                'fecha_ingreso'     => $fechaIngresoSql,
                'cargo'             => $request['cargo'],
                'email'             => $request['email'],
                'usuarioSlack'      => $request['usuarioSlack'],
                'path'              => $nombre
            ];

            Empleados::create($campos);

            /************* REGISTRAMOS AL EMPLEADO COMO UN USUARIO ********************/

            if(!empty($request->file('file')))
            {
                //obtenemos el campo file definido en el formulario
                $file = $request->file('file');

                //obtenemos el nombre del archivo
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();

                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('users')->put($nombre,  \File::get($file));
            }

            else
            {
                $nombre = '';
            }
            //User::create($request->all());
            User::create([
                'username'  => $request['usuarioSlack'], 
                'name'      => $request['name'],
                'email'     => $request['email'], 
                'password'  => bcrypt($request['cedula']), 
                'rol'       => '3', 
                'details'   => '',
                'path'      => $nombre
            ]);

            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleados::with(array('nombreCargo'))->find($id);
        return view('empleados.show', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos = array('' => "Seleccione") + \DB::table('cargos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('empleados.edit', ['empleado' => $this->empleado, 'cargos' => $cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax())
        {
            /************* ACTUALIZAMOS LOS DATOS DEL EMPLEADO ********************/

            if(!empty($request->file('file')) and $request->file('file') != '')
            {
                \File::delete('uploads/empleados/'.$this->empleado->path);
            }

            if(!empty($request->file('file')))
            {
                //obtenemos el campo file definido en el formulario
                $file = $request->file('file');

                //obtenemos el nombre del archivo
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();

                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('empleados')->put($nombre,  \File::get($file));
            }   

            else
            {
                $nombre = '';
            }

            $separar                = explode('/', $request['fecha_ingreso']);
            $fechaIngresoSql        = $separar[2].'-'.$separar[1].'-'.$separar[0];
            $anteriorUsuarioSlack   = $this->empleado->usuarioSlack;
            $campos = [
                'name'              => $request['name'], 
                'cedula'            => $request['cedula'],
                'rif'               => $request['rif'],
                'fecha_ingreso'     => $fechaIngresoSql,
                'cargo'             => $request['cargo'],
                'email'             => $request['email'],
                'usuarioSlack'      => $request['usuarioSlack'],
                'path'              => $nombre
            ];
            $this->empleado->fill($campos);
            $this->empleado->save();

            /************* ACTUALOZAMOS AL EMPLEADO COMO USUARIO ********************/

            $usuario = User::where('username', $anteriorUsuarioSlack)->get();
            foreach ($usuario as $dataUser) {
               $idUser      = $dataUser->id;
               $pathUser    = $dataUser->path;
            }
            $usuarioAux = User::find($idUser);

            if(!empty($request->file('file')) and $request->file('file') != '')
            {
                \File::delete('uploads/users/'.$pathUser);
            }

            if(!empty($request->file('file')))
            {
                //obtenemos el campo file definido en el formulario
                $file = $request->file('file');

                //obtenemos el nombre del archivo
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();

                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('users')->put($nombre,  \File::get($file));
            }   

            else
            {
                $nombre = '';
            }

            $usuarioAux->fill([
                'username'  => $request['usuarioSlack'], 
                'name'      => $request['name'],
                'email'     => $request['email'], 
                'rol'       => '3', 
                'details'   => '',
                'path'      => $nombre
                ]);
            $usuarioAux->save();

            return response()->json([
                'nuevoContenido' => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null ($this->empleado))
        {
            \App::abort(404);
        }

        $usuario = User::where('username', $this->empleado->usuarioSlack)->get();
        foreach ($usuario as $dataUser) {
           $idUser      = $dataUser->id;
           $pathUser    = $dataUser->path;
        }
        $usuarioAux = User::find($idUser);

        $this->empleado->delete();
        \File::delete('uploads/empleados/'.$this->empleado->path);

        $usuarioAux->delete();
        \File::delete('uploads/users/'.$pathUser);

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Empleados ' . $this->empleado->name . ' eliminado satisfactoriamente',
                'id'      => $this->empleado->id
            ));
        }
        else
        {
            $mensaje = 'Empleado '.$this->empleado->nombre.' eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('empleados.index');
        }
    }
}
