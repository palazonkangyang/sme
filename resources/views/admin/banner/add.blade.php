@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["route" => "admin.banner.store", "files" => true]) !!}
  <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("banner_name") ? " has-error" : "" !!}">
                                {!! Form::label("Banner Name") !!}
                                {!! Form::text("banner_name", Input::old("banner_name"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("banner_name") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("period") ? " has-error" : "" !!}">
                                {!! Form::label("Banner Period(in Days)") !!}
                                {!! Form::text("period", Input::old("period"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("period") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("image") ? " has-error" : "" !!}">
                            {!! Form::file("image") !!}
                            <p class="help-block">{{ $errors->first("image") }}</p>
                        </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $banner->allStatuses(), Input::old("status",'1'), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                    </div>
                     </div>
                     <div class="col-md-4">
                    

                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.banner.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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