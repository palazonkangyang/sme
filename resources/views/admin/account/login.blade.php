<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $meta_title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href=" {!! url("bootstrap/css/bootstrap.min.css") !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {!! url('dist/css/AdminLTE.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href=" {!! url('plugins/iCheck/square/blue.css')  !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=" {!! url(Request::path()) !!}">{!! Config::SITE_NAME !!}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <p class="login-box-msg">Sign in to start your session</p>

        @if (Session::has("loginError"))
            <div class="alert alert-danger">{{ Session::get("loginError") }}</div>
        @endif

        {!! Form::open()  !!}
        <div class="form-group has-feedback{!! $errors->has("email") ? " has-error" : "" !!}">
            {!! Form::email("email", Input::old('email'), [ "class" => "form-control", "placeholder" => "Your Email" ]) !!}
            
            <p class="help-block">{{ $errors->first("email") }}</p>
        </div>
        <div class="form-group has-feedback{!! $errors->has("password") ? " has-error" : "" !!}">
            {!! Form::password("password", [ "class" => "form-control", "placeholder" => "Password" ]) !!}
           
            <p class="help-block">{{ $errors->first("password") }}</p>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {!! Form::checkbox("remember_token")  !!} Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        {!! Form::close() !!}
        <a href="{!! route("admin.account.password.forget") !!}">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="{!! url("plugins/jQuery/jQuery-2.2.0.min.js") !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! url("bootstrap/js/bootstrap.min.js") !!}"></script>
<!-- iCheck -->
<script src="{!! url("plugins/iCheck/icheck.min.js") !!}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
