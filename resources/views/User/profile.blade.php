@extends('layouts.base')

@section('titulo')
    <title>Perfil de usuario | Hispanos Soluciones</title>
@stop

@section('javascripts')
    
@stop

@section('contenido')

    @if(Session::has('message'))

        @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => Session::get('message')])

    @endif

    <section class="content">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-primary">
                    [[ Form::open(['route' => ['users.destroy', $user->id], 'method' =>'DELETE', 'id' => 'form-eliminar-usuario', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este usuario?\')']) ]]
                    <div class="box-body box-profile">
                        @if($user->path == '')
                            <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/users/unfile.png') }}" alt="{{ $user->name }} profile picture">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/users/'.$user->path) }}" alt="{{ $user->name }} profile picture">
                        @endif

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">
                            @if($user->rol == 1)
                                Administrador
                            @elseif($user->rol == 0)
                                Analista
                            @elseif($user->rol == 3)
                                Empleado
                            @endif
                        </p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-user margin-r-5"></i> Nombre de usuario:</b> <p class="pull-right">{{ $user->username }}</p>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-envelope-o margin-r-5"></i> Email</b> <p class="pull-right">{{ $user->email }}</p>
                            </li>
                            @if($user->details != '')
                            <li class="list-group-item">
                                <b><i class="fa fa-file-text-o margin-r-5"></i> Información adicional</b>
                                <p>{{ $user->details }}</p>
                            </li>
                            @endif
                        </ul>

                        <a href="{{ URL::route('users.edit', $user->id) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                        @if(Auth::user()->rol == 1)
                        <a href="javascript:{}" class="btn btn-danger btn-block"  objeto="{{$user->id}}" onclick="return confirmSubmit(document.forms['form-eliminar-usuario'], '¿Está realmente seguro de eliminar este usuario?');"><b>Eliminar</b></a>
                        @endif
                    </div>
                    [[ Form::close() ]]
                </div>
            </div>
        </div>

    </section>

@stop