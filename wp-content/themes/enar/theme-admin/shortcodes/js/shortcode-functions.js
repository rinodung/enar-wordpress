jQuery(document).ready(function($){
    
    jQuery(function($) {
		$('.shortcode_group_block.group').parent().each( function() {
			$(this).sortable({
				handle: ".handle_group",
			});
		});
	});			
	
	function play_my_removal() {
		$('.remove_group').unbind('click');
		$('.remove_group').on('click', function(){
			 var parent_form = $(this).parent().parent();
			 var count_e = $(parent_form).children('.group').length;
			 if(count_e <= 1) {
				alert('Sorry, You Cant Delete the last element!');
			 }
			 else {
				jQuery(this).parent().slideUp(300, function() {
					jQuery(this).remove();
				})
			 }
		});
	};
	play_my_removal();
	
    //========> Animate #TB_window
	
	function get_tb_window_style() {
		var TB_WIDTH = 900;
        var TB_HEIGHT = ($('#TB_ajaxContent').outerHeight() + 30); // set the new width and height dimensions here..
		$("#TB_window").animate({
			opacity: 1,
		});
	}
	
	//========> The setTimeout() method calls a function or evaluates an expression after a specified number of milliseconds
	setTimeout(get_tb_window_style,100);
	
	jQuery('.idealtheme_color_picker').wpColorPicker();
	
	//========> Display Shortcodes When Hit its tab title
	
	$('.shortcodes_list li:first-child a').addClass('active');
	
	$('.shortcodes_list li a').click(function( event ) {
		event.preventDefault();
		var display_option_block = $(this).attr('href');
		
		$('.shortcodes_list li a').removeClass('active');
		$(this).addClass('active');		
		$('.shortcodes_options_container .shortcodes_options_block').hide();
		$('.shortcodes_options_container #'+display_option_block).show();
	});
	
	
	
	//========> Select Icon
	function set_my_icon_live() {
		$('.iconfonts li').on('click', function(){
			$(this).addClass('active_icon');
			$(this).siblings('li').removeClass('active_icon');
			$(this).siblings('li').find("input").removeAttr("checked");
			$(this).find('input').attr("checked", "checked");
			
			var restore_icon_name = $(this).find('input').val();
			
		});
	};
	set_my_icon_live();
		
	
	//========> Insert Image
	function make_add_img_live() {
		$('.insert_single_img_to_shortcode').on('click',function( event ) {	 
			event.preventDefault();
			
			var view_selected_image = $(this).parent().siblings('.show_selected_media').find('img');
			var store_value = $(this).siblings('input');
			var add_image_button = $(this);
			var removebutton = $(this).siblings('.remove_single_img_from_shortcode');
			
			wp.media.frames.customHeader = wp.media({
				type: 'image' 
			});
			wp.media.frames.customHeader.on( "select", function() {
					var selected_image_tag = wp.media.frames.customHeader.state().get("selection").first();
					var selected_image_src = selected_image_tag.attributes.url;
					var selected_image_id = selected_image_tag.attributes.id;
					
					$(removebutton).show();
					$(add_image_button).hide();
					
					$(view_selected_image).attr('src',selected_image_src);
					$(store_value).val(selected_image_id);				
			});
			wp.media.frames.customHeader.open();
		});	
		
		//========> Remove Image
		$('.remove_single_img_from_shortcode').on('click',function( event ) {	 
			event.preventDefault();
			
			var view_selected_image = jQuery(this).parent().siblings('.show_selected_media').find('img');
			var store_value = jQuery(this).siblings('input');
			var add_image_button = jQuery(this).siblings('.insert_single_img_to_shortcode');
					
			$(view_selected_image).attr('src','');
			$(store_value).val('');
			$(add_image_button).show();
			$(this).hide();
		});	  	
    };
	make_add_img_live();
	
  	//========> Radio Image	
	
	$('.radio_img_con').on('click', function( event ) { 
		
		value = $(this).find("img").attr('alt');
		parent = $(this).parent();
		var form = $(parent).parents('form').attr('id');
		
		$(this).siblings("label").removeClass('active');
		$(this).addClass('active');
	});	
	
	//========> Duplicate Groups
	
	$('.repeater').on("click",function(event) {
		event.preventDefault();
		var group = $(this).attr('href');
		var repeater_parent = $(this).parent('div');
			
		if($(this).is('#idealtheme_pricing_plans_plan_list_duplicater')){
			event.preventDefault();
			var repeater_parent_bbbb = $(this).parent('div');
			var groupcontent_b = $(repeater_parent_bbbb).parent('div').find('.group:first').html();
			$(repeater_parent_bbbb).before('<div id="'+group+'" class="group">'+groupcontent_b+'</div>');
			
		}else if($(this).is('#idealtheme_pricing_plans_plan_group_duplicater')){
			var parent = $(repeater_parent).parent('form');
			var groupcontent = $(repeater_parent).parent('form').find('.group:first').html();
			
			$(repeater_parent).before('<div id="'+group+'" class="group">'+groupcontent+'</div>');				

		} else{
			var parent = $(repeater_parent).parent();
			var groupcontent = $(repeater_parent).parent().children('.group:first').html();
			
			$(repeater_parent).before('<div id="'+group+'" class="group">'+groupcontent+'</div>');
			set_my_icon_live();
		}
		
		var last_color_skill = $(this).parent('div').parent('form').find('.group:last').find('.wp-picker-container');
		last_color_skill.each(function() {
            var parent_in = $(this).parent('.shortcodes_block');
			$(this).remove();
			var $get_picker_parent_id = parent_in.parent().attr('id');
			
			$(parent_in).append('<input type="text" id="'+$get_picker_parent_id+'" class="idealtheme_color_picker" value="" id="idealtheme_custom_color" name="idealtheme_custom_color">');
			jQuery(parent_in).find('.idealtheme_color_picker').wpColorPicker();
        });
		
		var $last_media = $(this).parent('div').parent('form').find('.group:last').find('.show_selected_media img');
		var $last_media_add = $(this).parent('div').parent('form').find('.group:last').find('.insert_single_img_to_shortcode');
		var $last_media_rem = $(this).parent('div').parent('form').find('.group:last').find('.remove_single_img_from_shortcode');
		
		$last_media.attr("src", "");
		$last_media_add.show();
		$last_media_rem.hide();
		
		make_add_img_live();	
		play_my_removal();
							
	});
	
	//========> Insert Shortcode Button
	$('.submit').click(function() {	
			
		if ($(this).attr('id') == 'insert_contact') {
			var get_mail = $(this).parent('form').find('input#idealtheme_contactsendto').val();
			if (get_mail) {
			} else {
				alert('Please enter a recipient email');
				return false;
			} 
		}		
		
		var theShortcode = getshortcode($(this).attr('id'));
		var ed = tinyMCE.activeEditor;
		ed.selection.setContent(theShortcode);
		tb_remove();
		
		return false;
	});
	
	$('.specialblock').each(function(index, element) {
		var $specialblock = $(this);
		var $main_select = $(this).children('.shortcodes_panel_row:first').find('select');
		var checked = $main_select.val();
		var $main_option = $main_select.find('option');
		
		$specialblock.children('.hiddenblock').each(function() {
			if($(this).hasClass(checked)){
				$(this).fadeIn(300);
			}else{
				$(this).fadeOut(300);
			}
		});
		
        $main_select.on('change', function() {
			var showing_id = $(this).val();
			$specialblock.children('.hiddenblock').each(function() {
                if($(this).hasClass(showing_id)){
					$(this).fadeIn(300);
				}else{
					$(this).fadeOut(300);
				}
            });
			//======> Team Members
			if( $main_select.is("#idealtheme_team_members_type") ){
				if( showing_id == 'blocks' ){
					$('#form_team_members').addClass("member_block_form");
				}else{
					$('#form_team_members').removeClass("member_block_form");
				}
			}
			//======> Icon Boxes
			if( $main_select.is("#idealtheme_font_icon_box_type") ){
				if( showing_id == 'style10' ){
					$('#form_font_icon_box').addClass("tree_icon_form");
					$('#form_font_icon_box').removeClass("image_icon_form normal_icon_form");
					
				}else if( showing_id == 'style11' ){
					$('#form_font_icon_box').addClass("image_icon_form");
					$('#form_font_icon_box').removeClass("tree_icon_form normal_icon_form");
				}else{
					$('#form_font_icon_box').removeClass("tree_icon_form image_icon_form");
					$('#form_font_icon_box').addClass("normal_icon_form");
				}
			}
		});
    });
	
	//========> What The Current Shortcode ?

	function getshortcode(id) {
		
		var get_titles = ''; 
		var output = ''; 
		
		//===========> Enar Columns
		if (id == 'insert_columns') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {	
					var col = jQuery(this).find('select#idealtheme_column_type').val();
					var bg_color = jQuery(this).find('input.wp-color-picker:first').val();
					var color = jQuery(this).find('input.wp-color-picker:last').val();
					var align = jQuery(this).find('select#idealtheme_column_text_align').val();
					
					var bg_image = jQuery(this).find('input#idealtheme_column_bg_img').val();
					var bg_repeat = jQuery(this).find('select#idealtheme_column_bg_repeat').val();
					var bg_attach = jQuery(this).find('select#idealtheme_column_bg_attachment').val();
					var bg_size = jQuery(this).find('select#idealtheme_column_bg_size').val();
					
					var padding_r_l = jQuery(this).find('select#idealtheme_columns_padding_r_l').val();
					var padding_top = jQuery(this).find('input#idealtheme_columns_padding_top').val();
					var padding_bot = jQuery(this).find('input#idealtheme_columns_padding_bottom').val();
					//var padding_right = jQuery(this).find('input#idealtheme_columns_padding_right').val();
					//var padding_left = jQuery(this).find('input#idealtheme_columns_padding_left').val();
					var delay = jQuery(this).find('input#idealtheme_column_animation_delay').val();
					var animation = jQuery(this).find('select#idealtheme_column_animation_type').val();
					var content = jQuery(this).find('textarea#idealtheme_column_content').val();
					if ( content !== '' ) {
						content = '[hm_text]'+content+'[/hm_text]';
					}
					
					output += '[hm_column col="'+col+'" bg_color="'+bg_color+'" color="'+color+'" align="'+align+'" bg_image="'+bg_image+'" bg_repeat="'+bg_repeat+'" bg_attach="'+bg_attach+'" bg_size="'+bg_size+'" padding_r_l="'+padding_r_l+'" padding_top="'+padding_top+'" padding_bot="'+padding_bot+'" delay="'+delay+'" animation="'+animation+'"]'+content+'[/hm_column]';
					
					// padding_right="'+padding_right+'" padding_left="'+padding_left+'"
			});
			
			output = '[hm_row]'+output+'[/hm_row]';
						
		}
		
		//===========> Section
		if (id == 'insert_section_container') {
			    var mode = jQuery('select#idealtheme_section_container_color_mode').val();
				var bg_image = jQuery('input#idealtheme_section_container_bg_img').val();
				var bg_repeat = jQuery('select#idealtheme_section_container_bg_repeat').val();
				var bg_attach = jQuery('select#idealtheme_section_container_bg_attachment').val();
				var bg_size = jQuery('select#idealtheme_section_container_bg_size').val();
				
				var bg_color = jQuery('input#idealtheme_section_container_bg_color').val();
			    var bg_overlay = jQuery('select#idealtheme_section_container_overlay').val();
				
				var border_color = jQuery('input#idealtheme_section_container_border_color').val();
				var border_style = jQuery('select#idealtheme_section_container_border_type').val();
				var border_top_width = jQuery('input#idealtheme_section_container_border_t_w').val();
				var border_right_width = jQuery('input#idealtheme_section_container_border_r_w').val();
				var border_bottom_width = jQuery('input#idealtheme_section_container_border_b_w').val();
				var border_left_width = jQuery('input#idealtheme_section_container_border_l_w').val();
				
				var layout = jQuery('#idealtheme_section_container_layout').find('input[name=idealtheme_section_container_layout]:checked').val();
				if(! layout){
					layout = '';
				};
				var icon = jQuery('li.active_icon input[name="idealtheme_section_container_icon"]').val();
				if(! icon){
					icon = '';
				};
				var color = jQuery('input#idealtheme_section_container_text_color').val();
				//var spacer = jQuery('select#idealtheme_section_container_spacer').val();
				var padding_top = jQuery('input#idealtheme_section_padding_top').val();
				var padding_bot = jQuery('input#idealtheme_section_padding_bottom').val();
				var align = jQuery('select#idealtheme_section_container_text_align').val();
				//var section_id = jQuery('input#idealtheme_section_id').val();
				
				output = '[hm_section mode="'+mode+'" bg_image="'+bg_image+'" bg_repeat="'+bg_repeat+'" bg_attach="'+bg_attach+'" bg_size="'+bg_size+'" bg_color="'+bg_color+'" bg_overlay="'+bg_overlay+'" border_color="'+border_color+'" border_style="'+border_style+'" border_top_width="'+border_top_width+'" border_right_width="'+border_right_width+'" border_bottom_width="'+border_bottom_width+'" border_left_width="'+border_left_width+'" layout="'+layout+'" icon="'+icon+'" color="'+color+'" padding_top="'+padding_top+'" padding_bot="'+padding_bot+'" align="'+align+'"][/hm_section]';
				
		}
		
		//===========> Video Row
		if (id == 'insert_video_section') {
			    var mode = jQuery('select#idealtheme_video_container_color_mode').val();
				var bg_image = jQuery('input#idealtheme_video_section_bg_img').val();
				var bg_repeat = jQuery('select#idealtheme_video_section_bg_repeat').val();
				var bg_attach = jQuery('select#idealtheme_video_section_bg_attachment').val();
				var bg_size = jQuery('select#idealtheme_video_section_bg_size').val();
				
				var bg_color = jQuery('input#idealtheme_video_section_bg_color').val();
			    var bg_overlay = jQuery('select#idealtheme_video_section_overlay').val();
				
				var border_color = jQuery('input#idealtheme_video_section_border_color').val();
				var border_style = jQuery('select#idealtheme_video_section_border_type').val();
				var border_top_width = jQuery('input#idealtheme_video_section_border_t_w').val();
				var border_right_width = jQuery('input#idealtheme_video_section_border_r_w').val();
				var border_bottom_width = jQuery('input#idealtheme_video_section_border_b_w').val();
				var border_left_width = jQuery('input#idealtheme_video_section_border_l_w').val();
				
				var layout = jQuery('#idealtheme_video_section_layout').find('input[name=idealtheme_video_section_layout]:checked').val();
				if(! layout){
					layout = '';
				};
				var icon = jQuery('li.active_icon input[name="idealtheme_video_section_icon"]').val();
				if(! icon){
					icon = '';
				};
				var color = jQuery('input#idealtheme_video_section_text_color').val();
				//var spacer = jQuery('select#idealtheme_video_section_spacer').val();
				var padding_top = jQuery('input#idealtheme_video_padding_top').val();
				var padding_bot = jQuery('input#idealtheme_video_padding_bottom').val();
				var align = jQuery('select#idealtheme_video_section_text_align').val();
				
				//=====>
				var video_type = jQuery('select#idealtheme_video_section_video_type').val();
				
				var video_outputs = '';
				if( video_type ){
					
					if( video_type == 'youtube' ){
						
						var video_id = jQuery('input#idealtheme_video_section_youtube_id').val();
						var video_height = jQuery('input#idealtheme_video_section_youtube_height').val();
						
						var video_frame = jQuery('select#idealtheme_video_section_youtube_frame').val();
						var video_controls = jQuery('select#idealtheme_video_section_youtube_controls').val();
						var video_autoplay = jQuery('select#idealtheme_video_section_youtube_autoplay').val();
						var video_mute = jQuery('select#idealtheme_video_section_youtube_mute').val();
						var video_loop = jQuery('select#idealtheme_video_section_youtube_loop').val();
						
						video_outputs += 'video_type="'+video_type+'" video_id="'+video_id+'" video_height="'+video_height+'" video_frame="'+video_frame+'" video_controls="'+video_controls+'" video_autoplay="'+video_autoplay+'" video_mute="'+video_mute+'" video_loop="'+video_loop+'"';
						
					}else if( video_type == 'hosted' ){
						
						var hosted_mp = jQuery('input#idealtheme_video_section_hosted_mp').val();
						var hosted_ogg = jQuery('input#idealtheme_video_section_hosted_ogg').val();
						var hosted_webm = jQuery('input#idealtheme_video_section_hosted_webm').val();
						var hosted_height = jQuery('input#idealtheme_video_section_hosted_height').val();
						
						video_outputs += 'video_type="'+hosted+'" hosted_mp="'+hosted_mp+'" hosted_ogg="'+hosted_ogg+'" hosted_webm="'+hosted_webm+'" hosted_height="'+hosted_height+'"';
					}
				};
				
				output = '[hm_video mode="'+mode+'" bg_image="'+bg_image+'" bg_repeat="'+bg_repeat+'" bg_attach="'+bg_attach+'" bg_size="'+bg_size+'" bg_color="'+bg_color+'" bg_overlay="'+bg_overlay+'" border_color="'+border_color+'" border_style="'+border_style+'" border_top_width="'+border_top_width+'" border_right_width="'+border_right_width+'" border_bottom_width="'+border_bottom_width+'" border_left_width="'+border_left_width+'" layout="'+layout+'" icon="'+icon+'" color="'+color+'" padding_top="'+padding_top+'" padding_bot="'+padding_bot+'" align="'+align+'" '+video_outputs+'][/hm_video]';
				
		}
		
		//===========> Title
		if (id == 'insert_main_title') {
				var type = jQuery('select#idealtheme_title_type').val();
				//var font = jQuery('select#idealtheme_title_font_family').val();
				
				var transform = jQuery('select#idealtheme_title_transform').val();
				var align = jQuery('select#idealtheme_title_text_align').val();
				var color = jQuery('input#idealtheme_title_text_color').val();
				
				var footer = jQuery('select#idealtheme_title_footer').val();
				
				var icon_con = '';
				var icon_color = jQuery('input#idealtheme_title_icon_color').val();
				var icon = jQuery('li.active_icon input[name="idealtheme_title_icon"]').val();
				if(! icon){
					icon = '';
				}
				
				if(type == 'main_title'){
					icon_con += 'icon="'+icon+'" icon_color="'+icon_color+'" ';
				}
				
				var small_icon_color = jQuery('input#idealtheme_title_small_icon_color').val();
				var small_icon = jQuery('li.active_icon input[name="idealtheme_title_small_icon"]').val();
				if(! small_icon){
					small_icon = '';
				}
				if(type == 'small_title' || type == 'normal_title'){
					icon_con += 'icon="'+small_icon+'" icon_color="'+small_icon_color+'" ';
				}
			    
				var title_size = jQuery('select#idealtheme_title_size').val();
				
				var full_bg = jQuery('input#idealtheme_title_full_bg_color').val();
				
				var bg_color = jQuery('input#idealtheme_title_has_bg_color').val();
				
				var content = jQuery('textarea#idealtheme_title_content').val();
				
				var type_con = '';
				var footer_con = '';
				if(type == 'main_title'){
					if(footer == 'has_bg'){
						footer_con += 'bg_color="'+bg_color+'"';
					}
					type_con += 'footer="'+footer+'" title_size="'+title_size+'" '+footer_con;
				}
				//font="'+font+'"
				output = '[hm_title type="'+type+'" full_bg="'+full_bg+'" transform="'+transform+'" align="'+align+'" color="'+color+'" '+type_con+' '+icon_con+']'+content+'[/hm_title]';
				
		}
		
		//===========> Description
		
		if (id == 'insert_description_block') {
				var type = jQuery('select#idealtheme_description_block_type').val();
				var transform = jQuery('select#idealtheme_description_block_transform').val();
				var align = jQuery('select#idealtheme_description_block_text_align').val();
				var content = jQuery('textarea#idealtheme_description_block_content').val();
				
				output = '[hm_desc type="'+type+'" transform="'+transform+'" align="'+align+'"]'+content+'[/hm_desc]';
				
		}
		
		//===========> Light Box
		
		if (id == 'insert_light_box') {
				var type = jQuery('select#idealtheme_light_box_type').val();
				var light_box_con = '';
				var content = ''
				
				if ( type == 'dialog' ){
					var btn_title = jQuery('input#idealtheme_light_box_type_dialog_btntext').val();
					var btn_color = jQuery('input#idealtheme_light_box_type_dialog_btncolor').val();
					var effect = jQuery('select#idealtheme_light_box_type_dialog_effect').val();
					    content += jQuery('textarea#idealtheme_light_box_type_dialog_con').val();
						
					output = '[hm_lightbox type="'+type+'" btn_title="'+btn_title+'" btn_color="'+btn_color+'" effect="'+effect+'"]'+content+'[/hm_lightbox]';
					
				}else if ( type == 'image' || type == 'gallery' ){
					
					$('#'+id).parent('form').find('.hiddenblock.gallery.image').children('.group').each(function(index) {	
						var col = jQuery(this).find('select#idealtheme_light_box_type_gall_col').val();
						var img = jQuery(this).find('input#idealtheme_light_box_type_gall_img').val();
						
						light_box_con += '[hm_lightbox type="'+type+'" col="'+col+'" img="'+img+'"]';
					});
					
					if ( type == 'gallery' ){
						output += '[hm_row light_box_gall="yes"]'+light_box_con+'[/hm_row]';
					}else{
						output += light_box_con;
					}
				
				}else if ( type == 'iframe' ){
					var iframe_type = jQuery('select#idealtheme_light_box_iframe_type').val();
				    var iframe_title = jQuery('input#idealtheme_light_box_iframe_title').val();
					var iframe_url = jQuery('input#idealtheme_light_box_iframe_url').val();
					var iframe_con = jQuery('select#idealtheme_light_box_iframe_con').val();
					
					
					if( iframe_con == 'image' ){
						var iframe_poster = jQuery('input#idealtheme_light_box_iframe_con_img').val();
						light_box_con += 'iframe_poster="'+iframe_poster+'"';
						
					}else{
						var iframe_btn_text = jQuery('input#idealtheme_light_box_iframe_con_title').val();
						light_box_con += 'iframe_btn_text="'+iframe_btn_text+'"';
					}
					
					output += '[hm_lightbox type="'+type+'" iframe_type="'+iframe_type+'" iframe_title="'+iframe_title+'" iframe_url="'+iframe_url+'" iframe_con="'+iframe_con+'" '+light_box_con+']';
					
				}else if ( type == 'ajax' ){
				
				}
				
		}
		
		//===========> Accordion
		
		if (id == 'insert_accordion') {
			var type = jQuery('select#idealtheme_accordion_type').val();
			var arrow = jQuery('select#idealtheme_accordion_arrow').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {	
					var title = jQuery(this).find('input#idealtheme_accordion_title').val();
					var icon = jQuery(this).find('li.active_icon input[name="idealtheme_accordion_icon"]').val();
					if(! icon){
						icon = '';
					}
					var expanded = jQuery(this).find('select#idealtheme_accordion_expanded').val();
					var content = jQuery(this).find('textarea#idealtheme_accordion_content').val();
					
					if ( content !== '' ) {
						content = '[hm_text]'+content+'[/hm_text]';
					}
					
					output += '[hm_accordion_tab title="'+title+'" icon="'+icon+'" expanded="'+expanded+'"]'+content+'[/hm_accordion_tab]';
			});
			
			output = '[hm_accordion type="'+type+'" arrow="'+arrow+'"]'+output+'[/hm_accordion]';
		}
		
		//===========> Tabs
		
		if (id == 'insert_tabs') {
			var type = jQuery('select#idealtheme_tabs_type').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {	
					var title = jQuery(this).find('input#idealtheme_tabs_title').val();
					var img   = jQuery(this).find('input#idealtheme_tabs_content_img').val();
					var icon  = jQuery(this).find('li.active_icon input[name="idealtheme_tabs_icon"]').val();
					if(! icon){
						icon = '';
					}
					var content = jQuery(this).find('textarea#idealtheme_tabs_content').val();
					if ( content !== '' ) {
						content = '[hm_text]'+content+'[/hm_text]';
					}
					output += '[hm_tab title="'+title+'" img="'+img+'" icon="'+icon+'"]'+content+'[/hm_tab]';
			});
			
			output = '[hm_tabs type="'+type+'"]'+output+'[/hm_tabs]';
		}
		
		//===========> Banner Text
		
		if (id == 'insert_banner_text') {
			var type = jQuery('select#idealtheme_banner_text_type').val();
			var bg_color = jQuery('input#idealtheme_banner_text_bg_color').val();
			var icon = jQuery('li.active_icon input[name="idealtheme_banner_text_icon"]').val();
			if(! icon){
				icon = '';
			}
			var title = jQuery('input#idealtheme_banner_text_title').val();
			var content = jQuery('textarea#idealtheme_banner_text_content').val();
			var align = jQuery('select#idealtheme_banner_text_align').val();
			var btn_title = jQuery('input#idealtheme_banner_text_btn_text').val();
			var btn_url = jQuery('input#idealtheme_banner_text_btn_url').val();
			var btn_target = jQuery('select#idealtheme_banner_text_btn_terget').val();
			var btn_icon = jQuery('li.active_icon input[name="idealtheme_banner_text_btn_icon"]').val();
			if(! btn_icon){
				btn_icon = '';
			}
			
			output = '[hm_banner type="'+type+'" bg_color="'+bg_color+'" icon="'+icon+'" title="'+title+'" align="'+align+'" btn_title="'+btn_title+'" btn_url="'+btn_url+'" btn_target="'+btn_target+'" btn_icon="'+btn_icon+'"]'+content+'[/hm_banner]';
		}
		
		//===========> Banner Text Slider
		
		if (id == 'insert_banner_text_slide') {
			$('#'+id).parent('form').find('.group').each(function(index) {
				var icon = jQuery(this).find('li.active_icon input[name="idealtheme_banner_text_slide_icon"]').val();
				if(! icon){
					icon = '';
				}
				var title = jQuery(this).find('input#idealtheme_banner_text_slide_title').val();
				var content = jQuery(this).find('textarea#idealtheme_banner_text_slide_content').val();
				var align = jQuery(this).find('select#idealtheme_banner_text_slide_align').val();
				var btn_title = jQuery(this).find('input#idealtheme_banner_text_slide_btn_text').val();
				var btn_url = jQuery(this).find('input#idealtheme_banner_text_slide_btn_url').val();
				var btn_target = jQuery(this).find('select#idealtheme_banner_text_slide_btn_terget').val();
				var btn_icon = jQuery(this).find('li.active_icon input[name="idealtheme_banner_text_slide_btn_icon"]').val();
				if(! btn_icon){
					btn_icon = '';
				}
				
				output += '[hm_banner type="slide" icon="'+icon+'" title="'+title+'" align="'+align+'" btn_title="'+btn_title+'" btn_url="'+btn_url+'" btn_target="'+btn_target+'" btn_icon="'+btn_icon+'"]'+content+'[/hm_banner]';
			});
			output = '[hm_banner_slider]'+output+'[/hm_banner_slider]';
		}
		
		//===========> Skills
		
		if (id == 'insert_skills') {
			var type = jQuery('select#idealtheme_skills_type').val();
			var col = jQuery('select#idealtheme_skills_circle_column').val();
			var path_type = jQuery('select#idealtheme_skills_circle_path').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var title = jQuery(this).find('input#idealtheme_skills_title').val();
					var value = jQuery(this).find('input#idealtheme_skills_value').val();
					var desc = jQuery(this).find('input#idealtheme_skills_desc').val();
					var bg_color = jQuery(this).find('input.idealtheme_color_picker').val();
					
					output += '[hm_skill title="'+title+'" value="'+value+'" desc="'+desc+'" bg_color="'+bg_color+'"]';
			});
			
			output = '[hm_skills type="'+type+'" col="'+col+'" path_type="'+path_type+'"]'+output+'[/hm_skills]';
		}
		
		//===========> Team Members
		if (id == 'insert_team_members') {
			var type = jQuery('select#idealtheme_team_members_type').val();
			var col = jQuery('select#idealtheme_team_members_flip_column').val();	
						
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var name = jQuery(this).find('input#idealtheme_team_members_name').val();
					var job = jQuery(this).find('input#idealtheme_team_members_job').val();
					var content = jQuery(this).find('textarea#idealtheme_team_members_content').val();
					var image = jQuery(this).find('input#idealtheme_team_members_picture').val();
					var url = jQuery(this).find('input#idealtheme_team_members_url').val();
					var target = jQuery(this).find('select#idealtheme_team_members_terget').val();
					
					var bg_color = jQuery(this).find('input#idealtheme_team_members_bg_color').val();
					
					var facebook = jQuery(this).find('input#idealtheme_team_members_socials_social_facebook').val();
					var twitter = jQuery(this).find('input#idealtheme_team_members_socials_social_twitter').val();
					var google = jQuery(this).find('input#idealtheme_team_members_socials_social_googleplus').val();
					var linkedin = jQuery(this).find('input#idealtheme_team_members_socials_social_linkedin').val();
					var vimeo = jQuery(this).find('input#idealtheme_team_members_socials_social_vimeo').val();
					var skype = jQuery(this).find('input#idealtheme_team_members_socials_social_skype').val();
					var rss = jQuery(this).find('input#idealtheme_team_members_socials_social_rss').val();
					var flickr = jQuery(this).find('input#idealtheme_team_members_socials_social_flickr').val();
					var picassa = jQuery(this).find('input#idealtheme_team_members_socials_social_picassa').val();
					var tumblr = jQuery(this).find('input#idealtheme_team_members_socials_social_tumblr').val();
					var dribbble = jQuery(this).find('input#idealtheme_team_members_socials_social_dribbble').val();
					var soundcloud = jQuery(this).find('input#idealtheme_team_members_socials_social_soundcloud').val();
					var instagram = jQuery(this).find('input#idealtheme_team_members_socials_social_instagram').val();
					var pinterest = jQuery(this).find('input#idealtheme_team_members_socials_social_pinterest').val();
					var youtube = jQuery(this).find('input#idealtheme_team_members_socials_social_youtube').val();
					
					output += '[hm_member name="'+name+'" job="'+job+'" image="'+image+'" url="'+url+'" target="'+target+'" bg_color="'+bg_color+'" facebook="'+facebook+'" twitter="'+twitter+'" google="'+google+'" linkedin="'+linkedin+'" vimeo="'+vimeo+'" skype="'+skype+'" rss="'+rss+'" flickr="'+flickr+'" picassa="'+picassa+'" tumblr="'+tumblr+'" dribbble="'+dribbble+'" soundcloud="'+soundcloud+'" instagram="'+instagram+'" pinterest="'+pinterest+'" youtube="'+youtube+'"]'+content+'[/hm_member]';
			});
			output = '[hm_team type="'+type+'" col="'+col+'"]'+output+'[/hm_team]';
		}
		
		//===========> Testimonials
		if (id == 'insert_testimonials') {
			var type = jQuery('select#idealtheme_testimonials_type').val();	
						
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var name = jQuery(this).find('input#idealtheme_testimonials_name').val();
					var job = jQuery(this).find('input#idealtheme_testimonials_job').val();
					var content = jQuery(this).find('textarea#idealtheme_testimonials_content').val();
					var image = jQuery(this).find('input#idealtheme_testimonials_picture').val();
					var url = jQuery(this).find('input#idealtheme_testimonials_url').val();
					var target = jQuery(this).find('select#idealtheme_testimonials_terget').val();
					
					output += '[hm_monial name="'+name+'" job="'+job+'" image="'+image+'" url="'+url+'" target="'+target+'"]'+content+'[/hm_monial]';
			});
			output = '[hm_monials type="'+type+'"]'+output+'[/hm_monials]';
		}
		
		//===========> Our Clients
		if (id == 'insert_our_clients') {
			var style = jQuery('select#idealtheme_our_clients_style').val();
			//var spacer = jQuery('input#idealtheme_our_clients_padding').val();
			//var bg_color = jQuery('input#idealtheme_our_clients_bg_color').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var name = jQuery(this).find('input#idealtheme_our_clients_name').val();
					var logo = jQuery(this).find('input#idealtheme_our_clients_logo').val();
					var url = jQuery(this).find('input#idealtheme_our_clients_url').val();
					var target = jQuery(this).find('select#idealtheme_testimonials_terget').val();
					
					output += '[hm_client name="'+name+'" logo="'+logo+'" url="'+url+'" target="'+target+'"]';
			});
			output = '[hm_clients style="'+style+'"]'+output+'[/hm_clients]';
			//spacer="'+spacer+'" bg_color="'+bg_color+'"
			
		}
		
		//===========> Counter Section
		if (id == 'insert_counters') {
								
			var type = jQuery('select#idealtheme_counters_type').val();
			var delay = jQuery('input#idealtheme_counters_animation_delay').val();
			var animation = jQuery('select#idealtheme_counters_animation_type').val();
			var col = jQuery('select#idealtheme_counters_columns').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					
					var title = jQuery(this).find('input#idealtheme_counters_title').val();
					var number = jQuery(this).find('input#idealtheme_counters_numbers').val();
					var icon = jQuery(this).find('li.active_icon input[name="idealtheme_counters_icon"]').val();
					if(! icon){
						icon = '';
					}
					
					output += '[hm_count title="'+title+'" number="'+number+'" icon="'+icon+'"]';
			});
			output = '[hm_counter type="'+type+'" col="'+col+'" delay="'+delay+'" animation="'+animation+'"]'+output+'[/hm_counter]';
		}
		
		//===========> Icon box
		if (id == 'insert_font_icon_box') {
			
			var type = jQuery('select#idealtheme_font_icon_box_type').val();
		    var tree_image = jQuery('input#idealtheme_font_icon_box_tree_main_image').val();
			var delay = jQuery('input#idealtheme_font_icon_box_animation_delay').val();
			var animation = jQuery('select#idealtheme_font_icon_box_animation_type').val();
			var col = jQuery('select#idealtheme_font_icon_box_column').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {		
			        			
					var title = jQuery(this).find('input#idealtheme_font_icon_box_title').val();
					var url = jQuery(this).find('input#idealtheme_font_icon_box_url').val();
					var target = jQuery(this).find('select#idealtheme_font_icon_box_terget').val();
					
					var icon_color = jQuery(this).find('input#idealtheme_font_icon_box_icon_color').val();
					var icon = jQuery(this).find('li.active_icon input[name="idealtheme_font_icon_box_icon"]').val();
					if(! icon){
						icon = '';
					}
					
					var img_icon = jQuery(this).find('input#idealtheme_font_icon_box_type_image').val();
					var leaf_color = jQuery(this).find('input#idealtheme_font_icon_box_tree_bg_color').val();
					var content = jQuery(this).find('textarea#idealtheme_font_icon_box_content').val();
					
					output += '[hm_icon title="'+title+'" url="'+url+'" target="'+target+'" icon_color="'+icon_color+'" icon="'+icon+'" img_icon="'+img_icon+'" leaf_color="'+leaf_color+'"]'+content+'[/hm_icon]';
			});
			output = '[hm_icons type="'+type+'" col="'+col+'" tree_image="'+tree_image+'" delay="'+delay+'" animation="'+animation+'"]'+output+'[/hm_icons]';
			
		}
		
		//===========> Buttons
		if (id == 'insert_hm_button') {
			
			var type = jQuery('select#idealtheme_hm_button_type').val();
		    var size = jQuery('select#idealtheme_hm_button_size').val();
			
			var title = jQuery('input#idealtheme_hm_button_title').val();
			var url = jQuery('input#idealtheme_hm_button_url').val();
			var target = jQuery('select#idealtheme_hm_button_terget').val();
			
			var bg_color = jQuery('input#idealtheme_hm_button_bg_color').val();
			var bg_hover = jQuery('input#idealtheme_hm_button_hover_bg_color').val();
			var icon = jQuery('li.active_icon input[name="idealtheme_hm_button_icon"]').val();
			if(! icon){
				icon = '';
			}
			
			var margin_top = jQuery('input#idealtheme_hm_button_padding_top').val();
			var margin_bottom = jQuery('input#idealtheme_hm_button_padding_bottom').val();
			
			output = '[hm_button type="'+type+'" title="'+title+'" size="'+size+'" url="'+url+'" target="'+target+'" bg_color="'+bg_color+'" bg_hover="'+bg_hover+'" icon="'+icon+'" margin_top="'+margin_top+'" margin_bottom="'+margin_bottom+'"][/hm_button]';
			
		}
		
		//===========> Google Map
		if (id == 'insert_google_maps') {
			var latitude = jQuery('input#idealtheme_google_maps_latitude').val();
			var longitude = jQuery('input#idealtheme_google_maps_longitude').val();
			
			var description = jQuery('textarea#idealtheme_google_maps_desc').val();
			var bordered = jQuery('select#idealtheme_google_maps_border_box').val();
			
			output = '[hm_google_map latitude="'+latitude+'" longitude="'+longitude+'" description="'+description+'" bordered="'+bordered+'"][/hm_google_map]';
	
		}
		
		//===========> Tooltip
		
		if (id == 'insert_hm_tooltip') {
			var title = jQuery('input#idealtheme_hm_tooltip_title').val();
			var content = jQuery('textarea#idealtheme_hm_tooltip_content').val();
			
			var style = jQuery('select#idealtheme_hm_tooltip_type').val();
			var effect = jQuery('select#idealtheme_hm_tooltip_type_effect').val();
			var tol_image = jQuery('input#idealtheme_hm_tooltip_image').val();
			
			output = '[hm_tooltip title="'+title+'" style="'+style+'" effect="'+effect+'" tol_image="'+tol_image+'"]'+content+'[/hm_tooltip]';
	
		}
		
		//===========> Blockquote
		if (id == 'insert_hm_blockquote') {
			var style = jQuery('select#idealtheme_hm_blockquote_style').val();
			var content = jQuery('textarea#idealtheme_hm_blockquote_content').val();
			var footer = jQuery('input#idealtheme_hm_blockquote_footer').val();
			
			output = '[hm_quote style="'+style+'" footer="'+footer+'"]'+content+'[/hm_quote]';
	
		}
		
		//===========> Pricing Tables 
		
		if (id == 'insert_hm_pricing_tables') {
			
			var style = jQuery('select#idealtheme_hm_pricing_tables_style').val();
			var feature_list = '';
			
			$('#'+id).parent('form').children('.group').each(function(index) {		
			        var $fearure_row = $(this);
						
					var col = jQuery(this).find('select#idealtheme_hm_pricing_tables_col_type').val();
					var active = jQuery(this).find('select#idealtheme_hm_pricing_tables_col_style').val();
					
					var title = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_name').val();
					var price = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_price').val();
					var currency = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_currency').val();
					var time = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_time').val();
					
					var button_text = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_btn_text').val();
					var button_url = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_btn_url').val();
					var button_target = jQuery(this).find('select#idealtheme_hm_pricing_tables_plan_btn_target').val();
					
					$fearure_row.children('.group').each(function(index) {
						var feature = jQuery(this).find('input#idealtheme_hm_pricing_tables_plan_feature').val();
						var icon = jQuery(this).find('select#idealtheme_hm_pricing_tables_plan_icon').val();
						
						feature_list += '[hm_pricing_plan_row icon="'+icon+'"]'+feature+'[/hm_pricing_plan_row]';
					});
					
					output += '[hm_pricing_plan title="'+title+'" price="'+price+'" currency="'+currency+'" time="'+time+'" button_text="'+button_text+'" button_url="'+button_url+'" button_target="'+button_target+'" col="'+col+'" active="'+active+'"]'+feature_list+'[/hm_pricing_plan]';
					
					feature_list = '';
			});
			
			output = '[hm_pricing_table style="'+style+'"]'+output+'[/hm_pricing_table]';
			
		}
		
		//===========> Portfolio Filter
		
		if (id == 'insert_portfolio_filters') {
								
			var style         = jQuery('select#idealtheme_portfolio_filters_style').val();
			var filter_layout = jQuery('select#idealtheme_portfolio_filters_layout').val();
			var filter_width  = jQuery('select#idealtheme_portfolio_filters_layout_width').val();
			var filter_column = jQuery('select#idealtheme_portfolio_filters_columns').val();
			var filter_spaces = jQuery('select#idealtheme_portfolio_filters_spaces').val();
			var items_counter = jQuery('select#idealtheme_portfolio_filters_counter').val();
			var buttons_style = jQuery('select#idealtheme_portfolio_button_style').val();
			
			var orderby          = jQuery('select#idealtheme_portfolio_filters_orderby').val();
			var sortby           = jQuery('select#idealtheme_portfolio_filters_projects_order').val();
			
			var cat_orderby      = jQuery('select#idealtheme_portfolio_filters_cat_order').val();
			var cat_sortby       = jQuery('select#idealtheme_portfolio_filters_categories_order').val();
			var hide_empty       = jQuery('select#idealtheme_portfolio_filters_show_empty').val();
			var show_all_button  = jQuery('select#idealtheme_portfolio_filters_hide_all_btn').val();
			//var show_ajax_expand = jQuery('select#idealtheme_portfolio_filters_show_ajax_expand').val();
			var show_filters     = jQuery('select#idealtheme_portfolio_filters_show_buttons').val();
			var show_sortby      = jQuery('select#idealtheme_portfolio_filters_show_sortby').val();
			var show_date        = jQuery('select#idealtheme_portfolio_filters_show_date').val();
			var show_cats        = jQuery('select#idealtheme_portfolio_filters_show_cats').val();
			var show_comments    = jQuery('select#idealtheme_portfolio_filters_show_comment_counter').val();
			//var show_like        = jQuery('select#idealtheme_portfolio_filters_show_like_counter').val();
			
			var all_btn_text     = jQuery('input#idealtheme_portfolio_filters_all_btn_text').val();
			var zoom_btn_text    = jQuery('input#idealtheme_portfolio_filters_button_zoom').val();
			var more_btn_text    = jQuery('input#idealtheme_portfolio_filters_button_details').val();
			//var ajax_btn_text    = jQuery('input#idealtheme_portfolio_filters_button_expand').val();
			var sort_srtby_text  = jQuery('input#idealtheme_portfolio_filters_sort_menu_by').val();
			var sort_names_text  = jQuery('input#idealtheme_portfolio_filters_sort_menu_names').val();
			var sort_dates_text  = jQuery('input#idealtheme_portfolio_filters_sort_menu_dates').val();
			//var sort_likes_text  = jQuery('input#idealtheme_portfolio_filters_sort_menu_likes').val();
			var sort_comnt_text  = jQuery('input#idealtheme_portfolio_filters_sort_menu_comm').val();
			var posts_num        = jQuery('input#idealtheme_portfolio_filters_num_posts').val();
			
			var cats = '';
			$('#'+id).parent('form').find('.chickbox_idealtheme_portfolio_filters_category').find('.chickyy').each(function(index) {
				    var my_chicked_con = $(this);
				    var my_chicked = $(this).find("input[type='checkbox']:checked").val();
						
				    if(! my_chicked){
					    cats += '';
					}else{
						if (my_chicked_con.is(':last-child')){
							cats += my_chicked;
						}else{
							cats += my_chicked+',';
						}
					}					
			});
			// show_ajax_expand="'+show_ajax_expand+'" 	
			// ajax_btn_text="'+ajax_btn_text+'"
			// sort_likes_text="'+sort_likes_text+'"
			// show_like="'+show_like+'"
			
			output += '[hm_portfolio_filter cats="'+cats+'"'+' style="'+style+'" filter_layout="'+filter_layout+'" filter_width="'+filter_width+'" filter_column="'+filter_column+'" filter_spaces="'+filter_spaces+'" items_counter="'+items_counter+'" buttons_style="'+buttons_style+'" orderby="'+orderby+'" sortby="'+sortby+'" cat_orderby="'+cat_orderby+'" cat_sortby="'+cat_sortby+'" hide_empty="'+hide_empty+'" show_all_button="'+show_all_button+'" show_filters="'+show_filters+'" show_sortby="'+show_sortby+'" show_date="'+show_date+'" show_cats="'+show_cats+'" show_comments="'+show_comments+'" all_btn_text="'+all_btn_text+'" zoom_btn_text="'+zoom_btn_text+'" more_btn_text="'+more_btn_text+'" sort_srtby_text="'+sort_srtby_text+'" sort_names_text="'+sort_names_text+'" sort_dates_text="'+sort_dates_text+'" sort_comnt_text="'+sort_comnt_text+'" posts_num="'+posts_num+'"]';
		}
		
		//===========> Blog Filter
		
		if (id == 'insert_blog_filters') {
								
			var style         = jQuery('select#idealtheme_blog_filters_style').val();
			var filter_layout = jQuery('select#idealtheme_blog_filters_layout').val();
			var filter_width  = jQuery('select#idealtheme_blog_filters_layout_width').val();
			var filter_column = jQuery('select#idealtheme_blog_filters_columns').val();
			var filter_spaces = jQuery('select#idealtheme_blog_filters_spaces').val();
			var items_counter = jQuery('select#idealtheme_blog_filters_counter').val();
			var buttons_style = jQuery('select#idealtheme_blog_button_style').val();
			
			var orderby          = jQuery('select#idealtheme_blog_filters_orderby').val();
			var sortby           = jQuery('select#idealtheme_blog_filters_projects_order').val();
			
			var cat_orderby      = jQuery('select#idealtheme_blog_filters_cat_order').val();
			var cat_sortby       = jQuery('select#idealtheme_blog_filters_categories_order').val();
			var hide_empty       = jQuery('select#idealtheme_blog_filters_show_empty').val();
			var show_all_button  = jQuery('select#idealtheme_blog_filters_hide_all_btn').val();
			//var show_ajax_expand = jQuery('select#idealtheme_blog_filters_show_ajax_expand').val();
			var show_filters     = jQuery('select#idealtheme_blog_filters_show_buttons').val();
			var show_sortby      = jQuery('select#idealtheme_blog_filters_show_sortby').val();
			var show_date        = jQuery('select#idealtheme_blog_filters_show_date').val();
			var show_cats        = jQuery('select#idealtheme_blog_filters_show_cats').val();
			var show_comments    = jQuery('select#idealtheme_blog_filters_show_comment_counter').val();
			//var show_like        = jQuery('select#idealtheme_blog_filters_show_like_counter').val();
			
			var all_btn_text     = jQuery('input#idealtheme_blog_filters_all_btn_text').val();
			var zoom_btn_text    = jQuery('input#idealtheme_blog_filters_button_zoom').val();
			var more_btn_text    = jQuery('input#idealtheme_blog_filters_button_details').val();
			//var ajax_btn_text    = jQuery('input#idealtheme_blog_filters_button_expand').val();
			var sort_srtby_text  = jQuery('input#idealtheme_blog_filters_sort_menu_by').val();
			var sort_names_text  = jQuery('input#idealtheme_blog_filters_sort_menu_names').val();
			var sort_dates_text  = jQuery('input#idealtheme_blog_filters_sort_menu_dates').val();
			//var sort_likes_text  = jQuery('input#idealtheme_blog_filters_sort_menu_likes').val();
			var sort_comnt_text  = jQuery('input#idealtheme_blog_filters_sort_menu_comm').val();
			var posts_num        = jQuery('input#idealtheme_blog_filters_num_posts').val();
			
			var cats = '';
			$('#'+id).parent('form').find('.chickbox_idealtheme_blog_filters_category').find('.chickyy').each(function(index) {
				    var my_chicked_con = $(this);
				    var my_chicked = $(this).find("input[type='checkbox']:checked").val();
						
				    if(! my_chicked){
					    cats += '';
					}else{
						if (my_chicked_con.is(':last-child')){
							cats += my_chicked;
						}else{
							cats += my_chicked+',';
						}
					}					
			});
			// show_ajax_expand="'+show_ajax_expand+'" 	
			// ajax_btn_text="'+ajax_btn_text+'"
			// sort_likes_text="'+sort_likes_text+'"
			// show_like="'+show_like+'"
			
			output += '[hm_blog_filter cats="'+cats+'"'+' style="'+style+'" filter_layout="'+filter_layout+'" filter_width="'+filter_width+'" filter_column="'+filter_column+'" filter_spaces="'+filter_spaces+'" items_counter="'+items_counter+'" buttons_style="'+buttons_style+'" orderby="'+orderby+'" sortby="'+sortby+'" cat_orderby="'+cat_orderby+'" cat_sortby="'+cat_sortby+'" hide_empty="'+hide_empty+'" show_all_button="'+show_all_button+'" show_filters="'+show_filters+'" show_sortby="'+show_sortby+'" show_date="'+show_date+'" show_cats="'+show_cats+'" show_comments="'+show_comments+'" all_btn_text="'+all_btn_text+'" zoom_btn_text="'+zoom_btn_text+'" more_btn_text="'+more_btn_text+'" sort_srtby_text="'+sort_srtby_text+'" sort_names_text="'+sort_names_text+'" sort_dates_text="'+sort_dates_text+'" sort_comnt_text="'+sort_comnt_text+'" posts_num="'+posts_num+'"]';
		}
		
		//===========> FAQs Filters
		if (id == 'insert_faqs_filters') {	
				
			var orderby          = jQuery('select#idealtheme_faqs_filters_posts_orderby').val();
			var sortby           = jQuery('select#idealtheme_faqs_filters_posts_order').val();
			
			var cat_orderby      = jQuery('select#idealtheme_faqs_filters_cat_orderby').val();
			var cat_sortby       = jQuery('select#idealtheme_faqs_filters_cat_order').val();
			var hide_empty       = jQuery('select#idealtheme_faqs_filters_show_empty').val();
			var show_all_button  = jQuery('select#idealtheme_faqs_filters_hide_all_btn').val();

			var show_filters     = jQuery('select#idealtheme_faqs_filters_show_buttons').val();
			var all_btn_text     = jQuery('input#idealtheme_faqs_filters_all_btn_text').val();
			
			var cats = '';
			$('#'+id).parent('form').find('.chickbox_idealtheme_faqs_filters_category').find('.chickyy').each(function(index) {
				    var my_chicked_con = $(this);
				    var my_chicked = $(this).find("input[type='checkbox']:checked").val();
						
				    if(! my_chicked){
					    cats += '';
					}else{
						if (my_chicked_con.is(':last-child')){
							cats += my_chicked;
						}else{
							cats += my_chicked+',';
						}
					}					
			});

			output += '[hm_faqs cats="'+cats+'" orderby="'+orderby+'" sortby="'+sortby+'" cat_orderby="'+cat_orderby+'" cat_sortby="'+cat_sortby+'" hide_empty="'+hide_empty+'" show_all_button="'+show_all_button+'" show_filters="'+show_filters+'" all_btn_text="'+all_btn_text+'" ]';
			
		}
		
		//===========> Blog Carousel
		
		if (id == 'insert_blog_carousel') {
			
			var style = jQuery('select#idealtheme_blog_carousel_style').val();
			var show_title = jQuery('select#idealtheme_blog_carousel_show_title').val();
			var show_cats = jQuery('select#idealtheme_blog_carousel_show_cats').val();
			var show_date = jQuery('select#idealtheme_blog_carousel_show_date').val();
			var show_format = jQuery('select#idealtheme_blog_carousel_format_icon').val();
			
			var posts_num = jQuery('input#idealtheme_blog_carousel_posts_num').val();
			var zoom_btn_text = jQuery('input#idealtheme_blog_carousel_zoom_btn_text').val();
			var more_btn_text = jQuery('input#idealtheme_blog_carousel_more_btn_text').val();
			var order_by = jQuery('select#idealtheme_blog_carousel_posts_order_by').val();
			var order = jQuery('select#idealtheme_blog_carousel_posts_order').val();
			
			var posts_from = jQuery('select#idealtheme_blog_carousel_posts_from').val();
			var categories = jQuery('select#idealtheme_blog_carousel_posts_from_cats').val();
			var posts = jQuery('select#idealtheme_blog_carousel_posts_from_posts').val();
			
			if(! categories){
				categories = '';
			}
			if(! posts){
				posts = '';
			}
			
			output = '[hm_blog_carousel style="'+style+'" show_title="'+show_title+'" show_cats="'+show_cats+'" show_date="'+show_date+'" show_format="'+show_format+'" posts_num="'+posts_num+'" zoom_btn_text="'+zoom_btn_text+'" more_btn_text="'+more_btn_text+'" order_by="'+order_by+'" order="'+order+'" posts_from="'+posts_from+'" categories="'+categories+'" posts="'+posts+'"]';
						
		}
		
		//===========> Portfolio Carousel
		
		if (id == 'insert_projects_carousel') {
			
			var style      = jQuery('select#idealtheme_projects_carousel_style').val();
			var show_title = jQuery('select#idealtheme_projects_carousel_show_title').val();
			var show_date  = jQuery('select#idealtheme_projects_carousel_show_date').val();
			var show_cats  = jQuery('select#idealtheme_projects_carousel_show_cats').val(); // new
			
			var posts_num  = jQuery('input#idealtheme_projects_carousel_posts_num').val();
			var zoom_btn_text = jQuery('input#idealtheme_projects_carousel_zoom_btn_text').val();
			var more_btn_text = jQuery('input#idealtheme_projects_carousel_more_btn_text').val();
			var order_by  = jQuery('select#idealtheme_projects_carousel_posts_order_by').val();
			var order     = jQuery('select#idealtheme_projects_carousel_posts_order').val();
			
			var posts_from = jQuery('select#idealtheme_projects_carousel_posts_from').val();
			var categories = jQuery('select#idealtheme_projects_carousel_posts_from_cats').val();
			var posts      = jQuery('select#idealtheme_projects_carousel_posts_from_posts').val();
			
			if(! categories){
				categories = '';
			}
			if(! posts){
				posts = '';
			}
			
			output = '[hm_portfolio_carousel style="'+style+'" show_title="'+show_title+'" show_date="'+show_date+'" show_cats="'+show_cats+'" posts_num="'+posts_num+'" zoom_btn_text="'+zoom_btn_text+'" more_btn_text="'+more_btn_text+'" order_by="'+order_by+'" order="'+order+'" posts_from="'+posts_from+'" categories="'+categories+'" posts="'+posts+'"]';
						
		}
		//===========> Social Media Sharing
		
		if (id == 'insert_hm_social_share') {
			
			var title = jQuery('input#idealtheme_social_share_title').val();
			var facebook = jQuery('select#idealtheme_social_share_facebook').val();
			var twitter = jQuery('select#idealtheme_social_share_twitter').val();
			var googleplus = jQuery('select#idealtheme_social_share_googleplus').val();
			var pinterest = jQuery('select#idealtheme_social_share_pinterest').val();
			var linkedin = jQuery('select#idealtheme_social_share_linkedin').val();
			var email = jQuery('select#idealtheme_social_share_email').val();
			var stumbleupon = jQuery('select#idealtheme_social_share_stumbleupon').val();
			var digg = jQuery('select#idealtheme_social_share_digg').val();
			var reddit = jQuery('select#idealtheme_social_share_reddit').val();
			var delicious = jQuery('select#idealtheme_social_share_delicious').val();
			var tumblr = jQuery('select#idealtheme_social_share_tumblr').val();
			
			output = '[hm_social_share title="'+title+'" facebook="'+facebook+'" twitter="'+twitter+'" googleplus="'+googleplus+'" pinterest="'+pinterest+'" linkedin="'+linkedin+'" email="'+email+'" stumbleupon="'+stumbleupon+'" digg="'+digg+'" reddit="'+reddit+'" delicious="'+delicious+'" tumblr="'+tumblr+'"]';
						
		}
		
		//===========> Social Media Links
		
		if (id == 'insert_hm_social_links') {
			var style = jQuery('select#idealtheme_social_media_style').val();
			var color_mode = jQuery('select#idealtheme_social_media_color').val();
			var title = jQuery('input#idealtheme_social_media_title').val();
			
			var facebook = jQuery('input#idealtheme_social_media_con_social_facebook').val();
			var twitter = jQuery('input#idealtheme_social_media_con_social_twitter').val();
			var googleplus = jQuery('input#idealtheme_social_media_con_social_googleplus').val();
			var linkedin = jQuery('input#idealtheme_social_media_con_social_linkedin').val();
			var vimeo = jQuery('input#idealtheme_social_media_con_social_vimeo').val();
			var skype = jQuery('input#idealtheme_social_media_con_social_skype').val();
			var rss = jQuery('input#idealtheme_social_media_con_social_rss').val();
			var flickr = jQuery('input#idealtheme_social_media_con_social_flickr').val();
			var picasa = jQuery('input#idealtheme_social_media_con_social_picassa').val();
			var tumblr = jQuery('input#idealtheme_social_media_con_social_tumblr').val();
			var dribble = jQuery('input#idealtheme_social_media_con_social_dribbble').val();
			var soundcloud = jQuery('input#idealtheme_social_media_con_social_soundcloud').val();
			var instagram = jQuery('input#idealtheme_social_media_con_social_instagram').val();
			var pinterest = jQuery('input#idealtheme_social_media_con_social_pinterest').val();
			var youtube = jQuery('input#idealtheme_social_media_con_social_youtube').val();
			
			output = '[hm_social_links style="'+style+'" color_mode="'+color_mode+'" title="'+title+'" facebook="'+facebook+'" twitter="'+twitter+'" googleplus="'+googleplus+'" linkedin="'+linkedin+'" vimeo="'+vimeo+'" skype="'+skype+'" rss="'+rss+'" flickr="'+flickr+'" picasa="'+picasa+'" tumblr="'+tumblr+'" dribble="'+dribble+'" soundcloud="'+soundcloud+'" instagram="'+instagram+'" pinterest="'+pinterest+'" youtube="'+youtube+'"]';
						
		}
		
		//===========> Coming Soon
		
		if (id == 'insert_coming_soon') {
			var evant_day = jQuery('input#idealtheme_coming_soon_day').val();
			var day_color = jQuery('input#idealtheme_coming_soon_day_color').val();
			var day_title = jQuery('input#idealtheme_coming_soon_day_title').val();
			
			var evant_hour = jQuery('input#idealtheme_coming_soon_hour').val();
			var hour_color = jQuery('input#idealtheme_coming_soon_hour_color').val();
			var hour_title = jQuery('input#idealtheme_coming_soon_hour_title').val();
			
			var minutes_color = jQuery('input#idealtheme_coming_soon_minutes_color').val();
			var minutes_title = jQuery('input#idealtheme_coming_soon_minutes_title').val();
			
			var seconds_color = jQuery('input#idealtheme_coming_soon_seconds_color').val();
			var seconds_title = jQuery('input#idealtheme_coming_soon_seconds_title').val();
			
			output = '[hm_soon evant_day="'+evant_day+'" day_color="'+day_color+'" day_title="'+day_title+'" evant_hour="'+evant_hour+'" hour_color="'+hour_color+'" hour_title="'+hour_title+'" minutes_color="'+minutes_color+'" minutes_title="'+minutes_title+'" seconds_color="'+seconds_color+'" seconds_title="'+seconds_title+'"]';
						
		}
		
		//===========> WooCommerce Related
		
		if (id == 'insert_woocommerce_related') {
			var posts = jQuery('select#idealtheme_woocommerce_related_posts').val();
			var posts_num = jQuery('input#idealtheme_woocommerce_related_posts_num').val();
			
			var show_cats = jQuery('select#idealtheme_woocommerce_related_show_cats').val();
			var show_price = jQuery('select#idealtheme_woocommerce_related_show_price').val();
			var show_review = jQuery('select#idealtheme_woocommerce_related_show_review').val();
			var show_cart_btn = jQuery('select#idealtheme_woocommerce_related_show_add_btn').val();
			var order_by = jQuery('select#idealtheme_woocommerce_related_posts_order_by').val();
			var order = jQuery('select#idealtheme_woocommerce_related_posts_order').val();
			
			output = '[hm_related_product posts="'+posts+'" posts_num="'+posts_num+'" show_cats="'+show_cats+'" show_price="'+show_price+'" show_review="'+show_review+'" show_cart_btn="'+show_cart_btn+'" order_by="'+order_by+'" order="'+order+'"]';		
		}
		
		//===========> Social Media Links
		
		if (id == 'insert_hm_features_lists') {
			
			var style = jQuery('select#idealtheme_hm_features_lists_style').val();
			
			$('#'+id).parent('form').children('.group').each(function(index) {		
					
					var title = jQuery(this).find('input#idealtheme_hm_features_lists_title').val();
					var content = jQuery(this).find('textarea#idealtheme_hm_features_lists_con').val();
					var url = jQuery(this).find('input#idealtheme_hm_features_lists_url').val();
					
					output += '[hm_lists_row title="'+title+'" url="'+url+'"]'+content+'[/hm_lists_row]';
					
			});
			
			output = '[hm_lists style="'+style+'"]'+output+'[/hm_lists]';
						
		}
		
		//===========> Content Text Box
		
		if (id == 'insert_hm_text_box') {
			
			var content = jQuery('textarea#idealtheme_hm_text_box_content').val();
			
			output = '[hm_text]'+content+'[/hm_text]';
						
		}
		
		//===========> Features Slider 
		
		if (id == 'insert_hm_features_slider') {
			
		    var image = jQuery('input#idealtheme_features_slider_img').val();
			
			$('#'+id).parent('form').find('.group').each(function(index) {		
			        			
					var title = jQuery(this).find('input#idealtheme_features_slider_title').val();
					var content = jQuery(this).find('textarea#idealtheme_features_slider_text').val();
					var icon = jQuery(this).find('li.active_icon input[name="idealtheme_section_container_icon"]').val();
					if(! icon){
						icon = '';
					}
					
					output += '[hm_feature title="'+title+'" icon="'+icon+'"]'+content+'[/hm_feature]';
			});
			output = '[hm_features image="'+image+'"]'+output+'[/hm_features]';
			
		}
		
		//===========> News Bar
		
		if (id == 'insert_news_bar') {
			
			var title       = jQuery('input#idealtheme_news_bar_title').val();
			var show_icon   = jQuery('select#idealtheme_news_bar_show_icon').val();
			var show_title  = jQuery('select#idealtheme_news_bar_show_title').val();
			
			var posts_num   = jQuery('input#idealtheme_news_bar_posts_num').val();
			var order_by    = jQuery('select#idealtheme_news_bar_posts_order_by').val();
			var order       = jQuery('select#idealtheme_news_bar_posts_order').val();
			
			var posts_from = jQuery('select#idealtheme_news_bar_posts_from').val();
			var categories = jQuery('select#idealtheme_news_bar_posts_from_cats').val();
			var posts      = jQuery('select#idealtheme_news_bar_posts_from_posts').val();
			
			if(! categories){
				categories = '';
			}
			if(! posts){
				posts = '';
			}
			
			output = '[hm_news title="'+title+'" show_icon="'+show_icon+'" show_title="'+show_title+'" posts_num="'+posts_num+'" order_by="'+order_by+'" order="'+order+'" posts_from="'+posts_from+'" categories="'+categories+'" posts="'+posts+'"]';
						
		}
		
		//===========> Contact Details
		
		if (id == 'insert_contact_details') {
			
			var main_title = jQuery('input#idealtheme_contact_details_title').val();
			var color = jQuery('input#idealtheme_contact_details_icon_color').val();
			var icon  = jQuery('li.active_icon input[name="idealtheme_contact_details_icon"]').val();
			if(!icon){
				icon = '';
			}
			
			$('#'+id).parent('form').find('.group').each(function(index) {		
			        			
					var title   = jQuery(this).find('input#idealtheme_contact_details_row_title').val();
					var content = jQuery(this).find('textarea#idealtheme_contact_details_content').val();
					
					output += '[hm_details_row title="'+title+'"]'+content+'[/hm_details_row]';
			});
			
			output = '[hm_details title="'+main_title+'" color="'+color+'" icon="'+icon+'"]'+output+'[/hm_details]';
						
		}
		
		//===========> Blog Posts
		
		if (id == 'insert_from_the_blog') {
			
			var style = jQuery('select#idealtheme_from_the_blog_style').val();
			
			output = '[hm_blog style="'+style+'"]';
						
		}
		
		return output;
		
	}
	
    
});


