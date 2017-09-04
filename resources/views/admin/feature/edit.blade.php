@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.feature.update", $feature->id), "files" => true]) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("feature") ? " has-error" : "" !!}">
                                {!! Form::label("Feature") !!}
                                {!! Form::text("feature", Input::old("feature", $feature->feature), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("feature") }}</p>
                            </div>
                        </div>
                        </div>
                        
                      
                     <div class="row">
                        <div class="col-md-4">
                     <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $feature->allStatuses(), Input::old("status", $feature->status), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                     </div>
                     </div>
                     <div class="col-md-4">
                   


                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.feature.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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