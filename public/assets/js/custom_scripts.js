
var customJS;

jQuery(document).ready(function($) {

    customJS = {

        common: {



            commonJS: function() {



               var swiper = new Swiper('.swiper-container', {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

           },





           html5Tags: function() {
            document.createElement('header');
            document.createElement('section');
            document.createElement('nav');
            document.createElement('footer');
            document.createElement('menu');
            document.createElement('hgroup');
            document.createElement('article');
            document.createElement('aside');
            document.createElement('details');
            document.createElement('figure');
            document.createElement('time');
            document.createElement('mark');
        }

        } //end commonJS

    };


    customJS.common.commonJS();
    customJS.common.html5Tags();

});


$(".user-img").each(function() {
    var imgPath = $(this).find(".user-img img").attr('src');
    $(this).find(".user-img ").css('background-image', 'url("'+ imgPath +'")');
});

$(".user-profile-img").each(function() {
    var imgPath = $(this).find(".user-profile-img img").attr('src');
    $(this).find(".user-profile-img").css('background-image', 'url("'+ imgPath +'")');
});

$(document).ready(function(){
    $('#nav-icon3').click(function(){
        $(this).toggleClass('open');
    });

    $('#nav-icon3').click(function(){
        $(".mob-nav").slideToggle();
    });

    $('.user-profile-img').click(function(){
    	$(".dropdown-profile").slideToggle("slow");
    });
});


