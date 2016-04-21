<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Controllers\Controller;
use App\Cargos;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Requests;
use Response;

class CargosController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->cargo = Cargos::find($route->getParameter('cargos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargos::All();
        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.new');
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

            $campos = [
                'nombre'            => $request['nombre'], 
                'salario_mensual'   => $request['salario_mensual']
            ];

            Cargos::create($campos);
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
        return view('cargos.show', ['cargo' => $this->cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cargos.edit', ['cargo' => $this->cargo]);
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
            $campos = [
                'nombre'            => $request['nombre'], 
                'salario_mensual'   => $request['salario_mensual']
            ];
            $this->cargo->fill($campos);
            $this->cargo->save();
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
        if (is_null ($this->cargo))
        {
            \App::abort(404);
        }

        $this->cargo->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Cargo ' . $this->cargo->nombre . ' eliminado satisfactoriamente',
                'id'      => $this->cargo->id
            ));
        }
        else
        {
            $mensaje = 'Cargo '.$this->cargo->nombre.' eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('cargos.index');
        }
    }
}
