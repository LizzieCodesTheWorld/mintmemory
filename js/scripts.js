$(function(){
	var columnSwiper;
	console.log("It's working");

	// prevent dragging and right clicking on images
	$("img").mousedown(function(){
		return false;
	});

	// DROPDOWN MENU
	$('.menu-item-has-children > a').click(function(event){
		// Prevent top nav links.
		event.preventDefault();

		// If it already has a toggled chevron, remove class, otherwise add it.
		if($(this).children('.chevron.down').hasClass('up')) {
			$(this).children('.chevron.down').removeClass('up');
		} else {
			$(this).children('.chevron.down').addClass('up');
		}

		// Remove class from other toggled chevrons but not the one clicked.
		$('.menu-item-has-children > a').not(this).children('.chevron.down').removeClass('up');

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

	var scroll = new SmoothScroll('a[href^="#accordion_');
  
	var heroSwiper = new Swiper('.swiper-container', {
	    speed: 400,
	    spaceBetween: 100,
	    init: true,
	    effect: "fade",
	    autoplay: true
	});

    $(".hero-content").css("visibility", "visible");

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
			$('#hamburger').removeClass('open');
		}
	});
});
