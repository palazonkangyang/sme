@extends('frontend.layout.main')
@section('content')

    {{--@if (\Carbon\Carbon::now() > \Carbon\Carbon::parse(\Carbon\Carbon::now()->format("Y-m-d 10:00:00")) && \Carbon\Carbon::now() < \Carbon\Carbon::parse(\Carbon\Carbon::now()->format("Y-m-d 21:00:00"))) :--}}

    <div class="wrapper">
        <div style="height: 540px" id="map"></div>
    </div>
    <script>

        var infoWindows = [];

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: {
                    lat: 1.365362,
                    lng: 103.820388
                }
            });


            @if($food_stores)
                    @foreach ($food_stores as $food_store)
            (new google.maps.Marker({
                position: {
                    lat: {{ $food_store->lat }},
                    lng: {{ $food_store->long }}
                },
                map: map,
                icon: '{{ $food_store->getIconURL() }}',
                title: '{{ $food_store->name }}',
                animation: google.maps.Animation.DROP
            }))
                    .addListener("click", function () {
                        closeInfoWindows();
                        var infoWindow = (new google.maps.InfoWindow({
                            content: '{{ $food_store->name }}'
                        }));

                        infoWindow.open(map, this);
                        infoWindows.push(infoWindow);
                    });
            @endforeach
                    @endif

                    @if($bus_stops)
                    @foreach ($bus_stops as $bus_stop)
            (new google.maps.Marker({
                position: {
                    lat: {{ $bus_stop->lat }},
                    lng: {{ $bus_stop->long }}
                },
                map: map,
                icon: '{{ $bus_stop->getIconURL() }}',
                title: '{{ $bus_stop->name }}',
                animation: google.maps.Animation.DROP
            }))
                    .addListener("click", function () {
                        closeInfoWindows();

                        var infoWindow = (new google.maps.InfoWindow({
                            content: '{{ $bus_stop->name }}'
                        }));

                        infoWindow.open(map, this);
                        infoWindows.push(infoWindow);
                    });
            @endforeach
                    @endif

                    new Buses(map);

            /* Store users location */

            var flag = true;
            var userMarker = null;

            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(function (location) {

                    if (flag) {
                        map.setCenter({
                            lat: parseFloat(location.coords.latitude),
                            lng: parseFloat(location.coords.longitude),
                        });

                        userMarker = new google.maps.Marker({
                            position: {
                                lat: location.coords.latitude,
                                lng: location.coords.longitude
                            },
                            map: map,
                            icon: '{{ url("frontend/images/icon.png") }}',
                            title: 'You are here',
                            animation: google.maps.Animation.DROP
                        });

                        flag = false;
                    }

                    userMarker.setPosition({
                        lat: location.coords.latitude,
                        lng: location.coords.longitude
                    })
                });
            }
        }

        var Buses = (function () {

            function Buses(map) {
                this.map = map;
                this.markers = [];
                this.xhr = null;


                var _this = this;

                setInterval(function () {

                    if (_this.xhr !== null) {
                        return;
                    }

                    _this.setBusLocation();
                }, 5000);

                _this.setBusLocation();
            }

            Buses.prototype.setBusLocation = function () {

                var _this = this;

                this.xhr = $.ajax({
                    url: "{{ route("frontend.bus.locations") }}",
                    dataType: "json",
                    success: function (res) {

                        if (typeof res.success !== "undefined" && res.success === false) {
                            $("#map").slideUp();
                            return;
                        }

                        if (_this.markers.length < 1 || res.length != _this.markers.length) {
                            _this.addMarkers(res);
                        }
                        else {
                            for (var index in res) {
                                _this.markers[index].setPosition({
                                    lat: parseFloat(res[index].lat),
                                    lng: parseFloat(res[index].long),
                                });
                            }
                        }
                        _this.xhr = null;

                    },
                    error: function (xhr, ajaxOption, thrownError) {
                        _this.xhr = null;
                        console.log(thrownError);
                    }
                });
            };

            Buses.prototype.addMarkers = function (res) {

                if (this.markers.length > 0) {
                    for (var i = 0; i < this.markers.length; ++i) {
                        this.markers[i].setMap(null);
                    }
                }
                var _this = this;


//                this.map.setCenter({
//                    lat: parseFloat(res[0].lat),
//                    lng: parseFloat(res[0].long),
//                });

                var infoWindow = [];

                for (var index in res) {


                    var marker = (new google.maps.Marker({
                        position: {
                            lat: parseFloat(res[index].lat),
                            lng: parseFloat(res[index].long),
                        },
                        map: _this.map,
                        icon: res[index].icon,
                        title: res[index].name,
                    }));

                    marker.addListener("click", function () {
                        var _this = this;

                        closeInfoWindows();

                        var infoWindow = (new google.maps.InfoWindow({
                            content: _this.title
                        }));

                        infoWindow.open(_this.map, this);
                        infoWindows.push(infoWindow);
                    });

                    _this.markers[index] = marker;
                }
            };
            return Buses;
        })();

        function closeInfoWindows() {
            for (var i = 0; i < infoWindows.length; ++i) {
                infoWindows[i].close();
            }
        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5ljgOlm08BvsS5zP6Ye-3qEJiO834r5w&callback=initMap">
    </script>

    {{--@else--}}
    {{--<p>The tracking of bus only available when 11am- 9pm</p>--}}
    {{--@endif--}}
@endsection