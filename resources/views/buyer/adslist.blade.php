@extends('buyer.layouts.main')
@section('content')
   
   <div class="page-header-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="header-page">
                	<h1>Ads Categories</h1>
               </div><!-- end header-page -->

            </div><!-- end col-lg-12 -->

         </div><!-- end row -->

      </div><!-- end container -->

   </div><!-- end page-header-area -->

   	<div class="small-breadcrumb">

      	<div class="container">

	        <div class="breadcrumb-link">
	            <ul>
	               <li><a href="{{ route('buyer.index') }}">Home</a></li>
	                <li><a href="{{ route('buyer.categories') }}">Categories</a></li>
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

   						<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">

                        	<div class="clearfix"></div>

							<div class="listingTopFilterBar">
   								<div class="col-md-7 col-xs-12 col-sm-6 no-padding">
                                    <ul class="filterAdType">

                                        <li class="active"><a href="#">All Ads <small>({{ $all_ads }})</small></a> </li>
                                        <li class=""><a href="">Featured <small>(35)</small></a> </li>
                                    </ul>
                                </div><!-- end col-md-7 -->

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

    							</div><!-- end col-md-5 -->
							</div><!-- end listingTopFilterBar -->

                        </div><!-- end col-md-12 -->

                        <div class="clearfix"></div>

                        <div class="posts-masonry">

                        	@if(count($postadv))

                        		@foreach($postadv as $post)

	                        	<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">

	                              	<div class="white category-grid-box-1 ">
	                                 	<div class="image"> 
	                                 		<img alt="Tour Package" src="{{ URL::asset('uploads/postadv/'. $post->image) }}" class="img-responsive"> 
	                                	</div>
	                                 
	                                 	<div class="short-description-1">
		                                    <div class="category-title"> 
		                                    	<span><a href="#">{{ $post->category_name }}</a></span> 
		                                    </div><!-- end category-title -->

		                                    <h3>
		                                       <a title="" href="{{ route('buyer.adsdetail', [$post->id]) }}">{{ $post->title }}</a>
		                                    </h3>
		                                    
		                                    <p class="location"><i class="fa fa-map-marker"></i> {{ $post->district_name }}</p>

		                                    <div class="rating">
		                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(4)</span>
		                                    </div><!-- end rating -->

	                                 	</div><!-- end short-description-1 -->
	                                 
	                                 	<div class="ad-info-1">
	                                    	<ul>
	                                       		<li><i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
	                                       		<li><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($post->published_date)->diffForHumans() }} </li>
	                                    	</ul>
	                                 	</div><!-- end ad-info-1 -->

	                              	</div><!-- end white category-grid-box-1 -->

	                           	</div><!-- end col-md-6 -->

	                           	@endforeach
	                           	
                        	@else

                        		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                        			<div class="white category-grid-box-1" style="min-height: 200px; text-align: center; padding: 50px 0">

                        				<h2>No Ads</h2>

                        			</div><!-- end white category-grid-box-1 -->
                        		</div>

                        	@endif

                    	</div><!-- end posts-masonry -->

                    	<div class="clearfix"></div>

                    	<div class="text-center margin-top-30">

                           {!! $postadv->render() !!}

                        </div><!-- end text-center -->

   					</div><!-- end col-md-8 -->

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
	                                       			<a href="{{ route('buyer.adslist')}}">
	                                       				<img alt="img" style='height:25px; padding-right:5px;padding-bottom:5px;' 
	                                       					src='{!! url("uploads/Service_Categories/$cate->image")!!}'>
	                                       			</a>
	                                       			<a href="{{ route('buyer.adslist', [$cate->id]) }}">{{$cate->service_category}}</a>
	                                       			<span>({{ $cate->count }})</span>
	                                       		</li>
	                                      		 @endforeach
                                    		</ul>
                                 		</div><!-- end panel-body -->

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
	                                 	</div>
	                              	</div><!-- end citiesheading -->

   								</div><!-- end panel panel-default -->

   								<div class="panel panel-default">

   									<div class="panel-heading" >
	                                	<h4 class="panel-title">
	                                    	<a>Recent Ads</a>
	                                 	</h4>
	                              	</div><!-- end panel-heading -->

	                              	<div class="panel-collapse">

	                              		<div class="panel-body recent-ads">

	                              			@foreach($recent_ads as $recent_ad)
	                              			<div class="recent-ads-list">
		                                       	<div class="recent-ads-container">

		                                          	<div class="recent-ads-list-image">
		                                            	<a href="#" class="recent-ads-list-image-inner">
		                                             		<img src="{{ URL::asset('uploads/postadv/'. $recent_ad->image) }}"  alt="">
		                                             	</a>
		                                          	</div><!-- end recent-ads-list-image -->
		                                          
		                                          	<div class="recent-ads-list-content">
		                                            	<h3 class="recent-ads-list-title">
		                                                	<a href="{{ route('buyer.adsdetail', [$recent_ad->id]) }}">{{ $recent_ad->title }}</a>
		                                             	</h3>

		                                             	<ul class="recent-ads-list-location">
		                                                	<li><a href="#"> {{ $recent_ad->district_name }}</a></li>
		                                             	</ul>
		                                          	</div><!-- end recent-ads-list-content -->
		                                          
		                                       	</div><!-- end recent-ads-container -->
		                                    </div><!-- end recent-ads-list -->
		                                    @endforeach

	                              		</div><!-- end panel-body -->

	                              	</div><!-- end panel-collapse -->

   								</div><!-- end panel panel-default -->

   							</div><!-- end panel-group -->

   						</div><!-- end sidebar -->

   					</div><!-- end col-md-4 -->

   				</div><!-- end row -->

   			</div><!-- end container -->

   		</section><!-- end section-padding -->

   </div><!-- end main-content-area -->

@endsection