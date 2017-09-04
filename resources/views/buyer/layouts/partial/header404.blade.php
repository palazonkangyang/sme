<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
          <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
    
      <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
      <div class="colored-header">
         <!-- Top Bar -->
        <div class="header-top">
            <div class="container">
               <div class="row">
                  <!-- Header Top Left -->
                  <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                     <ul class="listnone">
                        <li><a href="{{ route("buyer.about") }}"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                        <li><a href="{{ route("buyer.faqs") }}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                        
                     </ul>
                  </div>
                  <!-- Header Top Right Social -->
                  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                     <div class="pull-right">
                        <ul class="listnone">
                          
                          @if( Auth::buyer()->user()) 
                         
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male" aria-hidden="true"></i> {{ Auth::buyer()->user()->name }} <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                 <li><a href="{{ route("buyer.auth.profile.edit") }}">User Profile</a></li>
                                 <li><a href="{{ route("buyer.auth.logout") }}">Logout</a></li>   
                              </ul>
                           </li>
                           @else
                             <li><a href="login"><i class="fa fa-sign-in"></i> Log in</a></li>
                           <li><a href="register"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
                           </li>
                           @endif
                          
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Top Bar End -->
         <!-- Navigation Menu -->
         <nav id="menu-1" class="mega-menu">
               <!-- menu list items container -->
               <section class="menu-list-items">
                  <div class="container">
                     <div class="row">
                        <div style='z-index:20' class="col-lg-12 col-md-12">
                           <!-- menu logo -->
                           <ul class="menu-logo">
                              <li>
                                 <a href="{{ route("buyer.index") }}"><img style='padding-top:5px;'  src={!! url("adforest/images/logo.png")!!} alt="logo"></a>
                              </li>
                           </ul>
                           <!-- menu links -->
                           <ul class="menu-links">
                              <!-- active class -->
                              <li>
                                 <a href="{{ route("buyer.index") }}"> Home </a>
                                 
                              </li>
                         <li>
                                 <a href="{{ route("buyer.categories") }}">CATEGORIES <i class="fa fa-angle-down fa-indicator"></i></a>
                                 <!-- drop down multilevel  -->
  
                                
                              </li>
                                <li><a href="{{ route("buyer.districts") }}">DISTRICTS </a></li>
                                      <li><a href="{{ route("buyer.howitworks") }}">HOW IT WORKS </a></li>
                                          <li><a href="">BLOG</a></li>
                                            <li><a href="{{ route("buyer.contact") }}">Contact </a></li>
                            
                           </ul>
                             
                           </ul>
                            <ul class="menu-search-bar">
                              <li>
                                 <a href="" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post Ad</a>
                              </li>
                           </ul>
                          
                        </div>
                     </div>
                  </div>
               </section>
            </nav>
      </div>