<header class="main-header">
    <!-- Logo -->
    <a href="{{ route("supplier.dashboard") }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! Config::SUPPLIER_PANEL_NAME !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! Config::SUPPLIER_PANEL_NAME !!}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! url("dist/img/user2-160x160.jpg") !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::supplier()->user()->company_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! url("dist/img/user2-160x160.jpg") !!}" class="img-circle" alt="User Image">
                            <p>
                                {{ Auth::supplier()->user()->company_name }}
                                <small>{{ Auth::supplier()->user()->contact_person }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route("supplier.auth.profile") }}"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route("supplier.auth.logout") }}" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>