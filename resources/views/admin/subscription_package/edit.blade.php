@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.subscription_package.update", $subscription_package->id), "files" => true]) !!}
  <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("subscription_package") ? " has-error" : "" !!}">
                                {!! Form::label("Subscription Package Name") !!}
                                {!! Form::text("subscription_package", Input::old("subscription_package", $subscription_package->subscription_package), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("subscription_package") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("subscription_price") ? " has-error" : "" !!}">
                                {!! Form::label("Subscription Price") !!}
                                {!! Form::text("subscription_price", Input::old("subscription_price",$subscription_package->subscription_price), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("subscription_price") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("options") ? " has-error" : "" !!}">
                                {!! Form::label("Features") !!}

                                 @foreach($features as $key=>$feature)
                                   @if(in_array($key, $options))
                                    <input type="checkbox" checked="checked" id={{$key}} name="options[]" value={{$key}}> {{$feature}}
                                    @else
                                    <input type="checkbox" id={{$key}} name="options[]" value={{$key}}> {{$feature}}
                                    @endif
                                @endforeach
                                <p class="help-block">{{ $errors->first("options") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $subscription_package->allStatuses(), Input::old("status",$subscription_package->status), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                    </div>
                     </div>
                        
                     <div class="col-md-4">
                     

                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.subscription_package.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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