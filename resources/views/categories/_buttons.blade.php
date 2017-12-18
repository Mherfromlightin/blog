<a href="{{ url("categories/{$category->id}/edit") }}" class="btn btn-default">Edit</a>
<form action="{{ url("categories/" . $category->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit">Delete</button>
</form>