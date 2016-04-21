<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->path == '')
                <img src="{{ asset('uploads/users/unfile.png') }}" class="img-circle" alt="User Image"/>
                @else
                <img src="{{ asset('uploads/users/'.Auth::user()->path) }}" class="img-circle" alt="User Image"/>
                @endif
            </div>
            <div class="pull-left info">
                <p>[[ Auth::user()->name ]]</p>
                <p class="text-center"> 
                @if(Auth::user()->rol == 1)
                    Administrador
                @elseif(Auth::user()->rol == 0)
                    Analista
                @elseif(Auth::user()->rol == 3)
                    Empleado
                @endif
                </p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header text-center">Menú Principal</li>
            <li>
                <a href="{{ URL::route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Inicio</span>
                </a>
            </li>
            <li class="treeview 
                @if(
                    Route::getCurrentRoute()->getName() == 'users.index' or 
                    Route::getCurrentRoute()->getName() == 'users.show' or 
                    Route::getCurrentRoute()->getName() == 'users.edit' or 
                    Route::getCurrentRoute()->getName() == 'users.create'
                ) active @endif
            ">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'users.index' or 
                            Route::getCurrentRoute()->getName() == 'users.show' or 
                            Route::getCurrentRoute()->getName() == 'users.edit'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('users.index') }}">
                            <i class="fa fa-circle-o
                            @if(
                            Route::getCurrentRoute()->getName() == 'users.index' or 
                            Route::getCurrentRoute()->getName() == 'users.show' or 
                            Route::getCurrentRoute()->getName() == 'users.edit'
                            ) text-aqua 
                            @endif"></i> 
                            Ver usuarios
                        </a>
                    </li>
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'users.create'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('users.create') }}">
                            <i class="fa fa-circle-o 
                            @if(
                            Route::getCurrentRoute()->getName() == 'users.create'
                            ) text-aqua 
                            @endif
                            "></i> 
                            Agregar usuario
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview 
                @if(
                    Route::getCurrentRoute()->getName() == 'cargos.index' or 
                    Route::getCurrentRoute()->getName() == 'cargos.show' or 
                    Route::getCurrentRoute()->getName() == 'cargos.edit' or 
                    Route::getCurrentRoute()->getName() == 'cargos.create'
                ) active @endif
            ">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Cargos</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'cargos.index' or 
                            Route::getCurrentRoute()->getName() == 'cargos.show' or 
                            Route::getCurrentRoute()->getName() == 'cargos.edit'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('cargos.index') }}">
                            <i class="fa fa-circle-o
                            @if(
                            Route::getCurrentRoute()->getName() == 'cargos.index' or 
                            Route::getCurrentRoute()->getName() == 'cargos.show' or 
                            Route::getCurrentRoute()->getName() == 'cargos.edit'
                            ) text-aqua 
                            @endif"></i> 
                            Ver cargos
                        </a>
                    </li>
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'cargos.create'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('cargos.create') }}">
                            <i class="fa fa-circle-o 
                            @if(
                            Route::getCurrentRoute()->getName() == 'cargos.create'
                            ) text-aqua 
                            @endif
                            "></i> 
                            Agregar cargo
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview 
                @if(
                    Route::getCurrentRoute()->getName() == 'empleados.index' or 
                    Route::getCurrentRoute()->getName() == 'empleados.show' or 
                    Route::getCurrentRoute()->getName() == 'empleados.edit' or 
                    Route::getCurrentRoute()->getName() == 'empleados.create'
                ) active @endif
            ">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Empleados</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'empleados.index' or 
                            Route::getCurrentRoute()->getName() == 'empleados.show' or 
                            Route::getCurrentRoute()->getName() == 'empleados.edit'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('empleados.index') }}">
                            <i class="fa fa-circle-o
                            @if(
                            Route::getCurrentRoute()->getName() == 'empleados.index' or 
                            Route::getCurrentRoute()->getName() == 'empleados.show' or 
                            Route::getCurrentRoute()->getName() == 'empleados.edit'
                            ) text-aqua 
                            @endif"></i> 
                            Ver empleados
                        </a>
                    </li>
                    <li 
                        @if(
                            Route::getCurrentRoute()->getName() == 'empleados.create'
                        ) class="active" @endif
                    >
                        <a href="{{ URL::route('empleados.create') }}">
                            <i class="fa fa-circle-o 
                            @if(
                            Route::getCurrentRoute()->getName() == 'empleados.create'
                            ) text-aqua 
                            @endif
                            "></i> 
                            Agregar empleado
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ URL::route('logout') }}"><i class="fa fa-power-off"></i> <span>Cerrar sesión</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>