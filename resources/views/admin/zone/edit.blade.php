@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.zone.update", $zone->id), "files" => true]) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("zone") ? " has-error" : "" !!}">
                                {!! Form::label("Zone") !!}
                                {!! Form::text("zone", Input::old("zone", $zone->zone), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("zone") }}</p>
                            </div>
                        </div>
                        </div>
                        
                      
                     <div class="row">
                        <div class="col-md-4">
                     <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $zone->allStatuses(), Input::old("status", $zone->status), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                     </div>
                     </div>
                     <div class="col-md-4">
                   


                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.zone.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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