<a href="{{ url("articles/{$article->id}/edit") }}" class="btn btn-default">Edit</a>

<form action="{{ url("articles/" . $article->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button id="delete_article" type="submit" class="btn btn-default" data-id={{ "$article->id" }}>Delete</button>
</form>
@push('scripts')
<script src="/js/modules/article.js"></script>
@endpush


