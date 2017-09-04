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
  <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>About Us</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
                    
   <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="login">Home</a></li>
                 <li><a class="active" href="#">About Us</a></li>
               </ul>
            </div>
         </div>
      </div>
     
      <!-- =-=-=-=-=-=-= Advance Search End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
     <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding pattern_dots">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                     <div class="about-us-content">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              About SME Consultant
                           </h3>
                        </div>
                        <h2></h2>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledit to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into  publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Hmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledit to make a type specimen It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                     <div class="about-page-featured-image">
                        <a href="#"><img src="{!! url("adforest/images/Advertising-PNG-File.png") !!}" alt=""></a>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
         <section class="about-us">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12 no-padding">
                     <!-- service box 3 -->
                     <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                           <h5>Why choose us</h5>
                           <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                     </div>
                     <!-- service box end -->
                     <!-- service box 3 -->
                     <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                           <h5>Our mission</h5>
                           <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                     </div>
                     <!-- service box end -->
                     <!-- service box 3 -->
                     <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                           <h5>Only creative solutions</h5>
                           <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                     </div>
                     <!-- service box end -->
                  </div>
               </div>
            </div>
            <!-- end container -->
         </section>
         <div class="clearfix"></div>
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
               <!-- /.row -->
            </div>
            <!-- /.container -->
         </div>
         <!-- /.funfacts -->
         <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Pricing =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Choose the best <span class="heading-color"> subscription </span>for you</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row pricing">

                     @foreach($items as $item)
                        <div class="col-sm-6 col-lg-4 col-md-3">
                           <div class="block">
                              
                              <h3>{{$item->subscription_package}}</h3>
                              <span class="type">Standalone</span>
                              <span class="price">${{$item->subscription_price}}</span>
                              
                              <ul>

                              @foreach($item->options as $key => $option)
                                 <li>{{$option}}</li>
                                 @endforeach
                                 </ul>
                              <a href="login" class="btn btn-theme">Select Plan <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Pricing End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= App Download Section  =-=-=-=-=-=-= --> 
         <div class="app-download-section parallex">
            <!-- app-download-section-wrapper -->
            <div class="app-download-section-wrapper">
               <!-- app-download-section-container -->
               <div class="app-download-section-container">
                  <!-- container -->
                  <div class="container">
                     <!-- row -->
                     <div class="row">
                        <!-- col-md-12 -->
                        <div class="col-md-12">
                           <!-- section-title -->
                           <div class="section-title"> <span>Download</span> <span><img src="images/logo-1.png" alt="Tiny Logo"></span> <span>Now</span> </div>
                           <!-- /section-title -->
                        </div>
                        <!-- /col-md-12 -->
                        <!-- col-md-4 -->
                        <div class="col-md-4">
                           <!-- Windows Store -->
                           <a href="#" title="Windows Store" class="btn app-download-button"> <span class="app-store-btn">
                           <i class="fa fa-windows"></i>
                           <span>
                           <span>Download From</span> <span>Windows Store </span> </span>
                           </span>
                           </a>
                           <!-- /Windows Store -->
                        </div>
                        <!-- /col-md-4 -->
                        <!-- col-md-4 -->
                        <div class="col-md-4">
                           <!-- Google Store -->
                           <a href="#" title="Google Store" class="btn app-download-button"> <span class="app-store-btn">
                           <i class="fa fa-android"></i>
                           <span>
                           <span>Download From</span> <span>Google Store </span> </span>
                           </span>
                           </a>
                           <!-- /Google Store -->
                        </div>
                        <!-- /col-md-4 -->
                        <!-- col-md-4 -->
                        <div class="col-md-4">
                           <!-- Apple Store -->
                           <a href="#" title="Windows Store" class="btn app-download-button"> <span class="app-store-btn">
                           <i class="fa fa-apple"></i>
                           <span>
                           <span>Download From</span> <span>Apple Store </span> </span>
                           </span>
                           </a>
                           <!-- /Apple Store -->
                        </div>
                        <!-- /col-md-4 -->
                     </div>
                     <!-- /row -->
                  </div>
                  <!-- /container -->
               </div>
               <!-- /app-download-section-container -->
            </div>
            <!-- /download-section-wrapper -->
         </div>
         <!-- =-=-=-=-=-=-= App Download Section End =-=-=-=-=-=-= --> 
         <!-- =-=-=-=-=-=-= Partners =-=-=-=-=-=-= -->
         <div class="happy-clients-area fix">
            <div class="container">
               <div class="row clients-space">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="client-brand-list">
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/1.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/2.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/3.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/4.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/5.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/6.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/7.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/8.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/9.svg" alt=""></a>
                        </div>
                        <div class="sigle-clients-brand">
                           <a href="#"><img src="images/clients/10.svg" alt=""></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                     
                
    </div>
    <!-- /.content-wrapper -->
    @include('buyer.auth.partial.tail')
</body>
</html>
