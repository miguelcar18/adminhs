<header class="main-header">
    <!-- Logo -->
    <a href="{{ URL::route('dashboard') }}" class="logo">
        <span class="logo-mini"><b>HS</b></span>
        <span class="logo-lg"><b>ADMIN HS</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->path == '')
                        <img src="{{ asset('uploads/users/unfile.png') }}" class="user-image" alt="User Image"/>
                        @else
                        <img src="{{ asset('uploads/users/'.Auth::user()->path) }}" class="user-image" alt="User Image"/>
                        @endif
                        <span class="hidden-xs">[[ Auth::user()->name ]]</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if(Auth::user()->path == '')
                            <img src="{{ asset('uploads/users/unfile.png') }}" class="img-circle" alt="User Image"/>
                            @else
                            <img src="{{ asset('uploads/users/'.Auth::user()->path) }}" class="img-circle" alt="User Image"/>
                            @endif
                            <p>
                                [[ Auth::user()->name ]]
                                <small>Usuario desde [[ Auth::user()->created_at->formatLocalized('%B %Y') ]]</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="{{ URL::route('users.show', Auth::user()->id) }}" class="btn btn-default btn-flat">Ver</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{ URL::route('users.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">Editar</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{ URL::route('logout') }}" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>