@extends('blog.layout.main')
@section('content')
    {{--<div id="banner" class="blog-banner">--}}
        {{--<h1>Products</h1>--}}
    {{--</div>--}}
    <div id="content" class="blog">
        @if ($posts->count() > 0)
            <div class="wrapper">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-6">
                            <div class="blog-content">
                                <div class="row inarow-2 nearby">
                                    <h2><a href="{{ route("blog.post.one", $post->slug) }}">{{ $post->name }}</a>
                                    </h2><br/>
                                    <img src="{{ $post->getFeaturedImageURL(600, 300) }}"/>
                                    {!! str_limit(strip_tags($post->content), 400) !!}
                                    <p class="date"><i class="fa fa-calendar"
                                                       aria-hidden="true"></i> {{ $post->created_at->format("M d, Y") }}
                                        <a style="float: right" href="{{ route("blog.post.one", $post->slug) }}">READ
                                            MORE </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="text-align: right">
                {!! $posts->render() !!}
            </div>
        @else
            <div style="text-align: center" class="wrapper">
                <h2>Nothing found</h2>
                <p>Sorry! There is nothing to display here.</p>
            </div>

        @endif

    </div>
@endsection