<!DOCTYPE html>
<html>
<head>
    @include('buyer.layouts.partial.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('buyer.layouts.partial.header404')
<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
   <!-- Small Breadcrumb -->
      
      <!-- Small Breadcrumb -->
       <div class="main-content-area clearfix">  
       


        <!-- Main content -->
           @include('buyer.layouts.partial.alert')
                     @yield('content')
                     
                
    </div>
    <!-- /.content-wrapper -->
    
@include('buyer.layouts.partial.tail')
    
</body>
</html>
