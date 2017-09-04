@extends('frontend.layout.main')
@section('content')

    <div class="wrapper">
        <h1>What <span>they say</span></h1>
        <p class="aligncenter">Experienced the Makan Bus? Tell us (and the world!) all about it.</p>
    </div>

    <div id="testimonials">
        <div class="wrapper">
            <div class="testimonials-content row inarow-2">
                @if ($testimonials->count()> 0)
                    @foreach($testimonials as $testimonial)
                        <div class="col-6">
                            @if(! empty($testimonial->author_image))
                                <img src="{{ Image::url("testimonial/{$testimonial->author_image}", 168, 173, ["crop"]) }}"
                                     alt="{{ $testimonial->author }}"/>
                            @endif
                            <div>
                                <p><strong>{{ $testimonial->author }}</strong>, {{ $testimonial->country->name }}</p>
                                <p>{!! str_limit(e($testimonial->content), 90, " <a id='read-more' data-content='" . e($testimonial->content) . "' href='#'>Read More</a>") !!}</p>
                                <div class="star-{{ $testimonial->rating }}"></div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="testimonials-form no-label">

                @if($info = Session::get("info"))
                    <div class="success-message">{{ $info }}</div>
                @endif

                {!! Form::open(["files" => TRUE]) !!}
                <div class="row">
                    <div class="col-6">
                        {!! Form::text("author", null, ["placeholder" => "Your Name"]) !!}
                        {!! $errors->first("author", "<p class='form-error'>:message</p>") !!}
                    </div>
                    <div class="col-6">
                        {!! Form::select("country_id", $countries, null) !!}
                        {!! $errors->first("country_id", "<p class='form-error'>:message</p>") !!}
                    </div>
                </div>

                {!! Form::textarea("content", null, ["placeholder" => "Testimonial Details"]) !!}
                {!! $errors->first("content", "<p class='form-error'>:message</p>") !!}
                <div class="aligncenter">
                    <div class="rating">
                        <div class="dis-ib">Rating :</div>
                        <div class="star" style="display: inline-block !important;" id="rateme"></div>
                        {!! Form::hidden("rating", null, ["id" => "rating"]) !!}
                        {!! $errors->first("rating", "<p class='form-error'>:message</p>") !!}
                    </div>

                    <div class="upload-btn-box" style="display: inline-block">
                        <div class="upload-image">upload image{!! Form::file("author_image") !!}</div>
                        <span class="form-error" id=files></span>
                    </div>


                    {!! $errors->first("author_image", "<p class='form-error'>:message</p>") !!}
                </div>
                <div class="aligncenter">
                    <input name="" value="Submit" type="submit">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div id="testimonial_popup"></div>

    <script>
        $(function () {
            $("#rateme").rateYo({
                ratedFill: "#6FAE3F",
                starWidth: "22px",
                fullStar: true,
                rating: 5,
                onInit: function (rating, rateYoInstance) {
                    $("#rating").val(rating);
                },
                onSet: function (rating, rateYoInstance) {
                    $("#rating").val(rating);
                }
            });

            $("a#read-more").on("click", function () {
                $('#testimonial_popup').popup({
                    pageContainer: ".popup-content",

                });

                $('#testimonial_popup')
                        .html("<a href='#' style='float: right; font-size: 14pt; color: #333; line-height: .5' class='close_popup'>&times;</a><div class='clearfix'></div>" + $(this)
                                        .attr("data-content"))
                        .popup("show");

                $("a.close_popup").unbind("click").on("click", function () {
                    $('#testimonial_popup').popup("hide");
                    return false;
                });

                return false;
            });
        });
    </script>
@endsection