@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="{{ url('categories/' . $category->id ) }}" method="POST">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="category">New Category:</label>
                <input type="text" class="form-control" id="category" name="name" value="{{ $category->name }}">
            </div>

            <button type="submit" id="update_category" class="btn btn-default" data-id="{{ $category->id }}">Update
            </button>

        </form>
    </div>
@endsection
@push('scripts')
<script src="/js/modules/category.js"></script>
@endpush