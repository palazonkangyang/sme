<div id="banner">
    <img src="{{ ! empty($bannerUrl) ? $bannerUrl : url("frontend/images/slider-home.jpg") }}" alt="">
    <div>
        <h1>{{ $page_title }}</h1>
        <p>{!! $page_sub_title !!}</p>
        @if ($button)
            <a class="more" href="{!! url($button) !!}">Learn More</a>
        @endif
    </div>
</div>