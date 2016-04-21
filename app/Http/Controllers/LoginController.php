<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.login');
    }

    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']] ))
        {
            return Redirect::route('dashboard');
        }
        Session::flash('message', 'Usuario o contraseña incorrectos');
        return Redirect::route('login.index');
    }

    public function changePassword()
    {
        return view('User.change_password');
    }

    public function postChangePassword(Request $request)
    {
        if(Auth::attempt(['password' => $request['password_actual']]))
        {
            $user = User::find(Auth::user()->id);
            $user->fill([
            'password'   => bcrypt($request['password'])
            ]);
            $user->save();

            Session::flash('message', 'Contraseña cambiada satisfactoriamente.');
            return Redirect::route('dashboard');
        }
        else
        {
            Session::flash('message', "Contraseña actual invalida.");
            return view('User.change_password');
        }

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login.index');
    }
}
