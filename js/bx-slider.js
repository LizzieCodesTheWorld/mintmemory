$(function(){
    console.log('hello');
        // if($('.four-column-carousel')) {
        columnSwiper = $('.four-column-carousel').bxSlider({
            mode: 'horizontal',
            infiniteLoop: true,
            slideWidth: 350,
            controls: false,
            // maxSlides: 3,
            shrinkItems: true,
            // minSlides:1,
            speed: 400
        }); 
    // }

    var fourColumnCarousel = $('.four-column-carousel');
    // Homepage Four Column Carousel (on mobile landscape or lower.)
    function carouselMobile() {
        if($(window).width() <= 385 && fourColumnCarousel){
            columnSwiper.reloadSlider();
        } else if($(window).width() > 385 && fourColumnCarousel) {
            columnSwiper.destroySlider();
        } else {
            columnSwiper.destroySlider();
            console.log('nothing to see here');
        }
    }
    // Call on load.
    carouselMobile();

    // Check for resize & make carousel if resized enough.
    $(window).resize(function(){
        carouselMobile();
    });
});