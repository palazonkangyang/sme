@extends('frontend.layout.main')
@section('content')
    <div class="wrapper">
        <h1>The <span>SME Community</span></h1>
        <p class="aligncenter">Because good food is meant to be shared.</p>

        <h4 class="pos-r">Inside Stories <a class="upload inline" href="#inline_content">Upload Image</a></h4>

        <div id="photo-gallery" class="row inarow-4 gallery">
            @if ($gallery_images->count() > 0)
                @foreach($gallery_images as $gallery_image)
                    <div class="col-3" href="{!! Image::url("photo-gallery/{$gallery_image->file}", 700, 700) !!}"
                         data-sub-html="<h4>{{ $gallery_image->name }}</h4><p>{{ $gallery_image->description }}</p>">
                        <img src="{{ Image::url("photo-gallery/{$gallery_image->file}", 300, 262, ["crop"]) }}"
                             alt="">
                        <div class="author-date">
                            <div>{{ $gallery_image->name }}</div>
                            <div>{!! $gallery_image->created_at->format("d.m.Y") !!}</div>
                        </div>

                        <p>{!! str_limit(e($gallery_image->description), 70, " <a id='read-more' data-content='" . e($gallery_image->description) . "' href='#'>Read More</a>") !!}</p>
                    </div>
                @endforeach
            @endif
        </div>

        @if (count($instagram_feeds["data"]) > 0)
            <h4 class="pos-r">Follow us @SME on Instagram</h4>
            <div class="row inarow-4 gallery">
                @foreach($instagram_feeds["data"] as $feed)

                    <div class="col-3">
                        <img src="{{ str_replace("http://", "https://", $feed['images']['standard_resolution']['url']) }}" alt="">
                        <div class="author-date">
                            <div><a target="_blank" href="{!! $feed["link"] !!}"></a></div>
                            <div>
                                <a target="_blank" href="{!! $feed["link"] !!}">{{ date("d.m.Y", $feed['caption']['created_time']) }}</a>
                            </div>
                        </div>
                        <p>{{ $feed['caption']['text'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="hidden">
        <div id='inline_content'>
            <div class="no-label upload-content">
                {!! Form::open(["files" => true, "id" => "gallery_upload", "url" => Route("frontend.gallery.upload")]) !!}

                <div id="response" class="form-error"></div>

                {!! Form::text("name", null, ["placeholder" => "Name"]) !!}
                {!! Form::textarea("description", null, ["placeholder" => "Details"]) !!}

                <div class="upload-btn-box">
                    <div class="upload-image">upload
                        image{!! Form::file("files[]", ["max" => 5, "accept" => "image/*", "multiple" => "multiple", "data-max-uploads" => 5]) !!}
                    </div>
                    <span class="form-error" id=files></span>
                </div>


                <br class="clear">
                <input name="" value="submit" class="red" type="submit">
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div id="gallery_popup"></div>

    <script type="text/javascript">
        $(document).ready(function () {
            new FormHandler("#gallery_upload");

            $("a#read-more").on("click", function () {
                $('#gallery_popup').popup({
                    pageContainer: ".popup-content",

                });

                $('#gallery_popup')
                        .html("<a href='#' style='float: right; font-size: 14pt; color: #333; line-height: .5' class='close_popup'>&times;</a><div class='clearfix'></div>" + $(this)
                                        .attr("data-content"))
                        .popup("show");

                $("a.close_popup").unbind("click").on("click", function () {
                    $('#gallery_popup').popup("hide");
                    return false;
                });

                return false;
            });
        });
    </script>
@endsection