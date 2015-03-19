jQuery("document").ready(function($){
	
	var nav = $('.navbar-static-top');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});

});

