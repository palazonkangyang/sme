@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["route" => "admin.country.store", "files" => true]) !!}
  <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("country_name") ? " has-error" : "" !!}">
                                {!! Form::label("Country Name") !!}
                                {!! Form::text("country_name", Input::old("country_name"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("country_name") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("country_code") ? " has-error" : "" !!}">
                                {!! Form::label("Country Code") !!}
                                {!! Form::text("country_code", Input::old("country_code"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("country_code") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("zone_id") ? " has-error" : "" !!}">
                                {!! Form::label("Zone") !!}
                                {!! Form::select("zone_id",$zones, Input::old("zone_id"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("zone_id") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $country->allStatuses(), Input::old("status",'1'), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                    </div>
                     </div>
                        
                     <div class="col-md-4">
                    

                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.country.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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