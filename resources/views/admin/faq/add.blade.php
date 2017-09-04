@extends('admin.layouts.main')
@section('content')

    {!! Form::open(["route" => "admin.faq.store", "files" => true]) !!}
  <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("question") ? " has-error" : "" !!}">
                                {!! Form::label("Question") !!}
                                {!! Form::text("question", Input::old("question"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("question") }}</p>
                            </div>
                        </div>
                        </div>
                         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{!! $errors->has("description") ? " has-error" : "" !!}">
                                {!! Form::label("Description") !!}
                                {!! Form::textArea("description", Input::old("description"), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("description") }}</p>
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                        {!! Form::label("Status") !!}
                        {!! Form::select("status", ["" => "Select:"] + $faq->allStatuses(), Input::old("status",'1'), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("status") }}</p>
                    </div>
                    </div>
                     </div>
                        
                     <div class="col-md-4">
                    

                <div class="box box-success">

                    <div class="box-footer">
                        {!! Html::link(Route("admin.faq.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
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