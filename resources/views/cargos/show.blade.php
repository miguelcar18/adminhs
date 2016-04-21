@extends('layouts.base')

@section('titulo')
    <title>Mostrar cargo | Hispanos Soluciones</title>
@stop

@section('javascripts')
    
@stop

@section('contenido')

    @if(Session::has('message'))

        @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => Session::get('message')])

    @endif
    @include('layouts.breadcrumb', ['titulo' => 'Cargos ', 'subtitulo' => 'Mostrar: '.ucwords(strtolower($cargo->nombre))])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    [[ Form::open(['route' => ['cargos.destroy', $cargo->id], 'method' =>'DELETE', 'id' => 'form-eliminar-cargo', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este cargo?\')']) ]]
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Cargo</th>
                                <td>{{ ucwords(strtolower($cargo->nombre)) }}</td>
                            </tr>
                            <tr>
                                <th>Sueldo Mensual</th>
                                <td>{{ number_format($cargo->salario_mensual, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Sueldo diario</th>
                                <td>{{ number_format(($cargo->salario_mensual)/30, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Acciones</th>
                                <td>
                                    
                                    <a href="{{ URL::route('cargos.edit', $cargo->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$cargo->id}}" style="text-decoration:none;">
                                        <span class="btn btn-success"> 
                                            <i class="fa fa-pencil"> Editar</i> 
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$cargo->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-cargo'], '¿Está realmente seguro de eliminar este cargo?');">
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