@extends('buyer.layouts.main')
@section('content')


   <div class="page-header-area">

      <div class="container">

         <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="header-page">
                  <h1>Ads Detail</h1>
               </div>
            </div><!-- end col-lg-12 col-md-12 col-sm-12 col-xs-12 -->

         </div><!-- end row -->

      </div><!-- end container -->

   </div><!-- end page-header-area -->

   <div class="small-breadcrumb">

      <div class="container">

         <div class="breadcrumb-link">

            <ul>
               <li><a href="{{ route('buyer.index') }}">Home</a></li>
               <li><a href="{{ route('buyer.categories') }}">Categories</a></li>
               <li><a href="{{ route('buyer.adslist', [$postadv->category_id]) }}">{{ $postadv->category_name }}</a></li>
               <li><a class="active" href="#">{{ $post_title }}</a></li>
            </ul>

         </div><!-- end breadcrumb-link -->

      </div><!-- end container -->

   </div><!-- end small-breadcrumb -->

   <div class="main-content-area clearfix">

      <section class="section-padding error-page pattern-bgs gray">

         <div class="container">

            <div class="row">

               <div class="col-md-8 col-xs-12 col-sm-12">

                  <div class="single-ad">

                     <div class="ad-box featured-border">
                        <h1>{{ $post_title }}</h1>

                        <div class="short-history">

                           <ul>
                              <li>Published on: <b>{{ Carbon\Carbon::parse($postadv->published_on)->format('d M Y') }}</b></li>
                              <li>Category: <b>{{ $postadv->category_name }}</b></li>
                              <li>Location: <b>{{ $postadv->district_name }}</b></li>
                           </ul>

                        </div><!-- end short-history -->

                        <div class="featured-ribbon">
                           <span>Featured</span>
                        </div><!-- end featured-ribbon -->

                     </div><!-- end ad-box -->

                     <div class="flexslider single-page-slider">

                        <div class="flex-viewport">

                           <ul class="slides slide-main">

                              @if(count($post_adv_images))

                                 @foreach($post_adv_images as $post_adv_image)
                                 <li>
                                    <img src="{{ URL::asset('uploads/final/'. $post_adv_image->file_url) }}">
                                 </li>
                                 @endforeach

                              @endif

                           </ul><!-- end slides slide-main -->

                        </div><!-- end flex-viewport -->

                     </div><!-- end flexslider single-page-slider -->

                     <div class="flexslider" id="carousels">

                        <div class="flex-viewport">

                           <ul class="slides slide-thumbnail">

                              @if(count($post_adv_images))

                                 @foreach($post_adv_images as $post_adv_image)
                                 <li>
                                    <img src="{{ URL::asset('uploads/final/'. $post_adv_image->file_url) }}">
                                 </li>
                                 @endforeach

                              @endif

                           </ul><!-- end slides slide-thumbnail -->

                        </div><!-- end flex-viewport -->

                     </div><!-- end flexslider -->

                     <div class="ad-share text-center">

                        <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                           <i class="fa fa-share-alt"></i> <span class="hidetext">Share</span>
                        </div>

                        @if(isset($buyer))

                           @if($buyer->id != $postadv->buyer_id)

                              <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="{{ route('buyer.addwishlist', [$postadv->id]) }}">
                                 <i class="fa fa-star active"></i> <span class="hidetext">Add to wishlist</span>
                              </a>

                           @else

                              <a class="ad-box col-md-4 col-sm-4 col-xs-12 text-mute" style="cursor: default; pointer-events: none; opacity: 0.6;
    filter: alpha(opacity=60);">
                                 <i class="fa fa-star active"></i> <span class="hidetext">Add to wishlist</span>
                              </a>

                           @endif

                        @else

                           <a class="ad-box col-md-4 col-sm-4 col-xs-12 text-mute" style="cursor: default; pointer-events: none; opacity: 0.6;
    filter: alpha(opacity=60);">
                              <i class="fa fa-star active"></i> <span class="hidetext">Add to wishlist</span>
                           </a>

                        @endif

                        <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                           <i class="fa fa-warning"></i> <span class="hidetext">Report</span>
                        </div>

                     </div><!-- end ad-share text-center -->

                     <div class="clearfix"></div><!-- end clearfix -->

                     <div class="ad-box">
                        <div class="short-features">

                           <div class="heading-panel">
                              <h3 class="main-title text-left">Description</h3>
                           </div><!-- end heading-panel -->

                           <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                              <span><strong>Email</strong>:</span> {{ $postadv->email }}
                           </div><!-- end col-sm-4 col-md-4 col-xs-12 no-padding -->

                           <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                              <span><strong>Phone</strong> :</span> {{ $postadv->phone }}
                           </div><!-- end col-sm-4 col-md-4 col-xs-12 no-padding -->

                           <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                           </div><!-- end col-sm-4 col-md-4 col-xs-12 no-padding -->

                        </div><!-- end short-features -->

                        <div class="desc-points">
                           {!! $postadv->description !!}
                        </div><!-- end desc-points -->

                        <div class="clearfix"></div><!-- end clearfix -->

                     </div><!-- end ad-box -->

                  </div><!-- end single-ad -->

                  <div class="grid-panel margin-top-30">

                     <div class="heading-panel">

                        <div class="col-xs-12 col-md-12 col-sm-12">
                           <h3 class="main-title text-left">Related Ads</h3>
                        </div><!-- end col-xs-12 col-md-12 col-sm-12 -->

                     </div><!-- end heading-panel -->

                     <div class="posts-masonry">

                        <div class="col-md-12 col-xs-12 col-sm-12">

                           @foreach($related_ads as $related_ad)
                           <div class="ads-list-archive">

                              <div class="col-lg-5 col-md-5 col-sm-5 no-padding">

                                 <div class="ad-archive-img">
                                    <a href="#">
                                       <div class="ribbon popular"></div>
                                       <img class="img-responsive" src="{{ URL::asset('uploads/postadv/'. $related_ad->image) }}" alt="">
                                    </a>
                                 </div><!-- end ad-archive-img -->

                              </div><!-- end col-lg-5 col-md-5 col-sm-5 no-padding -->

                              <div class="clearfix visible-xs-block"></div><!-- end clearfix visible-xs-block -->

                              <div class="col-lg-7 col-md-7 col-sm-7 no-padding">

                                 <div class="ad-archive-desc">

                                    <h3>{{ $related_ad->title }}</h3>

                                    <div class="category-title">
                                       <span><a href="#">{{ $related_ad->category_name }}</a></span>
                                    </div><!-- end category-title -->

                                    <div class="clearfix visible-xs-block"></div><!-- end clearfix visible-xs-block -->

                                    <p class="hidden-sm">
                                       Lorem ipsum dolor sit amet, quem convenire interesset ut vix, maiestatis inciderint no, eos in elit dicat.....
                                    </p>

                                    <ul class="add_info">

                                       <li>
                                          <div class="custom-tooltip tooltip-effect-4">

                                             <span class="tooltip-item"><i class="fa fa-phone"></i></span>
                                             <div class="tooltip-content">
                                                <h4>Call Timings</h4>
                                                <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                <br> <strong>Sunday</strong> <span class="label label-success">+65-123-4567</span>
                                             </div>
                                          </div>
                                       </li>

                                       <li>
                                          <div class="custom-tooltip tooltip-effect-4">
                                             <span class="tooltip-item"><i class="fa fa-map-marker"></i></span>
                                             <div class="tooltip-content">
                                                <h4>Address</h4>
                                                {{ $related_ad->location }}
                                             </div>
                                          </div>
                                       </li>

                                    </ul><!-- end add_info -->

                                    <div class="clearfix archive-history">
                                       <div class="last-updated">{{ $related_ad->published_date }}</div>

                                       <div class="ad-meta">
                                          <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Ads.</a>
                                          <a href="{{ route('buyer.adsdetail', [$related_ad->id]) }}" class="btn btn-success"><i class="fa fa-phone">
                                          </i> View Details.</a>
                                       </div><!-- end ad-meta -->

                                    </div><!-- end clearfix archive-history -->

                                 </div><!-- end ad-archive-desc -->

                              </div><!-- end col-lg-7 col-md-7 col-sm-7 no-padding -->

                           </div><!-- end ads-list-archive -->
                           @endforeach

                        </div><!-- end col-md-12 col-xs-12 col-sm-12 -->

                     </div><!-- end posts-masonry -->

                  </div><!-- end grid-panel margin-top-30 -->

               </div><!-- end col-md-8 col-xs-12 col-sm-12 -->

               <div class="col-md-4 col-xs-12 col-sm-12">

                  <div class="sidebar">

                     <div class="contact white-bg">
                        <button class="btn-block btn-contact contactEmail" data-toggle="modal" data-target=".price-quote" >
                           Contact Supplier Via Email
                        </button>
                        <button class="btn-block btn-contact contactPhone number" data-last="111111X" >
                           +65<span>{{ $buyer->contact_no }}</span>
                        </button>
                     </div><!-- end contact white-bg -->

                     <div class="white-bg user-contact-info">

                        <div class="user-info-card">

                           <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                              <img src="{{ URL::asset('uploads/postadv/'. $buyer->user_photo) }}" alt="">
                           </div><!-- end user-photo -->

                           <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">

                              <span class="user-name">
                                 <a class="hover-color" href="/auth/supplier/profile/{{ $buyer->id }}">{{ $buyer->name }}</a>
                              </span>

                              <div class="item-date">
                                 <span class="ad-pub">Registered on: {{ Carbon\Carbon::parse($buyer->created_at)->format('d M Y') }}</span><br>
                              </div><!-- end item-date -->

                           </div><!-- end user-information -->

                           <div class="clearfix"></div><!-- end clearfix -->

                        </div><!-- end user-info-card -->

                        <div class="ad-listing-meta">
                           <ul>
                              <li>Supplier ID: <span class="color">{{ $buyer->id }}</span></li>
                              <li>Category: <span class="color">{{ $buyer->category_name }}</span></li>
                              <li>Location: <span class="color">{{ $buyer->address }}</span></li>
                              <li>Ads posted: <span class="color">{{ $buyer->count }}</span></li>
                           </ul>
                        </div>

                        <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;"></div>
                     </div><!-- end white-bg user-contact-info -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Featured Ads</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content">

                           <div class="featured-slider-3">

                              <div class="item">

                                 <div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                                    <div class="category-grid-box">

                                       <div class="category-grid-img">
                                          <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/car-3.jpg') }}">

                                          <div class="user-preview">
                                             <a href="#">
                                                <img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> </a>
                                          </div><!-- end user-preview -->

                                          <a href="" class="view-details">View Details</a>

                                       </div><!-- end user-preview -->

                                       <div class="short-description">

                                          <div class="category-title">
                                             <span><a href="#">Cars</a></span>
                                          </div><!-- end category-title -->

                                          <h3><a title="" href="single-page-listing.html">2017 Honda Civic EX</a></h3>
                                       </div><!-- end short-description -->

                                       <div class="ad-info">

                                          <ul>
                                             <li><i class="fa fa-map-marker"></i>London</li>
                                             <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                          </ul>

                                       </div><!-- end ad-info -->

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
                                                <img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> </a>
                                          </div><!-- end user-preview -->

                                          <a href="" class="view-details">View Details</a>

                                       </div><!-- end user-preview -->

                                       <div class="short-description">

                                          <div class="category-title">
                                             <span><a href="#">Cameras & Accessories</a></span>
                                          </div><!-- end category-title -->

                                          <h3><a title="" href="single-page-listing.html">Office Furniture For Sale</a></h3>
                                       </div><!-- end short-description -->

                                       <div class="ad-info">

                                          <ul>
                                             <li><i class="fa fa-map-marker"></i>London</li>
                                             <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                          </ul>

                                       </div><!-- end ad-info -->

                                    </div><!-- end category-grid-box -->

                                 </div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->

                              </div><!-- end item -->

                              <div class="item">

                                 <div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                                    <div class="category-grid-box">

                                       <div class="category-grid-img">
                                          <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/mob-6.jpg') }}">

                                          <div class="user-preview">
                                             <a href="#">
                                                <img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> </a>
                                          </div><!-- end user-preview -->

                                          <a href="" class="view-details">View Details</a>

                                       </div><!-- end user-preview -->

                                       <div class="short-description">

                                          <div class="category-title">
                                             <span><a href="#">Cameras & Accessories</a></span>
                                          </div><!-- end category-title -->

                                          <h3><a title="" href="single-page-listing.html">Sony Xperia Z5</a></h3>
                                       </div><!-- end short-description -->

                                       <div class="ad-info">

                                          <ul>
                                             <li><i class="fa fa-map-marker"></i>London</li>
                                             <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                          </ul>

                                       </div><!-- end ad-info -->

                                    </div><!-- end category-grid-box -->

                                 </div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->

                              </div><!-- end item -->

                              <div class="item">

                                 <div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                                    <div class="category-grid-box">

                                       <div class="category-grid-img">
                                          <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/cam-2.jpg') }}">

                                          <div class="user-preview">
                                             <a href="#">
                                                <img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> </a>
                                          </div><!-- end user-preview -->

                                          <a href="" class="view-details">View Details</a>

                                       </div><!-- end user-preview -->

                                       <div class="short-description">

                                          <div class="category-title">
                                             <span><a href="#">Cameras & Accessories</a></span>
                                          </div><!-- end category-title -->

                                          <h3><a title="" href="single-page-listing.html">Sony Xperia Z5</a></h3>
                                       </div><!-- end short-description -->

                                       <div class="ad-info">

                                          <ul>
                                             <li><i class="fa fa-map-marker"></i>London</li>
                                             <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                          </ul>

                                       </div><!-- end ad-info -->

                                    </div><!-- end category-grid-box -->

                                 </div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->

                              </div><!-- end item -->

                              <div class="item">

                                 <div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                                    <div class="category-grid-box">

                                       <div class="category-grid-img">
                                          <img class="img-responsive" alt="" src="{{ url('/adforest/images/posting/cam-2.jpg') }}">

                                          <div class="user-preview">
                                             <a href="#">
                                                <img src="{{ url('/adforest/images/users/2.jpg') }}" class="avatar avatar-small" alt=""> </a>
                                          </div><!-- end user-preview -->

                                          <a href="" class="view-details">View Details</a>

                                       </div><!-- end user-preview -->

                                       <div class="short-description">

                                          <div class="category-title">
                                             <span><a href="#">Cameras & Accessories</a></span>
                                          </div><!-- end category-title -->

                                          <h3><a title="" href="single-page-listing.html">Sony Xperia Z5</a></h3>
                                       </div><!-- end short-description -->

                                       <div class="ad-info">

                                          <ul>
                                             <li><i class="fa fa-map-marker"></i>London</li>
                                             <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
                                          </ul>

                                       </div><!-- end ad-info -->

                                    </div><!-- end category-grid-box -->

                                 </div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->

                              </div><!-- end item -->

                           </div><!-- end featured-slider-3 -->

                        </div><!-- end widget-content -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Recent Ads</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content recent-ads">

                           @foreach($recent_ads as $recent_ad)
                           <div class="recent-ads-list">

                              <div class="recent-ads-container">
                                 <div class="recent-ads-list-image">
                                    <a href="#" class="recent-ads-list-image-inner">
                                       <img src="{{ URL::asset('uploads/postadv/'. $recent_ad->image) }}" alt="">
                                    </a>
                                 </div><!-- end recent-ads-list-image -->

                                 <div class="recent-ads-list-content">

                                    <h3 class="recent-ads-list-title">
                                       <a href="{{ route('buyer.adsdetail', [$recent_ad->id]) }}">{{ $recent_ad->title }}</a>
                                    </h3>

                                    <ul class="recent-ads-list-location">
                                       <li><a href="#">{{ $recent_ad->location }}</a></li>
                                    </ul>
                                 </div><!-- end recent-ads-list-content -->

                              </div><!-- end recent-ads-container -->

                           </div><!-- end recent-ads-list -->

                           @endforeach

                        </div><!-- end widget-content recent-ads -->

                     </div><!-- end widget -->

                     <div class="widget">

                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Safety tips for deal</a></h4>
                        </div><!-- end widget-heading -->

                        <div class="widget-content saftey">
                           <ol>
                              <li>Use a safe location to meet seller</li>
                              <li>Avoid cash transactions</li>
                              <li>Beware of unrealistic offers</li>
                           </ol>
                        </div><!-- end widget-content saftey -->

                     </div><!-- end widget -->

                  </div><!-- end sidebar -->

               </div><!-- end col-md-4 col-xs-12 col-sm-12 -->

            </div><!-- end row -->

         </div><!-- end container -->

      </section><!-- end section-padding error-page pattern-bgs gray -->

   </div><!-- end main-content-area clearfix -->

@endsection
