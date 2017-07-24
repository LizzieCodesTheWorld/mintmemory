$(function(){

	console.log("It's working");

	$('.menu-item-has-children').click(function(){
		event.preventDefault();
		$(this).toggleClass('open');
		$(this).children('.sub-menu').slideToggle();
	});

});