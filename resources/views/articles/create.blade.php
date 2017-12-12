@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="{{ url('/articles') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="text" name="text"></textarea>
            </div>

            <select class="categories-multiple" name="categories[]" multiple="multiple">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>

       @include('layouts.partials.errors')
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.categories-multiple').select2();
        })
    </script>
@endsection()