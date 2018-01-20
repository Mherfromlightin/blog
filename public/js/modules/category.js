$(document).ready(function () {
    $('#create_category').click(function (event) {
        event.preventDefault();

        var data = {
            'name': $('#category').val(),
        };

        $.ajax({
            type: "POST",
            url: '/categories',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                window.location.href = '/categories';
            }
        })
    });

    $('#update_category').click(function (event) {
        event.preventDefault();

        var data = {
            'name': $('#category').val(),
        };

        $.ajax({
            type: "PUT",
            url: '/categories/' + $('#update_category').attr('data-id'),
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                window.location.href = '/categories';
            }
        })
    });

    $('#delete_category').click(function (event) {
        event.preventDefault();

        $.ajax({
            type: "DELETE",
            url: '/categories/' + $('#delete_category').attr('data-id'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                window.location.href = '/categories';
            }
        })
    })

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    $('#btn_a').click(function () {
      setCookie("name", "A")
            });

    $('#btn_b').click(function () {
        setCookie("name", "B")
    })

});
