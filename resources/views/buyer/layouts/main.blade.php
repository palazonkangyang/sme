<!DOCTYPE html>
<html>
<head>
    @include('buyer.layouts.partial.head')

    @yield('custom-css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
	<div class="wrapper">

		@include('buyer.layouts.partial.header')

		<div class="main-content-area clearfix">  

           @include('buyer.layouts.partial.alert')
            
           @yield('content')

    	</div><!-- end main-content-area clearfix -->

	</div><!-- end wrapper -->

	@include('buyer.layouts.partial.tail')

	@yield('custom-js')

</body>
</html>