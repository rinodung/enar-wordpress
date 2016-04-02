//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

(function($){
	"use strict";	
	
	$('body').scrollspy({
		target: '.bs-docs-sidebar',
		offset: 40
	});

	$('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 51
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });	
	
	$(document).ready(function(){
		
	});
	
})(window.jQuery);