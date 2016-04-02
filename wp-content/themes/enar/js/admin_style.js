// JavaScript Document
//==================> Color Picker
jQuery(document).ready(function($){
	"use strict";
	
    //===========> search for icons
	$("input.search_in_icons").on('change paste keyup', function(){
        var value = $(this).val();
		var nums = 0;
        $("ul.idealtheme_font_icon_list li").each(function(){
            var get_class = $('i', this).attr('class');
            if (get_class.search(new RegExp(value, "i")) < 0) {
                $(this).hide();
            } else {
                $(this).fadeIn();
                nums++;
            }
        });

    });
		
	//===========> Color Picker
    $('.idealtheme_color_picker').wpColorPicker();

	$('*').on('click', function(){
		$('#menu-to-edit').find(".idealtheme_color_picker").not('.wp-color-picker').wpColorPicker();		
	});
	
	//===========> Choose Menu Icons
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
	
	$.enar_load_menu_icons = function () {				

		jQuery('.choose_icon_for_menu').on('click', function(e){
			
			$(this).closest('li.menu-item').addClass('has_icon').siblings().removeClass('has_icon');
			var get_connn = $(this).closest('has_icon');
			var this_chooser = $(this);
			var input_text = $(this).parent('.chooser_icon_con').find('input.idealtheme_choose_icon_menu');
			var input_i = $('li.has_icon').find('i#menu_icon');
			get_para_icon();
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
		
		
		function get_para_icon() {
			jQuery("body").on('click','.select_icon_save', function(e) {
				var get_icon_name = $('input[name="idealtheme_get_icon"]:checked').val();
				$('.has_icon').find('input.idealtheme_choose_icon_menu').val(get_icon_name);
				$('.has_icon').find('i#menu_icon').removeClass().addClass(get_icon_name);
				return false;
			});
		}
		
		jQuery("body").on('click','#remove_menu', function(e) {
			$(this).parent('i').removeClass();
			$(this).parent('i').siblings('input.idealtheme_choose_icon_menu').val('');
		});
				
	}
	$.enar_load_menu_icons();
	
	$(document).on('click', 'ul#menu-to-edit', function(){		
		if ( $.isFunction($.enar_load_menu_icons)) { 
			$.enar_load_menu_icons();
		}				
	});
	
});