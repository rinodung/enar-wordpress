jQuery(document).ready(function($) {
	jQuery('body').on('click','.ajax_more_projects',function(event){
		event.preventDefault();
		proj_more_btn       = jQuery(this);
		post_type           = proj_more_btn.data("post_type");
		cat_name            = proj_more_btn.data("cat_name");
		content_area        = proj_more_btn.parent().prev();
		offset              = proj_more_btn.data('offset');
		orderby             = proj_more_btn.data('orderby');
		sortby              = proj_more_btn.data('sortby');
		
		show_date           = proj_more_btn.data('show_date');
		show_cats           = proj_more_btn.data('show_cats');
		show_comments       = proj_more_btn.data('show_comments');
		show_like           = proj_more_btn.data('show_like');
		buttons_style       = proj_more_btn.data('buttons_style');
		
		show_ajax_expand    = proj_more_btn.data('show_ajax_expand');
		zoom_btn_text       = proj_more_btn.data('zoom_btn_text');
		more_btn_text       = proj_more_btn.data('more_btn_text');
		style               = proj_more_btn.data('style');
		
		ajax_btn_text       = proj_more_btn.data('ajax_btn_text');
		loaded_img_layout   = proj_more_btn.data('layout');
		
		all_posts           = proj_more_btn.data('all-posts');
		number_posts_loaded = proj_more_btn.data('loaded_num');
		check_loaded        = parseInt(offset)+parseInt(number_posts_loaded);
		
		filter_wrapper = proj_more_btn.parent().parent();
		
		jQuery.ajax({
			type: "post",
			url: ajax_more_projects.url,
			data: "action=hm_ajax_more_projects&nonce="+ajax_more_projects.nonce+"&offset="+offset+"&cat_name="+cat_name+"&orderby="+orderby+"&sortby="+sortby+"&number_posts_loaded="+number_posts_loaded+"&show_date="+show_date+"&show_cats="+show_cats+"&show_comments="+show_comments+"&show_like="+show_like+"&buttons_style="+buttons_style+"&show_ajax_expand="+show_ajax_expand+"&zoom_btn_text="+zoom_btn_text+"&more_btn_text="+more_btn_text+"&style="+style+"&ajax_btn_text="+ajax_btn_text+"&loaded_img_layout="+loaded_img_layout+"&post_type="+post_type,
			
			beforeSend : function () {
				proj_more_btn.parent().siblings('.hm_ajax_loader_con').animate({ opacity: 1   }, 300);
				proj_more_btn.css({"cursor":"no-drop","opacity":0.4});
			},
			success: function(data){
				
				if (check_loaded >= all_posts || data == '') {
					proj_more_btn.parent().siblings('.hm_ajax_loader_con').animate({ opacity: 0 }, 300);
					proj_more_btn.css({"cursor":"pointer","opacity":1});
					//proj_more_btn.parent().append('<span class="timeline_no_more">'+ajax_more_projects.empty+'</span>').hide().fadeIn();
					proj_more_btn.parent().animate({ opacity: 0, height: 0 }, 300);
				}
				
				if (data !== '') {
					
					var $divajax = $('.porto_store').html(data).hide();
					
					$divajax.imagesLoaded(function() {
						
						var htmlll = $divajax.html();
						newItems = $(htmlll).appendTo(content_area);
						$(content_area).isotope('appended', newItems );
						
						$divajax.html('');
						
						filter_wrapper.find("#filter-by li a").each(function(index, element) {
							var get_class = $(this).attr("data-option-value");
							var lenghty = filter_wrapper.find(".hm_filter_wrapper_con > "+get_class).length;
							$(this).find(".num").html(lenghty);
						});
					
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
							delegate: 'a.feature_inner_ling',
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
						
						$('.porto_block').each(function(index, element) {
							var gall_con = $(this);
							var expander = $(this).find("a.expand_img");
							var expander_b = $(this).find("a.icon_expand");
							expander.on('click', function() {								
								gall_con.find("a:first").click();
								return false;
							});
							expander_b.click(function() {								
								gall_con.find("a:first").click();
								return false;
							});
						});
						$(".porto_block").addClass("done_porto_block");
						
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
						
						$('.porto_full_desc .hm_filter_wrapper_con > .filter_item_block > .porto_block:not(.hoverdir_done)').each( function() { 
							$(this).hoverdir({
								hoverElem : '.porto_desc'
							}); 
							$(this).addClass('hoverdir_done');
						});
						
						proj_more_btn.parent().siblings('.hm_ajax_loader_con').animate({ opacity: 0 }, 300);
						
						proj_more_btn.css({"cursor":"pointer","opacity":1});
					});
  
				}
				proj_more_btn.data('offset', offset+number_posts_loaded);
			},
			complete: function (data) {
			}
		});
		//console.log(offset);
	});
});