@extends('admin.layouts.main')
@section('content')
    {!! Form::open() !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Email</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("enquiry_email") ? " has-error" : "" !!}">
                        {!! Form::label("Enquiry Email") !!}
                        {!! Form::text("enquiry_email", Input::old("enquiry_email", $setting->enquiry_email), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("enquiry_email") }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title">SMTP Setting</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("smtp_host") ? " has-error" : "" !!}">
                        {!! Form::label("Host Name") !!}
                        {!! Form::text("smtp_host", Input::old("smtp_host", $setting->smtp_host), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("smtp_host") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("smtp_user") ? " has-error" : "" !!}">
                        {!! Form::label("User Name / Email") !!}
                        {!! Form::text("smtp_user", Input::old("smtp_user", $setting->smtp_user), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("smtp_user") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("smtp_pass") ? " has-error" : "" !!}">
                        {!! Form::label("Password") !!}
                        {!! Form::text("smtp_pass", Input::old("smtp_pass", $setting->smtp_pass), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("smtp_pass") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("smtp_port") ? " has-error" : "" !!}">
                        {!! Form::label("Port") !!}
                        {!! Form::text("smtp_port", Input::old("smtp_port", $setting->smtp_port), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("smtp_port") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("encryption") ? " has-error" : "" !!}">
                        {!! Form::label("Encryption") !!}
                        {!! Form::select("encryption", ["" => "None", "ssl" => "ssl", "tls" => "tls"], Input::old("encryption", $setting->encryption), ["class" => "form-control", "autocomplete" => "off"]) !!}
                        <p class="help-block">{{ $errors->first("encryption") }}</p>
                    </div>
                </div>

                <div class="box-footer">
                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection