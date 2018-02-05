@extends('layouts.app')

@push('style')
<link rel="stylesheet" href="/css/dataTables.min.css">
@endpush
<div class="container">
    <div class="row">

        @section('content')
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Created_at</th>
                    <th>All Text</th>
                    <th>Delete Text</th>
                </tr>
                </thead>

                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}  </td>
                        <td class="text">{{ $article->text }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td><a class="btn btn-success" href="{{ url('/articles/' . $article->id) }}">Go to</a>
                        <td>
                            <button type="button" class="btn btn-danger remove-article" data-id={{ $article->id }}>
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Created_at</th>
                    <th>All Text</th>
                    <th>Delete Text</th>
                </tr>
                </tfoot>

            </table>
        @endsection
    </div>
</div>

@push('scripts')
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/modules/articlesTable.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "order": [[2, "desc"]],
            "pageLength": 33,
            "lengthMenu": [[10, 25, 33, 50, -1], [10, 25, 33, 50, "All"]],
            "columns": [
                null,
                {
                    "orderable": false,
                    "width": "500px"
                },
                null,
                null,
                null
            ]
        });
    });
</script>
@endpush