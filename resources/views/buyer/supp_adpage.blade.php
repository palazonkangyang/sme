@extends('buyer.layouts.main')
@section('content')
 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>{{$posts->title}}</h1>
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
                  <li><a href="index.html">Home Page</a></li>
                  <li><a href="{{ route("buyer.supplierpage") }}">Suppliers</a></li>
                  <li><a href="{{ route("buyer.suppliers",$posts->buyer_id)}}">Ads</a></li>
                  <li><a class="active" href="#">{{$posts->title}}</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <!-- Single Ad -->
                     <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                           <h1>{{$posts->title}}</h1>
                           <div class="short-history">
                              <ul>
                                 <li>Published on: <b>{{ Carbon\Carbon::parse($posts->created_at)->format('M d Y') }}</b></li>
                                 <li>Category: <b><a href="#">{{$posts->service_category}}</a></b></li>
                                 <li>Location: <b>{{$buyer->address}}</b></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider  --> 
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport">
                              <ul class="slides slide-main">
                                 <li class=""><img alt="" src="images/single-page/1.jpg" title=""></li>
                                 <li><img alt="" src="images/single-page/2.jpg" title=""></li>
                                 <li class="flex-active-slide"><img alt="" src="images/single-page/3.jpg" title=""></li>
                                 <li><img alt="" src="images/single-page/4.jpg" title=""></li>
                                 <li><img alt="" src="images/single-page/5.jpg" title=""></li>
                                 <li><img alt="" src="images/single-page/6.jpg" title=""></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider Thumb --> 
                        <div class="flexslider" id="carousels">
                           <div class="flex-viewport">
                              <ul class="slides slide-thumbnail">
                                 <li><img alt="" draggable="false" src="images/single-page/1_thumb.jpg"></li>
                                 <li><img alt="" draggable="false" src="images/single-page/2_thumb.jpg"></li>
                                 <li class="flex-active-slide"><img alt="" draggable="false" src="images/single-page/3_thumb.jpg"> </li>
                                 <li><img alt="" draggable="false" src="images/single-page/4_thumb.jpg"></li>
                                 <li><img alt="" draggable="false" src="images/single-page/5_thumb.jpg"></li>
                                 <li><img alt="" draggable="false" src="images/single-page/6_thumb.jpg"></li>
                                 <!-- items mirrored twice, total of 12 -->
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-share-alt"></i> <span class="hidetext">Share</span>
                           </div>
                           <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#"><i class="fa fa-star active"></i> <span class="hidetext">Add to watchlist</span></a>
                           <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-warning"></i> <span class="hidetext">Report</span>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- Short Description  --> 
                        <div class="ad-box">
                           <div class="short-features">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Description 
                                 </h3>
                              </div>
                              
                           </div>
                           <!-- Short Features  --> 
                           <div class="desc-points">
                              <ul>
                                 
                              </ul>
                           </div>
                           <!-- Related Image  --> 
                           <div class="ad-related-img">
                              <img src={!! url("uploads/Posts/$posts->image")!!} alt="" class="img-responsive center-block">
                           </div>
                           <!-- Ad Specifications --> 
                           <div class="specification">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Specifications 
                                 </h3>
                              </div>
                              <p>
                                 {{$posts->description}}
                              </p>
                              
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- Single Ad End --> 
                    
                    
         
                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Contact info -->
                        
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="user-info-card">
                              <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                 <img src="images/users/3.jpg" alt="">
                              </div>
                              <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                 <span class="user-name"><a class="hover-color" href="profile.html">{{$buyer->name}}</a></span>
                                 <div class="item-date">
                                    <span class="ad-pub">Published on: {{ Carbon\Carbon::parse($posts->created_at)->format('M d Y') }}</span><br>
                                    <a href="#" class="link">More Ads</a>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>Ad Id: <span class="color">{{$posts->id}}</span></li>
                                 <li>Categories: <span class="color">{{$posts->service_category}}</span></li>
                                 <li>Visits: <span class="color">9</span></li>
                                 <li>Location: <span class="color">{{$buyer->address}}</span></li>
                              </ul>
                           </div>
                           <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;"></div>
                        </div>
                        <!-- Featured Ads --> 
                        
                        <!-- Saftey Tips  --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Safety tips for deal</a></h4>
                           </div>
                           <div class="widget-content saftey">
                              <ol>
                                 <li>Use a safe location to meet seller</li>
                                 <li>Avoid cash transactions</li>
                                 <li>Beware of unrealistic offers</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>

@endsection
