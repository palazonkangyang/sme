@extends('admin.layouts.main')
@section('content')

    {!! Form::open() !!}

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">General Information</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has("first_name") ? " has-error" : "" !!}">
                                {!! Form::label("First Name") !!}
                                {!! Form::text("first_name", Input::old("first_name", $user->first_name), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("first_name") }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{!! $errors->has("last_name") ? " has-error" : "" !!}">
                                {!! Form::label("Last Name") !!}
                                {!! Form::text("last_name", Input::old("last_name", $user->last_name), ["class" => "form-control"]) !!}
                                <p class="help-block">{{ $errors->first("last_name") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Login Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("email") ? " has-error" : "" !!}">
                        {!! Form::label("Email") !!}
                        {!! Form::text("email", Input::old("email", $user->email), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("email") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("password") ? " has-error" : "" !!}">
                        {!! Form::label("Password") !!}
                        {!! Form::password("password", ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("password") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("re_password") ? " has-error" : "" !!}">
                        {!! Form::label("Re-Password") !!}
                        {!! Form::password("re_password", ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("re_password") }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Additional Information</h3>
                </div>

                <div class="box-body">
                    @if($user->role == 0)
                        <p>
                            <strong>Role</strong>
                            Super Admin
                        </p>
                        <hr/>
                        <p>
                            <strong>Status</strong>
                            Active
                        </p>
                    @else
                        <div class="form-group{!! $errors->has("role") ? " has-error" : "" !!}">
                            {!! Form::label("User Role") !!}
                            {!! Form::select("role", ["" => "Select:"] + $user->getRoleTypes(), Input::old("role", $user->role), ["class" => "form-control"]) !!}
                            <p class="help-block">{{ $errors->first("role") }}</p>
                        </div>

                        <div class="form-group{!! $errors->has("status") ? " has-error" : "" !!}">
                            {!! Form::label("User Status") !!}
                            {!! Form::select("status", ["" => "Select:"] + $user->getStatuses(), Input::old("status", $user->status), ["class" => "form-control"]) !!}
                            <p class="help-block">{{ $errors->first("status") }}</p>
                        </div>
                    @endif
                </div>

                <div class="box-footer">
                    {!! Html::link(Route("admin.account.profile", [$user->id]), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection