@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="{{ url('articles/ '. $article->id ) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ ($article->title) }}">
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea  class="form-control" id="text" name="text">{{ ($article->text) }}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        })
    </script>
@endsection()