@extends('buyer.layouts.main')
@section('content')

   <div class="page-header-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="header-page">
                     <h1>Blog Detail</h1>
               </div>
            </div>

         </div><!-- end row -->

      </div><!-- end container -->

   </div><!-- end page-header-area -->

   <div class="small-breadcrumb">

      <div class="container">

         <div class="breadcrumb-link">
            <ul>
               <li><a href="{{ route('buyer.index') }}">Home</a></li>
               <li><a href="{{ route('buyer.bloglist') }}">Blog Listing</a></li>
               <li><a class="active" href="#">{{ $blog_title }}</a></li>
            </ul>
         </div><!-- end breadcrumb-link -->

      </div><!-- end container -->

   </div><!-- end small-breadcrumb -->

   <div class="main-content-area clearfix">

      <section class="section-padding error-page pattern-bgs gray">

         <div class="container">

            <div class="row">

               <div class="col-md-8 col-xs-12 col-sm-12">

                  <div class="blog-detial">

                     <div class="blog-post">

                        <div class="post-img">

                           @if($blog->blog_image)

                              <a href="#">
                                 <img src="{{ URL::asset('uploads/blog/'. $blog->blog_image) }}" class="img-responsive large-img">
                              </a>

                           @else

                              <a href="#">
                                 <img src="{{ url('/adforest/images/blog/blog-large.jpg') }}" class="img-responsive">
                              </a>

                           @endif

                        </div><!-- end post-img -->

                        <div class="post-info"> 
                           <a href="#">{{ Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</a> 
                           <a href="#">23 comments</a> 
                        </div><!-- end post-info -->
                        
                        <h3 class="post-title"> 
                           <a href="#">{{ $blog->blog_title }}</a> 
                        </h3><!-- end post-title -->

                        <div class="post-excerpt">
                           <p>
                              {!! $blog->blog_description !!}
                           </p>

                           <div class="clearfix"></div>

                           <div class="tags-share clearfix">

                              <div class="tags pull-left">
                                 <h3>Tags:</h3>

                                 <ul>
                                    <li><a href="#">Design, </a></li>
                                    <li><a href="#">Kitchen, </a></li>
                                    <li><a href="#">House, </a></li>
                                    <li><a href="#">Building</a></li>
                                 </ul>

                              </div><!-- end tags pull-left -->

                              <div class="share pull-right">
                                 <h3>Share:</h3>

                                 <ul>
                                    <li><a href="#">Facebook, </a></li>
                                    <li><a href="#">Google+, </a></li>
                                    <li><a href="#">Instagram</a></li>
                                 </ul>

                              </div><!-- end share pull-right -->

                           </div><!-- end tags-share -->

                           <div class="clearfix"></div><!-- end clearfix -->
                           
                           <div class="blog-section">
                              
                              <div class="blog-heading">
                                 <h2>Comments (20)</h2>
                                 <hr>
                              </div><!-- end blog-heading -->

                              <ol class="comment-list">
                                    
                                 <li class="comment">

                                    <div class="comment-info">

                                       <img class="pull-left hidden-xs img-circle" src="{{ url('/adforest/images/blog/c1.png')}}" alt="author">

                                       <div class="author-desc">

                                          <div class="author-title">

                                             <strong>Curt Alex</strong>

                                             <ul class="list-inline pull-right">
                                                <li><a href="#">22 Feb 2017</a></li>
                                             </ul>

                                          </div><!-- end author-title -->

                                          <p>You wanna be where everyboody knows Your name. And a we knooow Flipper lives in a world full of wonder flying there-under under the sea creepy and kooky</p>

                                       </div><!-- end author-desc -->

                                    </div><!-- end comment-info -->
                                       
                                 </li>
                                    
                                 <li class="comment">
                                    <div class="comment-info">
                                       
                                       <img class="pull-left hidden-xs img-circle" src="{{ url('/adforest/images/blog/c3.png')}}" alt="author">
                                       
                                       <div class="author-desc">

                                          <div class="author-title">
                                             
                                             <strong>Ricky John</strong>
                                             
                                             <ul class="list-inline pull-right">
                                                <li><a href="#">18 Jan 2017</a></li>
                                             </ul>
                                          
                                          </div><!-- end author-title -->

                                          <p>You wanna be where everyboody knows Your name. And a we knooow Flipper lives in a world full of wonder flying there-under under the sea creepy and kooky</p>

                                       </div><!-- end author-desc -->

                                    </div><!-- end comment-info -->
                                       
                                 </li>
                                    
                              </ol>

                           </div><!-- end blog-section -->

                           <div class="clearfix"></div><!-- end clearfix -->
                              <div class="blog-section">

                                 <div class="blog-heading">
                                    <h2>leave your comment </h2>
                                    <hr>
                                 </div><!-- end blog-heading -->

                                 <div class="commentform">

                                    <form>

                                       <div class="row">

                                          <div class="col-md-6 col-sm-12">

                                             <div class="form-group">
                                                <label>Name <span class="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" placeholder="">
                                             </div><!-- end form-group -->

                                          </div><!-- end col-md-6 col-sm-12 -->

                                          <div class="col-md-6 col-sm-12">

                                             <div class="form-group">
                                                <label>Email <span class="required">*</span>
                                                </label>
                                                <input type="email" class="form-control" placeholder="">
                                             </div><!-- end form-group -->

                                          </div><!-- end col-md-6 col-sm-12 -->

                                          <div class="col-md-12 col-sm-12">

                                             <div class="form-group">
                                                <label>Comment <span class="required">*</span>
                                                </label>
                                                <textarea class="form-control" placeholder="" rows="8" cols="6"></textarea>
                                             </div><!-- end form-group -->

                                          </div><!-- end col-md-6 col-sm-12 -->

                                          <div class="col-md-12 col-sm-12 margin-top-20 clearfix">
                                             <button type="submit"  class="btn btn-theme">Post Your Comment</button>
                                          </div><!-- end col-md-12 col-sm-12 margin-top-20 clearfix -->

                                       </div><!-- end row -->

                                    </form>

                                 </div><!-- end commentform -->

                              </div><!-- end blog-section -->

                        </div><!-- end post-excerpt -->

                     </div><!-- end blog-post -->

                  </div><!-- end blog-detail -->

               </div><!-- end col-md-8 col-xs-12 col-sm-12 -->

               <div class="col-md-4 col-xs-12 col-sm-12">

                  <div class="blog-sidebar">

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Categories</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content categories">
                           <ul>

                              @foreach($category as $cate)

                              <li>
                                 <a href="{{ route('buyer.bloglistbycategory', [$cate->id]) }}">{{$cate->service_category}} <span>({{$cate->count}})</span></a>
                              </li>
                              
                              @endforeach

                           </ul>
                        </div><!-- end widget-content categories -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Latest Blogs</a></h4>
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

                              @foreach($archives as $archive)
                              <li>
                                 <a href="/bloglist/?month={{ $archive->month }}&year={{ $archive->year }}">
                                    {{ $archive->month . ' ' . $archive->year }}
                                 </a>
                              </li>
                              @endforeach

                           </ul>
                        </div><!-- end widget-content -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Add New Blog</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content">
                           <ul>

                              @if(isset($buyer))

                                 <li><a href="/auth/profile/addblog">Add Blog</a></li>

                              @else

                                 <li><a href="login">Add Blog</a></li>

                              @endif
                           </ul>
                        </div><!-- end widget-content -->

                     </div><!-- end widget -->

                  </div><!-- end blog-sidebar -->

               </div><!-- end col-md-4 col-xs-12 col-sm-12 -->

            </div><!-- end row -->

         </div><!-- end container -->

      </section><!-- end section-padding error-page pattern-bgs gray -->

   </div><!-- end main-content-are clearfix -->

@stop