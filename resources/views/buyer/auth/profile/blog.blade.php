@extends('buyer.layouts.main')
@section('content')
	
	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               <ul>
                    <li><a href="{{ route('buyer.index') }}">Home</a></li>
                    <li ><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                  <li  class="active"><a href="#">Blog</a></li>
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

    					<div class="posts-masonry">

                        		@foreach($blogs as $blog)

                        		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                           
		                           	<div class="white category-grid-box-1 ">
		                                 
		                              	<div class="image">
		                              	
		                              		@if (!empty($blog->blog_image))
						                        <img alt="Tour Package" src="{{ URL::asset('uploads/blog/'. $blog->blog_image) }}" class="img-responsive">

						                    @else
						                    
						                    <img alt="Tour Package" src="{{ URL::asset('adforest/images/posting/house-4.jpg') }}" class="img-responsive">
						                    
						                    @endif
		                                  
		                              	</div><!-- end image -->
		                                 
		                              	<div class="short-description-1">
		                                    
		                                 	<div class="category-title"> 
		                                    	<span><a href="#">{{ $blog->category_name }}</a></span> 
		                                 	</div><!-- end category-title -->
		                                    
		                                 	<h3>
		                                    	<a href="{{ route('buyer.blogdetail', [$blog->id]) }}">{{ $blog->blog_title }}</a>
		                                 	</h3>
		                                    
		                                 	<div class="rating">
		                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
		                                       <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
		                                       <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span>
		                                 	</div><!-- end rating -->
		                                
		                              	</div><!-- end short-description -->
		                                 
		                              	<div class="ad-info-1">

		                                 <ul class="pull-left">
		                                    <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
		                                    <li> <i class="fa fa-clock-o"></i>{{ $blog->published_date }}</li>
		                                 </ul>

		                                 	<ul class="pull-right">
			                                    <li> 
			                                       <a data-toggle="tooltip" data-placement="top" data-original-title="Edit this Blog" href="{{ route('buyer.blogdetail', [$blog->id]) }}">
			                                          <i class="fa fa-pencil edit"></i>
			                                       </a> 
			                                    </li>
			                                    <li> 
			                                       <a  data-toggle="tooltip" data-placement="top" data-original-title="Delete Blog" href="#">
			                                          <i class="fa fa-times delete"></i>
			                                       </a>
			                                    </li>
		                                 	</ul>

		                              	</div><!-- end ad-info-1 -->

		                           	</div><!-- end white -->

		                        </div><!-- end col-md-6 -->

                        		@endforeach

                        </div><!-- end posts-masonry -->

                        <div class="clearfix"></div><!-- end clearfix -->

                        <div class="col-md-12 col-xs-12 col-sm-12">

                           	{!! $blogs->render() !!}

                        </div><!-- end col-md-12 col-xs-12 col-sm-12 -->

    				</div><!-- end row -->

    			</div><!-- end col-md-8 col-sm-12 col-xs-12 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding gray -->

@stop