@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1> Articles of {{ $category->name }}</h1>

        @foreach($articles as $article)
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="{{ url('/articles/' . $article->id) }}">{{ $article->title }}</a>
                </h2>
                <p class="blog-post-meta">
                <p>{{ $article->text }}</p>
            </div>
        @endforeach
    </div>
@endsection