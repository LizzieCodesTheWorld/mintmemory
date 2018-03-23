$(function(){
	console.log("It's working");

	// DROPDOWN MENU
	$('.menu-item-has-children > a').click(function(event){
		// Prevent top nav links.
		event.preventDefault();
		$(this).children('.chevron.down').toggleClass('up');

		// Close open menus.
		$(this).parent().siblings('.menu-item-has-children').find('.sub-menu').hide();
		$(this).siblings('.sub-menu').slideToggle(200);
	});

	// ACCORDION
	$('.accordion-title').click(function(){
		$(this).siblings().slideToggle('none');
		$(this).find('.fa-chevron-down').toggleClass('none');
		$(this).find('.fa-chevron-up').toggleClass('none');
	});

	// ACCORDION ID link expansion.
	$( 'a[href^="#accordion_"]' ).on( 'click', function(){
		// Take last digit from internal link.
		var lastDigit = this.toString().split('').pop();
		// Build corresponding link in resources list.
		var link = '#accordion-content-' + lastDigit;
		// Remove class to display footnotes from corresponding section.
		$( link ).removeClass('none');
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

	$(window).resize(function(){
		if ($(window).width() >= 1250) {
			$('ul.menu').css('display', 'flex');
		} else {
			$('ul.menu').css('display', 'none');
		}
	});
});
