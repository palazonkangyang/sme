<div class="wrapper">
    <div id="logo"><a href="{!! url("/") !!}"><img src="{{ url("frontend/images/logo.png") }}" alt=""></a>
    </div>
    <div id="navigation">
        <div id="navbtn">menu</div>
        <ul id="menu-nenu" class="nav-menu">
            <li>{!! Config::getPageLink(1) !!}</li>
            <li>{!! Config::getPageLink(2) !!}</li>
            <li>{!! Config::getPageLink(5) !!}</li>
            <li>{!! Config::getPageLink(11) !!}</li>
            <li>{!! Config::getPageLink(10) !!}</li>
            <li>{!! Config::getPageLink(6) !!}</li>
            <li>{!! Config::getPageLink(7) !!}</li>
            <li>{!! Config::getPageLink(9) !!}</li>
            <li>{!! Config::getPageLink(8) !!}</li>
        </ul>
    </div>
</div>