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
                        <li><a href="about"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                        <li><a href="faqs"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                        
                     </ul>
                  </div>
                  <!-- Header Top Right Social -->
                  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                     <div class="pull-right">
                        <ul class="listnone">
                          
                           <li><a href="login"><i class="fa fa-sign-in"></i> Log in</a></li>
                           <li><a href="register"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
                           </li>
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
                                 <a href="index"><img style='padding-top:5px;' src={!! url("adforest/images/logo.png")!!} alt="logo"></a>
                              </li>
                           </ul>
                           <!-- menu links -->
                           <ul class="menu-links">
                              <!-- active class -->
                              <li>
                                 <a href="index"> Home </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0)">CATEGORIES <i class="fa fa-angle-down fa-indicator"></i></a>
                                 <!-- drop down multilevel  -->
  
                                 <ul class="drop-down-multilevel">
                                         @foreach($category as $cate)
                                    <li><a href={{ route('buyer.category', $cate->id)}}>{{$cate->service_category}}</a></li>
                                          @endforeach
                                 </ul>
                              </li>
                             <li><a href="#">DISTRICTS </a></li>
                                      <li><a href="#">HOW IT WORKS </a></li>
                                          <li><a href="#">BLOG</a></li>
                                             <li><a href="#">CONTACT</a></li>
                            
                           </ul>
                           <ul class="menu-search-bar">
                              <li>
                                 <a href="login" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post Ad</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </section>
            </nav>
      </div>
<!-- Left side column. contains the logo and sidebar -->