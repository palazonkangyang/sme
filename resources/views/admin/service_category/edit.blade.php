@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.service_category.update", $service_category->id), "files" => true]) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("service_category") ? " has-error" : "" !!}">
                                {!! Form::label("Service Category") !!}
                                {!! Form::text("service_category", Input::old("service_category", $service_category->service_category), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("service_category") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("parent_id") ? " has-error" : "" !!}">
                                {!! Form::label("Parent ") !!}
                                {!! Form::select("parent_id",$parents, Input::old("parent_id",$service_category->parent_id), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("parent_id") }}</p>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                     <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $service_category->allStatuses(), Input::old("status", $service_category->status), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                     </div>
                     </div>
                     <div class="col-md-4">
                     <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Picture</h3>
                    </div>

                    <div class="box-body">
                        @if (! empty($service_category->image))
                            <img src="{!! $service_category->getFeaturedImageURL() !!}" class="img-responsive"/>
                        @endif
                        <div class="form-group{!! $errors->has("image") ? " has-error" : "" !!}">
                            {!! Form::file("image") !!}
                            <p class="help-block">{{ $errors->first("image") }}</p>
                        </div>
                    </div>
                </div>


                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.service_category.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
                        {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                    </div>
                </div>
                </div>
                </div>
            </div>
           </div>
        </div>
    {!! Form::close() !!}
   
@endsection