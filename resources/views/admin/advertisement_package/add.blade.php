@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["route" => "admin.advertisement_package.store"]) !!}
  <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("advertisement_package") ? " has-error" : "" !!}">
                                {!! Form::label("Advertisement Package Name") !!}
                                {!! Form::text("advertisement_package", Input::old("advertisement_package"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("advertisement_package") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("advertisement_price") ? " has-error" : "" !!}">
                                {!! Form::label("Advertisement Price") !!}
                                {!! Form::text("advertisement_price", Input::old("advertisement_price"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("advertisement_price") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("options") ? " has-error" : "" !!}">
                                {!! Form::label("Features") !!}
                              @foreach($features as $key=>$feature)
                                <input type="checkbox" id={{$key}} name="options[]" value={{$key}}> {{$feature}}
                              @endforeach
                                <p class="help-block">{{ $errors->first("options") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $advertisement_package->allStatuses(), Input::old("status",'1'), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                    </div>
                     </div>
                        
                     <div class="col-md-4">
                     

                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.advertisement_package.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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