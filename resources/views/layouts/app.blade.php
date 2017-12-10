<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/articles.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.partials.nav')
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            @yield('content')
        </div>
        @include('layouts.partials.sidebar')
    </div>
</div>
@include('layouts.partials.footer')
</body>
</html>
