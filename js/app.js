

jQuery(document).ready(function($) {

	// $('.contenues').slick({
    //     slidesToShow: 3,
    //     // autoplay: true
    // }); 

    // $('.sces').slick({
    //     dots: true,
    //     arrows: false,
    //     vertical: true,
    //     slidesToShow: 1,
    //     verticalSwiping: true
    // });

    $(window).scroll(function(){
        var wScroll = $(this).scrollTop();
    
        if (wScroll > 100) {
            $('.header').addClass('header-white')
        } else {
            $('.header').removeClass('header-white')
        }
    });

    $('.contenues').slick({
        slidesToShow: 3,
        prevArrow: "<div class='slick-prev'> <img src='image/arrow-left.svg'> </div>",
        nextArrow: "<div class='slick-next'> <img src='image/arrow-right.svg'> </div>"

        // autoplay: true
    }); 

});


