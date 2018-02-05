$(document).ready(function () {
    /*$('#submit').click(function (event) {
     event.preventDefault();
     });*/
    $("#form").validate({
        rules: {
            name: {
                required: true
            },
            post: {
                required: true,
                minlength: 4
            },
            numbercard: {
                required: true,
                length: 12
            },
            select: {
                required: true
            },
            data: {
                required: true
            },
            code: {
                required: true,
                length: 3
            }
        },
        messages: {
            name: "Please enter your name",
            post: {
                required: "Please enter your post",
                minlength: "Your password must be at least 4 characters long"
            },
            numbercard: {
                required: "Please provide a numbercard",
                length: "Your password must be at least 12 characters long"
            },
            select: "Please enter a valid email address",
            data: "Please enter a valid time",
            code: {
                required: "Please provide a code",
                length: "Your password must be at least 3 characters long"
            }
        },
        submitHandler: function (form) {
        }
    });
});