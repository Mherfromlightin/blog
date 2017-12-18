@extends('layouts.app')

@section('content')

    <div class="col-sm-8 blog-main">

        @foreach($categories as $category)
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="{{ url('/categories/' . $category->id) }}">{{ $category->name }}</a>
                </h2>
            </div>
        @endforeach

    </div>

@endsection