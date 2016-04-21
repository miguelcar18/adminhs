<?php setlocale(LC_TIME, 'es_VE.UTF-8'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @section('titulo')
            <title>Inicio | Hispanos Soluciones</title>
        @show
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') 
        }}">
        <!-- Datepicker -->
        <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') 
        }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('styles')
    </head>
    <body class="hold-transition skin-green sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            @include('layouts.header')
            @include('layouts.sidebar')

            <div class="content-wrapper">

                @section('contenido')
                @if(Session::has('message'))

                @include('Helpers.mensaje-error', ['titulo' => 'Error: ', 'subtitulo' => Session::get('message')])
                @endif
                @include('layouts.breadcrumb', ['titulo' => 'Inicio: ', 'subtitulo' => ""])
                <section class="content">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Title</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            Start creating your amazing application!
                        </div>
                        <div class="box-footer">
                            Footer
                        </div>
                    </div>
                </section>
                @show
            </div>

            
            @include('layouts.controlSidebar')

        </div>
        @include('layouts.footer')
        <!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/app.min.js') }}"></script>
        {{--
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        --}}
        <script src="{{ asset('js/jquery.validate.js') }}"></script>
        <script type="text/javascript">
            function decision(message, url){
                if(confirm(message)) location.href = url;
            }

            function confirmSubmit(form, message) { 
                var agree=confirm(message); 
                if (agree) {
                    form.submit();
                    return false; //de todas formas el link no se ejecutara
                } else {
                    return false;
                } 
            }
            $.fn.reset = function () {
                $(this).each (function() { this.reset(); });
            }

            $('.alert').fadeOut(10000);

        </script>

        @yield('javascripts')

    </body>
</html>
