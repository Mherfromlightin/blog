@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <div class="panel">
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->text }}</p>
        </div>

        @include('articles._buttons')

        @include('articles._comments')
    </div>
@endsection