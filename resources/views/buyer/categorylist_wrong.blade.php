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
                  <li><a class="active" href="#">Categories</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Featured</span> Listings</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <!-- Row -->
                     <div class="row">
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package"  src="{{ url("/adforest/images/posting/car-4.jpg") }}" class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Honda Civic 2017 Sports Edition</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(2)</span>
                                   
                                 </div>
                                  <!-- Price -->
                                    <span class="ad-price">$370</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-7.jpg") }}" class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Rolex Yacht-Master 40</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(2)</span>
                                   
                                 </div>
                                  <!-- Price -->
                                    <span class="ad-price">$110</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                       <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                       <li data-target="#carousel-1" data-slide-to="1"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                       <div class="item active">
                                          <img src="{{ url("/adforest/images/posting/list-9.jpg") }}" alt="Image">
                                       </div>
                                       <div class="item">
                                          <img src="{{ url("/adforest/images/posting/list-6.jpg") }}" alt="Image">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Honda CBR 1000RR for Sale</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(2)</span>
                                   
                                 </div>
                                  <!-- Price -->
                                    <span class="ad-price">$900</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package" src="{{ url("/adforest/images/posting/grid-1.jpg") }}"  class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Computer & Equipment</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Gigabyte's Z170X motherboard </a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(2)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$215</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
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
                                       <div class="item active">
                                          <img src="{{ url("/adforest/images/posting/list-5.jpg") }}" alt="Image">
                                       </div>
                                       <div class="item">
                                          <img src="{{ url("/adforest/images/posting/list-10.jpg") }}"  alt="Image">
                                       </div>
                                       <div class="item">
                                          <img src="{{ url("/adforest/images/posting/mob-6.jpg") }}" alt="Image">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Mobiles</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Xperia Z5 Premium</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="rating-count">(5)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$350</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package" src="{{ url("/adforest/images/posting/house-4.jpg") }}"  class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Real Estate</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Brand New House For Sale</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(3)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$43,000</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <div id="carousel-3" class="carousel slide slide-carousel" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                       <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                                       <li data-target="#carousel-3" data-slide-to="1"></li>
                                       <li data-target="#carousel-3" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                       <div class="item active">
                                          <img src="{{ url("/adforest/images/posting/car-3.jpg") }}"    alt="Image">
                                       </div>
                                       <div class="item">
                                          <img  src="{{ url("/adforest/images/posting/car-5.jpg") }}"     alt="Image">
                                       </div>
                                       <div class="item">
                                          <img  src="{{ url("/adforest/images/posting/car-6.jpg") }}"  alt="Image">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">2010 Audi A5 Auto quattro MY10 </a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(2)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$205,000</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package"  src="{{ url("/adforest/images/posting/mob-4.jpg") }}"  class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Apple iPhone 6s 64GB</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(4)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$220</span>
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="white category-grid-box-1 clearfix">
                              <!-- Image Box -->
                              <div class="image">
                                 <img alt="Tour Package" src="{{ url("/adforest/images/posting/list-13.jpg") }}"  class="img-responsive">
                              </div>
                              <!-- Short Description -->
                              <div class="short-description-1 clearfix">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Computer & Laptops</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="">Apple Macbook Pro i3</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
                                 <!-- Rating -->
                                 <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="rating-count">(4)</span>
                                    
                                 </div>
                                 <!-- Price -->
                                    <span class="ad-price">$500</span>
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
                     </div>
                     <div class="text-center">
                        <div class="load-more-btn">
                           <button class="btn btn-theme"> Load More <i class="fa fa-refresh"></i> </button>
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
         <!-- =-=-=-=-=-=-= Parallex Section =-=-=-=-=-=-= -->
         <section class="section-padding-140 parallex  bg-img-5" data-stellar-background-ratio="0.1">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-xs-12 col-md-6 col-sm-12">
                     <a href="#">
                        <div class="icon-box yellow">
                           <div class="icon"> <i class="flaticon-transport-9"></i> </div>
                           <div class="icon-text">
                              <h3 class="title">
                                 Are You looking for something?				
                              </h3>
                              <div class="content">
                                 <p><span>Our cars are delivered fully-registered with all requirements completed. We’ll deliver your car wherever you are.</span></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-md-6 col-sm-12">
                     <a href="#">
                        <div class="icon-box red">
                           <div class="icon"> <i class="flaticon-cogwheel-1"></i> </div>
                           <div class="icon-text">
                              <h3 class="title">
                                 Do You want to sell something?				
                              </h3>
                              <div class="content">
                                 <p><span>What’s your car worth? Receive the absolute best value for your trade-in vehicle. We even handle all paperwork.</span></p>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Parallex Section End =-=-=-=-=-=-= -->
         <!-- Main Section -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Blog</span> Post</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-xs-12 col-md-12 col-sm-12 ">
                     <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src="{{ url("/adforest/images/blog/1.jpg") }}"> </a>
                              </div>
                              <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
                              <h3 class="post-title"> <a href="#"> Sony Xperia XZ: Release date and everything you need to know</a> </h3>
                              <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt=""  src="{{ url("/adforest/images/blog/2.jpg") }}"> </a>
                              </div>
                              <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
                              <h3 class="post-title"> <a href="#"> Review of the 2017 Honda Accord Sport </a> </h3>
                              <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="blog-post">
                              <div class="post-img">
                                 <a href="#"> <img class="img-responsive" alt="" src="{{ url("/adforest/images/blog/3.jpg") }}" > </a>
                              </div>
                              <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
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
         <!-- Main Section -->
        
         <!-- =-=-=-=-=-=-= App Download Section End =-=-=-=-=-=-= --> 
         <!-- =-=-=-=-=-=-= Our Partners =-=-=-=-=-=-= -->
      
         <!-- =-=-=-=-=-=-= Our Partners  End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
      
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- =-=-=-=-=-=-= Main Content Area End =-=-=-=-=-=-= -->

@endsection
