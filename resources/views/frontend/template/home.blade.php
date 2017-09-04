@extends('frontend.layout.main')
@section('content')
    <div id="content">
        <h1> Why ride with Makan Bus?</h1>
        <p class="aligncenter">What better way to explore a country than in the shoes of a local? The Makan Bus brings
            you
            interesting sights and flavorful eats – like a true, blue Singaporean!
        </p>
        <div class="dish row">
            <div class="col-4"><img src="{{ url("frontend/images/local_food.png") }}" class="img-responsive" alt="">
                <h3>Local Food</h3>
                <p>Eating is Singapore’s national pastime and with a wide array of cuisines available, you’ll be spoilt
                    for choice! Indian for breakfast, Chinese for lunch and Malay for tea – why not?</p></div>
            <div class="col-4"><img src="{{ url("frontend/images/heartlands.png") }}" alt="">
                <h3>Singapore Heartlands</h3>
                <p>Beyond the glitz and glam of the city, experience the Singapore heartlands of our unique
                    neighbourhoods and our way of life.</p></div>
            <div class="col-4"><img src="{{ url("frontend/images/interest.png") }}" alt="">
                <h3>Places of Interest</h3>
                <p>From temples to nature trails and national monuments, we’ve got it all covered!</p></div>
        </div>
    </div>
    <div class="booking">
        <div class="wrapper">
            <h2>Ticketing</h2>
            <h6>Try a uniquely Singaporean experience with Makan Bus today!</h6>
            <h6>Tickets are selling at S$28</h6>
            <a class="readmore" href="{!! route('frontend.ticketing')!!}">BOOK NOW</a>
        </div>
    </div>

    <div class="wrapper">
        <h2>A NEW WAY OF EATING</h2><!--<h6>Lorem ipsum dolor sit amet consectetur adipiscing elit.</h6>-->
        <p>The Makan Bus redefines eating in Singapore. These iconic stalls and dishes on the route have been specially
            handpicked by us to reflect the true taste of Singapore!
        </p>
        <p>Below are some local dishes which you can find in our route! With over 20 local delights to try from, prepare
            yourself for a food journey like never before!
        </p>

        @if($foods->count() > 0)
            <div id="options" class="carousel">
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
        @endif
    </div>
    </div>
@endsection