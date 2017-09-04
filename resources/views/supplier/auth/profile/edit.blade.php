@extends('supplier.layouts.main')
@section('content')
    {!! Form::open() !!}
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has('company_name') ? ' has-error' : '' !!}">
                                {!! Form::label("Company Name") !!}
                                {!! Form::text("company_name", Input::old("company_name", $supplier->company_name), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("company_name") }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has('contact_person') ? ' has-error' : '' !!}">
                                {!! Form::label("Contact Person") !!}
                                {!! Form::text("contact_person", Input::old("contact_person", $supplier->contact_person), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("contact_person") }}</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{!! $errors->has('address') ? ' has-error' : '' !!}">
                                {!! Form::label("Address") !!}
                                {!! Form::text("address", Input::old("address", $supplier->address), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("address") }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has('postal_code') ? ' has-error' : '' !!}">
                                {!! Form::label("postal_code") !!}
                                {!! Form::text("postal_code", Input::old("postal_code", $supplier->postal_code), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("postal_code") }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has('contact_no') ? ' has-error' : '' !!}">
                                {!! Form::label("contact_no") !!}
                                {!! Form::text("contact_no", Input::old("contact_no", $supplier->contact_no), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("contact_no") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Login Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
                        {!! Form::label("Email") !!}
                        {!! Form::text("email", Input::old("email", $supplier->email), ["class" => "form-control", "disabled" => "disabled"]) !!}
                        <p class="help-block">{{ $errors->first("email") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has('old_password') ? ' has-error' : '' !!}">
                        {!! Form::label("Old Password") !!}
                        {!! Form::password("old_password", ["class" => "form-control"]) !!}


                        <p class="help-block">{{ $errors->first("old_password") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
                        {!! Form::label("Password") !!}
                        {!! Form::password("password", ["class" => "form-control"]) !!}
                        <p class="text-muted">Enter a password if you wish to change.</p>
                        <p class="help-block">{{ $errors->first("password") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has('re_password') ? ' has-error' : '' !!}">
                        {!! Form::label("Re-Password") !!}
                        {!! Form::password("re_password", ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("re_password") }}</p>
                    </div>
                </div>

                <div class="box-footer">
                    {!! Html::link(Route("supplier.auth.profile"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection