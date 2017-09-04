@extends('blog.layout.main')
@section('content')
    {{--<div id="banner" class="blog-banner">--}}
        {{--<h1>{{ $post->name }}</h1>--}}
    {{--</div>--}}
    <div id="content">
        <div class="wrapper">
            <div class="blog-full">
                <p><i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->created_at->format("M d, Y") }}</p>
                {!! $post->content !!}
            </div>
        </div>
    </div>
@endsection