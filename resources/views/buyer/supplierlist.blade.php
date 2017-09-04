@extends('buyer.layouts.main')
@section('content')
	
	<div class="page-header-area">

         <div class="container">

            <div class="row">

               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Suppliers Listing</h1>
                  </div>
               </div>

            </div><!-- end row -->

        </div><!-- end container -->

    </div><!-- end page-header-area -->

    <div class="small-breadcrumb">

         <div class="container">

            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route('buyer.index') }}">Home</a></li>
                  <li><a  href="{{ route('buyer.supp_categories') }}">Supplier Categories</a></li>
                    <li><a class="active" href="#">{{ $category_name }}</a></li>
               </ul>
            </div><!-- end breadcrumb-link -->
        
        </div><!-- end container -->

    </div><!-- end small-breadcrumb -->

    <div class="main-content-area clearfix">

    	<section class="section-padding gray">

    		<div class="container">

    			<div class="row">
    				
    				<div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">

    					<div class="row">

    						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">

		                        <div class="clearfix"></div>

								<div class="listingTopFilterBar">
		   							<div class="col-md-7 col-xs-12 col-sm-6 no-padding">
		                                <ul class="filterAdType">
		                                    <li class="active"><a href="">All Supplies <small>({{ $all_ads }})</small></a> </li>
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
		                                    </div><!-- end custom-select-box -->

		                                </div><!-- end header-listing -->

		    						</div><!-- end col-md-5 col-xs-12 col-sm-6 no-padding -->

								</div><!-- end listingTopFilterBar -->

		                    </div><!-- end col-md-12 col-xs-12 col-sm-12 col-lg-12 -->

		                    <div class="clearfix"></div><!-- end clearfix -->

		                    <div class="posts-masonry">

		                    	@foreach($suppliers as $supplier)
		                    	<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

		                    		<div class="white category-grid-box-1">

		                    			<div class="image"> 
		                    				<img alt="Tour Package" src="{{ url('/adforest/images/posting/car-4.jpg') }}" class="img-responsive"> 
                            			</div><!-- end image -->

                            			<div class="short-description-1">
                                    
                                    		<div class="category-title"> 
                                    			<span><a href="#">{{ $supplier->category_name }}</a></span> 
                                    		</div>
                                    
		                                    <h3>
		                                       <a href="/auth/supplier/profile/{{ $supplier->id }}">{{ $supplier->company_name }}</a>
		                                    </h3>
                                    
                                    		<p class="location"><i class="fa fa-map-marker"></i>{{ $supplier->address }}</p>
                                    
		                                    <div class="rating">
		                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
		                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
		                                       <i class="fa fa-star-o"></i> <span class="rating-count">(4)</span>
		                                    </div><!-- end rating -->

                                		</div><!-- end short-description-1 -->

		                    		</div><!-- end white category-grid-box-1 -->

		                    	</div><!-- end col-md-6 col-lg-6 col-sm-6 col-xs-12 -->
		                    	@endforeach

		                    </div><!-- end posts-masonry -->

    					</div><!-- end row -->

    				</div><!-- end col-md-8 col-md-push-4 col-lg-8 col-sx-12 -->

    				<div class="col-md-4 col-md-pull-8 col-sx-12">

    					<div class="sidebar">

    						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    							<div class="panel panel-default">

    								<div class="panel-heading" role="tab" id="headingOne">
                                 
                                 		<h4 class="panel-title">
	                                    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	                                    		<i class="more-less glyphicon glyphicon-plus"></i>
	                                    		Categories
	                                    	</a>
                                 		</h4>
                                 
                              		</div><!-- end panel-heading -->

                              		<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                 		
                                 		<div class="panel-body categories">
                       
                                    		<ul>
                                            	@foreach($category as $cate)
                                       			<li> 

                                       				<a href="{{ route('buyer.supplierlist')}}">
                                       					<img alt="img" style="height:25px; padding-right:5px; padding-bottom:5px;" src="{{ URL::asset('uploads/Service_Categories/' . $cate->image) }}">
                                       				</a>

                                       				<a href="{{ route('buyer.supplierlist')}}">{{$cate->service_category}}
                                       					<span>({{$cate->count}})</span>
                                       				</a>
                                       			</li>
                                       			@endforeach
                                    		</ul>

                                 		</div><!-- end panel-body categories -->

                              		</div><!-- end collapseOne -->

    							</div><!-- end panel panel-default -->

    							<div class="panel panel-default">

    								<div class="panel-heading" role="tab" id="cities">
                                 
                                 		<h4 class="panel-title">

                                    		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#citiesheading" aria-expanded="true" aria-controls="citiesheading">
	                                    		<i class="more-less glyphicon glyphicon-plus"></i>
	                                   			Districts
                                    		</a>
                                 		</h4>
                                 
                              		</div><!-- end panel-heading -->

                              		<div id="citiesheading" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cities">

		                                <div class="panel-body categories">
		                                    <ul>
		                                    	@foreach($districts as $district)
		                                       	<li>
		                                       		<a href="{{ route('buyer.districtsbyid', [$district->id]) }}"><i class="flaticon-signs-1"></i>{{ $district->district_name }}</a>
		                                       	</li>
		                                       	@endforeach
		                                    </ul>

		                                    <h5>
		                                    	<a class="pull-right" href="{{ route('buyer.districts') }}">View All</a>
		                                    </h5>

		                                </div><!-- end panel-body categories -->

                              		</div><!-- end citiesheading -->

    							</div><!-- end panel panel-default -->

    							<div class="panel panel-default">

    								<div class="panel-heading">

                                 		<h4 class="panel-title">
                                    		<a>Featured Suppliers</a>
                                 		</h4>

                              		</div><!-- end panel-heading -->

                              		<div class="panel-collapse">

                              			<div class="panel-body recent-ads">

                              				<div class="featured-slider-3">

                              					<div class="item">
	                                          		<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
	                                             
			                                            <div class="category-grid-box">
			                                                
			                                                <div class="category-grid-img">
			                                                   <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/car-3.jpg') }}">
			                                                   
			                                                   <div class="user-preview">
			                                                      <a href="#"> 
			                                                      	<img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> 
			                                                      </a>
			                                                   </div><!-- end user-preview -->

			                                                   <a href="" class="view-details">View Details</a>
			                                                </div><!-- end category-grid-img -->
			                                                
			                                                <div class="short-description">
			                                                   
			                                                   	<div class="category-title"> 
			                                                   		<span><a href="#">Cars</a></span> 
			                                                   	</div><!-- end category-title -->
			                                                   
			                                                   <h3><a href="">2017 Honda Civic EX</a></h3>
			                                                   
			                                                </div><!-- end short-description -->
			                                                
			                                                <div class="ad-info">
			                                                   <ul>
			                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
			                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
			                                                   </ul>
			                                                </div>

			                                            </div><!-- end category-grid-box -->
	                                             
	                                          		</div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->
                                       			</div><!-- end item -->

                                       			<div class="item">
	                                          		<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
	                                             
			                                            <div class="category-grid-box">
			                                                
			                                                <div class="category-grid-img">
			                                                   <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/fur-3.jpg') }}">
			                                                   
			                                                   <div class="user-preview">
			                                                      <a href="#"> 
			                                                      	<img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> 
			                                                      </a>
			                                                   </div><!-- end user-preview -->

			                                                   <a href="" class="view-details">View Details</a>
			                                                </div><!-- end category-grid-img -->
			                                                
			                                                <div class="short-description">
			                                                   
			                                                   	<div class="category-title"> 
			                                                   		<span><a href="#">Cameras & Accessories</a></span> 
			                                                   	</div><!-- end category-title -->
			                                                   
			                                                   <h3><a href="">Office Furniture For Sale</a></h3>
			                                                   
			                                                </div><!-- end short-description -->
			                                                
			                                                <div class="ad-info">
			                                                   <ul>
			                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
			                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
			                                                   </ul>
			                                                </div>

			                                            </div><!-- end category-grid-box -->
	                                             
	                                          		</div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->
                                       			</div><!-- end item -->

                                       			<div class="item">
	                                          		<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
	                                             
			                                            <div class="category-grid-box">
			                                                
			                                                <div class="category-grid-img">
			                                                   <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/mob-3.jpg') }}">
			                                                   
			                                                   <div class="user-preview">
			                                                      <a href="#"> 
			                                                      	<img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> 
			                                                      </a>
			                                                   </div><!-- end user-preview -->

			                                                   <a href="" class="view-details">View Details</a>
			                                                </div><!-- end category-grid-img -->
			                                                
			                                                <div class="short-description">
			                                                   
			                                                   	<div class="category-title"> 
			                                                   		<span><a href="#">Cameras & Accessories</a></span> 
			                                                   	</div><!-- end category-title -->
			                                                   
			                                                   <h3><a href="">Sony Xperia Z5</a></h3>
			                                                   
			                                                </div><!-- end short-description -->
			                                                
			                                                <div class="ad-info">
			                                                   <ul>
			                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
			                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
			                                                   </ul>
			                                                </div>

			                                            </div><!-- end category-grid-box -->
	                                             
	                                          		</div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->
                                       			</div><!-- end item -->

                                       			<div class="item">
	                                          		<div class="col-md-12 col-xs-12 col-sm-12 no-padding">
	                                             
			                                            <div class="category-grid-box">
			                                                
			                                                <div class="category-grid-img">
			                                                   <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/mob-3.jpg') }}">
			                                                   
			                                                   <div class="user-preview">
			                                                      <a href="#"> 
			                                                      	<img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> 
			                                                      </a>
			                                                   </div><!-- end user-preview -->

			                                                   <a href="" class="view-details">View Details</a>
			                                                </div><!-- end category-grid-img -->
			                                                
			                                                <div class="short-description">
			                                                   
			                                                   	<div class="category-title"> 
			                                                   		<span><a href="#">Cameras & Accessories</a></span> 
			                                                   	</div><!-- end category-title -->
			                                                   
			                                                   <h3><a href="">Sony Xperia Z5</a></h3>
			                                                   
			                                                </div><!-- end short-description -->
			                                                
			                                                <div class="ad-info">
			                                                   <ul>
			                                                      <li><i class="fa fa-map-marker"></i>Clarke Quay, City Hall</li>
			                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
			                                                   </ul>
			                                                </div>

			                                            </div><!-- end category-grid-box -->
	                                             
	                                          		</div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->
                                       			</div><!-- end item -->

                              				</div><!-- end featured-slider-3 -->

                              			</div><!-- end panel-body -->

                              		</div><!-- end panel-collapse -->

    							</div><!-- end panel panel-default -->

    							<div class="panel panel-default">

    								<div class="panel-heading">

                                 		<h4 class="panel-title">
                                    		<a>Recent Suppliers</a>
                                 		</h4>

                              		</div><!-- end panel-heading -->

                              		<div class="panel-collapse">

                              			<div class="panel-body recent-ads">

                              				@foreach($recent_suppliers as $recent_supplier)
                              				<div class="recent-ads-list">

		                                       	<div class="recent-ads-container">

		                                          	<div class="recent-ads-list-image">
		                                             	
		                                             	@if(!empty($recent_supplier->user_photo))

		                                             		<a href="#" class="recent-ads-list-image-inner">
			                                             		<img src="{{ URL::asset('uploads/user_photos/'. $recent_supplier->user_photo) }}"  alt="" style="width: 100px; height: 75px;">
			                                             	</a>

		                                             	@else

		                                             		<a href="#" class="recent-ads-list-image-inner">
			                                             		<img src="{{ url('/adforest/images/posting/thumb-1.jpg') }}" alt="">
			                                             	</a>

		                                             	@endif
		                                          	</div><!-- end recent-ads-list-image -->

		                                          	<div class="recent-ads-list-content">
			                                            <h3 class="recent-ads-list-title">
			                                            	<a href="#">{{ $recent_supplier->name }}</a>
			                                            </h3>

			                                             <ul class="recent-ads-list-location">
			                                                <li><a href="#"> {{ $recent_supplier->address }}</a></li>
			                                             </ul>
		                                          	</div><!-- end recent-ads-list-content -->
		                                          
		                                       </div><!-- end recent-ads-container -->
		                                       
		                                    </div><!-- end recent-ads-list -->
		                                    @endforeach

                              			</div><!-- end panel-body recent-ads -->

                              		</div><!-- end panel-collapse -->

    							</div><!-- end panel panel-default -->

    						</div><!-- end panel-group -->

    					</div><!-- end sidebar -->

    				</div><!-- end col-md-4 col-md-pull-8 col-sx-12 -->

    			</div><!-- end row -->

    		</div><!-- end container -->

    	</section><!-- end section-padding gray -->

    </div><!-- end main-content-area clearfix -->

@endsection