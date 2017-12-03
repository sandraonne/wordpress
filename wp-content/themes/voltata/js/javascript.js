//Initiate wow.min.js and scroll animations
new WOW().init();

//Scroll to top
$j=jQuery.noConflict();

$j(document).ready(function(){
  $j('.scrollToTop').on('click', function(){
    $j('html, body').animate({scrollTop : 0},1000);
      return false;
  });
	
	$j("#primary-menu .menu-item-has-children").hover(
		function() {
			$j(this).children('.sub-menu').slideToggle(200);        
		},
		function() {
			$j(this).children('.sub-menu').slideUp(200);
	});
	
	$j("#menu-search").click(function() {
		$j(this).find("#search-icon").toggleClass("glyphicon-search glyphicon-remove");
		
		$j("#menu-search-field").stop().animate({
				height: "toggle",
				opacity: "toggle"
		}, "fast");
	});
	
	$j("#menu-button").click(function() {
		$j("#secondary-menu").slideToggle();
	});
	
	$j("#menu-search-button").click(function() {
		$j("#mobile-search-field").stop().animate({
				height: "toggle",
				opacity: "toggle"
		}, "fast");
	});
});