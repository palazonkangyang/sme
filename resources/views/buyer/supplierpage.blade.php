@extends('buyer.layouts.main')
@section('content')
 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Suppliers</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route("buyer.index") }}">Home</a></li>
                  <li><a class="active" href="#">Suppliers</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
          <section class="custom-padding gray categories">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Category -->
                  @foreach($supplier as $supp)
                  <div class="col-md-3 col-sm-6">
                     <div class="box">
                        
                        <h4><a href={{ route('buyer.suppliers', $supp->id)}}>{{$supp->company_name}}</a></h4>
                        <strong>{{$supp->count}} Ads</strong> 
                     </div>
                  </div>
                  @endforeach
                  <!-- Category -->
                  
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         </div>

@endsection
