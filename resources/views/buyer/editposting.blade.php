@extends('buyer.layouts.main')
@section('content')
<div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Ad Posting </h1>
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
                  <li><a href="#">Pages</a></li>
                  <li><a class="active" href="#">Post Ad</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Post Your Ad
                           </h3>
                        </div>
                        <p class="lead">Posting an ad on <a href="{{ route("buyer.index") }}">SME</a> is subject to cost! All ads must follow our rules:</p>
                        {!! Form::open(["url" => route("buyer.updateposting", $post->id), "files" => true])!!}
                           <!-- Title  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                  <label>Project Title</label>
                                 {!! Form::text("title", Input::old("title", $post->title), ["class" => "form-control"]) !!}
                                 <p class="help-block">{{ $errors->first("title") }}</p>                                                            
                              </div>
                           </div>
                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label>Category</label>
                                 {!! Form::select("category_id",$category, Input::old("parecategory_idnt_id",$post->category_id), ["class" => "form-control"]) !!}
                                {!! $errors->first("category_id", "<p class='form-error'>:message</p>") !!}   
                              </div>
                              <!-- Price  -->
                             
                           </div>
                           <input name="buyer_id" type="hidden" value= {{ $buyer->id }} />
                           <!-- end row -->
                           <!-- Image Upload  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                              <label>Image</label>
                                 <div class="form-group{!! $errors->has("image") ? " has-error" : "" !!}">
                                     {!! Form::file("image") !!}
                                     <p class="help-block">{{ $errors->first("image") }}</p>
                                 </div>
                              </div>
                          </div>
                           <!-- end row -->
                           <!-- Ad Description  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label>Ad Description</label>
                                 {!! Form::textArea("description", Input::old("description", $post->description), ["class" => "form-control"]) !!}
                                 <p class="help-block">{{ $errors->first("description") }}</p>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label>Link URL</label>
                                 {!! Form::text("link", Input::old("link", $post->link), ["class" => "form-control"]) !!}
                                 <p class="help-block">{{ $errors->first("link") }}</p>      
                              </div>
                           </div>
                           <!-- Ad Tags  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label>Ad Tags</label>
                                 {!! Form::text("tags", Input::old("tags", $post->tags), ["class" => "form-control"]) !!}
                                 <p class="help-block">{{ $errors->first("tags") }}</p>      
                              </div>
                           </div>
                           <!-- end row -->
                          
                           
                           
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                  <label>Your Name</label>
                                 {!! Form::text("name", Input::old("name", $buyer->name), ["class" => "form-control", 'readonly' => 'true']) !!}
                                 <p class="help-block">{{ $errors->first("name") }}</p>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                              <label>Your Email</label>
                                 {!! Form::text("email", Input::old("email", $buyer->email), ["class" => "form-control", 'readonly' => 'true']) !!}
                                 <p class="help-block">{{ $errors->first("email") }}</p>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label>Your Contact Number</label>
                                 {!! Form::text("contact_no", Input::old("contact_no", $buyer->contact_no), ["class" => "form-control", 'readonly' => 'true']) !!}
                                 <p class="help-block">{{ $errors->first("contact_no") }}</p>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label>Your Address</label>
                                 {!! Form::text("address", Input::old("address", $buyer->address), ["class" => "form-control", 'readonly' => 'true']) !!}
                                 <p class="help-block">{{ $errors->first("address") }}</p>
                              </div>
                           </div>
                           <!-- Select Package  -->
                            
                           <br/>
                           
                          {!! Form::submit("Publish my Ad", [ "class" => "btn btn-light pull-right" ]) !!}
                                           
                       {!! Form::close() !!}
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Saftey Tips </a></h4>
                           </div>
                           <div class="widget-content">
                              <p class="lead">Posting an ad on <a href="#">AdForest.com</a> is free! However, all ads must follow our rules:</p>
                              <ol>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                 <li>Do not put your email or phone numbers in the title or description.</li>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not post ads containing multiple items unless it's a package deal.</li>
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End --><!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
@endsection