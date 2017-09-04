@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               	<ul>
                    <li><a href="{{ route('buyer.index') }}">Home</a></li>
                    <li ><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                  	<li><a class="active" href="#">Wish Lists</a></li>
               	</ul>
            </div><!-- end breadcrumb-link -->

        </div><!-- end container -->

    </div><!-- end small-breadcrumb -->

    <section class="section-padding gray">

    	<div class="container">

    		<div class="row">

    			@include('buyer.auth.partial.sidebar')

    			<div class="col-md-8 col-sm-12 col-xs-12">

    				<div class="row">

    					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 heading">
                           
                           	<div class="panel panel-default">

                              	<div class="panel-heading" >

                                 	<div class="col-md-4 col-sm-4 col-xs-4">
                                    	<h4 class="panel-title"><a>My Wish Lists</a></h4>
                                 	</div><!-- end col-md-4 col-sm-4 col-xs-4 -->

                                 	<div class="col-md-8 col-sm-4 col-xs-4">

	                                    <div class="search-widget pull-right">
	                                    	<form method="get" action="/auth/profile/wishlist">
		                                       	<input placeholder="search" type="text" name="search_postadv">
		                                       	<button type="submit"><i class="fa fa-search"></i></button>
	                                       </form>
	                                    </div><!-- end search-widget pull-right -->

                                 	</div><!-- end col-md-8 col-sm-4 col-xs-4 -->

                              	</div><!-- end panel-heading -->

                           	</div><!-- end panel panel-default -->

                        </div><!-- end col-md-12 col-xs-12 col-sm-12 col-lg-12 heading -->

                        <div class="clearfix"></div><!-- end clearfix -->

                        <div class="posts-masonry">

                        	<div class="col-md-12 col-xs-12 col-sm-12 user-archives">

                        		@foreach($wishlists as $wl)

                        			<div class="ads-list-archive">
                                 
		                                <div class="col-lg-3 col-md-3 col-sm-3 no-padding">
		                                    
		                                    <div class="ad-archive-img">
		                                       	<a href="#">
		                                       		@if (!empty($wl->image))
						                                <img alt="Tour Package" src="{{ URL::asset('uploads/postadv/'. $wl->image) }}" class="img-responsive">
						                            @else
						                                <img alt="Tour Package" src="{{ URL::asset('adforest/images/posting/house-4.jpg') }}" class="img-responsive">
						                            @endif
		                                       	</a>
		                                    </div><!-- end ad-archive-img -->
		                                      
		                                </div><!-- end col-lg-3 col-md-3 col-sm-3 no-padding -->
	                                 
	                                	<div class="clearfix visible-xs-block"></div>
	                                   
		                                <div class="col-lg-9 col-md-9 col-sm-9 no-padding">
		                                    
		                                    <div class="ad-archive-desc">

		                                       	<h3>{{ $wl->title }}</h3>
		                                       
		                                       	<div class="category-title"> 
		                                       		<span><a href="#">{{ $wl->category_name }}</a></span> 
		                                       	</div><!-- end category-title -->
		                                       
		                                       	<div class="clearfix visible-xs-block"></div>
		                                       
		                                       	<div class="clearfix archive-history">

		                                          	<div class="last-updated">Updated: {{ $wl->published_date }}</div><!-- end last-updated -->

		                                          	<div class="ad-meta">
		                                             	<a class="btn save-ad" href="/auth/profile/wishlist/delete/{{ $wl->wishlist_id }}">
		                                             		<i class="fa fa-minus-circle"></i> unfavourite
		                                             	</a>

		                                             	<a class="btn btn-success" href="{{ route('buyer.adsdetail', [$wl->id]) }}">
		                                             		<i class="fa fa-eye"></i> View Details
		                                             	</a>
		                                          	</div><!-- end ad-meta -->

		                                       	</div><!-- end clearfix archive-history -->

		                                    </div><!-- end ad-archive-desc -->
		                                      
		                                </div><!-- end col-lg-9 col-md-9 col-sm-9 no-padding -->
	                                  
	                              	</div><!-- end ads-list-archive -->

                        		@endforeach

                        	</div><!-- end col-md-12 col-xs-12 col-sm-12 user-archives -->

                        </div><!-- end posts-masonry -->

                        <div class="clearfix"></div>

                        <div class="col-md-12 col-xs-12 col-sm-12">

                           	{!! $wishlists->render() !!}

                        </div><!-- end col-md-12 col-xs-12 col-sm-12 -->

    				</div><!-- end row -->

    			</div><!-- end col-md-8 col-sm-12 col-xs-12 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding gray -->

@endsection