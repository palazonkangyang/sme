<header class="main-header">
    <!-- Logo -->
    <a href="{{ route("admin.dashboard") }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! Config::ADMIN_SHORT_LOGO !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! Config::ADMIN_LONG_LOGO !!}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! url("dist/img/user2-160x160.jpg") !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::admin()->user()->getName() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! url("dist/img/user2-160x160.jpg") !!}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::admin()->user()->getName() }}
                                <small>{{ Auth::admin()->user()->getRole() }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route("admin.account.profile", [ Auth::admin()->user()->id ]) }}"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route("admin.account.logout") }}" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>