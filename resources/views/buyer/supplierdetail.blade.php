@extends('buyer.layouts.main')
@section('content')
 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Supplier Detail</h1>
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
                  <li><a href="{{ route("buyer.categories") }}">Categories</a></li>
                       <li><a href="{{ route("buyer.supplierlist") }}">Suppliers</a></li>
                  <li><a class="active" href="#">Palazon Technology Private Limited </a></li>
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
                        <div class="ad-box featured-border">
                           <h1>Palazon Technology Private Limited</h1>
                           <div class="short-history">
                              <ul>
                                 <li>Published on: <b>07 Oct 2017</b></li>
                                 <li>Category: <b><a href="#">Information Technologry</a></b></li>
                                 <li>Location: <b>Tampines, Paris Ris</b></li>
                              </ul>
                           </div>
                           <div class="featured-ribbon">
                               <span>Featured</span>
                            </div>
                        </div>
                        <!-- Listing Slider  --> 
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport">
                              <ul class="slides slide-main">
                                 <li class=""><img alt="" src="{{ url("/adforest/images/single-page/1.jpg") }}" title=""></li>
                                 <li><img alt="" src="{{ url("/adforest/images/single-page/2.jpg") }}" title=""></li>
                                 <li class="flex-active-slide"><img alt="" src="{{ url("/adforest/images/single-page/3.jpg") }}" title=""></li>
                                 <li><img alt="" src="{{ url("/adforest/images/single-page/4.jpg") }}" title=""></li>
                                 <li><img alt="" src="{{ url("/adforest/images/single-page/5.jpg") }}" title=""></li>
                                 <li><img alt="" src="{{ url("/adforest/images/single-page/6.jpg") }}" title=""></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider Thumb --> 
                        <div class="flexslider" id="carousels">
                           <div class="flex-viewport">
                              <ul class="slides slide-thumbnail">
                                 <li><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/1_thumb.jpg") }}"></li>
                                 <li><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/2_thumb.jpg") }}"></li>
                                 <li class="flex-active-slide"><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/3_thumb.jpg") }}"> </li>
                                 <li><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/4_thumb.jpg") }}"></li>
                                 <li><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/5_thumb.jpg") }}"></li>
                                 <li><img alt="" draggable="false" src="{{ url("/adforest/images/single-page/6_thumb.jpg") }}"></li>
                                 <!-- items mirrored twice, total of 12 -->
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-share-alt"></i> <span class="hidetext">Share</span>
                           </div>
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
                            
                            
                            
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Email</strong>:</span> sales@palazon.com
                              </div>
                               <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Phone</strong> :</span> 6596273121
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Date</strong> :</span> 2014-10-06
                              </div>
                             
                           </div>
                           <!-- Short Features  --> 
                           <div class="desc-points">
                               <ul>
                                   <li>
                                       Palazon Technology Pte Ltd founded in 1997 with the main goal of providing quality and steadfast IT consulting services. Today, we are one of the leading IT service providers in Singapore specializing in information technology consulting, software development, e-commerce websites and network solutions.
  </li><li>
