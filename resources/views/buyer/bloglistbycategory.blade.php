@extends('buyer.layouts.main')
@section('content')

   <div class="page-header-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="header-page">
                  <h1>Blog Listing</h1>
               </div><!-- end header-page -->
            </div><!-- end col-lg-12 col-md-12 col-sm-12 col-xs-12 -->

         </div><!-- end row -->

      </div><!-- end container -->

   </div><!-- end page-header-area -->

   <div class="small-breadcrumb">

      <div class="container">

         <div class="breadcrumb-link">
            <ul>
               <li><a href="{{ route('buyer.index') }}">Home</a></li>
               <li><a href="{{ route('buyer.bloglist') }}">Blog Listing</a></li>
               <li><a class="active" href="#">{{ $category_name }}</a></li>
            </ul>
         </div><!-- end breadcrumb-link -->

      </div><!-- end container -->

   </div><!-- end small-breadcrumb -->

   <div class="main-content-area clearfix">

      <section class="section-padding gray">

         <div class="container">

            <div class="row">

               <div class="col-md-8 col-xs-12 col-sm-12">

                  <div class="row">

                     <div class="posts-masonry">

                        @foreach($blogs as $blog)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                           <div class="blog-post">

                              <div class="post-img">
                                 @if($blog->blog_image)

                                    <a href="#">
                                       <img src="{{ URL::asset('uploads/blog/'. $blog->blog_image) }}" class="img-responsive">
                                    </a>

                                 @else

                                    <a href="#"> 
                                       <img class='img-responsive' alt='' src='{{ url("/adforest/images/blog/11.jpg")}}'> 
                                    </a>

                                 @endif
                                 
                              </div>

                              <div class="post-info"> 
                                 <a href="">{{ Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</a> <a href="#">23 comments</a> 
                              </div>

                              <h3 class="post-title"> 
                                 <a href="{{ route('buyer.blogdetail', [$blog->id]) }}">{{$blog->blog_title}}</a> 
                              </h3>

                              {!! str_limit($blog->blog_description, $limit = 150, $end = '...') !!}
                              
                           </div><!-- end blog-post -->

                        </div><!-- end col-md-6 col-sm-6 col-xs-12 -->

                        @endforeach

                        <div class="col-md-12 col-xs-12 col-sm-12">

                           {!! $blogs->render() !!}

                        </div><!-- end col-md-12 col-xs-12 col-sm-12 -->

                     </div><!-- end posts-masonry -->

                  </div><!-- end row -->

               </div><!-- end col-md-8 col-xs-12 col-sm-12 -->

               <div class="col-md-4 col-xs-12 col-sm-12">

                  <div class="blog-sidebar">

                     <div class="widget">
                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Categories</a></h4>
                        </div>

                        <div class="widget-content categories">
                           <ul>

                              @foreach($category as $cate)

                              <li>
                                 <a href="{{ route('buyer.bloglistbycategory', [$cate->id]) }}">{{$cate->service_category}} 
                                 <span>({{$cate->count}})</span></a>
                              </li>
                              
                              @endforeach

                           </ul>
                        </div><!-- end widget-content categories -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title">
                              <a>Latest Blogs</a>
                           </h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content recent-ads">

                           @foreach($latest_blogs as $latest_blog)
                           <div class="recent-ads-list">

                              <div class="recent-ads-container">
                                 
                                 <div class="recent-ads-list-image">

                                    @if (!empty($latest_blog->blog_image))

                                       <a href="#" class="recent-ads-list-image-inner">
                                          <img src="{{ URL::asset('uploads/blog/'. $latest_blog->blog_image) }}" class="img-responsive">
                                       </a>

                                    @else

                                       <a href="#" class="recent-ads-list-image-inner">
                                          <img src="{{ url('/adforest/images/posting/thumb-1.jpg') }}" class="img-responsive">
                                       </a>

                                    @endif

                                 </div><!-- end recent-ads-list-image -->
                                    
                                 <div class="recent-ads-list-content">

                                    <h3 class="recent-ads-list-title">
                                       <a href="{{ route('buyer.blogdetail', [$latest_blog->id]) }}">{{ $latest_blog->blog_title }}</a>
                                    </h3>

                                    <ul class="recent-ads-list-location">
                                       <li><a href="#">{{ $latest_blog->category_name }}</a></li>
                                    </ul>
                                       
                                 </div><!-- end recent-ads-list-content -->
                                    
                              </div><!-- end recent-ads-container -->
                                
                           </div><!-- end recent-ads-list -->
                           @endforeach

                        </div><!-- end widget-content recent-ads -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Archives</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content">
                           <ul>
                              <li><a href="#">August 2017</a></li>
                              <li><a href="#">July 2017</a></li>
                              <li><a href="#">June 2017</a></li>
                              <li><a href="#">May 2017</a></li>
                              <li><a href="#">April 2014</a></li>
                           </ul>
                        </div><!-- end widget-content -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Tags cloud</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content">

                           <div class="tagcloud">
                              <a href="#">Hair</a>
                              <a href="#">Waxing</a>
                              <a href="#">Body</a>
                              <a href="#">Oil</a>
                              <a href="#">Facials</a>
                              <a href="#">Cutting</a>
                              <a href="#">Blowouts</a>
                              <a href="#">Curling</a>
                              <a href="#">Makeup</a>
                           </div><!-- end tagcloud -->

                        </div><!-- end widget-content -->

                     </div><!-- end widget -->

                  </div><!-- end blog-sidebar -->

               </div><!-- end col-md-4 col-xs-12 col-sm-12 -->

            </div><!-- end row -->

         </div><!-- end container -->

      </section><!-- end section-padding gray -->

   </div><!-- end main-content-area clearfix -->

@endsection