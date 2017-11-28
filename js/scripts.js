$(function(){

	console.log("It's working");

	// DROPDOWN MENU
	$('.menu-item-has-children').click(function(){
		event.preventDefault();
		$('.menu-open').children('.sub-menu').slideToggle(200);
		$('.menu-open').toggleClass('menu-open');
		$(this).toggleClass('menu-open');
		$(this).children('.sub-menu').slideToggle(200);
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




});