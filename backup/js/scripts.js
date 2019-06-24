function scrollFunc() {
	var scrollTop = $(window).scrollTop();
	var topheight = $(".top_links").outerHeight()
	if (scrollTop >= topheight) {
		$(".header_outer").css("top","0px")
	} else {
		$(".header_outer").css("top",(topheight-scrollTop)+"px")
	}
	
	$(".animatein").each(function() {
		var winHeight = $(window).height()
		var winHeightOffset = $(window).height() / 4
		var offset = Math.min($(this).outerHeight() * 0.75, 200, winHeightOffset )
		var top = $(this).offset().top - winHeight + offset
		
		if (scrollTop > top) {
			if ($(this).hasClass("right")) {
				$(this).animate({
					opacity: 1,
					right: 0
				})
			} else {
				$(this).animate({
					opacity: 1,
					left: 0
				})
			}
		}
	})
}
scrollFunc()
$(window).scroll(scrollFunc)
$(window).resize(scrollFunc)

// Image dimensions
$("[constrain]").one("load", function() {
	var parent = $(this).parent()
	var height = parent.outerHeight() - $(this).height();
	var width = parent.outerWidth() - $(this).width();

	if (height > width) {
		$(this).css("max-height", "100%")
		$(this).css("max-width", "none")
	} else {
		$(this).css("max-width", "100%")
		$(this).css("max-height", "none")
	}
}).each(function() {
	if(this.complete) $(this).load();
});


var subtleness = 8 // The higher this number the more subtle the effect will be
var max_width = 700 // Your max width without px
var piece1 = $(".p1"); // Elem
var piece2 = $(".p2"); // Elem
var piece3 = $(".p3"); // Elem
var piece4 = $(".p4"); // Elem
var piece5 = $(".p5"); // Elem
var piece6 = $(".p6"); // Elem

var lastpagex;
$(document).on("mousemove scroll load",function(e) {
	if (e && e.pageX) {
		lastpagex = e.pageX
	}
	e = e || {}
	e.pageX = e.pageX || lastpagex
	var ax = -($(window).innerWidth()/2 - e.pageX)/subtleness;
	var ay = document.documentElement.scrollTop * 1.5;
	ay = 0
	// console.log
	piece1.attr("style", "transform:translate(" + -(ax/20) + "px, " + -(ay/20) + "px)");
	piece2.attr("style", "transform:translate(" + -(ax/14) + "px, " + -(ay/14) + "px)");
	piece3.attr("style", "transform:translate(" + -(ax/10) + "px, " + -(ay/11) + "px)");
	piece4.attr("style", "transform:translate(" + -(ax/5) + "px, " + -(ay/8) + "px)");
	piece5.attr("style", "transform:translate(" + -(ax/2) + "px, " + -(ay/4) + "px)");
	piece6.attr("style", "transform:translate(" + -(ax/1) + "px, " + -(ay/2) + "px)");
});