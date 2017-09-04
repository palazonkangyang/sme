@extends('frontend.layout.main')
@section('content')

    <div class="wrapper">
        <div class="search-box">
            {!! Form::open(["method" => "get"]) !!}
            <div class="row">
                <div class="col-4">
                    {!! Form::text("q", Input::get("q"), [ "placeholder" => "Keyword" ]) !!}
                </div>
                <div class="col-3">
                    {!! Form::select("food_type", $food_types, Input::get("food_type")) !!}
                </div>
                <div class="col-3">
                    {!! Form::select("location", $locations, Input::get("location")) !!}
                </div>
                <div class="col-2">
                    {!! Form::submit("Search") !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <h4 class="pos-r">{!! $page_title !!}</h4>


        @if ($foods->count() > 0)
            <div id="options" class="static-carousel">
                @foreach($foods as $food)
                    <div class='list-box item'>
                        <img src="{{ $food->getPictureURL(400, 229) }}" alt="{{ $food->name }}"/>
                        <div>
                            <h5>{{ $food->name }}</h5>
                            <p>{{ $food->description }}</p>
                        </div>
                        <div class="ingredients">
                            <h3>Ingredients</h3>
                            {{ $food->ingredients }}
                        </div>
                    </div>
                @endforeach
            </div>

            {!! $foods->appends([
                "q" => Input::get("q"),
                "food_type" => Input::get("food_type"),
                "location" => Input::get("location")
            ])->render() !!}
        @else
            <h3 style="text-align: center">Sorry! We could not found anything to display here.</h3>
            <br/>
        @endif

    </div>
@endsection