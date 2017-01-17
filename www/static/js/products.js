$(function(){
	
	$('.subcategory-link.active').closest('.sidebar > ul > li').addClass('active');

	$('.sidebar-title > .glyphicon').click(function(){
		$('.sidebar > ul').stop().slideToggle();
		$(this).toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top');
	});
});