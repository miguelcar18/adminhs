@extends('layouts.base')

@section('titulo')
    <title>Nuevo empleado | Hispanos Soluciones</title>
@stop

@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/empleadosAjax.js') }}"></script>
@stop


@section('contenido')
    
    <?php $subtitulo="";?>
    @if(count($errors) > 0)

        <?php $subtitulo = "<ul>"; ?>
        @foreach($errors->all() as $error)
            <?php $subtitulo .= "<li>$error</li>"; ?>
        @endforeach
        <?php $subtitulo .= "</ul>";?>
            
        @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => $subtitulo])

    @endif
    @include('layouts.breadcrumb', ['titulo' => 'Empleados ', 'subtitulo' => 'Nuevo'])

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body">
                        <div id="m-alertas"></div>
                        [[ Form::open(array('route' => 'empleados.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true, 'id' => 'form_empleados')) ]]
                    
                            @include('empleados.Form.EmpleadosFormType', ['cargos' => $cargos]) 

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-danger pull-right"  onclick="document.location.href = '{{ URL::route('empleados.index') }}'"><i class="fa fa-times"></i> Cancelar</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" id="submit" class="btn btn-info" data='1'><i class="fa fa-check"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>

                        [[ form::close() ]]
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@stop