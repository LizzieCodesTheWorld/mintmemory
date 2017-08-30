$(function(){

	console.log("It's working");

	// DROPDOWN MENU
	$('.menu-item-has-children').click(function(){
		// event.preventDefault();
		$(this).toggleClass('open');
		$(this).children('.sub-menu').slideToggle();
	});

	// ACCORDION
	$('.accordion-title').click(function(){
		$(this).siblings().slideToggle('none');
		$(this).find('.fa-plus').toggleClass('none');
		$(this).find('.fa-minus').toggleClass('none');
	});




});