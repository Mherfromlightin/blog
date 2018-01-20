@extends('layouts.app')

@push('style')
<link rel="stylesheet" href="/css/map.css">
@endpush

@section('content')
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <input id="lat" type="text">
    <input id="long" type="text">
@endsection

@push('scripts')
<script src="/js/modules/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl5S-umB6UmpTor9owhd0ETQBugeeqJLg&libraries=places&callback=initAutocomplete"
        async defer></script>
@endpush