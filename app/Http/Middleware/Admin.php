<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Session;
use Redirect;
use Closure;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->rol != 1)
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('dashboard');
        }
        return $next($request);
    }
}
