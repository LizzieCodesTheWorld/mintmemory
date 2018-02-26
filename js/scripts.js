$(function(){

	console.log("It's working");

	// DROPDOWN MENU
	$('.menu-item-has-children > a').click(function(event){
		// prevent top nav links 
		event.preventDefault();
		$(this).children('.chevron.down').toggleClass('up'); 

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

	// BX SLIDER
      $('.bxslider').bxSlider({
      	pager: false,
      	nextText: 'Next Video >',
      	prevText: '< Previous Video',
      	infiniteLoop: false,
      	hideControlOnEnd: true
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
     
 //     slider.startAuto();
	// // var slider = 
 // //    $('.carousel').bxSlider({
 // //    	pager: false,
 // //    	infiniteLoop: true,
 // //    	hideControlOnEnd: true,
 // //    	mode: 'fade',
 // //    	controls: false,
 // //    	speed: 100,
 // //    	ticker: true
 // //    });

 //    slider.startAuto();

 // MOBILE MENU
$('#hamburger').click(function(){
	$(this).toggleClass('open');
	$('ul.menu').slideToggle(200);
});



});