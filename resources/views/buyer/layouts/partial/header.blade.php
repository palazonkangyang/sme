
	<div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div><!-- end loader-wrapper -->

    <div class="colored-header">

    	<div class="header-top">

    		<div class="container">

    			<div class="row">

    				<div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                      	<ul class="listnone">
                          	<li><a href="{{ route('buyer.about') }}"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                          	<li><a href="{{ route('buyer.faqs') }}"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                      	</ul>
                    </div><!-- end header-top-left -->

                    <div class="header-right col-md-4 col-sm-6 col-xs-12">

                    	<div class="pull-right">

                          	<ul class="listnone">
                            
                              	@if( Auth::buyer()->user()) 
                           
                              	<li class="dropdown">
                                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                                  		aria-haspopup="true" aria-expanded="false">
                                  
                                  		<i class="icon-profile-male" aria-hidden="true"></i> {{ Auth::buyer()->user()->name }} 
                                  		<span class="caret"></span>
                                  	</a>

                                  	<ul class="dropdown-menu">
                                    	<li><a href="{{ route('buyer.auth.profile.edit') }}">User Profile</a></li>
                                    	<li><a href="{{ route('buyer.auth.logout') }}">Logout</a></li>   
                                  	</ul><!-- end dropdown-menu -->

                              	</li><!-- end dropdown -->

                              	@else
                            
                            	<li><a href="login"><i class="fa fa-sign-in"></i> Log in</a></li>
                            	<li><a href="register"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
                             
                              @endif
                            
                          </ul><!-- end listnone -->

                      </div><!-- end pull-right -->

                    </div><!-- end header-right col-md-4 col-sm-6 col-xs-12 -->

    			</div><!-- end row -->

    		</div><!-- end container -->

    	</div><!-- end header-top -->

    	<nav id="menu-1" class="mega-menu">

    		<section class="menu-list-items">

    			<div class="container">

    				<div class="row">

    					<div class="col-lg-12 col-md-12" style="z-index:20">

    						<ul class="menu-logo">
                  				<li>
                                  <a href="{{ route('buyer.index') }}">
                                    <img style="padding-top:5px;" src="{!! url('adforest/images/logo.png')!!}" alt="logo"></a>
                                </li>
                			</ul><!-- end menu-logo -->

                			<ul class="menu-links">
                                <li>
                                  <a href="{{ route('buyer.index') }}"> Home </a>
                                </li>
                            	<li>
                                	<a href="{{ route('buyer.categories') }}">ADS <i class="fa fa-angle-down fa-indicator"></i></a>
                                 
                                  	<ul class="drop-down-multilevel">

                                        @foreach($category as $cate)
                                      	<li><a href="{{ route('buyer.adslist', [$cate->id]) }}">{{$cate->service_category}}</a></li> 
                                        @endforeach

                                  	</ul>
                                </li>
                                <li>
                                  	<a href="{{ route('buyer.supp_categories') }}">SUPPLIERS <i class="fa fa-angle-down fa-indicator"></i></a>
                                 
                                  	<ul class="drop-down-multilevel">

                                        @foreach($category as $cate)
                                      	<li><a href="{{ route('buyer.supplierlist', [$cate->id])}}">{{$cate->service_category}}</a></li> 
                                        @endforeach

                                  	</ul>
                                </li>
                                <li><a href="{{ route('buyer.districts') }}">DISTRICTS </a></li>
                                <li><a href="{{ route('buyer.howitworks') }}">HOW IT WORKS </a></li>
                                <li><a href="{{ route('buyer.bloglist') }}">BLOG</a></li>
                                <li><a href="{{ route('buyer.contact') }}">Contact Us</a></li>

                            </ul><!-- end menu-links -->

                            <ul class="menu-search-bar">
                                <li>

                                   @if(isset($buyer))

                                    @if($buyer->package_id != 0)

                                      <a href="{{ route('buyer.auth.profile.postadv') }}" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post Ad</a>

                                    @else

                                      <a class="btn btn-light disabled" id="hidden"><i class="fa fa-plus" aria-hidden="true"></i> Post Ad</a>

                                    @endif

                                  @else

                                    <a class="btn btn-light disabled" id="hidden"><i class="fa fa-plus" aria-hidden="true"></i> Post Ad</a>

                                  @endif
                                </li>
                            </ul><!-- end menu-search-bar -->

    					</div><!-- end col-lg-12 col-md-12 -->

    				</div><!-- end row -->

    			</div><!-- end container -->

    		</section><!-- end menu-list-items -->

    	</nav><!-- end menu-1 -->

    </div><!-- end colored-header -->