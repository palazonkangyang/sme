@extends('buyer.layouts.main')
@section('content')
 <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Ads</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route("buyer.index") }}">Home</a></li>
                  <li><a href="{{ route("buyer.categories") }}">Categories</a></li>
                  <li><a class="active" href="#">Ads</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <!-- Blog Archive -->
                        <div class="posts-masonry">
                           <!-- Blog Post-->
                            @if($posts)
                            @foreach($posts as $post)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="#"> <img class="img-responsive" alt="" src={!! url("uploads/Posts/$post->image")!!}> </a>
                                 </div>
                                 <div class="post-info"> <a href={{ route('buyer.adpage', $post->id)}}>{{ Carbon\Carbon::parse($post->created_at)->format('M d Y') }}</a> <a href="#"></a> </div>
                                 <h3 class="post-title"> <a href={{ route('buyer.adpage', $post->id)}}> {{ $post->title}}</a> </h3>
                                 <p class="post-excerpt"> {!! $post->description !!} </p>
                              </div>
                           </div>
                           @endforeach
                           @else
                           No Ads to display
                           @endif
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         </div>

@endsection
