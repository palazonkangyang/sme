 <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
         <footer>
            <!-- Footer Content -->
            <div class="footer-top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Info Widget -->
                        <div class="widget">
                           <div class="logo"> <img alt="" src={!! url("adforest/images/logo-1.png")!!}> </div>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dolor eget erat fringilla port.</p>
                           <ul>
                              <li><img src="{!! url("adforest/images/appstore.png") !!}" alt=""></li>
                              <li><img src="{!! url("adforest/images/googleplay.png") !!}" alt=""></li>
                           </ul>
                        </div>
                        <!-- Info Widget Exit -->
                     </div>
                     <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Follow Us -->
                        <div class="widget socail-icons">
                           <h5>Follow Us</h5>
                           <ul>
                              <li><a class="fb" href=""><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
                              <li><a class="twitter" href=""><i class="fa fa-twitter"></i></a><span>Twitter</span></li>
                              <li><a class="linkedin" href=""><i class="fa fa-linkedin"></i></a><span>Linkedin</span></li>
                              <li><a class="googleplus" href=""><i class="fa fa-google-plus"></i></a><span>Google+</span></li>
                           </ul>
                        </div>
                        <!-- Follow Us End -->
                     </div>
                     <div class="col-md-6  col-sm-6 col-xs-12">
                        <!-- Newslatter -->
                        <div class="widget widget-newsletter">
                           <h5>Signup for Weekly Newsletter</h5>
                           <div class="fieldset">
                              <p>We may send you information about related events, webinars, products and services which we believe.</p>
                              <form>
                                 <input class="" value="Enter your email address" type="text">
                                 <input class="submit-btn" name="submit" value="Submit" type="submit"> 
                              </form>
                           </div>
                        </div>
                        <!-- Newslatter -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- Copyrights -->
            <div class="copyrights">
               <div class="container">
                  <div class="copyright-content">
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <p>Copyright 2017 © SME Consult Hub All Rights Reserved </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- ./wrapper -->


<script src="{!! url("adforest/js/jquery.min.js") !!}"></script>
      <!-- Bootstrap Core Css  -->
      <script src="{!! url("adforest/js/bootstrap.min.js") !!}"></script>
      <!-- Jquery Easing -->
      <script src="{!! url("adforest/js/easing.js") !!}"></script>
      <!-- Menu Hover  -->
      <script src="{!! url("adforest/js/forest-megamenu.js") !!}"></script>
      <!-- Jquery Appear Plugin -->
      <script src="{!! url("adforest/js/jquery.appear.min.js") !!}"></script>
      <!-- Numbers Animation   -->
      <script src="{!! url("adforest/js/jquery.countTo.js") !!}"></script>
      <!-- Jquery Smooth Scroll  -->
      <script src="{!! url("adforest/js/jquery.smoothscroll.js") !!}"></script>
      <!-- Jquery Select Options  -->
      <script src="{!! url("adforest/js/select2.min.js") !!}"></script>
      <!-- noUiSlider -->
      <script src="{!! url("adforest/js/nouislider.all.min.js") !!}"></script>
      <!-- Carousel Slider  -->
      <script src="{!! url("adforest/js/carousel.min.js") !!}"></script>
      <script src="{!! url("adforest/js/slide.js") !!}"></script>
      <!-- Image Loaded  -->
      <script src="{!! url("adforest/js/imagesloaded.js") !!}"></script>
      <script src="{!! url("adforest/js/isotope.min.js") !!}"></script>
      <!-- CheckBoxes  -->
      <script src="{!! url("adforest/js/icheck.min.js") !!}"></script>
      <!-- Jquery Migration  -->
      <script src="{!! url("adforest/js/jquery-migrate.min.js") !!}"></script>
      <!-- Sticky Bar  -->
      <script src="{!! url("adforest/js/theia-sticky-sidebar.js") !!}"></script>
      <!-- Style Switcher -->
      <script src="{!! url("adforest/js/color-switcher.js") !!}"></script>
      <!-- Template Core JS -->
      <script src="{!! url("adforest/js/custom.js") !!}"></script>
    
        <!-- MasterSlider --> 
      <script src="{!! url("adforest/js/masterslider/masterslider.min.js") !!}"></script>
      <script type="text/javascript">  
         (function($) {
           "use strict";   
                var slider = new MasterSlider();
         
                // adds Arrows navigation control to the slider.
                slider.control('arrows');
                slider.control('timebar' , {insertTo:'#masterslider'});
                slider.control('bullets');
         
                 slider.setup('masterslider' , {
                     width:1400,    // slider standard width
                     height:470,   // slider standard height
                     space:1,
                     layout:'fullwidth',
                     loop:true,
                     preload:0,
                     instantStartLayers:true,
                     autoplay:true
                });
         })(jQuery);
         </script> 
@if(Auth::buyer()->user())
@if (Auth::buyer()->user()->first_login_attempt == 1)
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
@endif
    <script>
        $(function () {

            $(".change-password-modal").modal("show");
            $(".change-password-modal").on("hide.bs.modal", function () {
                $.post("{!! route("buyer.auth.profile.change.login_attempt") !!}", {
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
                    url: "{!! route("buyer.auth.profile.change.password") !!}",
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