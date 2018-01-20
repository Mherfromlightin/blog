$(document).ready(function () {
    $('#create_article').click(function (event) {
        event.preventDefault();

        var data = {
            'title': $('#title').val(),
            'text': $('#text').val(),
            'categories': $('#categories').val(),
        };

        $.ajax({
            type: "POST",
            url: '/articles',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                window.location.href = '/articles';
            }
        })
    });

    $('#update_article').click(function (event) {
        event.preventDefault();

        var data = {
            'title': $('#title').val(),
            'text': $('#text').val(),
            'categories': $('#categories').val(),
        };

        $.ajax({
            type: "PUT",
            url: '/articles/' + $('#update_article').attr('data-id'),
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                window.location.href = '/articles';
            }
        })
    });

    $('#delete_article').click(function (event) {
        event.preventDefault();

        $.ajax({
            type: "DELETE",
            url: '/articles/' + $('#delete_article').attr('data-id'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function () {
                window.location.href = '/articles';
            }
        })
    })
});
