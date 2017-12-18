<ul class="list-group">
    @foreach($comments as $comment)
        <li class="list-group-item">
            {{ $comment->body }}
        </li>
    @endforeach
</ul>

<form action="{{url("articles/{$article->id}/comments")}}" method="POST">
    {{ csrf_field() }}
    <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
    <button type="submit" class="btn btn-default">Add comment</button>
</form>