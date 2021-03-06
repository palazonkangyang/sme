@extends('supplier.layouts.main')
@section('content')
    {!! Form::open(["route" => "supplier.collection.product.store"]) !!}

    <div class="row">
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Location Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("location_id") ? " has-error" : "" !!}">
                        {!! Form::label("Location") !!}
                        {!! Form::select("location_id", $locations, Input::old("location_id"), ["class" => "form-control"]) !!}
                        {!! Form::hidden("booking_id", $ticket->ticket_id) !!}
                        {!! Form::hidden("product_id", $ticket->product_id) !!}
                        <p class="help-block">{{ $errors->first("location_id") }}</p>
                    </div>

                    <div class="form-group{!! $errors->has("remark") ? " has-error" : "" !!}">
                        {!! Form::label("Remark") !!}
                        {!! Form::textarea("remark", Input::old("remark"), ["class" => "form-control", "rows" => 6]) !!}
                        <p class="help-block">{{ $errors->first("remark") }}</p>
                    </div>
                </div>

                <div class="box-footer">
                    {!! Html::link(Route("supplier.collection.product.all"), "Cancel", ["class" => "btn btn-default pull-left"]) !!}
                    {!! Form::submit("Save", [ "class" => "btn btn-info pull-right" ]) !!}
                </div>

            </div>
        </div>

        <div class="col-md-5">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Information</h3>
                </div>

                <div class="box-body">
                    @if ($ticket->getProduct->getURL())
                        <img class="img-responsive" src="{!! $ticket->getProduct->getURL() !!}"/>
                        <hr/>
                    @endif

                    <strong>Product</strong>
                    <p class="text-muted">{!! $ticket->getProduct->name !!}</p>
                    <hr/>
                    <strong>Qty</strong>
                    <p class="text-muted">{!! $ticket->product_qty !!}</p>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection