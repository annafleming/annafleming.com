<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="web developer, portfolio, programmer" />
    <meta name="description" content="Web developer portfolio" />

    <title>Anna Fleming | Web developer</title>

    <link href="{{ asset('/css/adminAll.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
@if (Auth::check())
    @include('partials.adminPanel')
@endif
<body>
<header class="headerBlock">
    @include('partials.nav')
</header>
<main>
    @yield('content')
</main>

<footer class="headerBlock">
    @include('partials.nav')
</footer>


<!-- Scripts -->
<script src="{{ asset('/js/adminAll.js') }}"></script>
</body>
</html>