We provide a wealth of solutions for a diverse range of businesses. Our clients come from various industries such as banks, airlines, legal firms, automotive dealers, HR companies, service related businesses, schools and government sectors, with most of them located in Singapore, Malaysia, China, Hong Kong, Taiwan, Indonesia, Japan, Australia, US and France.
</li><li>
Backed with 19 years of Information Technology expertise combined with the effort we make in placing our client’s interests at the top of our priority, we are confident that we will be able to make a difference for you and your business. Our team of project consultants, system engineers, graphic designers and programmers are adeptly trained to find solutions for all of your business needs.
</li><li>
Palazon Technology is founded on integrity and customer loyalty, we make no promise that we cannot fulfill. Any product or service from Palazon is guaranteed to be delivered on time and in full. Furthermore, we continually strive to maintain excellence in service by spending quality time with our client’s projects.
</li><li>
We offer top quality IT products and services at the lowest and most affordable rates. We also provide FREE technical support, enabling us stand out from the competition in a positive and distinct way. Whatever we quote is exactly what you pay; there are no hidden or extra charges. Feel free to call us for a free quote and consultation today!
      </li>                          
                               </ul>
                           </div>
                          
                           <!-- Ad Specifications --> 
                           <div class="specification">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Services Provided 
                                 </h3>
                              </div>
                              <ul>
                                  
                                <li>Free Domain Name & Web Hosting Service - One year free domain name & website hosting service for any new website projects</li>
                                  <li>E-Commerce Shopping Cart System - customized e-commerce website design & development, secure online payment gateway.</li>
   <li>Content Management System (CMS) - manage any content for your website & web applications with WYSIWYG editor</li>
   <li>Recruitment Management System (RMS) - web-based system, ideal for foreign worker management</li>
   <li>Point of Sales (POS) - no matter how many branches or sales terminals you...</li>
   <li>Job Portal - online and secure job portal for all kinds of industries.</li>
                              </ul>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
               
                     <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
                     <div class="grid-panel margin-top-30">
                        <div class="heading-panel">
                           <div class="col-xs-12 col-md-12 col-sm-12">
                              <h3 class="main-title text-left">
                                 Related Suppliers
                              </h3>
                           </div>
                        </div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <div class="col-md-12 col-xs-12 col-sm-12">
                              <!-- Ads Listing -->
                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="#">
                                          <div class="ribbon popular"></div>
                                          <img class="img-responsive" src="{{ url("/adforest/images/posting/10.jpg") }}" alt=""> 
                                       </a>
                                    </div>
                                    <!-- Img Block -->
                                 </div>
                                 <!-- Ads Listing -->
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->
                                 <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                    <!-- Ad Desc -->
                                    <div class="ad-archive-desc">
                                       <!-- Price -->
                                      
                                       <!-- Title -->
                                       <h3>2013 BMW M3 GTR </h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                       <!-- Ad Features -->
                                       <ul class="add_info">
                                          <!-- Contact Details -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-phone"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Call Timings</h4>
                                                   <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Sunday</strong> <span class="label label-success">+65-123-4567</span> 
                                                </div>
                                             </div>
                                          </li>
                                          <!-- Address -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Address</h4>
                                                   Musee du Louvre, 75058 Singapore
                                                </div>
                                             </div>
                                          </li>
                                        
                                       </ul>
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Last Updated: 1 day ago</div>
                                          <div class="ad-meta"> <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Supplier.</a> <a class="btn btn-success"><i class="fa fa-phone"></i> View Details.</a> </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->
                                 </div>
                                 <!-- Content Block End -->
                              </div>
                              <!-- Ads Listing -->
                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="#">
                                          <div class="ribbon popular"></div>
                                          <img class="img-responsive" src="{{ url("/adforest/images/posting/9.jpg") }}" alt=""> 
                                       </a>
                                    </div>
                                    <!-- Img Block -->
                                 </div>
                                 <!-- Ads Listing -->
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->
                                 <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                    <!-- Ad Desc -->
                                    <div class="ad-archive-desc">
                                       <!-- Price -->
                                    
                                       <!-- Title -->
                                       <h3>Honda Civic 2017 Sports Edition</h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                       <!-- Ad Features -->
                                       <ul class="add_info">
                                          <!-- Contact Details -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-phone"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Call Timings</h4>
                                                   <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Sunday</strong> <span class="label label-success">+65-123-4567</span> 
                                                </div>
                                             </div>
                                          </li>
                                          <!-- Address -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Address</h4>
                                                   Musee du Louvre, 75058 Singapore 
                                                </div>
                                             </div>
                                          </li>
                                          
                                       </ul>
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Last Updated: 1 day ago</div>
                                          <div class="ad-meta"> <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Supplier.</a> <a class="btn btn-success"><i class="fa fa-phone"></i> View Details.</a> </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->
                                 </div>
                                 <!-- Content Block End -->
                              </div>
                              <!-- Ads Listing -->
                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="#">
                                          <div class="ribbon popular"></div>
                                          <img class="img-responsive" src="{{ url("/adforest/images/posting/2.jpg") }}" alt=""> 
                                       </a>
                                    </div>
                                    <!-- Img Block -->
                                 </div>
                                 <!-- Ads Listing -->
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->
                                 <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                    <!-- Ad Desc -->
                                    <div class="ad-archive-desc">
                                       <!-- Price -->
                                    
                                       <!-- Title -->
                                       <h3>Sony Cyber-shot  20.2-Megapixel</h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#">Art & Toys </a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                       <!-- Ad Features -->
                                       <ul class="add_info">
                                          <!-- Contact Details -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-phone"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Call Timings</h4>
                                                   <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Sunday</strong> <span class="label label-success">+65-123-4567</span> 
                                                </div>
                                             </div>
                                          </li>
                                          <!-- Address -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Address</h4>
                                                   Musee du Louvre, 75058 Singapore
                                                </div>
                                             </div>
                                          </li>
                                          <!-- Ad Type -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-cog"></i></span>
                                                <div class="tooltip-content"> <strong>Condition</strong> <span class="label label-danger">Used</span> </div>
                                             </div>
                                          </li>
                                          <!-- Ad Type -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-check-square-o"></i></span>
                                                <div class="tooltip-content"> <strong>Warrinty</strong> <span class="label label-danger">No </span> </div>
                                             </div>
                                          </li>
                                       </ul>
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Last Updated: 1 day ago</div>
                                          <div class="ad-meta"> <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Supplier.</a> <a class="btn btn-success"><i class="fa fa-phone"></i> View Details.</a> </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->
                                 </div>
                                 <!-- Content Block End -->
                              </div>
                              <!-- Ads Listing -->
                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="#"> <img class="img-responsive" src="{{ url("/adforest/images/posting/1.jpg") }}" alt=""> </a>
                                    </div>
                                    <!-- Img Block -->
                                 </div>
                                 <!-- Ads Listing -->
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->
                                 <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                    <!-- Ad Desc -->
                                    <div class="ad-archive-desc">
                                       <!-- Price -->
                                  
                                       <!-- Title -->
                                       <h3>Sony Xperia Z5 Waterproof</h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#">Mobiles</a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                       <!-- Ad Features -->
                                       <ul class="add_info">
                                          <!-- Contact Details -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-phone"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Call Timings</h4>
                                                   <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                   <br> <strong>Sunday</strong> <span class="label label-success">+65-123-4567</span> 
                                                </div>
                                             </div>
                                          </li>
                                          <!-- Address -->
                                          <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
                                                <div class="tooltip-content">
                                                   <h4>Address</h4>
                                                   Musee du Louvre, Singapore
                                                </div>
                                             </div>
                                          </li>
                                          
                                       </ul>
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Last Updated: 1 day ago</div>
                                          <div class="ad-meta"> <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Supplier.</a> <a class="btn btn-success"><i class="fa fa-phone"></i> View Details.</a> </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->
                                 </div>
                                 <!-- Content Block End -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                           <!-- Email Button trigger modal -->
                           <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote" >Contact Supplier Via Email</button>
                           <!-- Email Modal -->
                           <button class="btn-block btn-contact contactPhone number" data-last="111111X" >+65<span>9632341</span></button>
                        </div>
                        <!-- Price info block -->   
                        
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="user-info-card">
                              <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                 <img src="{{ url("/adforest/images/users/3.jpg") }}" alt="">
                              </div>
                              <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                 <span class="user-name"><a class="hover-color" href="profile.html">Stephen Mok</a></span>
                                 <div class="item-date">
                                    <span class="ad-pub">Registered on: 10 Dec 2017</span><br>
                                 
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>Supplier Id: <span class="color">4143</span></li>
                                 <li>Categories: <span class="color">Information Technology</span></li>
                                 <li>Visits: <span class="color">9</span></li>
                                 <li>Location: <span class="color">Tampines, Paris Ris</span></li>
                           
                              </ul>
                           </div>
                           <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;"></div>
                        </div>
                        <!-- Featured Supplier --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Featured Suppliers</a></h4>
                           </div>
                           <div class="widget-content">
                              <div class="featured-slider-3">
                                 <!-- Featured Suppliers -->
                                 <div class="item">
                                    <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                       <!-- Ad Box -->
                                       <div class="category-grid-box">
                                          <!-- Ad Img -->
                                          <div class="category-grid-img">
                                             <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/car-3.jpg") }}">
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
                                             <h3><a title="" href="single-page-listing.html">2017 Honda Civic EX</a></h3>
                                             <!-- Price -->
                                           
                                          </div>
                                          <!-- Addition Info -->
                                          <div class="ad-info">
                                             <ul>
                                                <li><i class="fa fa-map-marker"></i>London</li>
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
                                             <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/fur-3.jpg") }}">
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
                                             <h3><a title="" href="single-page-listing.html">Office Furniture For Sale </a></h3>
                                             <!-- Price -->
                                           
                                          </div>
                                          <!-- Addition Info -->
                                          <div class="ad-info">
                                             <ul>
                                                <li><i class="fa fa-map-marker"></i>London</li>
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
                                             <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/mob-6.jpg") }}">
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
                                                <li><i class="fa fa-map-marker"></i>London</li>
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
                                             <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/cam-2.jpg") }}">
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
                                                <li><i class="fa fa-map-marker"></i>London</li>
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
                                             <img class="img-responsive" alt="" src="{{ url("/adforest/images/posting/cam-2.jpg") }}">
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
                                                <li><i class="fa fa-map-marker"></i>London</li>
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
                        <!-- Recent Suppliers --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Recent Suppliers</a></h4>
                           </div>
                           <div class="widget-content recent-ads">
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
                                          <a href="#">Sony Xperia Z1</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a>,</li>
                                          <li><a href="#">Brooklyn</a></li>
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
                                       <img src="{{ url("/adforest/images/posting/thumb-2.jpg") }}" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">2017 BMW i8</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a>,</li>
                                          <li><a href="#">Brooklyn</a></li>
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
                                       <img src="{{ url("/adforest/images/posting/thumb-3.jpg") }}" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">Dell Latitude e7440</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a>,</li>
                                          <li><a href="#">Brooklyn</a></li>
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
                                       <img src="{{ url("/adforest/images/posting/thumb-4.jpg") }}" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">Sport Stylish Steering</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a>,</li>
                                          <li><a href="#">Brooklyn</a></li>
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
                                       <img src="{{ url("/adforest/images/posting/thumb-5.jpg") }}" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">Apple Wrist Watches</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a>,</li>
                                          <li><a href="#">Brooklyn</a></li>
                                       </ul>
                                     
                                       <!-- /.recent-ads-list-price -->
                                    </div>
                                    <!-- /.recent-ads-list-content -->
                                 </div>
                                 <!-- /.recent-ads-container -->
                              </div>
                           </div>
                        </div>
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
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
     
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      <!-- Main Content Area End --> 

@endsection
