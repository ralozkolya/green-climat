$(function(){
	
	$('.subcategory-link.active').closest('.sidebar > ul > li').addClass('active');

	$('.sidebar-title > .glyphicon').click(function(){
		$('.sidebar > ul').slideToggle();
	});
});