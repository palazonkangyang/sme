@extends('buyer.layouts.main')
@section('content')

     <div class="small-breadcrumb">
         <div class="container">

            <div class=" breadcrumb-link">

               <ul>
                  <li><a href="{{ route('buyer.index') }}">Home</a></li>
                  <li><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                  <li><a class="active" href="#">Active Ads</a></li>
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
                     </div>
                        
                     <div class="clearfix"></div>
                     
                     <div class="posts-masonry">
                           
                        @foreach($postad as $post)

                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
                           
                           <div class="white category-grid-box-1 ">
                                 
                              <div class="image">
                              @if (!empty($post['image']))
                                 <img alt="Tour Package" src="{{ URL::asset('uploads/postadv/'. $post['image']) }}" class="img-responsive">
                              @else
                                 <img alt="Tour Package" src="{{ URL::asset('adforest/images/posting/house-4.jpg') }}" class="img-responsive">
                              @endif
                                  
                              </div><!-- end image -->
                                 
                              <div class="short-description-1">
                                    
                                 <div class="category-title"> 
                                    <span><a href="#">{!! $post['category_name'] !!}</a></span> 
                                 </div><!-- end category-title -->
                                    
                                 <h3>
                                    <a title="" href="{{ route('buyer.adsdetail', [$post->id]) }}">{!! $post['title'] !!}</a>
                                 </h3>
                                    
                                 <p class="location"><i class="fa fa-map-marker"></i> {!! $post['location'] !!}</p>
                                    
                                 <div class="rating">
                                       <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                       <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                       <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span>
                                 </div><!-- end rating -->
                                
                              </div><!-- end short-description -->
                                 
                              <div class="ad-info-1">

                                 <ul class="pull-left">
                                    <li> <i class="fa fa-eye"></i><a href="#">445 Views</a> </li>
                                    <li> <i class="fa fa-clock-o"></i>{!! $post['published_date'] !!}</li>
                                 </ul>

                                 <ul class="pull-right">
                                    <li> 
                                       <a data-toggle="tooltip" data-placement="top" data-original-title="Edit this Ad" href="/auth/profile/postad/edit/{{ $post['id'] }}">
                                          <i class="fa fa-pencil edit"></i>
                                       </a> 
                                    </li>
                                    <li> 
                                       <a  data-toggle="tooltip" data-placement="top" data-original-title="Delete Ad" href="/auth/profile/postad/delete/{{ $post['id'] }}">
                                          <i class="fa fa-times delete"></i>
                                       </a>
                                    </li>
                                 </ul>

                              </div><!-- end ad-info-1 -->

                           </div><!-- end white -->

                        </div><!-- end col-md-6 -->

                        @endforeach
                           
                     </div><!-- end posts-masonry -->
                        
                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        {!! $postad->render() !!}
                        </div><!-- end col-md-12 -->
                        
                  </div><!-- end row -->
                   
               </div><!-- end col-md-8 -->
                  
            </div><!-- end row -->
               
         </div><!-- end container -->
            
      </section>
    
@endsection