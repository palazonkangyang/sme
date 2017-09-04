@extends('blog.layout.main')
@section('content')
    <div id="banner" class="blog-banner">
        <h1>Blog</h1>
    </div>
    <div id="content" class="blog">

        @if ($categories->count() > 0)
            <div class="wrapper">
                @foreach($categories as $category)
                    <div class="blog-content">
                        <div class="row inarow-2 nearby">
                            <div class="col-4">
                                <img src="{{ $category->getFeaturedImageURL(400, 300) }}">
                            </div>
                            <div class="col-8">
                                <h2><a href="{{ url("blog/{$category->slug}") }}">{{ $category->name }}</a></h2>
                                {!! $category->content !!}
                                <p class="date"><i class="fa fa-calendar"
                                                   aria-hidden="true"></i> {{ $category->created_at->format("M d, Y") }}
                                </p>
                                <a href="{{ url("blog/{$category->slug}") }}" class="btn-blog">View all</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <div style="text-align: right">
                {!! $categories->render() !!}
            </div>
        @else
            <div style="text-align: center" class="wrapper">
                <h2>Nothing found</h2>
                <p>Sorry! There is nothing to display here.</p>
            </div>
        @endif

    </div>
@endsection