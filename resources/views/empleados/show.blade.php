@extends('layouts.base')

@section('titulo')
    <title>Mostrar datos del empleado | Hispanos Soluciones</title>
@stop

@section('javascripts')
    
@stop

@section('contenido')

    @if(Session::has('message'))

        @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => Session::get('message')])

    @endif
    @include('layouts.breadcrumb', ['titulo' => 'Empleados ', 'subtitulo' => 'Mostrar información de: '.ucwords(strtolower($empleado->name))])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    [[ Form::open(['route' => ['empleados.destroy', $empleado->id], 'method' =>'DELETE', 'id' => 'form-eliminar-empleado', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este empleado?\')']) ]]
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Nombre y Apellido</th>
                                <td>{{ ucwords(strtolower($empleado->name)) }}</td>
                            </tr>
                            <tr>
                                <th>Cédula</th>
                                <td>{{ number_format($empleado->cedula, 0, '', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Rif</th>
                                <td>{{ $empleado->rif }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $empleado->email }}</td>
                            </tr>
                            <tr>
                                <th>Nombre de usuario en slack</th>
                                <td>{{ $empleado->usuarioSlack }}</td>
                            </tr>
                            <tr>
                                <th>Cargo</th>
                                <td>{{ ucwords(strtolower($empleado->nombreCargo->nombre)) }}</td>
                            </tr>
                            <tr>
                                <th>Acciones</th>
                                <td>
                                    
                                    <a href="{{ URL::route('empleados.edit', $empleado->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$empleado->id}}" style="text-decoration:none;">
                                        <span class="btn btn-success"> 
                                            <i class="fa fa-pencil"> Editar</i> 
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$empleado->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-empleado'], '¿Está realmente seguro de eliminar este empleado?');">
                                        <span class="btn btn-danger"> 
                                            <i class="fa fa-times">&nbsp;Eliminar</i> 
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    [[ Form::close() ]]
                </div>
            </div>
        </div>

    </section>

@stop