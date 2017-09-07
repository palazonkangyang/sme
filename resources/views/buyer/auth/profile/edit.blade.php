@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route('buyer.index') }}">Home</a></li>
                  <li><a class="active" href="#">Profile</a></li>
               </ul>
            </div><!-- end breadcrumb-link -->

        </div><!-- end container -->

    </div><!-- end small-breadcrumb -->

    <section class="section-padding gray">

    	<div class="container">

    		<div class="row">

    			@include('buyer.auth.partial.sidebar')

    			<div class="col-md-8 col-sm-12 col-xs-12">

    				<div class="profile-section margin-bottom-20">

    					<div class="profile-tabs">

    						<ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                              <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                              <li><a href="#payment" data-toggle="tab">Plan Setting</a></li>
                              <li><a href="#settings" data-toggle="tab">Notification Settings</a></li>
                           </ul>

                           <div class="tab-content">

                           		<div class="profile-edit tab-pane fade in active" id="profile">

                                	<h2 class="heading-md">Manage your Name, Contact and Email Addresses.</h2>
                                 	<p>Below are the name and email addresses on file for your account.</p>

                                 	<dl class="dl-horizontal">
                                    	<dt><strong>Your name </strong></dt>
	                                    <dd>
	                                       {{ Auth::buyer()->user()->name }}
	                                    </dd>

	                                    <dt><strong>Email Address </strong></dt>
	                                    <dd>
	                                       {{ Auth::buyer()->user()->email }}
	                                    </dd>

	                                    <dt><strong>Phone Number </strong></dt>
	                                    <dd>
	                                       {{ Auth::buyer()->user()->contact_no }}
	                                    </dd>

	                                    <dt><strong>Address </strong></dt>
	                                    <dd>
	                                       {{ Auth::buyer()->user()->address }}
	                                    </dd>

	                                    <dt><strong>You are a </strong></dt>
	                                    <dd>
	                                           @if (Auth::buyer()->user()->package_id == '4')
	                                       			Buyer
	                                       		@else
	                                       			Supplier
	                                       		@endif
	                                    </dd>

                                 </dl>
                              	</div><!-- end profile-edit -->

                              	<div class="profile-edit tab-pane fade" id="edit">

                                 	<h2 class="heading-md">Manage your Security Settings</h2>
                                 	<p>Manage Your Account</p>

                                 	<div class="clearfix"></div>

                                 	<form method="post" class="form-horizontal" action="/auth/profile/edit"
                                      enctype="multipart/form-data">
                                      {!! csrf_field() !!}

                                	<div class="row">

                                    	<div class="col-md-12">

                                        	<div class="box box-primary">

	                                            <div class="box-header with-border">
	                                                <h3 class="box-title">General Information</h3>
	                                            </div><!-- end box-header -->

                                            	<div class="box-body">

                                                	<div class="row">

                                                    	<div class="col-md-6">

	                                                        <div class="form-group {!! $errors->has('name') ? ' has-error' : '' !!}">
	                                                            <label>Name</label>
	                                                            {!! Form::text("name", Input::old("name", $buyer->name), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("name") }}</p>
	                                                        </div><!-- end form-group -->

                                                    	</div><!-- end col-md-6 -->

                                                    	<div class="col-md-6">

	                                                        <div class="form-group {!! $errors->has('company_name') ? ' has-error' : '' !!}">
	                                                            <label>Company Name</label>
	                                                            {!! Form::text("company_name", Input::old("company_name", $buyer->company_name), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("company_name") }}</p>
	                                                        </div><!-- end form-group -->

                                                    	</div><!-- end col-md-6 -->


	                                                    <div class="col-md-12">

	                                                        <div class="form-group {!! $errors->has('address') ? ' has-error' : '' !!}">
	                                                            <label>Address</label>
	                                                            {!! Form::text("address", Input::old("address", $buyer->address), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("address") }}</p>
	                                                        </div><!-- end form-group -->

	                                                    </div><!-- end col-md-12 -->

	                                                    <div class="col-md-12">

	                                                        <div class="form-group {!! $errors->has('brief_introduction') ? ' has-error' : '' !!}">
	                                                           <label>Brief Introduction</label>
	                                                            {!! Form::textArea("brief_introduction", Input::old("brief_introduction", $buyer->brief_introduction), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("brief_introduction") }}</p>
	                                                        </div><!-- end form-group -->

	                                                    </div><!-- end col-md-12 -->

	                                                    <div class="col-md-6">

	                                                        <div class="form-group {!! $errors->has('postal_code') ? ' has-error' : '' !!}">
	                                                            <label>Postal Code</label>
	                                                            {!! Form::text("postal_code", Input::old("postal_code", $buyer->postal_code), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("postal_code") }}</p>
	                                                        </div><!-- end form-group -->

	                                                    </div><!-- end col-md-6 -->

	                                                    <div class="col-md-6">

	                                                        <div class="form-group {!! $errors->has('contact_no') ? ' has-error' : '' !!}">
	                                                            <label>Contact Number</label>
	                                                            {!! Form::text("contact_no", Input::old("contact_no", $buyer->contact_no), ["class" => "form-control"]) !!}
	                                                            <p class="help-block">{{ $errors->first("contact_no") }}</p>
	                                                        </div><!-- end form-group -->

	                                                    </div><!-- end col-md-6 -->

                                                      <div class="col-md-12">

                                                          <div class="form-group {!! $errors->has('image') ? ' has-error' : '' !!}">
                                                              <label>Image</label>
                                                              <input id="fileID" name="image" type="file">
                                                              <p style="text-align: left;">File size should not be greater than 5 MB</p>
                                                              <p class="help-block">{{ $errors->first("contact_no") }}</p>
                                                          </div><!-- end form-group -->

                                                      </div><!-- end col-md-12 -->

                                                      <div class="col-md-12">
                                                        <div class="form-group {!! $errors->has('category_id') ? ' has-error' : '' !!}">
                                                            <label>Category:</label>
                                                            <select id="category_id" name="category_id" value= class="form-control">
                                                                    @foreach($category as $cat)
                                                                        <option name='category_id' value="{{$cat->id}}">{{$cat->service_category}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                        </div><!-- end form-group -->
                                                      </div><!-- end col-md-12 -->

                                                     	<div class="box-body">

			                                                <div class="form-group {!! $errors->has('email') ? ' has-error' : '' !!}">
			                                                    <label>Email</label>
			                                                    {!! Form::text("email", Input::old("email", $buyer->email), ["class" => "form-control", "disabled" => "disabled"]) !!}
			                                                    <p class="help-block">{{ $errors->first("email") }}</p>
			                                                </div><!-- end form-group -->

			                                                <div class="form-group {!! $errors->has('old_password') ? ' has-error' : '' !!}">
			                                                   <label>Old Password</label>
			                                                    {!! Form::password("old_password", ["class" => "form-control"]) !!}
			                                                    <p class="help-block">{{ $errors->first("old_password") }}</p>
			                                                </div><!-- end form-group -->

			                                                <div class="form-group {!! $errors->has('password') ? ' has-error' : '' !!}">
			                                                    <label>New Password</label>
			                                                    {!! Form::password("password", ["class" => "form-control"]) !!}
			                                                    <p class="text-muted">Enter a password if you wish to change.</p>
			                                                    <p class="help-block">{{ $errors->first("password") }}</p>
			                                                </div><!-- end form-group -->

			                                                <div class="form-group {!! $errors->has('re_password') ? ' has-error' : '' !!}">
			                                                    <label>Confirm Password</label>
			                                                    {!! Form::password("re_password", ["class" => "form-control"]) !!}
			                                                    <p class="help-block">{{ $errors->first("re_password") }}</p>
			                                                </div><!-- end form-group -->

                                            			</div><!-- end box-body -->

			                                            <div class="box-footer">
			                                                {!! Html::link(Route("buyer.auth.profile"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
			                                                {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
			                                            </div><!-- end box-footer -->

                                                	</div><!-- end row -->

                                            	</div><!-- end box-body -->
                                        	</div><!-- end box box-primary -->
                                    	</div><!-- end col-md-12 -->


                                	</div><!-- end row -->
                                	</form>

                              	</div><!-- end profile-edit tab-pane fade -->

                              	<div class="profile-edit tab-pane fade" id="payment">

                                 	<h2 class="heading-md">Manage your Package Settings</h2>
                                 	<p>Below are the payment options for your account.</p>
                                 	<br>

                                    {!! Form::open(array('url' => '/auth/profile/save')) !!}

                                    @if(count($current_plan))
                                      <dl class="dl-horizontal">
                                         <dt><strong>Current Plan</strong></dt>
                                         <dd>
                                            <p name="plan">{{ $current_plan[0]->subscription_package }}</p>
                                         </dd>

                                         <dt><strong>Plan Price </strong></dt>
                                         <dd>
                                            <p name="plan">{{ $current_plan[0]->subscription_price }}</p>
                                         </dd>

                                         <?php $date = $buyer['plan_expiration']; ?>
                                         <dt><strong>Plan Expiration </strong></dt>
                                         <dd>
                                            <p>{{ Carbon\Carbon::parse($date)->format('d M Y')  }}</p>
                                         </dd>

                                      </dl><!-- end dl-horizontal -->

                                    @else

                                      <dl class="dl-horizontal">
                                         <dt><strong>Current Plan</strong></dt>
                                         <dd>
                                            <p name="plan">Free</p>
                                         </dd>

                                         <dt><strong>Plan Price </strong></dt>
                                         <dd>
                                            <p name="plan">0.00</p>
                                         </dd>

                                         <dt><strong>Plan Expiration </strong></dt>
                                         <dd>
                                            <p>-</p>
                                         </dd>

                                      </dl><!-- end dl-horizontal -->

                                    @endif

                                    <div class="row">

                                       	<div class="col-sm-12 col-md-12 margin-bottom-20">

                                          	<label>Select Plan You Want To Change<span class="color-red">*</span></label>

                                          	<select id="package_id"  name='package_id' value={{ $buyer->package_id }} class="form-control">

                                             	@foreach($packages as $key=>$package)
                                                	<option name='package_id' value={{$package->id}}>{{$package->subscription_package}} (SGD {{ $package->subscription_price }})</option>
                                              	@endforeach

                                          	</select>

                                       	</div><!-- end col-sm-12 profile-edit tab-pane fade -->

                                    </div><!-- end row -->

                                    <button class="btn btn-sm btn-default" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>

                                 	{!! Form::close() !!}

                              	</div><!-- end profile-edit tab-pane fade -->

                              	<div class="profile-edit tab-pane fade" id="settings">

                                 	<h2 class="heading-md">Manage your Notifications.</h2>
                                 	<p>Below are the notifications you may manage.</p>
                                 	<br>

                                 	<form>

                                    <div class="skin-minimal">

                                       	<ul class="list">
                                          	<li>
                                             <input type="checkbox" id="minimal-checkbox-1">
                                             <label for="minimal-checkbox-1">Send me email notification when Ad is processed</label>
                                          	</li>
                                          	<li>
                                             <input type="checkbox" id="minimal-checkbox-2">
                                             <label for="minimal-checkbox-2">Send me email notification when user comment</label>
                                          	</li>
                                          	<li>
                                             <input type="checkbox" id="minimal-checkbox-3">
                                             <label for="minimal-checkbox-3">Send me email notification for the latest update</label>
                                          	</li>
                                          	<li>
                                             <input type="checkbox" id="minimal-checkbox-4">
                                             <label for="minimal-checkbox-4"> Receive our monthly newsletter</label>
                                          	</li>
                                          	<li>
                                             <input type="checkbox" id="minimal-checkbox-5">
                                             <label for="minimal-checkbox-5">Email notification</label>
                                          	</li>
                                       	</ul><!-- end list -->
                                    </div><!-- end skin-minimal -->

                                    <div class="button-group margin-top-20">
                                       <button class="btn btn-sm btn-default" type="button">Reset</button>
                                       <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                    </div><!-- end button-group -->

                                 	</form>

                              	</div><!-- end profile-edit tab-pane fade -->

                           </div><!-- end tab-content -->

    					</div><!-- end profile-tabs -->

    				</div><!-- end profile-section margin-bottom-20 -->

    			</div><!-- end col-md-8 col-sm-12 col-xs-12 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding grey -->

@endsection
