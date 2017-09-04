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
        <a href=" {!! url(Request::path()) !!}"><strong>Supplier</strong></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <p class="login-box-msg">Recover Password</p>

        @if (Session::has("status"))
            <div class="alert alert-info">{{ Session::get("status") }}</div>
        @endif

        {!! Form::open()  !!}
        <div class="form-group has-feedback{!! $errors->has("email") ? " has-error" : "" !!}">
            {!! Form::email("email", Input::old('email'), [ "class" => "form-control", "placeholder" => "Your Email" ]) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <p class="help-block">{{ $errors->first("email") }}</p>
        </div>

        <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
            <!-- /.col -->
        </div>
        {!! Form::close() !!}
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
