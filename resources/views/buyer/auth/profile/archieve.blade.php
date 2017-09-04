@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               <ul>
                	 <li><a href="{{ route('buyer.index') }}">Home</a></li>
                    <li><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                  	<li><a class="active" href="#">Archieve Ads</a></li>
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

    					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                           <!-- Sorting Filters Breadcrumb -->
                           <!-- Sorting Filters Breadcrumb End -->
                        </div><!-- end col-md-12 col-xs-12 col-sm-12 col-lg-12 -->

                        <div class="clearfix"></div><!-- end clearfix -->

                        <div class="posts-masonry">

                        	<div class="col-md-12 col-xs-12 col-sm-12 user-archives">

                        		

                        		@foreach($archives as $archive)

                        		<div class="ads-list-archive">

                        			<div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    
	                                    <div class="ad-archive-img">

	                                       	<a href="#">
                                          		
                                          		<img src="{{ URL::asset('uploads/postadv/'. $archive->image) }}" alt="">
                                       		</a>

	                                    </div><!-- end ad-archive-img -->
                                    
                                 	</div><!-- end col-lg-5 col-md-5 col-sm-5 no-padding -->

                                 	<div class="clearfix visible-xs-block"></div><!-- end clearfix visible-xs-block -->

                                 	<div class="col-lg-7 col-md-7 col-sm-7 no-padding">

                                 		<div class="ad-archive-desc">

                                 			<h3>{{ $archive->title }}</h3>

                                 			<div class="category-title"> <span><a href="#">{{ $archive->category_name }}</a></span> </div>

                                 			<div class="clearfix visible-xs-block"></div>

                                 			<p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....</p>

                                 			<ul class="add_info">
                                          
                                          		<li>
                                             		<div class="custom-tooltip tooltip-effect-4">

                                                		<span class="tooltip-item"><i class="fa fa-phone"></i></span>

                                                		<div class="tooltip-content">
	                                                   		<h4>Call Timings</h4>
	                                                   		<strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
	                                                   		<br>
	                                                   		<strong>Saturday</strong> 09.00 AM - 5.30 PM
	                                                   		<br>
	                                                   		<strong>Sunday</strong> <span class="label label-success">+92-123-4567</span>
                                                		</div><!-- end tooltip-content -->

                                             		</div><!-- end custom-tooltip tooltip-effect-4 -->
                                          		</li>
                                          
		                                        <li>
		                                            <div class="custom-tooltip tooltip-effect-4">

		                                                <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>

		                                                <div class="tooltip-content">
		                                                   <h4>Address</h4>
		                                                   {{ $archive->location }}
		                                                </div><!-- end tooltip-content -->

		                                            </div><!-- end custom-tooltip tooltip-effect-4 -->
		                                        </li>
                                          
                                          		<li>
                                             		<div class="custom-tooltip tooltip-effect-4">
                                                		<span class="tooltip-item"><i class="fa fa-cog"></i></span>

		                                                <div class="tooltip-content">
		                                                   <strong>Condition</strong> <span class="label label-danger">Used</span>
		                                                </div><!-- end tooltip-content -->

                                             		</div><!-- end custom-tooltip tooltip-effect-4 -->
                                          		</li>
                                          
		                                        <li>
		                                            <div class="custom-tooltip tooltip-effect-4">
		                                                <span class="tooltip-item"><i class="fa fa-check-square-o"></i></span>

		                                                <div class="tooltip-content">
		                                                   <strong>Warrinty</strong> <span class="label label-danger">No </span>
		                                                </div><!-- end tooltip-content -->

		                                            </div><!-- end custom-tooltip tooltip-effect-4 -->
		                                        </li>
                                       		</ul>

                                       		<div class="clearfix archive-history">

                                          		<div class="last-updated">Updated: {{ $archive->published_date }}</div><!-- end last-updated -->

		                                        <div class="ad-meta">
                                             		<a href="/auth/profile/archieve/reactive/{{ $archive->id }}" class="btn save-ad"><i class="fa fa-plus"></i> Reactive</a>
                                             		<a href="/auth/profile/archieve/delete/{{ $archive->id }}" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
                                          		</div><!-- end ad-meta -->

                                       		</div><!-- end clearfix archive-history -->

                                 		</div><!-- end ad-archive-desc -->

                                 	</div><!-- end col-lg-7 col-md-7 col-sm-7 no-padding -->

                        		</div><!-- end ads-list-archive -->

                        		@endforeach

                        	</div><!-- end col-md-12 col-xs-12 col-sm-12 user-archives -->

                        </div><!-- end posts-masonry -->

    				</div><!-- end row -->

    			</div><!-- end col-md-8 col-sm-12 col-xs-12 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding gray -->

@stop