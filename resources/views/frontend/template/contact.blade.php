@extends('frontend.layout.main')
@section('content')
    <div class="wrapper">
        {!! $page_content !!}
        <div class="row contact">
            <div class="col-7">
                {!! Form::open(["id" => "contact_form"]) !!}
                <div class="row">
                    <div class="col-6">
                        {!! Form::text("first_name", NULL, ["placeholder" => "First Name"]) !!}
                    </div>
                    <div class="col-6">
                        {!! Form::text("last_name", NULL, ["placeholder" => "Last Name"]) !!}
                    </div>
                </div>

                {!! Form::text("email", NULL, ["placeholder" => "Your Email"]) !!}
                {!! Form::text("contact_no", NULL, ["placeholder" => "Contact No"]) !!}
                {!! Form::textarea("message", NULL, ["placeholder" => "Message"]) !!}

                <br/><br/>

                <div id="recaptcha2"></div>
                <div id="response"></div>

                <div class="clearfix"></div>

                {!! Form::submit("Submit") !!}
                {!! Form::close() !!}
            </div>
            <div class="col-1"></div>
            <div class="col-4 address">
                <div>
                    <h5><span>Qucik Contact</span></h5><br>
                    <div>
                        <div class='pull-lefts'><img src="{{ url("frontend/images/icon1.png") }}" alt=""></div>
                        <div class='pull-lefts'>Ticketing Booth: Orchard<br>Gateway 277 Orchard Rd,<br>238858
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class='pull-lefts'><img src="{{ url("frontend/images/icon1.png") }}" alt=""></div>
                        <div class='pull-lefts'>Head Office: 138 Towner Road<br/>
                            Singapore 327822<br/>
                            Office Hours: 9:00am – 6:00pm<br><br>
                        </div>

                        </p><br><br>
                        <p><img src="{{ url("frontend/images/icon2.png") }}" alt="">+65 6295 1815</p><br>
                        <p><img src="{{ url("frontend/images/icon3.png") }}" alt=""><a
                                    href="mailto:info@meguideu.com">info@meguideu.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1fTKpkxl2CDGotcE7jjE651csQR8" width="100%" height="400"
                frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <br>

    <script type="text/javascript">

        $(document).ready(function () {
            new FormHandler("#contact_form", function () {
                grecaptcha.reset(recaptcha2);
            }, function () {
                grecaptcha.reset(recaptcha2);
            });
        });

    </script>
@endsection