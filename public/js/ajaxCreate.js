$(document).ready(function () {
    $('#createbtn').click(function (event) {
        event.preventDefault()
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
    })
})

