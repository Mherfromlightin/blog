@extends('layouts.app')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="{{ url('categories/' . $category->id ) }}" method="POST">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="category">New Category:</label>
                <input type="text" class="form-control" value="" id="category" name="name">
            </div>

            <button type="submit" class="btn btn-default">Update</button>

        </form>
    </div>
@endsection