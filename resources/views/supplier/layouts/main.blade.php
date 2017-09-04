<!DOCTYPE html>
<html>
<head>
    @include('supplier.layouts.partial.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('supplier.layouts.partial.header')
<!-- Left side column. contains the logo and sidebar -->
@include('supplier.layouts.partial.nav')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title }}
                <small>{!! $page_sub_title !!}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('supplier.layouts.partial.alert')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.1
        </div>
        <strong>Copyright &copy; {!! date("Y") !!}.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! url("bootstrap/js/bootstrap.min.js") !!}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--<script src="{!! url("plugins/morris/morris.min.js") !!}"></script>-->
<!-- Sparkline -->
<script src="{!! url("plugins/sparkline/jquery.sparkline.min.js") !!}"></script>
<!-- jvectormap -->
<script src="{!! url("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") !!}"></script>
<script src="{!! url("plugins/jvectormap/jquery-jvectormap-world-mill-en.js") !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! url("plugins/knob/jquery.knob.js") !!}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{!! url("plugins/daterangepicker/daterangepicker.js") !!}"></script>
<!-- datepicker -->
<script src="{!! url("plugins/datepicker/bootstrap-datepicker.js") !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! url("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") !!}"></script>
<!-- Slimscroll -->
<script src="{!! url("plugins/slimScroll/jquery.slimscroll.min.js") !!}"></script>
<!-- FastClick -->
<script src="{!! url("plugins/fastclick/fastclick.js") !!}"></script>
<!-- supplierLTE App -->
<script src="{!! url("dist/js/app.min.js") !!}"></script>
<!-- supplierLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{!! url("dist/js/pages/dashboard.js") !!}"></script>-->

@if (Auth::supplier()->user()->first_login_attempt == 1)
    {!! Form::open(["id" => "change_password"]) !!}
    <div class="modal fade change-password-modal" tabindex="-1" role="dialog" aria-labelledby="Change Password"
         data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-sm" role="Change Password">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="Change Password">Change Password</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label("New Password") !!}
                        {!! Form::password("password", ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("Re-Password") !!}
                        {!! Form::password("re_password", ["class" => "form-control"]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default pull-left" type="button">No, Thanks!</button>
                    <button class="btn btn-primary" type="submit">Change Now</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <script>
        $(function () {

            $(".change-password-modal").modal("show");
            $(".change-password-modal").on("hide.bs.modal", function () {
                $.post("{!! route("supplier.auth.profile.change.login_attempt") !!}", {
                    _token: "{!! Session::token() !!}"
                });
            });

            $("form#change_password").on("submit", function (e) {
                e.preventDefault();

                var form = $(this);
                var button = form.find("button:submit");
                var buttonText = button.html();
                var processText = "Processing ..";

                button.html(processText).attr("disabled", "disabled");

                $.ajax({
                    url: "{!! route("supplier.auth.profile.change.password") !!}",
                    data: form.serialize(),
                    type: "post",
                    dataType: "json",
                    success: function (responseText) {
                        button.html(buttonText).removeAttr("disabled", "disabled");
                        if (responseText.success == true) {
                            window.location.reload();
                        }
                    },
                    error: function (xhr, ajaxOption, thrownError) {
                        button.html(buttonText).removeAttr("disabled", "disabled");

                        if (xhr.status == 422) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                var inputElement = form.find("[name=" + key + "]");

                                inputElement.closest(".form-group")
                                        .addClass("has-error");
                                if (inputElement.next("p.help-block").length < 1) inputElement.after("<p class='help-block'></p>");
                                inputElement.next("p.help-block").html(value[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endif

<script>
    $(function () {
        $("a.delete-confirm").on("click", function () {
            return confirm("You are about to delete an item. Are you sure want to continue?");
        });

        /* Menu Active */

        $("ul.sidebar-menu li.active").each(function () {
            $(this).closest(".treeview").addClass("active");
            $(this).closest(".treeview-menu").addClass("active").closest("li").addClass("active");
        });
    });
</script>
</body>
</html>
