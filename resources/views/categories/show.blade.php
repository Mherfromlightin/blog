@extends('layouts.app')

@section('content')

    <h2>
        {{ $category->name }}
    </h2>

    @include('categories._buttons')

@endsection