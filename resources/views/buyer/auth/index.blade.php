<!DOCTYPE html>
<html>
<head>
	@include('buyer.layouts.partial.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">

	@include('buyer.layouts.partial.header')

		<section class="clearfix">

			<div class="master-slider ms-skin-default" id="masterslider">

				<div class="ms-slide slide-1" data-delay="3">
            
            		<img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner1.jpg" alt="Slide1 background"/> 
            		<h3 class="ms-layer title3  font-thin uppercase"
		               style="left: 90px;top: 100px; color:#232323;"
		               data-type="text"
		               data-delay="2000"
		               data-duration="2500"
		               data-ease="easeOutExpo"
		               data-effect="skewright(30,80)">The 1st SME Portal in Singapore</h3>
         		</div><!-- end ms-slider slide-1 -->

         		<div class="ms-slide slide-2" data-delay="3">
		            
		            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner2.jpg" alt="Slide2 background"/> 
		            <h3 class="ms-layer title3  font-thin uppercase"
		               style="left: 90px;top: 100px;color:#232323;"
		               data-type="text"
		               data-delay="2000"
		               data-duration="2500"
		               data-ease="easeOutExpo"
		               data-effect="skewright(30,80)">Find Your Consultants in One Place</h3>
		        
		          
		        </div><!-- end ms-slider slide-2 -->

		        <div class="ms-slide slide-3" data-delay="3">
            
		            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner3.jpg" alt="Slide3 background"/> 
		            <h3 class="ms-layer title3 font-thin uppercase"
		               style="left: 90px;top: 100px;color:#232323;"
		               data-type="text"
		               data-delay="2000"
		               data-duration="2500"
		               data-ease="easeOutExpo"
		               data-effect="skewright(30,80)">Promote Your Professional Services</h3>
        
         		</div><!-- end ms-slider slide-3 -->

         		<div class="ms-slide slide-4" data-delay="3">

		            <img src="http://smeconsulthub.palazon.com/adforest/js/masterslider/style/blank.gif" data-src="http://smeconsulthub.palazon.com/adforest/images/slider/banner4.jpg" alt="Slide4 background"/> 
		            <h3 class="ms-layer title3 font-thin uppercase"
		               style="left: 90px;top: 100px; color:#232323;"
		               data-type="text"
		               data-delay="2000"
		               data-duration="2500"
		               data-ease="easeOutExpo"
		               data-effect="skewright(30,80)">Build Business Connections</h3>
		        
		        </div><!-- end ms-slider slide-4 -->

			</div><!-- end master-slider -->

		</section><!-- end clearfix -->

		<section class="search-2">

			<div class="container">

				<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
               		<div class="search-title">Browse Ads</div>
            	</div><!-- end col-md-12 -->

            	<div class="row">

            		<form method="post" class="search-form">

            			<div class="col-md-3 col-xs-12 col-sm-3">
	                    	{!! Form::select("category_id", $categories, NULL, ["id" => "category_id"]) !!}
	                       	{!! $errors->first("category_id", "<p class='form-error'>:message</p>") !!}   
	                  	</div><!-- end col-md-3 -->

	                  	<div class="col-md-3 col-xs-12 col-sm-3">
                      		{!! Form::text("search", Input::old("search"), ["class" => "form-control",'placeholder' =>'Enter the word to search']) !!}
                            <p class="help-block">{{ $errors->first("search") }}</p>     
                  		</div><!-- end col-md-3 -->

                  		<div class="col-md-3 col-xs-12 col-sm-3">
                     		<span class="price-slider-value"></span>
                  		</div><!-- end col-md-3 -->

                  		<div class="col-md-3 col-xs-12 col-sm-3">
                      		<button type="submit" disabled class="btn btn-light">Search</button>
                  		</div>

            		</form>
            	</div><!-- end row -->

			</div><!-- end container -->

		</section><!-- end search-2 -->

		<div class="main-content-area clearfix">

			<section class="custom-padding gray categories">

				<div class="container">
					<div class="row">

            			<div class="container">             
               				<div class="row">
                
                  				@foreach($category as $cate)
				                <div class="col-md-3 col-sm-6">

				                    <div class="box">
				                       	<a href="{{ route('buyer.adslist', $cate->id)}}"> 
				                       		<img alt="img" style='height:120px;' src='{!! url("uploads/Service_Categories/$cate->image")!!}'>
				                       	</a>

				                        <h4><a href="{{ route('buyer.adslist', $cate->id)}}">{{$cate->service_category}}</a></h4>
				                        <strong>{{$cate->count}} Ads</strong> 
				                    </div><!-- end box -->

				                </div><!-- end col-md-3 -->
                  				@endforeach
                  
               				</div><!-- end row -->
            			</div><!-- end container -->

            		</div><!-- end row -->
				</div><!-- end container -->

			</section><!-- end custom-padding -->

			<div class="parallex bg-img-3 section-padding">

	            <div class="container">
	               	<div class="row">

	                  	<div class="col-md-8 col-sm-12">

	                     	<div class="call-action">
	                        	<i class="flaticon-shapes"></i>
	                        	<h4>Post featured ad and get great exposure </h4>
	                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
	                    	</div><!-- end call-action -->
	                     
	                  	</div><!-- end col-md-8 -->

	                  	<div class="col-md-4 col-sm-12">

	                     	<div class="parallex-button"> 
	                     		<a href="login" class="btn btn-theme">Post Ad <i class="fa fa-angle-double-right "></i></a> 
	                     	</div><!-- end parallex-button -->
	                     
	                  	</div><!-- end col-md-4 -->
	                  
	               	</div><!-- end row -->
	               
	            </div><!-- end container -->
            
         	</div><!-- end parallex bg-img-3 -->

         	<section class="custom-padding ads-location">

         		<div class="container">               	
               		<div class="row">

               			<div class="heading-panel">
                     		<div class="col-xs-12 col-md-12 col-sm-12">
                        		<h3 class="main-title text-left">Ads By Location</h3>
                     		</div><!-- end col-xs-12 -->
                  		</div><!-- end heading-panel -->

                  		<div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                  			<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->

                           			<div class="location-title-disc">
                              			<h5>Orchard Road
                              			<br/>River Valley
                               			<br/>&nbsp;</h5>
                              			<a class="number-adds" href="#">4600 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->

                           			<div class="location-title-disc">
                              			<h5>Raffles Place
                              			<br/>Marina
                               			<br/>&nbsp;</h5>
                              			<a class="number-adds" href="#">3597 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Boon Lay
                              			<br/>Jurong
                               			<br/> Tuas</h5>
                              			<a class="number-adds" href="#">2588 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Choa Chu Kang
                              			<br/>Bukit Panjang
                               			<br/>Bukit Batok</h5>
                              			<a class="number-adds" href="#">1565 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Tampines
                              			<br/>Pasir Ris
                               			<br/>&nbsp;</h5>
                              			<a class="number-adds" href="#">1337 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Bedok
                              			<br/>Upper East Coast
                               			<br/>Siglap</h5>
                              			<a class="number-adds" href="#">1215 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Novena
                              			<br/>Newton
                               			<br/>Thomson</h5>
                              			<a class="number-adds" href="#">1097 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Clarke Quay
                              			<br/>City Hall
                               			<br/>&nbsp;</h5>
                              			<a class="number-adds" href="#">1035 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Toa Payoh
                              			<br/>Serangoon
                               			<br/>Balestier</h5>
                              			<a class="number-adds" href="#">1015 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Bugis
                              			<br/>Beach Road
                               			<br/>Golden Mile</h5>
                              			<a class="number-adds" href="#">1003 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Buona Vista
                              			<br/>Pasir Panjang
                               			<br/>Clementi</h5>
                              			<a class="number-adds" href="#">998 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                    		<div class="col-md-3 col-sm-4 col-xs-12 ">
                        
                        		<div class="ad-location-gird clearfix">

                           			<div class="location-icon"><i class="fa fa-map-marker"></i></div><!-- end location-icon -->
                           			
                           			<div class="location-title-disc">
                              			<h5>Geylang
                              			<br/>Paya Lebar
                               			<br/>Sims</h5>
                              			<a class="number-adds" href="#">977 ads available</a> 

                           			</div><!-- end location-title-disc -->

                        		</div><!-- end ad-location-grid -->

                    		</div><!-- end col-md-3 -->

                  		</div><!-- end col-md-12 -->

               		</div><!-- end row -->
               	</div><!-- end container -->

         	</section><!-- end custom-padding ads-location -->

         	<section class="custom-padding">

         		<div class="container">
         			
         			<div class="row">

         				<div class="heading-panel">

                     		<div class="col-xs-12 col-md-12 col-sm-12">
                        		<h3 class="main-title text-left">Featured Ads</h3>
                        
                        		<div class="switcher pull-right">
                           			<a href="#" id="list" class="btn btn-theme">
                           				<span class="fa fa-list"></span>List
                           			</a> 
                           			<a href="#" id="grid" class="btn active btn-theme">
                           				<span class="fa fa-th"></span>Grid
                           			</a>
                        		</div><!-- end switcher pull-right -->
                        
                     		</div><!-- end col-xs-12 col-md-12 col-sm-12 -->

                  		</div><!-- end heading-panel -->

                  		<div class="col-md-12 col-xs-12 col-sm-12">

                  			<div id="products" class=" list-group">

                  				<div class="row">

                  					<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-1.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Information Technology</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">Palazon Technology Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Orchard</a></li>
                                       				<li><i class="fa fa-clock-o"></i>15 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>445 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                           			<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-1.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Information Technology</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">Palazon Technology Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Tampines</a></li>
                                       				<li><i class="fa fa-clock-o"></i>15 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>145 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                           			<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-7.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Marketing</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">HELPDESK Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Orchard Road</a></li>
                                       				<li><i class="fa fa-clock-o"></i>10 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>145 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                  				</div><!-- end row -->

                  				<div class="row">

                  					<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-1.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Information Technology</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">Palazon Technology Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Orchard</a></li>
                                       				<li><i class="fa fa-clock-o"></i>15 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>445 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                           			<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-1.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Information Technology</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">Palazon Technology Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Tampines</a></li>
                                       				<li><i class="fa fa-clock-o"></i>15 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>145 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                           			<div class="item col-md-4 col-sm-6 col-xs-12 clearfix">
                              			<div class="category-grid-box-1">
                                 
                                 			<div class="image">
                                    			<img alt="Tour Package" src="{{ url('/adforest/images/posting/list-7.jpg') }}"  class="img-responsive">
                                 			</div><!-- end image -->
                                 
                                 			<div class="short-description-1 clearfix">
                                    
                                    			<div class="category-title"> 
                                    				<span><a href="#">Marketing</a></span> 
                                    			</div><!-- end category-title -->
                                    
                                    			<h3>
                                    				<a title="" href="single-page-listing.html">HELPDESK Privite Limited</a>
                                    			</h3>
                                    
                                    			<p class="list-group-item-text"> Lorem ipsum dolor sit amet consectetur adiscing das elited ultricies facilisis lacinia pell das elited ultricies facilisis ... </p>
                                    
                                    			<ul class="ad-meta-info">
                                      
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Email"><i class="flaticon-check-square"></i>tester1@gmail.sg</a> 
                                       				</li>
                                       				<li> 
                                       					<a href="#" data-toggle="tooltip" title="Contact No"><i class="flaticon-phone-call"></i>+65-123-4567</a> 
                                       				</li>
                                    			</ul>
                                 			</div><!-- end short-description-1 -->
                                 
                                 			<div class="ad-info-1">
                                    			<ul>
                                       				<li><i class="fa fa-map-marker"></i><a href="#">Orchard Road</a></li>
                                       				<li><i class="fa fa-clock-o"></i>10 minutes ago</li>
                                       				<li class="views"><i class="fa fa-eye"></i>145 Views</li>
                                    			</ul>
                                    
                                    			<div class="detail-button"><a href="#">View Details</a></div><!-- end detail-button -->
                                 			</div><!-- end ad-info-1 -->

                              			</div><!-- end category-grid-box-1 -->
                           			</div><!-- end item col-md-4 col-sm-6 col-xs-12 clearfix -->

                  				</div><!-- end row -->

                  			</div><!-- end products -->

                  		</div><!-- end col-md-12 col-xs-12 col-sm-12 -->

         			</div><!-- end row -->

         		</div><!-- end container -->

         	</section><!-- end custom-padding -->

         	<div class="funfacts custom-padding parallex">
            	<div class="container">
               		<div class="row">
                  		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     		<div class="number"><span class="timer" data-from="0" data-to="{{ $member_count }}"" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     		<h4>Total <span>Members</span></h4>
                  		</div><!-- end col-lg-3 col-md-3 col-sm-6 col-xs-6 -->

                  		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     		<div class="number"><span class="timer" data-from="0" data-to="{{ $supplier_count }}"" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     		<h4>Total <span>Suppliers</span></h4>
                  		</div><!-- end col-lg-3 col-md-3 col-sm-6 col-xs-6 -->


                  		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     		<div class="number"><span class="timer" data-from="0" data-to="1042" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     		<h4>Active <span>Users</span></h4>
                  		</div><!-- end col-lg-3 col-md-3 col-sm-6 col-xs-6 -->

                  		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     		<div class="number"><span class="timer" data-from="0" data-to="{{ $posts_count }}" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     		<h4>Total <span>Ads</span></h4>
                  		</div><!-- end end col-lg-3 col-md-3 col-sm-6 col-xs-6 -->

               		</div><!-- end row -->
         
            	</div><!-- end container -->
       
        	</div><!-- end funfacts custom-padding-parallex -->

        	<section class="custom-padding gray">

        		<div class="container">

        			<div class="row">

        				<div class="heading-panel">
                     		<div class="col-xs-12 col-md-12 col-sm-12">
                        		<h3 class="main-title text-left">Latest Blog Post</h3>
                     		</div><!-- end col-xs-12 col-md-12 col-sm-12 -->
                  		</div><!-- end heading-panel -->

                  		<div class="col-md-12 col-xs-12 col-sm-12">

                  			<div class="row">

                  				<div class="col-md-4 col-sm-6 col-xs-12">

                           			<div class="blog-post">
                              			<div class="post-img">
                                 			<a href="#"> 
                                 				<img class="img-responsive" alt="" src="{{ url('/adforest/images/blog/1.jpg') }}"> 
                                 			</a>
                              			</div><!-- end post-img -->

                              			<div class="post-info"> 
                              				<a href="">Apr 3, 2017</a> <a href="#">23 comments</a> 
                              			</div><!-- end post-info -->

                              			<h3 class="post-title"> 
                              				<a href="#"> Sony Xperia XZ: Release date and everything you need to know</a> 
                              			</h3><!-- end post-title -->

                              			<p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>

                           			</div><!-- end blog-post -->

                        		</div><!-- end col-md-4 col-sm-6 col-xs-12 -->

                        		<div class="col-md-4 col-sm-6 col-xs-12">

                           			<div class="blog-post">
                              			<div class="post-img">
                                 			<a href="#"> 
                                 				<img class="img-responsive" alt="" src="{{ url('/adforest/images/blog/2.jpg') }}"> 
                                 			</a>
                              			</div><!-- end post-img -->

                              			<div class="post-info"> 
                              				<a href="">Apr 2, 2017</a> <a href="#">21 comments</a> 
                              			</div><!-- end post-info -->

                              			<h3 class="post-title"> 
                              				<a href="#">Review of the 2017 Honda Accord Sport</a> 
                              			</h3><!-- end post-title -->

                              			<p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>

                           			</div><!-- end blog-post -->

                        		</div><!-- end col-md-4 col-sm-6 col-xs-12 -->

                        		<div class="col-md-4 col-sm-6 col-xs-12">

                           			<div class="blog-post">
                              			<div class="post-img">
                                 			<a href="#"> 
                                 				<img class="img-responsive" alt="" src="{{ url('/adforest/images/blog/2.jpg') }}"> 
                                 			</a>
                              			</div><!-- end post-img -->

                              			<div class="post-info"> 
                              				<a href="">Mar 30, 2017</a> <a href="#">33 comments</a> 
                              			</div><!-- end post-info -->

                              			<h3 class="post-title"> 
                              				<a href="#">How to Buy a House 6 Must-Dos Before Buying A Home</a> 
                              			</h3><!-- end post-title -->

                              			<p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis. </p>

                           			</div><!-- end blog-post -->

                        		</div><!-- end col-md-4 col-sm-6 col-xs-12 -->

                  			</div><!-- end row -->

                  		</div><!-- end col-md-12 col-xs-12 col-sm-12 -->

        			</div><!-- end row -->

        		</div><!-- end container -->

        	</section><!-- end custom-padding grey -->

		</div><!-- end main-content-area -->

	</div><!-- end wrapper -->

	@include('buyer.layouts.partial.tailnosubsribe')

<body>
</html>