@extends('layouts.base')

@section('titulo')
    <title>Listado de empleados | Hispanos Soluciones</title>
@stop

@section('contenido')
    @include('layouts.breadcrumb', ['titulo' => 'Empleados ', 'subtitulo' => 'Listado'])
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div id="respuesta"></div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre y Apellido</th>
                                    <th>Cédula</th>
                                    <th>Cargo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)
                                <tr>
                                    <td>{{ ucwords(strtolower($empleado->name)
                                        ) }}</td>
                                    <td>{{ number_format($empleado->cedula, 0, '', '.') }}</td>
                                    <td>{{ ucwords(strtolower($empleado->nombreCargo->nombre)) }}</td>
                                    <td>
                                        
                                        <a href="{{ URL::route('empleados.show', $empleado->id) }}" data-rel="tooltip" title="Mostrar {{ $empleado->name }}" objeto="{{ $empleado->name }}"> 
                                            <span class="btn btn-sm btn-info"> <i class="glyphicon glyphicon-eye-open"></i> </span> 
                                        </a>
                                        &nbsp;
                                        <a href="{{ URL::route('empleados.edit', $empleado->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $empleado->name }}" objeto="{{ $empleado->name }}" style="text-decoration:none;"> 
                                            <span class="btn btn-sm btn-warning"> <i class="glyphicon glyphicon-pencil"></i> </span> 
                                        </a>
                                        &nbsp;
                                        <a href="#" data-id="{{ $empleado->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $empleado->name }}" objeto="{{ $empleado->id }}"> 
                                            <span class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"></i> </span> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        [[ Form::open(array('route' => array('empleados.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) ]]
                        [[ Form::close() ]]
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

@section('javascripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ resultados por página",
                    "zeroRecords": "Sin resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin ninguna información",
                    "infoFiltered": "(Filtrado de _MAX_ resultados totales)",
                    "search":         "Buscar:",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                }
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });

            function mensaje(textoMensaje)
            {
                var alertMessage = '<div class="callout callout-success" style="display: none">';
                alertMessage += '<h4><i class="icon fa fa-check"></i> '+textoMensaje+'</h4>';
                alertMessage += '</div>';
                return alertMessage;
            }
            @if(Session::has('message'))
                var mensaje1 = "{{ Session::get('message') }}";
                $('#respuesta').html(mensaje(mensaje1));
                $('.callout-success').fadeIn();
                $('.callout-success').fadeOut(10000);
            @endif

            if ($('.tooltip-error').length)
            {
               $('.tooltip-error').click(function () {

                    var message = "¿Está realmente seguro(a) de eliminar este empleado?";
                    var id = $(this).data('id');
                    var form = $('#form-delete');
                    var action = form.attr('action').replace('USER_ID', id);
                    var row =  $(this).parents('tr');

                    if(confirm(message))
                    {

                        row.fadeOut(1000);
                 
                        $.post(action, form.serialize(), function(result) {
                            if (result.success) {
                                setTimeout (function () {
                                    row.delay(1000).remove();
                                    var alertMessage = mensaje(result.msg);
                                    $('#respuesta').html(alertMessage);
                                    $('.callout').fadeIn();
                                    $('.callout').fadeOut(10000);
                                }, 1000);                
                            } 
                            else 
                            {
                                row.show();
                            }
                        }, 'json');
                    } 
               });
            }
        });
    </script>
@stop