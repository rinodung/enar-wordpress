// JavaScript Document
jQuery(document).ready(function($) {
	"use strict";
	//=====> one page
	$('select[name="page_template"]').change( function() {
		var one_page = $(this).find('option:selected').val();
        if (one_page == 'template-onepage.php') {
            $('.one_page_menu').fadeIn();
			$('.page_layout_select, .page_title_with_crumbs').fadeOut();
        } else {
            $('.one_page_menu').fadeOut();
			$('.page_layout_select, .page_title_with_crumbs').fadeIn();
        }
		
    });
	
	var one_page_is = $('select[name="page_template"] option:selected').val();
	if(one_page_is == "template-onepage.php"){
    	$('.one_page_menu').fadeIn();
		$('.page_layout_select, .page_title_with_crumbs').fadeOut();
	} else {
		$('.one_page_menu').fadeOut();
		$('.page_layout_select, .page_title_with_crumbs').fadeIn();
	}

	//=====> one page
	
	if($('.quote_auther input[name="idealtheme_quote_auther"]:checked').val() === 'from_spici'){
		$('.from_spici').removeClass('hide');
	} else {
		$('.from_spici').addClass('hide');
	}
	
	$('.quote_auther input[name="idealtheme_quote_auther"]').change( function() {
        if ($(this).is(':checked') && $(this).val() === 'from_spici') {
            $('.from_spici').removeClass('hide');
        } else {
            $('.from_spici').addClass('hide');
        }
    });
	
	$('#post-formats-select input[name="post_format"]').change( function() {
        if ($(this).is(':checked') && $(this).val() === 'audio') {
            $('#audio_details').fadeIn();
			$('#audio_format_meta_metabox').fadeIn();
        } else {
            $('#audio_details').fadeOut();
			$('#audio_format_meta_metabox').fadeOut();
        }
		
		if ($(this).is(':checked') && $(this).val() === 'video') {
            $('#video_format_meta_metabox').fadeIn();
        } else {
            $('#video_format_meta_metabox').fadeOut();
        }
		
		if ($(this).is(':checked') && $(this).val() === 'quote') {
            $('#quote_settings').fadeIn();
        } else {
            $('#quote_settings').fadeOut();
        }
		
		if ($(this).is(':checked') && $(this).val() === 'gallery') {
            $('#gallery_custom_meta_metabox').fadeIn();//
			$('#idealtheme_gallery_settings').fadeIn();
        } else {
            $('#gallery_custom_meta_metabox').fadeOut();
			$('#idealtheme_gallery_settings').fadeOut();
        }
		
    });
	
	if($('#post-formats-select input[name="post_format"]:checked').val() === 'gallery'){
		$('#gallery_custom_meta_metabox').fadeIn();
		$('#idealtheme_gallery_settings').fadeIn();
	} else {
		$('#gallery_custom_meta_metabox').fadeOut();
		$('#idealtheme_gallery_settings').fadeOut();
	}
	
	if($('#post-formats-select input[name="post_format"]:checked').val() === 'audio'){
		$('#audio_details').fadeIn();
		$('#audio_format_meta_metabox').fadeIn();
	} else {
		$('#audio_details').fadeOut();
		$('#audio_format_meta_metabox').fadeOut();
	}
	
	if($('#post-formats-select input[name="post_format"]:checked').val() === 'video'){
		$('#video_format_meta_metabox').fadeIn();
	} else {
		$('#video_format_meta_metabox').fadeOut();
	}
	
	if($('#post-formats-select input[name="post_format"]:checked').val() === 'quote'){
		$('#quote_settings').fadeIn();
	} else {
		$('#quote_settings').fadeOut();
		//alert("hide");
	}
	
	//-------------------
	
	$('select[name="video_format_meta[video_type]"]').change( function() {
		var get_video_type = $('select[name="video_format_meta[video_type]"]').val();
		
		if ( get_video_type == 'id_vimeo' ) {
		   $('.video_self_hosted_block').fadeOut(300, function() {
				$('.video_id_block').fadeIn();
			});
		} else if ( get_video_type == 'id_tube' ) {
		   
		   $('.video_self_hosted_block').fadeOut(300, function() {
				$('.video_id_block').fadeIn();
			});
		}
		else if ( get_video_type == 'self_hosted' ){
		   
		   $('.video_id_block').fadeOut(300, function() {
				$('.video_self_hosted_block').fadeIn();
			});
		} 
    });
	
	var val_v = $('select[name="video_format_meta[video_type]"]').val();
	
	if ( val_v == 'id_vimeo' ) {
	   $('.video_id_block').fadeIn();
	   $('.video_self_hosted_block').fadeOut();
	} else if ( val_v == 'id_tube' ) {
	   $('.video_id_block').fadeIn();
	   $('.video_self_hosted_block').fadeOut();
	}
	else if ( val_v == 'self_hosted' ){
	   $('.video_self_hosted_block').fadeIn();
	   $('.video_id_block').fadeOut();
	}  
	
	//------------------------> Related
	$('.related_posts_type').each(function(index, element) {
		var this_related_con = $(this);
		var this_related_hide = this_related_con.siblings('.hiden_selected_posts');
		
		//-----> Posts
        $(this_related_con).find('input[name="idealtheme_related_posts_type"]').change( function() {
			if ($(this).is(':checked') && $(this).val() === 'f_choosen') {
				$(this_related_hide).fadeIn();
			} else {
				$(this_related_hide).fadeOut();
			}
		});
		
		if($(this_related_con).find('input[name="idealtheme_related_posts_type"]:checked').val() === 'f_choosen'){
			$(this_related_hide).fadeIn();
		} else {
			$(this_related_hide).fadeOut();
		}
		
		//-----> Portfolio
        $(this_related_con).find('input[name="idealtheme_related_portfolio_type"]').change( function() {
			if ($(this).is(':checked') && $(this).val() === 'f_projects') {
				$(this_related_hide).fadeIn();
			} else {
				$(this_related_hide).fadeOut();
			}
		});
		
		if($(this_related_con).find('input[name="idealtheme_related_portfolio_type"]:checked').val() === 'f_projects'){
			$(this_related_hide).fadeIn();
		} else {
			$(this_related_hide).fadeOut();
		}
    });
	
	//=========================
	$('.audio_self_hosted_block, .audio_soundcloud_block').hide();
	
	$('select[name="audio_format_meta[audio_type]"]').change( function() {
		
		var get_audio_type = $('select[name="audio_format_meta[audio_type]"]').val();
		
		if ( get_audio_type === 'soundcloud') {
			  $('.audio_soundcloud_block').fadeIn();
			  $('.audio_self_hosted_block').fadeOut();
		} 
		else if( get_audio_type === 'self_hosted') {
			  $('.audio_self_hosted_block').fadeIn();
			  $('.audio_soundcloud_block').fadeOut();
		} 
	});
	
	var get_audio_type = $('select[name="audio_format_meta[audio_type]"]').val();
		
	if ( get_audio_type === 'soundcloud') {
		  $('.audio_soundcloud_block').fadeIn();
		  $('.audio_self_hosted_block').fadeOut();
	} 
	else if( get_audio_type === 'self_hosted') {
		  $('.audio_self_hosted_block').fadeIn();
	      $('.audio_soundcloud_block').fadeOut();
	} 
		
	//============================================================> Remove Image Url From Gallery
	
	$('.hamdan_gallery_img_src').each(function() {
		var img = $(this).parent().find('.hamdan_img_src_input').val();
		$(this).find('img').attr('src', img);
	});
	
	//==============> Portfolio
	/*$('.copy_bt').on('click', function(){ 
		var $the_item = $(this).parent().siblings('div').children('.wpa_group:last').prev();
	});*/
	
	if (!$("input[name='portfolio_custom_meta[content_type]']:checked").val()) {
	   $('.tabs_con li:first input[name="portfolio_custom_meta[content_type]"]').attr('checked', 'checked');
	}

	var get_input_chicked = $('.tabs_con li input[name="portfolio_custom_meta[content_type]"]:checked');
	var get_id_from_a = $(get_input_chicked).parent('li').find('a').attr('href');
	$(get_id_from_a).addClass('active_meta_tab').siblings().removeClass('active_meta_tab');
	
	$('.tabs_con').each(function(i) {	
	    var $allparent = $(this);
		
		$allparent.find('#tab-menu li input').each(function() {
			var input_val = $(this).val();		
			$(this).on('click', function()  {
				var parent_li = $(this).parent('li');
				$('.type_con').html(input_val);
				$(parent_li).addClass('active_tab_li').siblings().removeClass('active_tab_li');
				
				var get_id = $(parent_li).find('a').attr('href');			
				
				if ( $allparent.hasClass('hm_gall_con')){
					if ( get_id == 'owl_slider_tab' || get_id == 'owl_png_tab' || get_id == 'owl_text_tab' || get_id == 'owl_gall_tab' ){
						$('#idealtheme_sliders_setting .inside .rwmb-meta-box > div.owl_slider_opt').css({"display" : "block"}).siblings('div:not(.owl_slider_opt)').css({"display" : "none"});
						
					}else if ( get_id == 'flex_tab' ){
						$('#idealtheme_sliders_setting .inside .rwmb-meta-box > div.flex_slider_opt').css({"display" : "block"}).siblings('div:not(.flex_slider_opt)').css({"display" : "none"});
						
					}else if ( get_id == 'camera_tab' ){
						$('#idealtheme_sliders_setting .inside .rwmb-meta-box > div.camera_slider_opt').css({"display" : "block"}).siblings('div:not(.camera_slider_opt)').css({"display" : "none"});
						
					}else if ( get_id == 'wobbly_tab' ){
						$('#idealtheme_sliders_setting .inside .rwmb-meta-box > div.wobbly_slider_opt').css({"display" : "block"}).siblings('div:not(.wobbly_slider_opt)').css({"display" : "none"});
						
					}else if ( get_id == 'scattered_tab' ){
						
					}else if ( get_id == 'four_boxes_effect_tab' ){
						
					}
					
					$allparent.find('.hm_slider_row').each(function() {
						if($(this).hasClass(get_id)){
							$(this).fadeIn(300);
						}else{
							$(this).fadeOut(300);
						}
					});
				}else{
					$allparent.children('div').each(function() {
						if($(this).hasClass(get_id)){
							$(this).fadeIn(300);
						}else{
							$(this).fadeOut(300);
						}
					});
				}
			});		
		});		
    });	
	
	//==============> Portfolio
	$('#tab-menu li input[name="portfolio_custom_meta[content_type]"]').change( function() {		
		if ($(this).is(':checked') && $(this).val() === 'gallery') {
			$('#idealtheme_gallery_settings').fadeIn();
        } else {
			$('#idealtheme_gallery_settings').fadeOut();
        }
		
    });
	
	if($('#tab-menu li input[name="portfolio_custom_meta[content_type]"]:checked').val() === 'gallery'){
		$('#idealtheme_gallery_settings').fadeIn();
	} else if($('#tab-menu li input[name="portfolio_custom_meta[content_type]"]:checked').val() === 'image' || $('#tab-menu li input[name="portfolio_custom_meta[content_type]"]:checked').val() === 'video' || $('#tab-menu li input[name="portfolio_custom_meta[content_type]"]:checked').val() === 'audio') {
		$('#idealtheme_gallery_settings').fadeOut();
	}
	
	//==============> Ajax Icons
	
	$('body').on('click', 'input[name="idealtheme_get_icon"]', function(){
		 var get_lable = $(this).parent('label');
		 var get_li = $(get_lable).parent('li');		 
		 $(get_li).addClass('active_li').siblings().removeClass('active_li');
    });
	
	jQuery("body").on('click','.close_box_icon, .select_icon_save', function(e) {
		$('.icons_container').fadeOut();
		$('.close_box_icon').fadeOut();		
		return false;
	});
	
	var get_icon_name = '';
    var this_chooser = '';
		
	$.load_idealtheme_icons = function () {				

		jQuery('.idealtheme_choose_icon').on('click', 'a.choose_icon', function(e){
			
			get_paraaa($(this));
			$(this).closest('.wpa_group-portfolio_details').addClass('por_ic').siblings().removeClass('por_ic');
			var get_connn = $(this).closest('por_ic');
			var this_chooser = $(this);
			var input_text = $(this).siblings('input');
			jQuery.ajax({
				type: 'POST',
				url: ajaxurl,
				dataType: 'html',
				data: {"action": "idealtheme_fun_load_select_icons"},
				beforeSend: function() {},
				success: function(data){
					$('.icons_container').find('.get_icons_from_ajax').html(data);
				}
			});
			
			$('.icons_container').fadeIn();
			$('.close_box_icon').fadeIn();
									
			return false;
		});
		
		function get_paraaa(chooser) {
			jQuery("body").on('click','.select_icon_save', function(e) {
				var get_icon_name = $('input[name="idealtheme_get_icon"]:checked').val();
				$('.por_ic').find('input.hide').val(get_icon_name);
				$('.por_ic').find('i#ico').removeClass().addClass(get_icon_name);
				return false;
			});
		}		
   }
   $.load_idealtheme_icons();

   $('body').on('click', '.docopy-portfolio_details', function(){        
		if ( $.isFunction($.load_idealtheme_icons)) { 
			$.load_idealtheme_icons();
		}               
   });
	
});