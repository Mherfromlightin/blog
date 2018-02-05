$(function () {
    var arrayImages = [
        '/images/1.jpg',
        '/images/2.jpg',
        '/images/3.jpg'
    ];
    var i = 0;
    var prev = arrayImages[2];
    var active = arrayImages[i];
    var next = arrayImages[1];
    var isSliderRunning = false;

    $('.imgPrev').attr("src", prev);
    $('.imgActive').attr("src", active);
    $('.imgNext').attr("src", next);

    function right() {
        if (isSliderRunning) {
            return false
        }
        isSliderRunning = true;
        i++;
        if (i == arrayImages.length) {
            i = 0
        }
        $('.imgNext').remove();
        $('.imgActive').addClass('imgNext').removeClass('imgActive');
        $('.imgPrev').addClass('imgActive').removeClass('imgPrev');
        $('.slider').prepend("<img src=" + arrayImages[i] + " alt='jpg'  class='slide imgPrev'>");
        setTimeout(function () {
            isSliderRunning = false;
        }, 1500);
    }

    function left() {
        if (isSliderRunning) {
            return false
        }
        isSliderRunning = true;
        i--;
        if (i < 0) {
            i = arrayImages.length - 1
        }
        $('.imgPrev').remove();
        $('.imgActive').addClass('imgPrev').removeClass('imgActive');
        $('.imgNext').addClass('imgActive').removeClass('imgNext');
        $('.slider').append("<img src=" + arrayImages[i] + " alt='jpg'  class='slide imgNext'>");
        setTimeout(function () {
            isSliderRunning = false;
        }, 1500);
    }

    $('#next').click(function () {
        right();
    });

    setInterval(function () {
        right()
    }, 5000);

    $('#prev').click(function () {
        left();
    });
});