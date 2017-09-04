@extends('admin.layouts.main')
@section('content')
    <div class="box box-primary">
        {!! Form::open() !!}
        <div class="box-body">
            <div class="form-group{!! $errors->has("ticket_price") ? " has-error" : "" !!}">
                {!! Form::label("Ticket Price") !!}
                {!! Form::text("ticket_price", Input::old("ticket_price", $setting->ticket_price), ["class" => "form-control", "autocomplete" => "off"]) !!}
                <p class="help-block">{{ $errors->first("ticket_price") }}</p>
            </div>

            <div class="form-group{!! $errors->has("ticket_unavailable") ? " has-error" : "" !!}">
                {!! Form::label("Ticket Unavailable Dates") !!}
                {!! Form::text("ticket_unavailable", Input::old("ticket_unavailable", implode(",", $setting->ticket_unavailable)), ["class" => "form-control datepicker", "autocomplete" => "off"]) !!}
                <p class="help-block">{{ $errors->first("ticket_unavailable") }}</p>
            </div>
        </div>

        <div class="box-footer">
            {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <script>
        $(function () {
            $(".datepicker").datepicker({
                multidate: true,
                format: "dd-mm-yyyy"
            });
        });
    </script>
@endsection