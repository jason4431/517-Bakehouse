jQuery(document).ready(function($){

    $('.slider').slick({
        arrows: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000, // speed is in milliseconds
        speed: 700
    });

});