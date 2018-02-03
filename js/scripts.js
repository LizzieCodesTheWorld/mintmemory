$(function(){

	console.log("It's working");

	// DROPDOWN MENU
	$('.menu-item-has-children > a').click(function(event){
		// prevent top nav links 
		event.preventDefault();

		// close open menus
		$(this).parent().siblings('.menu-item-has-children').find('.sub-menu').hide();
		$(this).siblings('.sub-menu').slideToggle(200);
	});

	// ACCORDION
	$('.accordion-title').click(function(){
		$(this).siblings().slideToggle('none');
		$(this).find('.fa-chevron-down').toggleClass('none');
		$(this).find('.fa-chevron-up').toggleClass('none');
	});

	$('.fa-bars').click(function(){
		$('ul.menu').slideToggle(200);
		$(this).toggleClass('fa-bars');
		$(this).toggleClass('fa-times');
	});

	// BX SLIDER
      $('.bxslider').bxSlider({
      	pager: false,
      	nextText: 'Next Video >',
      	prevText: '< Previous Video',
      	infiniteLoop: false,
      	hideControlOnEnd: true,
      	video: true
      });

     slider = $('.carousel').bxSlider({
     		pager: false,
 	    	infiniteLoop: true,
 	    	// hideControlOnEnd: true,
 	    	mode: 'fade',
 	    	controls: false
     	    	// speed: 500
     	    	// ticker: true
     });
                 slider.startAuto();
	// var slider = 
 //    $('.carousel').bxSlider({
 //    	pager: false,
 //    	infiniteLoop: true,
 //    	hideControlOnEnd: true,
 //    	mode: 'fade',
 //    	controls: false,
 //    	speed: 100,
 //    	ticker: true
 //    });

    slider.startAuto();

});