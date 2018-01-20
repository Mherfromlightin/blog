@extends('layouts.app')
<div class="container">
    <div class="row">

        @section('content')
            <div class="container">
                <div class="slider">
                    <img alt="jpg" class="slide imgPrev">
                    <img alt="jpg" class="slide imgActive">
                    <img alt="jpg" class="slide imgNext">
                </div>
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
        @endsection

    </div>
</div>
@push('scripts')
<script src="/js/modules/carousel.js"></script>
@endpush

@push('style')
<link rel="stylesheet" href="/css/carousel.css">
@endpush