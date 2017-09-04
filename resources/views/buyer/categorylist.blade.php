@extends('buyer.layouts.main')
@section('content')
 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Categories</h1>
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
                  <li><a class="active" href="{{ route("buyer.categories") }}">Categories</a></li>
                    <li><a class="active" href="#">Information Technology</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
   <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
                     <!-- Row -->
                     <div class="row">
                        <!-- Sorting Filters -->
                          <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <div class="clearfix"></div>
							<div class="listingTopFilterBar">
   								 <div class="col-md-7 col-xs-12 col-sm-6 no-padding">
                                    <ul class="filterAdType">
                                        <li class="active"><a href="">All Supplies<small>(1)</small></a> </li>
                                        <li class=""><a href="">Featured <small>(35)</small></a> </li>
                                    </ul>
                                </div>
   								 <div class="col-md-5 col-xs-12 col-sm-6 no-padding">
                               	 	<div class="header-listing">
                                    <h6>Sort by :</h6>
                                    <div class="custom-select-box">
                                        <select name="order" class="custom-select">
                                            <option value="0">Most popular</option>
                                            <option value="1">The latest</option>
                                        <option value="3">Most Rating</option>
                                        </select>
                                    </div>
                                </div>
    							</div>
							</div>
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12  ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="{{ url("/adforest/images/posting/car-4.jpg") }}" class="img-responsive"> 
                                     <div class="featured-ribbon">
                                            <span>Featured</span>
                                     </div>
                            	</div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">ABC Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(4)</span>
                                    </div>
                                    <!-- Price -->
                                   
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12  ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-7.jpg") }}" class="img-responsive">
                                 <div class="featured-ribbon">
                                            <span>Featured</span>
                                     </div>
                                  </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">Gogogo Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span>
                                    </div>
                                    <!-- Price -->
                                   
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                                       <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          <li data-target="#carousel-0" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-0" data-slide-to="1"></li>
                                       </ol>
                                       <!-- Wrapper for slides -->
                                       <div class="carousel-inner">
                                          <div class="item active"> <img src="{{ url("/adforest/images/posting/list-9.jpg") }}" alt="Image"> </div>
                                          <div class="item"> <img src="{{ url("/adforest/images/posting/list-6.jpg") }}" alt="Image"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">xyz Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="rating-count">(5)</span>
                                    </div>
                                    <!-- Price -->
                                    
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="{{ url("/adforest/images/posting/grid-1.jpg") }}" class="img-responsive">
                                 <div class="featured-ribbon">
                                            <span>Featured</span>
                                     </div>
                                  </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Computer & Equipment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">Gigabyte Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(2)</span>
                                    </div>
                                    <!-- Price -->
                                   
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        
                           <!-- Advertizing End -->
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image">
                                    <div id="carousel-2" class="carousel slide slide-carousel" data-ride="carousel">
                                       <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-2" data-slide-to="1"></li>
                                          <li data-target="#carousel-2" data-slide-to="2"></li>
                                       </ol>
                                       <!-- Wrapper for slides -->
                                       <div class="carousel-inner">
                                          <div class="item active"> <img src="{{ url("/adforest/images/posting/list-5.jpg") }}" alt="Image"> </div>
                                          <div class="item"> <img  src="{{ url("/adforest/images/posting/list-10.jpg") }}" alt="Image"> </div>
                                          <div class="item"> <img src="{{ url("/adforest/images/posting/mob-6.jpg") }}" alt="Image"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Mobiles</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">Xperia  Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="rating-count">(5)</span>
                                    </div>
                                    <!-- Price -->
                                   
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="{{ url("/adforest/images/posting/house-4.jpg") }}"   class="img-responsive">
                                 <div class="featured-ribbon">
                                            <span>Featured</span>
                                     </div>
                                  </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Real Estate</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">Brand New House  Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span>
                                    </div>
                                    <!-- Price -->
                                 
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image">
                                 <div class="featured-ribbon">
                                            <span>Featured</span>
                                     </div>
                                    <div id="carousel-3" class="carousel slide slide-carousel" data-ride="carousel">
                                       <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-3" data-slide-to="1"></li>
                                          <li data-target="#carousel-3" data-slide-to="2"></li>
                                       </ol>
                                       <!-- Wrapper for slides -->
                                       <div class="carousel-inner">
                                          <div class="item active">  <img src="{{ url("/adforest/images/posting/car-3.jpg") }}"  alt="Image"> </div>
                                          <div class="item"> <img src="{{ url("/adforest/images/posting/car-5.jpg") }}"  alt="Image"> </div>
                                          <div class="item"> <img src="{{ url("/adforest/images/posting/car-6.jpg") }}" alt="Image"> </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title=""  href=""> Audi AAA Private Limited </a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span>
                                    </div>
                                    <!-- Price -->
                                    
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                              <div class="white category-grid-box-1 ">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="{{ url("/adforest/images/posting/mob-4.jpg") }}" class="img-responsive"> </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="">Apple RRR Private Limited</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> Tiong Bahru, Alexandra, Queenstown</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(4)</span>
                                    </div>
                                    <!-- Price -->
                                   
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                        </div>
                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div>
                        <!-- Pagination -->  
                        <div class="text-center margin-top-30">
                           <ul class="pagination ">
                              <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                              <li><a href="#">1</a></li>
                              <li class="active"><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                           </ul>
                        </div>
                        <!-- Pagination End -->   
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
                  <!-- Left Sidebar -->
                  <div class="col-md-4 col-md-pull-8 col-sx-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Categories Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingOne">
                                 <!-- Title -->
                                 <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Categories
                                    </a>
                                 </h4>
                                 <!-- Title End -->
                              </div>
                              <!-- Content -->
                              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body categories">
                                    <ul>
                                       <li><a href="#"><i class="flaticon-data"></i>Electronics & Gedget<span>(1029)</span></a></li>
                                       <li><a href="#"><i class="flaticon-transport-6"></i>Cars & Vehicles<span>(1228)</span></a></li>
                                       <li><a href="#"><i class="flaticon-mortgage"></i>Property<span>(178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-8"></i>Mobile & Tablets<span>(2178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-suitcase"></i>Jobs<span>(7178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-search"></i>Home & Garden<span>(7163)</span></a></li>
                                       <li><a href="#"><i class="flaticon-dog"></i>Pets & Animals<span>(8709)</span></a></li>
                                       <li><a href="#"><i class="flaticon-science"></i>Health & Beauty<span>(3129)</span></a></li>
                                       <li><a href="#"><i class="flaticon-game"></i>Hobby, Sport & Kids<span>(2019)</span></a></li>
                                       <li><a href="#"><i class="flaticon-food"></i>Food & Agriculture<span>(323)</span></a></li>
                                       <li><a href="#"><i class="flaticon-blouse"></i>Women & Children Cloths<span>(425)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-22"></i>Cameras & Security<span>(3223)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-45"></i>Office Product<span>(3283)</span></a></li>
                                       <li><a href="#"><i class="flaticon-wrench"></i>Arts, Crafts & Sewing<span>(3221)</span></a></li>
                                       <li><a href="#"><i class="flaticon-cogwheel-2"></i>Others<span>(3129)</span></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Categories Panel End -->
                        
                           <!-- Location Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="cities">
                                 <!-- Title -->
                                 <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#citiesheading" aria-expanded="true" aria-controls="citiesheading">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                   Districts
                                    </a>
                                 </h4>
                                 <!-- Title End -->
                              </div>
                              <!-- Content -->
                              <div id="citiesheading" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cities">
                                 <div class="panel-body categories">
                                    <ul>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Raffles Place, Marina, Cecil </a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Tanjong Pagar, Chinatown </a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Tiong Bahru, Alexandra, Queenstown </a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Telok Blangah, Harbourfront </a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Buona Vista, Pasir Panjang, Clementi</a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Clarke Quay, City Hall</a></li>
                                       <li><a href="#"><i class="flaticon-signs-1"></i> Bugis, Beach Road, Golden Mile </a></li>
                                    </ul>
                                    <h5><a class="pull-right" data-target=".cat_modal" data-toggle="modal"  href="#">View All</a></h5>
                                 </div>
                              </div>
                           </div>
                           <!-- Location Panel End -->
                           
                       
                       
                           <!-- Featured Ads Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" >
                                 <h4 class="panel-title">
                                    <a>
                                    Featured Ads
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div class="panel-collapse">
                                 <div class="panel-body recent-ads">
                                    <div class="featured-slider-3">
                                       <!-- Featured Ads -->
                                       <div class="item">
                                          <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                             <!-- Ad Box -->
                                             <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                   <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/car-3.jpg") }}"  >
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="{{ url("/adforest/images/users/2.jpg") }}" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cars</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="">2017 Honda Civic EX</a></h3>
                                                   <!-- Price -->
                                                   
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!-- Ad Box End -->
                                          </div>
                                       </div>
                                       <!-- Featured Ads -->
                                       <div class="item">
                                          <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                             <!-- Ad Box -->
                                             <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                   <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/fur-3.jpg") }}"  >
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img  src="{{ url("/adforest/images/users/2.jpg") }}" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="">Office Furniture For Sale </a></h3>
                                                   <!-- Price -->
                                                 
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!-- Ad Box End -->
                                          </div>
                                       </div>
                                       <!-- Featured Ads -->
                                       <div class="item">
                                          <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                             <!-- Ad Box -->
                                             <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                   <img class="img-responsive" alt=""  src="{{ url("/adforest/images/posting/mob-6.jpg") }}" >
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img  src="{{ url("/adforest/images/users/2.jpg") }}"  class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                  
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!-- Ad Box End -->
                                          </div>
                                       </div>
                                       <!-- Featured Ads -->
                                       <div class="item">
                                          <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                             <!-- Ad Box -->
                                             <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                   <img class="img-responsive" alt=""  src="{{ url("/adforest/images/posting/cam-2.jpg") }}" >
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="{{ url("/adforest/images/users/2.jpg") }}" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                  
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!-- Ad Box End -->
                                          </div>
                                       </div>
                                       <!-- Featured Ads -->
                                       <div class="item">
                                          <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                             <!-- Ad Box -->
                                             <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                   <img class="img-responsive" alt=""  src="{{ url("/adforest/posting/cam-2.jpg") }}" >
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="{{ url("/adforest/images/users/2.jpg") }}"   class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                 
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <!-- Ad Box End -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Featured Ads Panel End -->
                           <!-- Latest Ads Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" >
                                 <h4 class="panel-title">
                                    <a>
                                    Recent Ads
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div class="panel-collapse">
                                 <div class="panel-body recent-ads">
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <div class="recent-ads-list-image">
                                             <a href="#" class="recent-ads-list-image-inner">
                                             <img src="{{ url("/adforest/images/posting/thumb-1.jpg") }}"  alt="">
                                             </a><!-- /.recent-ads-list-image-inner -->
                                          </div>
                                          <!-- /.recent-ads-list-image -->
                                          <div class="recent-ads-list-content">
                                             <h3 class="recent-ads-list-title">
                                                <a href="#">Sony ABC Private Limited</a>
                                             </h3>
                                             <ul class="recent-ads-list-location">
                                                <li><a href="#"> Tanjong Pagar, Chinatown</a></li>
                                        
                                             </ul>
                                             
                                             <!-- /.recent-ads-list-price -->
                                          </div>
                                          <!-- /.recent-ads-list-content -->
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <div class="recent-ads-list-image">
                                             <a href="#" class="recent-ads-list-image-inner">
                                             <img src="{{ url("/adforest/images/posting/thumb-1.jpg") }}" alt="">
                                             </a><!-- /.recent-ads-list-image-inner -->
                                          </div>
                                          <!-- /.recent-ads-list-image -->
                                          <div class="recent-ads-list-content">
                                             <h3 class="recent-ads-list-title">
                                                <a href="#">XYZ Private Limited</a>
                                             </h3>
                                             <ul class="recent-ads-list-location">
                                                <li><a href="#"> Tanjong Pagar, Chinatown</a></li>
                                           
                                             </ul>
                                            
                                             <!-- /.recent-ads-list-price -->
                                          </div>
                                          <!-- /.recent-ads-list-content -->
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <div class="recent-ads-list-image">
                                             <a href="#" class="recent-ads-list-image-inner">
                                             <img src="{{ url("/adforest/images/posting/thumb-1.jpg") }}" alt="">
                                             </a><!-- /.recent-ads-list-image-inner -->
                                          </div>
                                          <!-- /.recent-ads-list-image -->
                                          <div class="recent-ads-list-content">
                                             <h3 class="recent-ads-list-title">
                                                <a href="#"> Latitude Private Limited</a>
                                             </h3>
                                             <ul class="recent-ads-list-location">
                                                <li><a href="#"> Tanjong Pagar, Chinatown</a></li>
                                              
                                             </ul>
                                            
                                             <!-- /.recent-ads-list-price -->
                                          </div>
                                          <!-- /.recent-ads-list-content -->
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <div class="recent-ads-list-image">
                                             <a href="#" class="recent-ads-list-image-inner">
                                             <img src="{{ url("/adforest/images/posting/thumb-1.jpg") }}" alt="">
                                             </a><!-- /.recent-ads-list-image-inner -->
                                          </div>
                                          <!-- /.recent-ads-list-image -->
                                          <div class="recent-ads-list-content">
                                             <h3 class="recent-ads-list-title">
                                                <a href="#">Sport Stylish Private Limited</a>
                                             </h3>
                                             <ul class="recent-ads-list-location">
                                                <li><a href="#">Raffles Place, Marina, Cecil</a></li>
                                             
                                             </ul>
                                      
                                             <!-- /.recent-ads-list-price -->
                                          </div>
                                          <!-- /.recent-ads-list-content -->
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                    <!-- Ads -->
                                    <div class="recent-ads-list">
                                       <div class="recent-ads-container">
                                          <div class="recent-ads-list-image">
                                             <a href="#" class="recent-ads-list-image-inner">
                                             <img src="{{ url("/adforest/images/posting/thumb-1.jpg") }}" alt="">
                                             </a><!-- /.recent-ads-list-image-inner -->
                                          </div>
                                          <!-- /.recent-ads-list-image -->
                                          <div class="recent-ads-list-content">
                                             <h3 class="recent-ads-list-title">
                                                <a href="#">Apple Wrist Private Limited</a>
                                             </h3>
                                             <ul class="recent-ads-list-location">
                                                <li><a href="#">Raffles Place, Marina, Cecil</a></li>
                                              
                                             </ul>
                                           
                                             <!-- /.recent-ads-list-price -->
                                          </div>
                                          <!-- /.recent-ads-list-content -->
                                       </div>
                                       <!-- /.recent-ads-container -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Latest Ads Panel End -->
                        </div>
                        <!-- panel-group end -->
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Left Sidebar End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
      
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- Main Content Area End --> 

@endsection
