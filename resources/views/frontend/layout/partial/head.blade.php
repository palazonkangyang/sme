<title>{{ (!empty($meta_title) ? $meta_title : ($page_title .  " - " . strip_tags(Config::SITE_NAME)))  }}</title>
<meta charset="utf-8">
<meta name="author" content="">
<meta name="keywords" content="{{ $meta_keywords }}">
<meta name="description" content="{{ $meta_description }}">
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<link rel="shortcut icon" href="{{ url("frontend/images/favicon.png") }}"/>
<link rel="shortcut icon" href="{{ url("frontend/images/favicon.ico") }}"/>
<link rel="apple-touch-icon" href="{{ url("frontend/images/favicon.png") }}"/>
<link rel="apple-touch-icon-precomposed" href="{{ url("frontend/images/favicon.png") }}"/>
<link rel="stylesheet" href="{{ url("frontend/css/colorbox.css") }}" type="text/css"/>
<link rel="stylesheet" href="{{ url("frontend/css/style.css") }}" type="text/css"/>
<link rel="stylesheet" href="{{ url("frontend/css/lightgallery.min.css") }}" type="text/css"/>
<link rel="stylesheet" href="{!! url("frontend/css/bootstrap-datepicker.min.css") !!}" type="text/css"/>
<link rel="stylesheet" href="{!! url("frontend/css/owl.carousel.css") !!}" type="text/css"/>
<link rel="stylesheet" href="{!! url("frontend/css/jquery.rateyo.min.css") !!}" type="text/css"/>
<link rel="stylesheet" href="{{ url("frontend/css/main.css") }}" type="text/css"/>

<script type="text/javascript">var baseUrl = '{!! url() !!}';</script>
<script type="text/javascript" src="{!! url("frontend/js/CreateHTML5Elements.js") !!}"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script src="{!! url("frontend/js/bootstrap-datepicker.min.js") !!}"></script>
<script src="{!! url("frontend/js/config.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/printThis.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/jquery.colorbox-min.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/jquery.form.min.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/jquery.rateyo.min.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/lightgallery.min.js") !!}" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=loadCaptcha&render=explicit" async defer></script>
<script src="{!! url("frontend/js/jquery.popupoverlay.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/owl.carousel.min.js") !!}" type="text/javascript"></script>
<script src="{!! url("frontend/js/app.js") !!}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#navbtn').click(function () {
            $('ul.nav-menu').animate({height: 'toggle'}, 300);
        });

        $('#photo-gallery').lightGallery({
            download: false
        });
    });

    $(document).ready(function () {
        if ($(window).width() < 740) {
            $(".menu-item-has-children > a").click(function () {
                $(this).next("ul").animate({height: 'toggle'});
                return false;
            });
        }

        if ($(window).width() < 740) {
            $(".inline").colorbox({inline: true, width: "94%"});
        }
        else {
            $(".inline").colorbox({inline: true, width: "40%"});
        }
    });

    var recaptcha1;
    var recaptcha2;

    var loadCaptcha = function () {
        try {
            recaptcha1 = grecaptcha.render('recaptcha1', {
                'sitekey': '{!! config("app.recaptcha.site_key") !!}', //Replace this with your Site key
                'theme': 'light'
            });

            recaptcha2 = grecaptcha.render('recaptcha2', {
                'sitekey': '{!! config("app.recaptcha.site_key") !!}', //Replace this with your Site key
                'theme': 'light'
            });
        }
        catch (ex) {
            console.log(ex.toString());
        }
    };
</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-81871345-1', 'auto');
    ga('send', 'pageview');
</script>