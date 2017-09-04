@extends('buyer.layouts.main')
@section('content')
   
   <div class="page-header-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="header-page">
                  <h1>Ads Categories</h1>
               </div><!-- end header-page -->
            </div><!-- end col-lg-12 -->

         </div><!-- end row -->

      </div><!-- end container -->

   </div><!-- end page-header-area -->

   <div class="small-breadcrumb">

      <div class="container">

         <div class="breadcrumb-link">
            <ul>
               <li><a href='{{ route("buyer.index") }}'>Home</a></li>
               <li><a class="active" href="#">Ads Categories</a></li>
            </ul>
         </div><!-- end breadcrumb-link -->

      </div><!-- end container -->

   </div><!-- end small-breadcrumb -->

   <div class="main-content-area clearfix">
         
      <section class="custom-padding gray categories">
            
         <div class="container">
               
            <div class="row">
                 
               @foreach($category as $cate)

                  <div class="col-md-3 col-sm-6">

                     <div class="box">

                        <a href="{{ route('buyer.adslist', [$cate->id]) }}"> 
                           <img alt="img" style='height:120px;' src='{!! url("uploads/Service_Categories/$cate->image") !!}'>
                        </a>
                        
                        <h4><a href="{{ route('buyer.adslist', [$cate->id]) }}">{{$cate->service_category}}</a></h4> 
                       
                        <strong>{{$cate->count}} Ads</strong> 
                        
                     </div>

                  </div><!-- end col-md-3 col-sm-6 -->

               @endforeach                 
                  
            </div><!-- end row -->
              
         </div><!-- end container -->
            
      </section><!-- end custom-padding -->
   
   </div><!-- end main-content-area -->

@endsection