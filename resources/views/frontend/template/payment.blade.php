@extends('frontend.layout.main')
@section('content')
    <div class="wrapper">
        <h1>Payment</h1>

        {!! Form::open([
            "url" => Route("frontend.payment.process", 1)
        ]) !!}
        <div id="booking" class="no-label">
            <h5><strong>Payment Information</strong></h5>
            <label><strong>Tickets</strong></label>

            <h5>Total Payable amount ${!! $total_cost !!}</h5>

            <hr/>

            @if($response = Session::get("paymentError"))
                <p class="form-error">{{ $response["message"] }}</p>
            @endif

            <div class="row">
                <div class="col-6">
                    {!! Form::select("cart_type", [
                    "" => "Select",
                    "mastercard" => "Master Card",
                    "visa" => "Visa",
                    "discover" => "Discover",
                    "amex" => "Amex",
                    "jcb" => "JCB"
                    ], Input::old("cart_type")) !!}

                    {!! $errors->first("cart_type", "<p class='form-error'>:message</p>") !!}
                </div>

                <div class="col-6">
                    {!! Form::text("card_number", Input::old("card_number"), [ "placeholder" => "Card Number", "id" => "card_number", "autocomplete" => "off" ]) !!}
                    {!! $errors->first("card_number", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    {!! Form::text("cvv", Input::old("cvv"), [ "placeholder" => "CVV", "id" => "card_number", "autocomplete" => "off" ]) !!}
                    {!! $errors->first("cvv", "<p class='form-error'>:message</p>") !!}
                </div>

                <div class="col-6">

                    <div class="row">
                        <div class="col-6">
                            {!! Form::selectMonth("expiration_month", Input::old("expiration_month"), [ "placeholder" => "Expiration Month", "id" => "card_expiration_month", "autocomplete" => "off" ]) !!}
                            {!! $errors->first("expiration_month", "<p class='form-error'>:message</p>") !!}
                        </div>

                        <div class="col-6">
                            {!! Form::selectRange("expiration_year", date("Y"), date("Y")+100, Input::old("expiration_year"), [ "placeholder" => "Expiration Year", "id" => "card_expiration_year", "autocomplete" => "off" ]) !!}
                            {!! $errors->first("expiration_year", "<p class='form-error'>:message</p>") !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="aligncenter">
            {!! Form::submit("Submit") !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection