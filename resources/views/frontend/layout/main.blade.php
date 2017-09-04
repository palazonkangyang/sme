<!DOCTYPE HTML>
<html>
<head>
    @include('frontend.layout.partial.head')
</head>
<body>
<header>
    @include('frontend.layout.partial.header')
</header>

@include('frontend.layout.partial.banner')

<div id="content">
    @yield("content")
</div>
<footer>
    @include('frontend.layout.partial.footer')
</footer>
<div id="power">
    <div class="wrapper">&copy; copyright <?php echo date("Y") ?> MeGuideU Pte Ltd.</div>
</div>
</body>
</html>
