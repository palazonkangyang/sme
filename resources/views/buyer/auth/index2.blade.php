<!DOCTYPE html>
<html>
<head>
   @include('buyer.auth.partial.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('buyer.auth.partial.header')


<!-- Content Wrapper. Contains page content -->
   <!-- Small Breadcrumb -->
      
      <!-- Small Breadcrumb -->
  
                    
  
      <section class="clearfix">
         <!-- Master Slider -->
      <div class="master-slider ms-skin-default" id="masterslider">
         <div class="ms-slide slide-1" data-delay="3">
            <!-- slide 1 --> 
            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner1.jpg" alt="Slide1 background"/> 
            <h3 class="ms-layer title3  font-thin uppercase"
               style="left: 90px;top: 100px; color:#232323;"
               data-type="text"
               data-delay="2000"
               data-duration="2500"
               data-ease="easeOutExpo"
               data-effect="skewright(30,80)">The 1st SME Portal in Singapore</h3>
        
        <!--    <a href="#" class="ms-layer btn3 uppercase"
               style="left:95px; top: 320px;"
               data-type="text"
               data-delay="3500"
               data-ease="easeOutExpo"
               data-duration="2000"
               data-effect="scale(1.5,1.6)"> View Details</a> -->
         </div>

         <!-- end of slide 1 --> 
         <!-- slide 2 -->
         <div class="ms-slide slide-2" data-delay="3">
            <!-- slide background --> 
            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner2.jpg" alt="Slide2 background"/> 
            <h3 class="ms-layer title3  font-thin uppercase"
               style="left: 90px;top: 100px;color:#232323;"
               data-type="text"
               data-delay="2000"
               data-duration="2500"
               data-ease="easeOutExpo"
               data-effect="skewright(30,80)">Find Your Consultants in One Place</h3>
        
          
         </div>
             <!-- end of slide 2 --> 
          <!-- slide 3 -->
         <div class="ms-slide slide-3" data-delay="3">
            <!-- slide background --> 
            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner3.jpg" alt="Slide3 background"/> 
            <h3 class="ms-layer title3 font-thin uppercase"
               style="left: 90px;top: 100px;color:#232323;"
               data-type="text"
               data-delay="2000"
               data-duration="2500"
               data-ease="easeOutExpo"
               data-effect="skewright(30,80)">Promote Your Professional Services</h3>
        
        
         </div>
             <!-- end of slide 3 --> 
             
                   <!-- slide 4 -->
         <div class="ms-slide slide-4" data-delay="3">
            <!-- slide background --> 
            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner4.jpg" alt="Slide4 background"/> 
            <h3 class="ms-layer title3 font-thin uppercase"
               style="left: 90px;top: 100px; color:#232323;"
               data-type="text"
               data-delay="2000"
               data-duration="2500"
               data-ease="easeOutExpo"
               data-effect="skewright(30,80)">Build Business Connections</h3>
        
            
         </div>
             <!-- end of slide 4 --> 
             
          
      </div>
      <!-- end Master Slider -->
         <!-- end map -->
      </section>
      <!-- =-=-=-=-=-=-= Listing Map End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Advance Search =-=-=-=-=-=-= -->
     <section class="search-2">
         <div class="container">
            <!-- Title -->
            <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
               <div class="search-title">Browse Ads</div>
            </div>
            <div class="row">
            <!--    {!! Form::open(array('url' => 'buyer/search')) !!} -->
                <form method="post" class="search-form">
                  <!-- Category -->
                  <div class="col-md-3 col-xs-12 col-sm-3">
                       {!! Form::select("category_id", $categories, NULL, ["id" => "category_id"]) !!}
                       {!! $errors->first("category_id", "<p class='form-error'>:message</p>") !!}   
                  </div>
                  <!-- Search Field -->
                  <div class="col-md-3 col-xs-12 col-sm-3">
                      {!! Form::text("search", Input::old("search"), ["class" => "form-control",'placeholder' =>'Enter the word to search']) !!}
                                 <p class="help-block">{{ $errors->first("search") }}</p>     
                  </div>
                  <!-- Price Range SLider -->
                  <div class="col-md-3 col-xs-12 col-sm-3">
                     <span class="price-slider-value">Price ($) <span id="price-min"></span> - <span id="price-max"></span></span>
                     <div id="price-slider"></div>
                  </div>
                  <!-- Search Button -->
                  <div class="col-md-3 col-xs-12 col-sm-3">
                      <button type="submit" disabled class="btn btn-light">Search</button>
                                           
                       
                  </div>
                  <!-- end .item -->
            </form>
               <!-- end .search-form -->
            </div>
            <!-- end .tab-panel -->
         </div>
         <!-- end .container -->
      </section>
      <!-- =-=-=-=-=-=-= Advance Search End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Categories =-=-=-=-=-=-= -->
         <section class="custom-padding gray categories">
         <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <!--  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Categories
                        </h3>
                     </div>
                  </div> -->
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Category -->
                  @foreach($category as $cate)
                  <div class="col-md-3 col-sm-6">
                     <div class="box">
                        <img alt="img" style='height:150px;' src= {!! url("uploads/Service_Categories/$cate->image")!!} >
                        <h4><a href={{ route('buyer.category', $cate->id)}}>{{$cate->service_category}}</a></h4>
                        <strong>{{$cate->count}} Ads</strong> 
                     </div>
                  </div>
                  @endforeach
                  <!-- Category -->
                  
               </div>
               <!-- Row End -->
            </div>
            </div>
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Categories =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Call to Action =-=-=-=-=-=-= -->
         <div class="parallex bg-img-3  section-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-sm-12">
                     <div class="call-action">
                        <i class="flaticon-shapes"></i>
                        <h4>Post featured ad and get great exposure </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                     </div>
                     <!-- end subsection-text -->
                  </div>
                  <!-- end col-md-8 -->
                  <div class="col-md-4 col-sm-12">
                     <div class="parallex-button"> <a href="login" class="btn btn-theme">Post Ad <i class="fa fa-angle-double-right "></i></a> </div>
                     <!-- end parallex-button -->
                  </div>
                  <!-- end col-md-4 -->
               </div>
               <!-- end row -->
            </div>
            <!-- end container -->
         </div>
         <!-- =-=-=-=-=-=-= Ads By Locations =-=-=-=-=-=-= -->
         <section class="custom-padding ads-location">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Ads By Location
                        </h3>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Orchard Road</h5>
                                    <h5>River Valley</h5>
                                        <h5>&nbsp;</h5>
                              <a class="number-adds" href="#">4600 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Raffles Place</h5>
                               <h5>Marina</h5>
                                <h5>Cecil</h5>
                              <a class="number-adds" href="#">3597 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Boon Lay</h5>
                                     <h5>Jurong</h5>
                                            <h5>Tuas</h5>
                              <a class="number-adds" href="#">2588 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Choa Chu Kang</h5>
                                <h5>Bukit Panjang</h5>
                                  <h5>Bukit Batok</h5>
                                  
                              <a class="number-adds" href="#">1565 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Tampines</h5>
                               <h5>Pasir Ris</h5>
                                   <h5>&nbsp;</h5>
                              <a class="number-adds" href="#">1337 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Bedok</h5>
                              <h5>Upper East Coast</h5>
                              <h5>Siglap</h5>
                              <a class="number-adds" href="#">1215 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Novena</h5>
                              <h5>Newton</h5>
                              <h5>Thomson</h5>
                              <a class="number-adds" href="#">1097 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Clarke Quay</h5>
                              <h5>City Hall</h5>
                                  <h5>&nbsp;</h5>
                              <a class="number-adds" href="#">1035 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Toa Payoh</h5>
                                <h5>Serangoon</h5>
                                  <h5>Balestier</h5>
                              <a class="number-adds" href="#">1015 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Bugis</h5>
                               <h5>Beach Road</h5>
                              <h5>Golden Mile</h5>
                              <a class="number-adds" href="#">1003 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Buona Vista</h5>
                               <h5>Pasir Panjang</h5>
                                <h5>Clementi</h5>
                              <a class="number-adds" href="#">998 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-4 col-xs-12 ">
                        <!-- Ads Location -->
                        <div class="ad-location-gird clearfix">
                           <div class="location-icon"> <i class="fa fa-map-marker"></i> </div>
                           <div class="location-title-disc">
                              <h5>Geylang</h5>
                                   <h5>Paya Lebar</h5>
                                        <h5>Sims</h5>
                              <a class="number-adds" href="#">977 ads available</a> 
                           </div>
                        </div>
                     </div>
                     <!-- Middle Content Box End -->
                  </div>
                  <!-- Row End -->
               </div>
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads By Locations End =-=-=-=-=-=-= -->
         
         <!-- =-=-=-=-=-=-= Call to Action =-=-=-=-=-=-= -->
         <!-- mubeen featured suppliers -->
     <!--  
               <div class="row">
                 
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Featured Suppliers
                        </h3>
                     </div>
                  </div>
        
            <div class="container">
              
               <div class="row">
            
                  @foreach($supplier as $supp)
                  <div class="col-md-3 col-sm-6">
                     <div class="box">
                        
                        <h4><a href={{ route('buyer.suppliers', $supp->id)}}>{{$supp->company_name}}</a></h4>
                        <strong>{{$supp->count}} Posts</strong> 
                     </div>
                  </div>
                  @endforeach
              
                  
               </div>
          
            </div>
            </div>
            </div>
       
         </section> -->
        
       <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Featured Ads
                        </h3>
                        <!-- Style Switcher -->
                        <div class="switcher pull-right">
                           <a href="#" id="list" class="btn btn-theme">
                           <span class="fa fa-list"></span>
                           List
                           </a> 
                           <a href="#" id="grid" class="btn active btn-theme">
                           <span class="fa fa-th"></span>
                           Grid
                           </a>
                        </div>
                        <!-- Style Switcher End -->
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div id="products" class=" list-group">
                        <div class="row">
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-1.jpg") }}"  class="img-responsive">
                                    
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Information Technology</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">Palazon Technology Privite Limited</a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                      
                                       <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                    </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Tampines</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>445 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-10.jpg") }}"  class="img-responsive">
                                  
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Information Technology</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">XYZ Privite Limited</a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                       <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                     </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Orchard Road</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>145 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-7.jpg") }}"  class="img-responsive">
                                    
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Marketing</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">HELPDESK Privite Limited</a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                  <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                       </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Orchard Road</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>10 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>445 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-11.jpg") }}" class="img-responsive">
                                    
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Information Technology</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">Gaming PC Quad Core 8GB Graphics</a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                        
                                       <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                     </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Paya Lebar</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>445 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-9.jpg") }}"  class="img-responsive">
                                    
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Information Technology</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">2015 Honda CBR 1000RR </a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                        
                                   <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                        </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Tampines</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>20 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>45 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              <div class="category-grid-box-1">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <img alt="Tour Package" src="{{ url("/adforest/images/posting/house-4.jpg") }}"  class="img-responsive">
                                    
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Finance/Investment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3><a title="" href="single-page-listing.html">Brand New House For Sale</a></h3>
                                    <!-- Short Description -->
                                    <p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    <!-- Ad Meta Info -->
                                    <ul class="ad-meta-info">
                                                                     <li> <a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> </li>
                                       <li> <a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> </li>
                                      </ul>
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">Clarke Quay</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>30 minutes ago </li>
                                       <li class="views"> <i class="fa fa-eye"></i>1445 Views </li>
                                    </ul>
                                    <!-- View All Button -->
                                    <div class="detail-button"> <a href="#">View Details</a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
     
     
         <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
         <div class="funfacts custom-padding parallex">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="number"><span class="timer" data-from="0" data-to="{{ $member_count }}"" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Total <span>Members</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="number"><span class="timer" data-from="0" data-to="{{ $supplier_count }}"" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Total <span>Suppliers</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="number"><span class="timer" data-from="0" data-to="1042" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Active <span>Users</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="number"><span class="timer" data-from="0" data-to="{{ $posts_count }}" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Total <span>Ads</span></h4>
                  </div>
               </div>
         
            </div>
       
         </div>
