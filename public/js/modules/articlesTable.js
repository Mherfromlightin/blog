$('.remove-article').click(function (event) {
    event.preventDefault();
    var self = this;

    $.ajax({
        type: "DELETE",
        url: '/articles/' + $(self).attr('data-id'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            var table = $('#example').DataTable();
            table
                .row($(self).parents('tr'))
                .remove()
                .draw();
        }
    })
});