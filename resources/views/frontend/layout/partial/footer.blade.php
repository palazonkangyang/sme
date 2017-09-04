<div class="wrapper">
    <div class="footer"><h2>Be Social</h2>
        <div class="social"><a target="_blank" href="https://www.facebook.com/Makan-Bus-1022897851087524/"><img
                        src="{{ url("frontend/images/facebook.jpg") }}" alt=""></a>
            <a target="_blank" href="https://twitter.com/makan_bus"><img src="{{ url("frontend/images/twitter.jpg") }}"
                                                                         alt=""></a>
            <a target="_blank" href="https://www.instagram.com/SME"><img
                        src="{{ url("frontend/images/Instagram.png") }}" alt=""></a>
        </div>


        <p>Ticketing Booth:<br/>orchardgateway<br/>277 Orchard Rd,<br/>Singapore 238858<br/><br/>

            Head Office: 138 Towner Road<br/>
            Singapore 327822<br/><br/>

            Phone: +65 6295 1815<br/>
            Email: info@SME.com<br/>
            Office Hours: 9:00am – 6:00pm
    </div>
    <div class="footer"><h2>Navigate</h2>
        <ul>
            <li>{!! Config::getPageLink(1) !!}</li>
            <li>{!! Config::getPageLink(2) !!}</li>
            <li>{!! Config::getPageLink(5) !!}</li>
            <li>{!! Config::getPageLink(11) !!}</li>
            <li>{!! Config::getPageLink(10) !!}</li>
            <li>{!! Config::getPageLink(6) !!}</li>
            <li>{!! Config::getPageLink(7) !!}</li>
            <li>{!! Config::getPageLink(8) !!}</li>
            <li>{!! Config::getPageLink(9) !!}</li>
            <li>{!! Config::getPageLink(4) !!}</li>
            <li>{!! Config::getPageLink(3) !!}</li>

        </ul>
    </div>
    <div class="footer no-label">
        <h2>Write to Us</h2>

       
        {!! Form::text("name", NULL, ["placeholder" => "Your Name"]) !!}
        {!! Form::text("email", NULL, ["placeholder" => "Your Email"]) !!}
        {!! Form::textarea("message", NULL, ["placeholder" => "Message"]) !!}

        <div style="transform: scale(0.86); margin-left: -20px" id="recaptcha1"></div>


        <div id="response"></div>
        <div class="clearfix"></div>

        {!! Form::submit("Send") !!}

        {!! Form::close() !!}
    </div>
    <div class="footer"><h2>About</h2>
        <p>Makan Bus is brought to you by<br/>

            MeGuideU Pte Ltd <br/>
            Travel agent licence: 02821

        <div class="clearfix"></div>

        <img class="img-responsive" src="{{ url("frontend/images/logo-me-guide.png") }}" alt="MeGuideU"/>


        <br/><br/>A member of Ovenbaked Ideas</p>
        <p><strong>Held in:</strong></p>
        <a target="_blank" href="http://www.yoursingapore.com/">
            <img class="img-responsive" src="{{ url("frontend/images/logo-footer.png") }}" alt="Your Singapore"/>
        </a>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        new FormHandler("#get_in_touch", function () {
            grecaptcha.reset(recaptcha1);
        }, function () {
            grecaptcha.reset(recaptcha1);
        });
    });

</script>