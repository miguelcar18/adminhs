<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
    	setlocale(LC_TIME, 'es_ES.UTF-8');
    	return view('index');
    }
}
