@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["url" => route("admin.industry.update", $industry->id), "files" => true]) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("industry") ? " has-error" : "" !!}">
                                {!! Form::label("Industry") !!}
                                {!! Form::text("industry", Input::old("industry", $industry->industry), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("industry") }}</p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                     <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $industry->allStatuses(), Input::old("status", $industry->status), ["class" => "form-control"]) !!}
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
                        @if (! empty($industry->image))
                            <img src="{!! $industry->getFeaturedImageURL() !!}" class="img-responsive"/>
                        @endif
                        <div class="form-group{!! $errors->has("image") ? " has-error" : "" !!}">
                            {!! Form::file("image") !!}
                            <p class="help-block">{{ $errors->first("image") }}</p>
                        </div>
                    </div>
                </div>


                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.industry.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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