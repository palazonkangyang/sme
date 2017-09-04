@extends('buyer.layouts.main')
@section('content')
	
	<div class="page-header-area">

      	<div class="container">

         	<div class="row">

            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	               	<div class="header-page">
	                  	<h1>Supplier Profile</h1>
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
               <li><a class="active" href="#">Supplier Profile</a></li>
            </ul>
         </div><!-- end breadcrumb-link -->

      </div><!-- end container -->

   	</div><!-- end small-breadcrumb -->

   	<section class="section-padding gray">

   		<div class="container">

    		<div class="row">

    			<div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                     
			        <div class="user-profile">
			            <img src="{{ URL::asset('uploads/user_photos/'. $supplier->user_photo) }}" alt="Supplier Profile">
			                        
			            <div class="profile-detail">

			                <h6>{{ $supplier->name }}</h6>

			                <ul class="contact-details">
			                    <li>
			                        <i class="fa fa-map-marker"></i> {{ $supplier->address }}
			                    </li>
			                    <li>
			                        <i class="fa fa-briefcase"></i> {{ $supplier->company_name }}
			                    </li>
			                    <li>
			                        <i class="fa fa-envelope"></i> {{ $supplier->email }}
			                    </li>
			                    <li>
			                        <i class="fa fa-phone"></i>  {{ $supplier->contact_no }}
			                    </li>
			                </ul>
			                            
			            </div><!-- end profile-detail -->

			        </div><!-- end user-profile -->
			                     
			    </div><!-- end col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar -->

			    <div class="col-md-8 col-sm-12 col-xs-12">

			    	<div class="profile-section margin-bottom-20">

			    		<div class="profile-tabs">

			    			<div class="tab-content">

			    				<div class="profile-edit tab-pane fade in active" id="profile">

                                	<h2 class="heading-md">Supplier Information</h2>
                                 	
                                 	<dl class="dl-horizontal">
                                    	<dt><strong>Supplier Name </strong></dt>
	                                    <dd>
	                                       	{{ $supplier->name }}
	                                    </dd>

	                                    <dt><strong>Company Name </strong></dt>
	                                    <dd>
	                                       	{{ $supplier->company_name }}
	                                    </dd>

	                                    <dt><strong>Email Address </strong></dt>
	                                    <dd>
	                                       	{{ $supplier->email }}
	                                    </dd>

	                                    <dt><strong>Phone Number </strong></dt>
	                                    <dd>
	                                      	{{ $supplier->contact_no }}
	                                    </dd>

	                                    <dt><strong>Category </strong></dt>
	                                    <dd>
	                                      	{{ $supplier->category_name }}
	                                    </dd>

	                                    <dt><strong>Address </strong></dt>
	                                    <dd>
	                                      	{{ $supplier->address }}
	                                    </dd>
                                 	</dl>

                              	</div><!-- end profile-edit -->

			    			</div><!-- end tab-content -->

			    		</div><!-- emd profile-tabs -->

			    	</div><!-- end profile-section margin-bottom-20 -->

			    </div><!-- end col-md-8 col-sm-12 col-xs-12 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

   	</section><!-- end section-padding gray -->

@stop