@extends('buyer.layouts.main404', [
        "page_title" => "Page Not Found",
        "meta_description" => "",
        "meta_keywords" => "",
        "page_sub_title" => "Sorry! The page you are looking for is currently unavailable or not found on the server.",
        "button" => false
    ])
@section('content')
    <div class="wrapper" style="text-align: center; padding: 50px 0">
        <h2>404 Page Not Found</h2><br />
        <p>You might want to check that URL again or head over to our <a href="{!! url() !!}">Homepage</a></p>
    </div>
@endsection