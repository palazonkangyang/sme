<html>
<head>
    @include('buyer.layouts.partial.head')
  
</head>
<body>
@include('buyer.layouts.partial.header')

      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>User Sign In</h1>
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
                  <li><a href="dashboard">Home</a></li>
                  
                  <li><a class="active" href="#">Sign In</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bg ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
                     <!--  Form -->
                     {!! Form::open()  !!}
                        <div class="form-group has-feedback{!! $errors->has("email") ? " has-error" : "" !!}">
                        <label>Email</label>
                            {!! Form::email("email", Input::old('email'), [ "class" => "form-control", "placeholder" => "Your Email" ]) !!}
                            <p class="help-block">{{ $errors->first("email") }}</p>
                        </div>
                        <div class="form-group has-feedback{!! $errors->has("password") ? " has-error" : "" !!}">
                        <label>Password</label>
                            {!! Form::password("password", [ "class" => "form-control", "placeholder" => "Password" ]) !!}
                            <p class="help-block">{{ $errors->first("password") }}</p>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        {!! Form::checkbox("remember_token")  !!} Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-theme btn-lg btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        {!! Form::close()!!}
                     <!-- Form -->
                  </div>
                  <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
                     <div class="heading-panel">
                        <h3 class="main-title text-left">
                           Sign In to your account   
                        </h3>
                     </div>
                     <div class="content-info">
                        <div class="features">
                           <div class="features-icons">
                              <img src="{!! url("adforest/images/icons/chat.png") !!}" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>Post Your Ads</h3>
                              <p>
                                   Advertize your business services from any devices.
                              </p>
                           </div>
                        </div>
                        <div class="features">
                           <div class="features-icons">
                              <img src="{!! url("adforest/images/icons/panel.png") !!}" alt="img">
                           </div>
                           <div class="features-text">
                              <h3>User Dashboard</h3>
                              <p>
                                 Maintain a wishlist by saving your favourite items.
                              </p>
                           </div>
                        </div>
                        <span class="arrowsign hidden-sm hidden-xs"><img src="{!! url("adforest/images/arrow.png") !!}" alt="" ></span>
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
        @include('buyer.layouts.partial.tail')
</body>
</html>
