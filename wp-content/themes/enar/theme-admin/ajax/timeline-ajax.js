jQuery(document).ready(function($) {
	
	jQuery(".hm_filter_wrapper.timeline .centered .btn_c").click(function(event){
		event.preventDefault();
		more_button  = jQuery(this);
		content_area = more_button.parent().prev();
		offset       = more_button.data('offset');	
		all_posts    = more_button.data('all-posts');
		post_type_is = more_button.data('post-type');
		number_posts_loaded = more_button.data('loaded_num');
		
		check_loaded = parseInt(offset)+parseInt(number_posts_loaded);
			
		jQuery.ajax({
			type: "post",
			url: ajax_timeline.url,
			dataType: 'html',
			data: "action=ajax_timeline&nonce="+ajax_timeline.nonce+"&offset="+offset+"&number_posts_loaded="+number_posts_loaded+"&post_type_is="+post_type_is,
			beforeSend : function () {
				            content_area.animate({ opacity: 0.3 }, 300);
				$('.hm_ajax_loader_con').animate({ opacity: 1   }, 300);
				
				more_button.css({"cursor":"no-drop","opacity":0.4});
			},
			success: function(data){
				$('.hm_filter_wrapper_con').children('li').addClass('timeline_posts_loaded');
				
				var $divajax = $('.timeline_store').html(data).hide();
				var store_con = $('.timeline_store').html();
				var htmlll = $divajax.html();
				
				if (check_loaded >= all_posts) {
					        content_area.animate({ opacity: 1 }, 300);
				$('.hm_ajax_loader_con').animate({ opacity: 0 }, 300);
				
					more_button.css({"cursor":"pointer","opacity":1});
					more_button.parent().append('<span class="timeline_no_more">'+ajax_timeline.empty+'</span>').hide().fadeIn();
					more_button.remove();
				}
				
				//if( store_con !== ''){}
				
				if (data !== '') {

					$divajax.imagesLoaded(function() { //===========================> Images Loaded
						
						newItems = $(htmlll).appendTo(content_area);
				    	$(content_area).isotope('appended', newItems );
						
						$divajax.html('');
						
						// Self Hosted 
						if ( $.isFunction($.fn.mediaelementplayer) ) {
							$("audio.hosted_audio:not(.self_hosted_worked)").mediaelementplayer();
							$("video.hosted_video:not(.self_hosted_worked)").mediaelementplayer({
								alwaysShowControls: true,
							});
						}
		                $("audio.hosted_audio:not(.self_hosted_worked), video.hosted_video:not(.self_hosted_worked)").addClass("done_porto_galla");
						
						// Owl
						$(".porto_galla:not(.done_porto_galla)").owlCarousel({
							slideSpeed : 900,
							autoPlay : 3000,
							autoHeight : false,
							singleItem:true,
							stopOnHover : true,
							navigation : true,
							pagination : true,
							navigationText : [
								"<span class='enar_owl_p'><i class='ico-angle-left'></i></span>",
								"<span class='enar_owl_n'><i class='ico-angle-right'></i></span>"],
						});
						
						// Owl Light Image
						$('.porto_galla:not(.done_porto_galla)').magnificPopup({
							delegate: 'a',
							type: 'image',
							gallery: {
								enabled: true
							},
							removalDelay: 500,
							callbacks: {
								beforeOpen: function() {
									this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
									this.st.mainClass = "mfp-zoom-in";
								}
							},
							closeOnContentClick: true,
						  
						});
			            $(".porto_galla").addClass("done_porto_galla");
						
						$(".magnific-popup:not(done_magnific), a[data-rel^='magnific-popup']:not(done_magnific)").magnificPopup({ 
							type: 'image',
							mainClass: 'mfp-with-zoom',
							zoom: {
								enabled: true,
								duration: 300,
								easing: 'ease-in-out',
								opener: function(openerElement) {
									return openerElement.is('img') ? openerElement : openerElement.find('img');
								}
							}
							
						});
						$(".magnific-popup, a[data-rel^='magnific-popup']").addClass("done_magnific");
			            
						// Positions
						$('.hm_filter_wrapper_con').children('li:not(.timeline_posts_loaded)').each(function(index, element) {
							var li_item = $(this);
							var li_item_prev = $(this).prev();
							
							setTimeout(function(){
								
								var last_child_offset = parseInt(li_item.css('top'));
								var prev_last_offset  = parseInt(li_item_prev.css('top'));
								var offset_icon1      = last_child_offset - prev_last_offset;
								
								// Icon Position
								var go_top_to = 0;
								if ( offset_icon1 <= 87 ){
									go_top_to = 87 - offset_icon1;
									li_item.find('.timeline_post_format').animate({
										top: go_top_to,
									}, 300);
									
								}
						
								var left_position = li_item.position().left;
								
								if( left_position == 0 ){
									li_item.addClass('timeline_on_left');
								}else{
									li_item.addClass('timeline_on_right');
								}
							}, 500);
							
                        });
						
						// Animated
						$('.animated').each(function(index, element) {
							var elem = $(this);
							var animation = elem.data('animation');
							if ( !elem.hasClass('visible') ) {
								var animationDelay = elem.data('animation-delay');
								if ( animationDelay ) {
					
									setTimeout(function(){
										elem.addClass( animation + " visible" );
										elem.removeClass('hiding');
									}, animationDelay);
					
								} else {
									elem.addClass( animation + " visible" );
									elem.removeClass('hiding');
								}
							}
						});
						
						            content_area.animate({ opacity: 1 }, 300);
						$('.hm_ajax_loader_con').animate({ opacity: 0 }, 300);
						
						more_button.css({"cursor":"pointer","opacity":1});
						
					}); //===========================> Images Loaded
  
				}
				more_button.data('offset', offset+number_posts_loaded);
			},
			complete: function (data) {
			}
		});
		//console.log(offset);
	});
		
});