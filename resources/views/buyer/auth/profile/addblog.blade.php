@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route('buyer.index') }}">Home</a></li>
                  <li><a class="active" href="#">Blog</a></li>
               </ul>
            </div><!-- end breadcrumb-link -->

        </div><!-- end container -->

    </div><!-- end small-breadcrumb -->

    <section class="section-padding gray">

    	<div class="container">

    		<div class="row">
    			
    			@include('buyer.auth.partial.sidebar')

    			<div class="col-md-8">

    				<div class="profile-edit" id="edit">

    					<div class="tab-content">
	    					<h2 class="heading-md">Add New Blog</h2>
	                        <p>Manage Blog</p>
	                        <div class="clearfix"></div>
	    				</div><!-- end tab-content -->

    				</div><!-- end profile-edit -->

    				<form method="post" class="form-horizontal" action="/auth/profile/blog/save" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="row">

                        	<div class="col-md-12">

                        		<div class="box box-primary">

                        			<div class="box-header with-border">
	                                    <h3 class="box-title">Blog Information</h3>
	                                </div><!-- end box-header -->

	                                <div class="box-body" style="padding: 0 20px">

	                                	<div class="form-group {!! $errors->has('blog_title') ? ' has-error' : '' !!}">
	                                        <label class="col-md-2 control-label">Blog Title:</label>
	                                        <div class="col-md-10">
	                                            {!! Form::text("blog_title", null, ["class" => "form-control"]) !!}
	                                        </div>
	                                        <p class="help-block"></p>
	                                    </div><!-- end form-group -->

	                                    <div class="form-group {!! $errors->has('category_id') ? ' has-error' : '' !!}">
	                                        <label class="col-md-2 control-label">Category:</label>
	                                        <div class="col-md-10">
	                                           <select id="category_id" name="category_id" value= class="form-control">
	                                                @foreach($category as $cat)
	                                                    <option name='category_id' value="{{$cat->id}}">{{$cat->service_category}}
	                                                    </option>
	                                                @endforeach
	                                            </select>
	                                        </div>
	                                        <p class="help-block"></p>
	                                    </div><!-- end form-group -->

	                                    <div class="form-group {!! $errors->has('blog_image') ? ' has-error' : '' !!}">
	                                        <label class="col-md-2 control-label">Blog Image:</label>
	                                        <div class="col-md-10">
	                                            <input id="fileID" name="blog_image" type="file">
	                                        </div>
	                                        <div class="col-md-10"><p style="text-align: left;">File size should not be greater than 5 MB</p></div>
	                                        <p class="help-block"></p>
	                                    </div><!-- end form-group -->

	                                    <div class="form-group {!! $errors->has('blog_description') ? ' has-error' : '' !!}">
	                                        <label class="col-md-2 control-label">Blog Description:</label>
	                                        <div class="col-md-10">
	                                            {!! Form::textarea("blog_description", null, ["class" => "form-control ckeditor"]) !!}
	                                        </div>
	                                        <p class="help-block"></p>
	                                    </div><!-- end form-group --> 

	                                </div><!-- end box-body -->

	                                <div class="box-footer" style="overflow: hidden; padding: 0 20px;">
	                                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
	                                    {!! Html::link(Route("buyer.auth.profile"), "Cancel", ["class" => "btn btn-default pull-right"]) !!}
	                                </div><!-- end box-footer -->

                        		</div><!-- end box box-primary -->

                        	</div><!-- end col-md-12 -->

                        </div><!-- end row -->

                    </form>

    			</div><!-- end col-md-8 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding gray -->

@stop

@section('custom-css')

    <link rel="stylesheet" href="{{ URL::asset('packages/dropzone/dist/min/basic.min.css') }}"/>

@stop


@section('custom-js')
    
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

@stop