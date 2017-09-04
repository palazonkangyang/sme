@extends('frontend.layout.main')
@section('content')
    <div class="wrapper">
        {!! $page_content !!}
        @if($locations->count())
            <div class="clear"></div>
            <h4>See & Do</h4>
            <div class="row inarow-3 nearby">

                @foreach($locations as $location)
                    <div class="col-4">
                        <img src="{!! $location->getURL() !!}" alt="{{ $location->title }}" class="aboutus-img">
                        <h5><strong>{{ $location->title }}</strong></h5>
                        <p>{{ $location->description }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection