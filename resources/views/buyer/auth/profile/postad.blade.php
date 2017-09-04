@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">
        <div class="container">
            <div class="breadcrumb-link">

                <ul>
                  <li><a href="{{ route('buyer.index') }}">Home</a></li>
                    <li ><a href="{{ route('buyer.auth.profile.edit') }}">Profile</a></li>
                  <li  class="active"><a href="#">Post Ads</a></li>
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
	    					<h2 class="heading-md">Add New Post Adv</h2>
	                        <p>Manage Your Account</p>
	                        <div class="clearfix"></div>
	    				</div><!-- end tab-content -->

    				</div><!-- end profile-edit -->

                    <form method="post" class="form-horizontal" action="/auth/profile/postad/save" enctype="multipart/form-data">
                        {!! csrf_field() !!}

    				<div class="row">

                        <div class="col-md-12">
                            <div class="box box-primary">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Post Information</h3>
                                </div><!-- end box-header -->

                                <div class="box-body" style="padding: 0 20px">
                                        
                                    <div class="form-group {!! $errors->has('title') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Post Title:</label>
                                        <div class="col-md-10">
                                            {!! Form::text("title", null, ["class" => "form-control"]) !!}
                                        </div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group -->

                                    <div class="form-group {!! $errors->has('title') ? ' has-error' : '' !!}">
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

                                    <div class="form-group {!! $errors->has('email') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Email:</label>
                                        <div class="col-md-10">
                                            {!! Form::text("email", null, ["class" => "form-control"]) !!}
                                        </div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group -->

                                    <div class="form-group {!! $errors->has('phone') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Phone:</label>
                                        <div class="col-md-10">
                                            {!! Form::text("phone", null, ["class" => "form-control"]) !!}
                                        </div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group -->

                                    <div class="form-group {!! $errors->has('location') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Location:</label>
                                        <div class="col-md-10">
                                            {!! Form::text("location", null, ["class" => "form-control"]) !!}
                                        </div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group -->

                                    <div class="form-group {!! $errors->has('image') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Image:</label>
                                        <div class="col-md-10">
                                            <input id="fileID" name="image" type="file">
                                        </div>
                                        <div class="col-md-10"><p style="text-align: left;">File size should not be greater than 5 MB</p></div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group -->

                                    <div class="form-group {!! $errors->has('description') ? ' has-error' : '' !!}">
                                        <label class="col-md-2 control-label">Description:</label>
                                        <div class="col-md-10">
                                            {!! Form::textarea("description", null, ["class" => "form-control ckeditor"]) !!}
                                        </div>
                                        <p class="help-block"></p>
                                    </div><!-- end form-group --> 

                                    <div class="form-group wrap-zone">
                                        <label class="col-md-2 control-label">Multiple upload:</label>
                                        <div class="col-md-10 dropzone" id="fileUpload">
                                            <div class="dz-message" data-dz-message><span>Drop files here <br/>or Click to Upload</span>
                                            </div>
                                        </div>
                                        <div class="err-file"></div>
                                    </div><!-- end form-group -->

                                    <div class="clear-left">
                                        <div class="file-list"></div>
                                    </div><!-- end clear-left -->               

                                </div><!-- end box-body -->

                                <div class="box-footer" style="overflow: hidden; padding: 0 20px;">
                                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                                    {!! Html::link(Route("buyer.auth.profile"), "Cancel", ["class" => "btn btn-default pull-right"]) !!}
                                </div><!-- end box-footer -->

                            </div><!-- end box box-primary -->

                        </div><!-- end col-md-12 -->

                    </div><!-- end row -->

                    </form><!-- end form -->

    			</div><!-- end col-md-8 -->

    		</div><!-- end row -->

    	</div><!-- end container -->

    </section><!-- end section-padding grey -->

@stop

@section('custom-css')

    <link rel="stylesheet" href="{{ URL::asset('packages/dropzone/dist/min/basic.min.css') }}"/>

@stop


@section('custom-js')
    
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{ URL::asset('packages/dropzone/dist/dropzone.js') }}"></script>

    <script type="text/javascript">

        Dropzone.autoDiscover = false;

            var baseUrl = "{{ url('/') }}";
            var token = "{{ Session::getToken() }}";
            var AppFile = new Dropzone("div#fileUpload", {
                url: baseUrl + "/auth/file/uploadFiles",
                params: {
                    _token: token
                }
            });

            Dropzone.options.AppFile = {
                paramName: "file", // The name that will be used to transfer the file
                addRemoveLinks: true,
            };

            AppFile.on("error", function (file, done) {
                console.log(file);
            });

            AppFile.on("addedfile", function (file, done) {
                var removeButton = Dropzone.createElement('<div class="remove-x"><button>Remove</button></div>');
                var _this = this;
                var name = file.name;

                if (this.files.length) {
                    var _i, _len;
                    for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) // -1 to exclude current file
                    {
                        if (this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                            this.removeFile(file);
                        }
                    }
                }

                removeButton.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    _this.removeFile(file);

                    filrem = $('.file-list input[data-file-name="' + name + '"]').val();
                    filinput = $('.file-list input[data-file-name="' + name + '"]').parent().remove();

                    $.ajax({
                        type: 'GET',
                        url: '/auth/file/removeFiles/' + filrem,
                        dataType: 'html',
                        success: function (data) {
                            console.log(data);
                        },
                    });

                });
                file.previewElement.appendChild(removeButton);
            });

            AppFile.on("success", function (file, responseText) {
                var _ref;

                if (responseText.errors) {
                    var errormsg = responseText.errors.file;

                    this.removeFile(this.files);
                    $('.err-file > span').remove();
                    $('.err-file').append('<span class="alert alert-danger">' + errormsg + '<span>');
                    setTimeout(function () {
                        $('.err-file > span').remove();
                    }, 6000);

                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }

                if (responseText.status) {
                    $('.file-list').append('<div class="filesperline"><input data-file-name="' + responseText.file_name + '" type="hidden" name="fileurl[]" value="' + responseText.file_url + '" /> <input data-file-name="' + responseText.file_name + '" type="hidden" name="filename[]" value="' + responseText.file_name + '" /> <input data-file-name="' + responseText.file_name + '" type="hidden" name="mimetype[]" value="' + responseText.mimetype + '" /></div>');
                }
                else {

                    this.removeFile(this.files);
                    $('.err-file > span').remove();
                    $('.err-file').append('<span class="alert alert-danger">Error. Size is too big to upload! Limit size: 3MB<span>');
                    setTimeout(function () {
                        $('.err-file > span').remove();
                    }, 6000);
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            });
            
    </script>
@stop