<!-- mubeen lasted block 
         <section class="custom-padding gray">
     
            <div class="container">
         
               <div class="row">
                
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Latest Blog Post
                        </h3>
                     </div>
                  </div>
      
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                       
                        @foreach($posts as $post)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src={!! url("uploads/Posts/$post->image")!!}> </a>
                              </div>
                              <div class="post-info"> <a href="">{{ Carbon\Carbon::parse($post->created_at)->format('M d Y') }}</a> <a href="#"></a> </div>
                              <h3 class="post-title"> <a href=""> {{ $post->title}}</a> </h3>
                              <p class="post-excerpt"> {!! $post->description !!} </p>
                           </div>
                        </div>
                      @endforeach
                     </div>
                  </div>
                
            
            </div>
  
         </section> -->
       <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Latest Blog Post
                        </h3>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <!-- Blog Post-->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src="{{ url("/adforest/images/blog/1.jpg") }}"> </a>
                              </div>
                              <div class="post-info"> <a href="">Apr 3, 2017</a> <a href="#">23 comments</a> </div>
                              <h3 class="post-title"> <a href="#"> Sony Xperia XZ: Release date and everything you need to know</a> </h3>
                              <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>
                           </div>
                        </div>
                        <!-- Blog Post-->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src="{{ url("/adforest/images/blog/2.jpg") }}"></a>
                              </div>
                              <div class="post-info"> <a href="">Apr 2, 2017</a> <a href="#">21 comments</a> </div>
                              <h3 class="post-title"> <a href="#"> Review of the 2017 Honda Accord Sport </a> </h3>
                              <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>
                           </div>
                        </div>
                        <!-- Blog Post-->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src="{{ url("/adforest/images/blog/3.jpg") }}"> </a>
                              </div>
                              <div class="post-info"> <a href="">Mar 30, 2017</a> <a href="#">33 comments</a> </div>
                              <h3 class="post-title"> <a href="#"> How to Buy a House 6 Must-Dos Before Buying A Home</a> </h3>
                              <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Advance Search End =-=-=-=-=-=-= -->
      
    <!-- /.content-wrapper -->
    @include('buyer.auth.partial.tailnosubsribe')
</body>
</html>
