@extends('layouts.app')

@section('content')

    <div class="col-sm-8 blog-main">
    @foreach($articles as $article)
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="{{ url('/articles/' . $article->id) }}">{{ $article->title }}</a>
                </h2>

                <p>by {{ $article->user->name }}</p>
                @foreach($article->tags as $tag)
                    <li>
                        <a href="{{ url('/articles/tags/' . $tag->name) }}" >{{ $tag->name }}</a>
                    </li>
                @endforeach
                <p class="blog-post-meta">
                <p>{{ $article->text }}</p>
                @foreach($article->categories as $category)
                    <a href="{{ url('/categories/category') }}">{{ $category->name }}</a>
                @endforeach

            </div>
        @endforeach
    </div>
    @if(auth()->check())
        @include('layouts.partials.sidebar')
    @endif
@endsection