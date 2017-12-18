<a href="{{ url("articles/{$article->id}/edit") }}" class="btn btn-default">Edit</a>

<form action="{{ url("articles/" . $article->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-default">Delete</button>
</form>