@extends('buyer.layouts.main')
@section('content')
	 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Contact Us</h1>
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
                  <li><a href="#">Pages</a></li>
                  <li><a class="active" href="#">Contact Us</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="">
                           <h2 >Send Us a Message</h2>
                           <form method="post"  action="#">
                              <div class="row">
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <textarea cols="12" rows="7" placeholder="Message..." id="message" name="message" class="form-control" required></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-theme" type="submit">Send Message</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       


                        <div class="contactInfo">
                           <h2>Contact Info</h2>
                           <div class="singleContadds">
                              <i class="fa fa-map-marker"></i>
                              <p>  21 Bukit Batok Crescent #29-84 Wcega Tower Singapore 658065
                        
                              </p>
                           </div>
                           <div class="singleContadds phone">
                              <i class="fa fa-phone"></i>
                              <p>
                               (65) 1234 5678 <span>Office</span>
                              </p>
                              
                           </div>
                           <div class="singleContadds">
                              <i class="fa fa-envelope"></i>
                              <a href="mailto:laurencelys@gmail.com">laurencelys@gmail.com</a>
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
@endsection