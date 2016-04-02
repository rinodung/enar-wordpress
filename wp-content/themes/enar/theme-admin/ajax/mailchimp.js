(function($){
	"use strict";
	$(".newsletter_form").on('submit', function(event){
		var news_letter_form = $(this);
		var subscribe_mail = news_letter_form.find('.subscribe-mail').val();
		
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data:{
			  action: 'hm_newsletter_sebscribe',
			  status: 'enabled',
			  subs_mail: subscribe_mail,
			},
			beforeSend: function() {
				$('.newsletter_button').find(".refresh_loader").css({"opacity" : "1"}).siblings("i").css({"opacity" : "0"});
				$('#subscribe_output').hide(300);
			},
			success: function(data){
				$('#subscribe_output').html(data);
				$('.newsletter_button').find(".subscribe_true").css({"opacity" : "1"}).siblings("i").css({"opacity" : "0"});
				$('#subscribe_output').show(300);
				setTimeout(function() {
					$('#subscribe_output').hide(300);
					$('.newsletter_button').find(".subscribe_btn").css({"opacity" : "1"}).siblings("i").css({"opacity" : "0"});
				}, 4000 );
				$('#newsletter_form').find('.subscribe-mail').val('');
				
			}
		});
		
		event.preventDefault();
	});
}( jQuery ));