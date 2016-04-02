<?php

add_action( 'vc_before_init', 'idealtheme_integrate_with_vc' );
function idealtheme_integrate_with_vc() {
	
	$imgs = get_template_directory_uri().'/theme-admin/vc/img/';
	
	$all_icons = array('','ico-ipod','ico-microphone4','ico-cog5','ico-picture2','ico-pictures2','ico-pictures3','ico-chart2','ico-chart3','ico-location6','ico-layout2','ico-layout3','ico-layout4','ico-layout5','ico-layout6','ico-layout7','ico-layout8','ico-layout9','ico-layout10','ico-layout11','ico-layout12','ico-layout13','ico-layout14','ico-layout15','ico-info3','ico-bike2','ico-bike3','ico-paperplane2','ico-rocket2','ico-microphone5','ico-shipping','ico-compass','ico-anchor5','ico-lockedheart','ico-navigation','ico-mobile4','ico-laptop3','ico-desktop2','ico-tablet3','ico-phone3','ico-document','ico-documents','ico-search6','ico-clipboard4','ico-newspaper2','ico-notebook','ico-book-open','ico-browser2','ico-calendar3','ico-presentation','ico-picture','ico-pictures','ico-video2','ico-camera5','ico-printer4','ico-toolbox','ico-briefcase4','ico-wallet','ico-gift4','ico-bargraph','ico-grid2','ico-expand3','ico-focus','ico-edit2','ico-adjustments','ico-ribbon2','ico-hourglass','ico-lock4','ico-megaphone','ico-shield3','ico-trophy4','ico-flag5','ico-map4','ico-puzzle','ico-basket','ico-envelope3','ico-streetsign','ico-telescope','ico-gears2','ico-key4','ico-paperclip2','ico-attachment2','ico-pricetags','ico-lightbulb','ico-layers2','ico-pencil5','ico-tools','ico-tools-2','ico-scissors3','ico-paintbrush','ico-magnifying-glass','ico-circle-compass','ico-linegraph','ico-mic2','ico-strategy','ico-beaker','ico-caution','ico-recycle2','ico-anchor3','ico-profile-male','ico-profile-female','ico-bike','ico-wine','ico-hotairballoon','ico-globe3','ico-genius','ico-map-pin','ico-dial','ico-chat','ico-heart5','ico-cloud8','ico-upload7','ico-download7','ico-target4','ico-hazardous','ico-piechart','ico-speedometer','ico-global','ico-compass4','ico-lifesaver','ico-clock5','ico-aperture','ico-quote','ico-scope','ico-alarmclock','ico-refresh3','ico-happy3','ico-sad3','ico-facebook5','ico-twitter5','ico-googleplus','ico-rss2','ico-tumblr4','ico-linkedin4','ico-dribbble5','ico-heart6','ico-cloud9','ico-star3','ico-sound2','ico-video3','ico-trash4','ico-user5','ico-key5','ico-search7','ico-settings','ico-camera6','ico-tag4','ico-lock5','ico-bulb','ico-pen2','ico-diamond2','ico-display2','ico-location5','ico-eye5','ico-bubble4','ico-stack3','ico-cup','ico-phone4','ico-news','ico-mail6','ico-like','ico-photo2','ico-note','ico-clock6','ico-paperplane','ico-params','ico-banknote','ico-data','ico-music3','ico-megaphone2','ico-study','ico-lab2','ico-food','ico-t-shirt','ico-fire3','ico-clip','ico-shop','ico-calendar4','ico-wallet2','ico-vynil','ico-truck3','ico-world','ico-add-shopping-cart','ico-done','ico-https','ico-perm-identity','ico-shopping-basket','ico-shopping-cart2','ico-wallet-giftcard','ico-wallet-travel','ico-call','ico-clear','ico-devices','ico-gps-fixed','ico-insert-link','ico-folder-open3','ico-desktop-mac','ico-desktop-windows','ico-keyboard-arrow-down','ico-keyboard-arrow-left','ico-keyboard-arrow-right','ico-keyboard-arrow-up','ico-keyboard-backspace','ico-laptop4','ico-laptop-chromebook','ico-laptop-mac','ico-laptop-windows','ico-filter-vintage','ico-directions-ferry','ico-local-grocery-store','ico-local-print-shop','ico-arrow-back','ico-arrow-forward','ico-check4','ico-close2','ico-refresh4','ico-notifications-none','ico-school','ico-star4','ico-star-outline','ico-chat4','ico-tick','ico-chevron-right2','ico-chevron-left2','ico-arrow-right-thick','ico-arrow-left-thick','ico-lock-open','ico-home-outline','ico-globe-outline','ico-eye3','ico-paper-clip','ico-mail5','ico-toggle','ico-layout','ico-link4','ico-bell3','ico-lock3','ico-unlock2','ico-ribbon','ico-image3','ico-clock3','ico-watch','ico-air-play','ico-camera3','ico-video','ico-printer2','ico-monitor','ico-server2','ico-cog3','ico-heart3','ico-paragraph2','ico-align-justify2','ico-align-left2','ico-align-center2','ico-align-right2','ico-book4','ico-layers','ico-stack2','ico-stack-2','ico-paper','ico-paper-stack','ico-search4','ico-zoom-in2','ico-zoom-out2','ico-reply3','ico-circle-plus','ico-circle-minus','ico-circle-check','ico-circle-cross','ico-square-plus','ico-square-minus','ico-square-check','ico-square-cross','ico-microphone2','ico-skip-back','ico-rewind','ico-play5','ico-pause4','ico-stop4','ico-fast-forward2','ico-skip-forward','ico-shuffle2','ico-repeat2','ico-folder3','ico-umbrella2','ico-moon3','ico-thermometer','ico-drop','ico-sun4','ico-cloud6','ico-cloud-upload3','ico-cloud-download3','ico-upload5','ico-download5','ico-location3','ico-location-2','ico-map3','ico-battery','ico-head','ico-briefcase3','ico-speech-bubble','ico-anchor2','ico-globe2','ico-box','ico-reload','ico-share4','ico-tag2','ico-power2','ico-esc','ico-bar-graph','ico-bar-graph-2','ico-pie-graph','ico-star2','ico-arrow-left4','ico-arrow-right4','ico-arrow-up4','ico-arrow-down4','ico-volume','ico-mute','ico-grid','ico-grid-2','ico-columns2','ico-loader','ico-bag','ico-ban2','ico-flag3','ico-trash2','ico-expand2','ico-contract','ico-maximize','ico-minimize','ico-plus3','ico-minus3','ico-check3','ico-cross2','ico-move','ico-delete','ico-menu5','ico-archive2','ico-inbox2','ico-outbox','ico-file2','ico-file-add','ico-file-subtract','ico-help','ico-open','ico-sound-mute','ico-sound4','ico-aircraft','ico-attachment4','ico-camera8','ico-email','ico-shopping-bag','ico-thumbs-down2','ico-thumbs-up2','ico-cart3','ico-pencil6','ico-key2','ico-phone5','ico-home6','ico-anchor4','ico-feather','ico-expand4','ico-maximize2','ico-search8','ico-book6','ico-sound3','ico-sound-alt','ico-soundoff','ico-task','ico-inbox3','ico-envelope4','ico-newspaper3','ico-newspaper-alt','ico-hyperlink','ico-trash','ico-grid3','ico-grid-alt','ico-menu2','ico-list','ico-gallery','ico-browser3','ico-clock7','ico-attachment3','ico-settings2','ico-portfolio','ico-user6','ico-heart7','ico-chat2','ico-comments2','ico-screen','ico-forkandspoon','ico-instagram3','ico-pin','ico-camera7','ico-brightness','ico-moon','ico-cloud10','ico-circle-half','ico-globe4','ico-comment2','ico-chat3','ico-speaker','ico-cart','ico-book','ico-check','ico-flame','ico-gear','ico-gift','ico-git-branch','ico-mention','ico-pencil','ico-playback-play','ico-rocket','ico-sunrise','ico-sun','ico-cloudy','ico-cloud','ico-weather','ico-weather2','ico-lines','ico-cloud2','ico-lightning','ico-lightning2','ico-rainy','ico-rainy2','ico-windy','ico-windy2','ico-snowy','ico-snowy2','ico-snowy3','ico-weather3','ico-cloudy2','ico-cloud3','ico-lightning3','ico-sun2','ico-moon2','ico-home','ico-home2','ico-home3','ico-office','ico-newspaper','ico-pencil2','ico-pencil22','ico-quill','ico-pen','ico-droplet','ico-paint-format','ico-image','ico-images','ico-camera','ico-headphones','ico-music','ico-film','ico-video-camera','ico-bullhorn','ico-connection','ico-feed','ico-mic','ico-book2','ico-books','ico-library','ico-file-text','ico-profile','ico-file-empty','ico-files-empty','ico-file-text2','ico-file-picture','ico-file-music','ico-file-play','ico-file-video','ico-file-zip','ico-copy','ico-paste','ico-stack','ico-folder','ico-folder-open','ico-folder-plus','ico-folder-minus','ico-folder-download','ico-folder-upload','ico-coin-dollar','ico-coin-euro','ico-coin-pound','ico-coin-yen','ico-lifebuoy','ico-phone','ico-phone-hang-up','ico-address-book','ico-pushpin','ico-location','ico-location2','ico-compass2','ico-compass22','ico-map','ico-map2','ico-history','ico-clock','ico-clock2','ico-alarm','ico-bell','ico-stopwatch','ico-printer','ico-laptop','ico-mobile','ico-mobile2','ico-tablet','ico-tv','ico-drawer','ico-drawer2','ico-bubble','ico-bubbles','ico-bubbles2','ico-bubble2','ico-bubbles3','ico-bubbles4','ico-user','ico-users','ico-user-check','ico-user-tie','ico-quotes-left','ico-quotes-right','ico-spinner','ico-spinner8','ico-spinner9','ico-spinner11','ico-binoculars','ico-search','ico-zoom-in','ico-zoom-out','ico-enlarge','ico-shrink','ico-key','ico-unlocked','ico-wrench','ico-equalizer','ico-equalizer2','ico-cog','ico-hammer','ico-magic-wand','ico-aid-kit','ico-bug','ico-pie-chart','ico-stats-dots','ico-stats-bars','ico-trophy','ico-glass','ico-glass2','ico-mug','ico-spoon-knife','ico-leaf','ico-meter','ico-hammer2','ico-fire','ico-lab','ico-magnet','ico-bin','ico-briefcase','ico-airplane','ico-accessibility','ico-shield','ico-power','ico-switch','ico-power-cord','ico-clipboard','ico-tree','ico-menu','ico-cloud4','ico-cloud-download','ico-cloud-upload','ico-cloud-check','ico-sphere','ico-earth','ico-link','ico-flag','ico-attachment','ico-eye','ico-bookmark','ico-bookmarks','ico-contrast','ico-brightness-contrast','ico-star-empty','ico-star-full','ico-heart','ico-heart-broken','ico-man','ico-woman','ico-man-woman','ico-happy','ico-smile','ico-tongue','ico-sad','ico-wink','ico-grin','ico-cool','ico-angry','ico-evil','ico-shocked','ico-baffled','ico-confused','ico-neutral','ico-hipster','ico-wondering','ico-sleepy','ico-frustrated','ico-crying','ico-point-up','ico-warning','ico-notification','ico-question','ico-plus','ico-minus','ico-info','ico-cancel-circle','ico-blocked','ico-cross','ico-checkmark','ico-checkmark2','ico-spell-check','ico-enter','ico-exit','ico-play2','ico-pause','ico-stop','ico-previous','ico-next','ico-backward','ico-forward2','ico-play3','ico-pause2','ico-stop2','ico-backward2','ico-forward3','ico-first','ico-last','ico-previous2','ico-next2','ico-eject','ico-volume-high','ico-volume-medium','ico-volume-low','ico-volume-mute','ico-volume-mute2','ico-loop2','ico-arrow-up-left2','ico-arrow-up2','ico-arrow-up-right2','ico-arrow-right2','ico-arrow-down-right2','ico-arrow-down2','ico-arrow-down-left2','ico-arrow-left2','ico-crop','ico-scissors','ico-table','ico-table2','ico-share','ico-new-tab','ico-embed2','ico-share2','ico-google','ico-google-plus','ico-google-drive','ico-facebook','ico-facebook2','ico-instagram','ico-twitter','ico-twitter3','ico-feed2','ico-youtube2','ico-youtube3','ico-vimeo','ico-flickr2','ico-picassa','ico-dribbble','ico-forrst','ico-deviantart','ico-steam','ico-dropbox','ico-onedrive','ico-github2','ico-wordpress','ico-blogger','ico-tumblr','ico-yahoo','ico-tux','ico-apple','ico-finder','ico-android','ico-windows','ico-soundcloud','ico-skype','ico-reddit','ico-linkedin2','ico-lastfm','ico-delicious','ico-stumbleupon','ico-stackoverflow','ico-pinterest','ico-paypal','ico-file-pdf','ico-file-openoffice','ico-libreoffice','ico-html52','ico-css3','ico-chrome','ico-firefox','ico-IE','ico-opera','ico-user2','ico-earth2','ico-link2','ico-search2','ico-pencil3','ico-glass3','ico-music2','ico-search3','ico-envelope-o','ico-heart2','ico-star','ico-star-o','ico-user3','ico-film2','ico-th-large','ico-th','ico-th-list','ico-check2','ico-close','ico-remove','ico-times','ico-power-off','ico-signal','ico-cog2','ico-gear2','ico-home4','ico-file-o','ico-clock-o','ico-download4','ico-arrow-circle-o-down','ico-arrow-circle-o-up','ico-inbox','ico-play-circle-o','ico-repeat','ico-rotate-right','ico-refresh','ico-lock2','ico-flag2','ico-headphones2','ico-volume-off','ico-volume-down','ico-volume-up','ico-tag','ico-tags','ico-book3','ico-bookmark2','ico-print','ico-camera2','ico-video-camera2','ico-image2','ico-photo','ico-picture-o','ico-pencil4','ico-map-marker','ico-adjust','ico-edit','ico-pencil-square-o','ico-check-square-o','ico-arrows','ico-step-backward','ico-fast-backward','ico-backward3','ico-play4','ico-pause3','ico-stop3','ico-forward4','ico-fast-forward','ico-step-forward','ico-eject2','ico-chevron-left','ico-chevron-right','ico-plus-circle','ico-minus-circle','ico-times-circle','ico-check-circle','ico-question-circle','ico-info-circle','ico-crosshairs','ico-times-circle-o','ico-check-circle-o','ico-ban','ico-arrow-left3','ico-arrow-right3','ico-arrow-up3','ico-arrow-down3','ico-mail-forward','ico-share3','ico-expand','ico-compress','ico-plus2','ico-minus2','ico-asterisk','ico-exclamation-circle','ico-gift3','ico-leaf2','ico-fire2','ico-eye2','ico-eye-slash','ico-plane','ico-random','ico-comment','ico-chevron-up','ico-chevron-down','ico-retweet','ico-shopping-cart','ico-folder2','ico-folder-open2','ico-bar-chart','ico-bar-chart-o','ico-twitter-square','ico-facebook-square','ico-camera-retro','ico-key3','ico-cogs2','ico-gears','ico-comments','ico-thumbs-o-up','ico-thumbs-o-down','ico-heart-o','ico-sign-out','ico-thumb-tack','ico-external-link','ico-sign-in','ico-trophy2','ico-phone2','ico-bookmark-o','ico-phone-square','ico-twitter4','ico-facebook4','ico-facebook-f','ico-github6','ico-unlock','ico-credit-card2','ico-rss','ico-bullhorn2','ico-bell-o','ico-hand-o-right','ico-hand-o-left','ico-hand-o-up','ico-hand-o-down','ico-arrow-circle-left','ico-arrow-circle-right','ico-arrow-circle-up','ico-arrow-circle-down','ico-globe','ico-wrench2','ico-tasks','ico-briefcase2','ico-arrows-alt','ico-group','ico-users2','ico-chain','ico-link3','ico-cloud5','ico-flask','ico-cut','ico-scissors2','ico-copy2','ico-files-o','ico-paperclip','ico-floppy-o','ico-save','ico-bars','ico-navicon','ico-reorder','ico-table3','ico-magic','ico-truck2','ico-caret-down','ico-caret-up','ico-caret-left','ico-caret-right','ico-columns','ico-sort','ico-unsorted','ico-sort-desc','ico-sort-down','ico-sort-asc','ico-sort-up','ico-envelope','ico-linkedin3','ico-rotate-left','ico-undo3','ico-gavel','ico-legal','ico-dashboard','ico-tachometer','ico-comment-o','ico-comments-o','ico-sitemap','ico-umbrella','ico-clipboard2','ico-paste2','ico-lightbulb-o','ico-user-md','ico-suitcase','ico-coffee','ico-cutlery','ico-file-text-o','ico-building-o','ico-hospital-o','ico-ambulance','ico-medkit','ico-fighter-jet','ico-beer','ico-h-square','ico-plus-square','ico-angle-double-left','ico-angle-double-right','ico-angle-double-up','ico-angle-double-down','ico-angle-left','ico-angle-right','ico-angle-up','ico-angle-down','ico-desktop','ico-laptop2','ico-tablet2','ico-mobile3','ico-mobile-phone','ico-circle-o','ico-quote-left','ico-quote-right','ico-spinner12','ico-circle','ico-mail-reply','ico-reply2','ico-github-alt','ico-folder-o','ico-folder-open-o','ico-smile-o','ico-frown-o','ico-meh-o','ico-keyboard-o','ico-flag-o','ico-terminal2','ico-code2','ico-mail-reply-all','ico-reply-all','ico-location-arrow','ico-crop2','ico-code-fork','ico-chain-broken','ico-unlink','ico-question2','ico-info2','ico-exclamation','ico-eraser','ico-puzzle-piece','ico-microphone','ico-microphone-slash','ico-shield2','ico-calendar-o','ico-fire-extinguisher','ico-rocket3','ico-maxcdn','ico-chevron-circle-left','ico-chevron-circle-right','ico-chevron-circle-up','ico-chevron-circle-down','ico-anchor','ico-unlock-alt','ico-play-circle','ico-ticket2','ico-minus-square','ico-minus-square-o','ico-level-up','ico-level-down','ico-check-square','ico-pencil-square','ico-external-link-square','ico-share-square','ico-compass3','ico-caret-square-o-down','ico-toggle-down','ico-caret-square-o-up','ico-toggle-up','ico-caret-square-o-right','ico-toggle-right','ico-eur','ico-euro','ico-gbp','ico-dollar','ico-usd','ico-file','ico-file-text3','ico-thumbs-up','ico-thumbs-down','ico-youtube5','ico-xing3','ico-xing-square','ico-youtube-play','ico-dropbox2','ico-stack-overflow','ico-instagram2','ico-flickr5','ico-adn','ico-bitbucket','ico-bitbucket-square','ico-tumblr3','ico-tumblr-square','ico-long-arrow-down','ico-long-arrow-up','ico-long-arrow-left','ico-long-arrow-right','ico-apple2','ico-windows2','ico-android2','ico-linux','ico-dribbble4','ico-skype2','ico-foursquare2','ico-female','ico-male','ico-sun-o','ico-moon-o','ico-archive','ico-bug2','ico-pagelines','ico-arrow-circle-o-right','ico-arrow-circle-o-left','ico-caret-square-o-left','ico-toggle-left','ico-dot-circle-o','ico-wheelchair','ico-slack','ico-bank','ico-institution','ico-university','ico-graduation-cap','ico-mortar-board','ico-yahoo2','ico-reddit2','ico-stumbleupon3','ico-digg','ico-paw','ico-cubes','ico-behance','ico-steam3','ico-recycle','ico-automobile','ico-car','ico-soundcloud3','ico-database2','ico-file-pdf-o','ico-file-word-o','ico-file-excel-o','ico-file-powerpoint-o','ico-file-image-o','ico-file-photo-o','ico-file-picture-o','ico-file-archive-o','ico-file-zip-o','ico-file-audio-o','ico-file-sound-o','ico-file-movie-o','ico-file-video-o','ico-file-code-o','ico-codepen2','ico-jsfiddle','ico-life-bouy','ico-life-buoy','ico-life-ring','ico-life-saver','ico-support','ico-hacker-news','ico-paper-plane','ico-send','ico-paper-plane-o','ico-send-o','ico-history2','ico-circle-thin','ico-genderless','ico-sliders','ico-share-alt','ico-bomb','ico-futbol-o','ico-soccer-ball-o','ico-wifi','ico-calculator2','ico-paypal4','ico-cc-visa','ico-bell-slash-o','ico-at','ico-eyedropper2','ico-paint-brush','ico-line-chart','ico-lastfm3','ico-toggle-off','ico-bicycle','ico-cart-plus','ico-diamond','ico-motorcycle','ico-heartbeat','ico-pinterest-p','ico-whatsapp','ico-user-plus2','ico-user-times','ico-box2','ico-write','ico-clock4','ico-reply4','ico-reply-all2','ico-forward5','ico-flag4','ico-search5','ico-trash3','ico-envelope2','ico-bubble3','ico-user4','ico-users3','ico-cloud7','ico-download6','ico-upload6','ico-rain','ico-sun5','ico-moon4','ico-bell4','ico-folder4','ico-pin2','ico-sound','ico-microphone3','ico-camera4','ico-image4','ico-cog4','ico-book5','ico-map-marker2','ico-store','ico-tag3','ico-heart4','ico-video-camera3','ico-trophy3','ico-cart2','ico-eye4','ico-cancel','ico-chart','ico-target3','ico-printer3','ico-location4','ico-bookmark3','ico-monitor2','ico-cross3','ico-plus4','ico-left','ico-up','ico-browser','ico-windows3','ico-switch2','ico-dashboard2','ico-play6','ico-fast-forward3','ico-next3','ico-refresh2','ico-film3','ico-home5');
	
	$animation = array( 
	        "No Animation ..." => "no",
			"bounce" =>"bounce",
			"flash" =>"flash",
			"pulse" =>"pulse",
			"rubberBand" =>"rubberBand",
			"shake" =>"shake",
			"swing" =>"swing",
			"tada" =>"tada",
			"wobble" =>"wobble",
			"jello" =>"jello",
			"bounceIn" =>"bounceIn",
			"bounceInDown" =>"bounceInDown",
			"bounceInLeft" =>"bounceInLeft",
			"bounceInRight" =>"bounceInRight",
			"bounceInUp" =>"bounceInUp",
			"bounceOut" =>"bounceOut",
			"bounceOutDown" =>"bounceOutDown",
			"bounceOutLeft" =>"bounceOutLeft",
			"bounceOutRight" =>"bounceOutRight",
			"bounceOutUp" =>"bounceOutUp",
			"fadeIn" =>"fadeIn",
			"fadeInDown" =>"fadeInDown",
			"fadeInDownBig" =>"fadeInDownBig",
			"fadeInLeft" =>"fadeInLeft",
			"fadeInLeftBig" =>"fadeInLeftBig",
			"fadeInRight" =>"fadeInRight",
			"fadeInRightBig" =>"fadeInRightBig",
			"fadeInUp" =>"fadeInUp",
			"fadeInUpBig" =>"fadeInUpBig",
			"fadeOut" =>"fadeOut",
			"fadeOutDown" =>"fadeOutDown",
			"fadeOutDownBig" =>"fadeOutDownBig",
			"fadeOutLeft" =>"fadeOutLeft",
			"fadeOutLeftBig" =>"fadeOutLeftBig",
			"fadeOutRight" =>"fadeOutRight",
			"fadeOutRightBig" =>"fadeOutRightBig",
			"fadeOutUp" =>"fadeOutUp",
			"fadeOutUpBig" =>"fadeOutUpBig",
			"flip" =>"flip",
			"flipInX" =>"flipInX",
			"flipInY" =>"flipInY",
			"flipOutX" =>"flipOutX",
			"flipOutY" =>"flipOutY",
			"lightSpeedIn" =>"lightSpeedIn",
			"lightSpeedOut" =>"lightSpeedOut",
			"rotateIn" =>"rotateIn",
			"rotateInDownLeft" =>"rotateInDownLeft",
			"rotateInDownRight" =>"rotateInDownRight",
			"rotateInUpLeft" =>"rotateInUpLeft",
			"rotateInUpRight" =>"rotateInUpRight",
			"rotateOut" =>"rotateOut",
			"rotateOutDownLeft" =>"rotateOutDownLeft",
			"rotateOutDownRight" =>"rotateOutDownRight",
			"rotateOutUpLeft" =>"rotateOutUpLeft",
			"rotateOutUpRight" =>"rotateOutUpRight",
			"slideInUp" =>"slideInUp",
			"slideInDown" =>"slideInDown",
			"slideInLeft" =>"slideInLeft",
			"slideInRight" =>"slideInRight",
			"slideOutUp" =>"slideOutUp",
			"slideOutDown" =>"slideOutDown",
			"slideOutLeft" =>"slideOutLeft",
			"slideOutRight" =>"slideOutRight",     
			"zoomIn" =>"zoomIn",
			"zoomInDown" =>"zoomInDown",
			"zoomInLeft" =>"zoomInLeft",
			"zoomInRight" =>"zoomInRight",
			"zoomInUp" =>"zoomInUp",
			"zoomOut" =>"zoomOut",
			"zoomOutDown" =>"zoomOutDown",
			"zoomOutLeft" =>"zoomOutLeft",
			"zoomOutRight" =>"zoomOutRight",
			"zoomOutUp" =>"zoomOutUp",
			"hinge" =>"hinge",
			"rollIn" =>"rollIn",
			"rollOut" =>"rollOut",
	);
	
	$all_sliders = array();
	$all_sliders_ids = get_posts(array(
		'numberposts'   => -1,    // get all posts.
		'post_type' => 'sliders',
		'fields'        => 'ids', // Only get post IDs
	));		
	$all_sliders = $all_sliders_ids;
	
	//--------------------------------------------------------------------->
	
	vc_map( array(
		"name" => esc_html__("Enar Row", "enar"),
		"base" => "hm_row",
		"icon" => $imgs.'2.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"as_parent" => array('except' => ''), // Use only|except
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("For Ligh-Box Shortcode", "enar"),
				"description" => esc_html__("Choose ( Enable ) if this ( Row ) is parent for ( Gallery light-box ) shortcode elements.", "enar"),
				"param_name" => "light_box_gall",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Disable", "enar") => 'no',
				    esc_html__("Enable", "enar") => 'yes',
				),
				
			)
		),
		"js_view" => 'VcColumnView'
	) );
    
	vc_map( array(
		"name" => esc_html__("Enar Column", "enar"),
		"base" => "hm_column",
		"icon" => $imgs.'3.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"as_parent" => array('except' => ''), // Use only|except
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Column Width", "enar"),
				"description" => esc_html__("Select your column width.", "enar"),
				"param_name" => "col",
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',
				),
				
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose background color for this column.", "enar"),
				"param_name" => "bg_color",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Text Color", "enar"),
				"description" => esc_html__("Choose text color for this column.", "enar"),
				"param_name" => "color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", "enar"),
				"description" => esc_html__("Choose the alignment of your column text.", "enar"),
				"param_name" => "align",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Default", "enar") => 'default',
					esc_html__("Align Left", "enar") => 'left',
					esc_html__("Align Right", "enar") => 'right',
					esc_html__("Align Center", "enar") => 'center',
				),
				
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Background Image", "enar"),
				"description" => esc_html__("Upload an image to display in the background.", "enar"),
				"param_name" => "bg_image",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Repeat", "enar"),
				"description" => esc_html__("Choose how the background image repeats.", "enar"),
				"param_name" => "bg_repeat",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("No Repeat", "enar")  => "no",			 	
					esc_html__("Repeat X And Y", "enar")=> "x-y",
				    esc_html__("Repeat X", "enar") => "x",
					esc_html__("Repeat Y", "enar") => "y",	
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Attachment", "enar"),
				"description" => esc_html__("Choose background attachment type.", "enar"),
				"param_name" => "bg_attach",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Scroll", "enar")  => "scroll",			 	
					esc_html__("Fixed", "enar") => "fixed",
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Size", "enar"),
				"description" => esc_html__("Choose background size ( Cover - Normal - Contain ).", "enar"),
				"param_name" => "bg_size",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Cover", "enar")  => "cover",			 	
					esc_html__("Normal", "enar") => "inherit",
					esc_html__("Contain", "enar") => "contain",
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Enable Content Padding Right-Left", "enar"),
				"description" => esc_html__("This right and left padding for column content.", "enar"),
				"param_name" => "padding_r_l",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Disable Right-Left Padding", "enar")  => "disable",			 	
					esc_html__("Enable Right-Left Padding", "enar") => "enable",
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Column Padding Top", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_top",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Column Padding Right", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_right",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Column Padding Bottom", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_bot",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Column Padding Left", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_left",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Animation Delay", "enar"),
				"description" => esc_html__("1000 equal one second.", "enar"),
				"param_name" => "delay",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Animation Type", "enar"),
				"description" => esc_html__("Select the type of animation.", "enar"),
				"param_name" => "animation",
				"value" => $animation,
			),
			/*array(
				"type" => "textarea_html",
				"heading" => esc_html__("Column Content"),
				"param_name" => "content",
			),*/
			
		),
		"js_view" => 'VcColumnView'
	) );
	
	vc_map( array(
		"name" => esc_html__("Enar Section", "enar"),
		"base" => "hm_section",
		"icon" => $imgs.'1.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"as_parent" => array('except' => ''), // Use only|except
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Section Layout", "enar"),
				"description" => esc_html__("Choose section content width layout ( Full - Boxed ).", "enar"),
				"param_name" => "layout",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Full Width", "enar") => 'full',
					esc_html__("Boxed Width", "enar") => 'boxed',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Section Color Mode", "enar"),
				"description" => esc_html__("Choose the color text mode, white or black?", "enar"),
				"param_name" => "mode",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Dark Text Color", "enar") => 'dark',
					esc_html__("Light Text Color", "enar") => 'light',
				),
				
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Background Image", "enar"),
				"description" => esc_html__("Upload an image to display as background.", "enar"),
				"param_name" => "bg_image",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Repeat", "enar"),
				"description" => esc_html__("Choose how the background image repeats.", "enar"),
				"param_name" => "bg_repeat",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("No Repeat", "enar") => "no",			 	
					esc_html__("Repeat X And Y", "enar") => "x-y",
				    esc_html__("Repeat X", "enar") => "x",
					esc_html__("Repeat Y", "enar") => "y",	
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Attachment", "enar"),
				"description" => esc_html__("Choose background attachment type.", "enar"),
				"param_name" => "bg_attach",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Scroll", "enar") => "scroll",			 	
					esc_html__("Fixed", "enar") => "fixed",
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Background Size", "enar"),
				"description" => esc_html__("Choose background size ( Cover - Normal - Contain ).", "enar"),
				"param_name" => "bg_size",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Cover", "enar") => "cover",			 	
					esc_html__("Normal", "enar") => "inherit",
					esc_html__("Contain", "enar") => "contain",
				),
				
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose background color for this section.", "enar"),
				"param_name" => "bg_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Enable Background Overlay", "enar"),
				"description" => esc_html__("Background overlay is the black color that showing to can read white text.", "enar"),
				"param_name" => "bg_overlay",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Disable", "enar") => "no",			 	
					esc_html__("Enable", "enar") => "yes",
				),
				
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Border Color", "enar"),
				"description" => esc_html__("Choose border color for this section.", "enar"),
				"param_name" => "border_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Border Style", "enar"),
				"description" => esc_html__("Choose border style.", "enar"),
				"param_name" => "border_style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("None", "enar") => "none",
					esc_html__("Solid", "enar") => "solid",	 
					esc_html__("Dotted", "enar") => "dotted",	
					esc_html__("Dashed", "enar") => "dashed",
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Top Width", "enar"),
				"description" => esc_html__("Top border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_top_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Right Width", "enar"),
				"description" => esc_html__("Right border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_right_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Bottom Width", "enar"),
				"description" => esc_html__("Bottom border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_bottom_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Left Width", "enar"),
				"description" => esc_html__("Left border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_left_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Section Padding Top", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_top",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Section Padding Bottom", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_bot",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Text Color", "enar"),
				"description" => esc_html__("Choose text color for this section.", "enar"),
				"param_name" => "color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", "enar"),
				"description" => esc_html__("Choose the text alignment for this section.", "enar"),
				"param_name" => "align",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Default", "enar") => 'default',
					esc_html__("Align Left", "enar") => 'left',
					esc_html__("Align Right", "enar") => 'right',
					esc_html__("Align Center", "enar") => 'center',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Choose Icon", "enar"),
				"description" => esc_html__("Choose the icon for this section.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("ID Title", "enar"),
				"description" => esc_html__("This is ID attribute, To contact between your section and one page menu.", "enar"),
				"param_name" => "id",
			),*/
			/*array(
				"type" => "textarea_html",
				"heading" => esc_html__("Column Content"),
				"param_name" => "content",
			),*/
			
		),
		"js_view" => 'VcColumnView'
	) );
	
	vc_map( array(
		"name" => esc_html__("Video", "enar"),
		"base" => "hm_video",
		"icon" => $imgs.'4.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"as_parent" => array('except' => ''), // Use only|except
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Color Mode", "enar"),
				"description" => esc_html__("Choose the color text mode, white or black?", "enar"),
				"param_name" => "mode",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Light Text Color", "enar") => 'light',
					esc_html__("Dark Text Color", "enar") => 'dark',
				),
				
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Poster Image", "enar"),
				"description" => esc_html__("Upload an image to display as background ( Video Poster ).", "enar"),
				"param_name" => "bg_image",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Poster Image Repeat", "enar"),
				"description" => esc_html__("Choose how the background image repeats.", "enar"),
				"param_name" => "bg_repeat",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("No Repeat", "enar") => "no",			 	
					esc_html__("Repeat X And Y", "enar") => "x-y",
				    esc_html__("Repeat X", "enar") => "x",
					esc_html__("Repeat Y", "enar") => "y",	
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Poster Image Attachment", "enar"),
				"description" => esc_html__("Choose background attachment type.", "enar"),
				"param_name" => "bg_attach",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Scroll", "enar") => "scroll",			 	
					esc_html__("Fixed", "enar") => "fixed",
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Poster Image Size", "enar"),
				"description" => esc_html__("Choose background size ( Cover - Normal - Contain ).", "enar"),
				"param_name" => "bg_size",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Cover", "enar") => "cover",			 	
					esc_html__("Normal", "enar") => "inherit",
					esc_html__("Contain", "enar") => "contain",
				),
				
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose background color for this section.", "enar"),
				"param_name" => "bg_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Enable Background Overlay", "enar"),
				"description" => esc_html__("Background overlay is the black color that showing to can read white text.", "enar"),
				"param_name" => "bg_overlay",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar") => "yes",			 	
					esc_html__("Disable", "enar") => "no",
				),
				
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Border Color", "enar"),
				"description" => esc_html__("Choose border color for this section.", "enar"),
				"param_name" => "border_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Border Style", "enar"),
				"description" => esc_html__("Choose border style.", "enar"),
				"param_name" => "border_style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("None", "enar") => "none",
					esc_html__("Solid", "enar") => "solid",	 
					esc_html__("Dotted", "enar") => "dotted",	
					esc_html__("Dashed", "enar") => "dashed",
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Top Width", "enar"),
				"description" => esc_html__("Top border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_top_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Right Width", "enar"),
				"description" => esc_html__("Right border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_right_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Bottom Width", "enar"),
				"description" => esc_html__("Bottom border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_bottom_width",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Border Left Width", "enar"),
				"description" => esc_html__("Left border width ( Number ), for example : 1", "enar"),
				"param_name" => "border_left_width",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Section Layout", "enar"),
				"description" => esc_html__("Choose video section layout width ( Full - Boxed ).", "enar"),
				"param_name" => "layout",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Full Width", "enar") => 'full',
					esc_html__("Boxed Width", "enar") => 'boxed',
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Section Padding Top", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_top",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Section Padding Bottom", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20.", "enar"),
				"param_name" => "padding_bot",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Text Color", "enar"),
				"description" => esc_html__("Choose text color for this video section.", "enar"),
				"param_name" => "color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", "enar"),
				"description" => esc_html__("Choose the text alignment for this video section.", "enar"),
				"param_name" => "align",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Default", "enar") => 'default',
					esc_html__("Align Left", "enar") => 'left',
					esc_html__("Align Right", "enar") => 'right',
					esc_html__("Align Center", "enar") => 'center',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Choose Icon", "enar"),
				"description" => esc_html__("Choose the icon for this video section.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Frame", "enar"),
				"description" => esc_html__("To show the youtube video frame graphic border.", "enar"),
				"param_name" => "video_frame",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar") => 'yes',
					esc_html__("Disable", "enar") => 'no',
				),
				
			),
			/*array(
				"type" => "textarea_html",
				"heading" => esc_html__("Column Content"),
				"param_name" => "content",
			),*/
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Type", "enar"),
				"description" => esc_html__("Choose your video type.", "enar"),
				"param_name" => "video_type",
				"value" => array(
				    //esc_html__("Select Option...", "enar") => "",
					esc_html__("Youtube Video", "enar") => 'youtube',
					esc_html__("Self Hosted Video", "enar") => 'hosted',
				),
				
			),
			//=====> video
			array(
				"type" => "textfield",
				"heading" => esc_html__("Youtube Video ID", "enar"),
				"description" => esc_html__("Youtube video ID.", "enar"),
				"param_name" => "video_id",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Video Height", "enar"),
				"description" => esc_html__("Youtube video height In pixels, Example: 600", "enar"),
				"param_name" => "video_height",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
			),
			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Controls", "enar"),
				"description" => esc_html__("To Enable or disable the youtube video controls.", "enar"),
				"param_name" => "video_controls",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Hide Video Controls", "enar") => 'false',
					esc_html__("Show Video Controls", "enar") => 'true',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Autoplay", "enar"),
				"description" => esc_html__("Autoplay start playing youtube video.", "enar"),
				"param_name" => "video_autoplay",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Autoplay Video", "enar") => 'true',
					esc_html__("Stop Playing Video", "enar") => 'false',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Mute", "enar"),
				"description" => esc_html__("Mute or playing the youtube video sound.", "enar"),
				"param_name" => "video_mute",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Mute Video Sound", "enar") => 'true',
					esc_html__("Play Video Sound", "enar") => 'false',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Video Loop", "enar"),
				"description" => esc_html__("Loop youtube video to re-play again.", "enar"),
				"param_name" => "video_loop",
				"dependency" => Array('element' => "video_type", 'value' => array('youtube')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Play Video Once", "enar") => 'false',
					esc_html__("Loop Video", "enar") => 'true',
				),
				
			),
			//======> Hosted
			array(
				"type" => "textfield",
				"heading" => esc_html__("MP4 Video", "enar"),
				"description" => esc_html__("Upload MP4 video", "enar"),
				"param_name" => "hosted_mp",
				"dependency" => Array('element' => "video_type", 'value' => array('hosted')),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("OGG Video", "enar"),
				"description" => esc_html__("Upload OGG video", "enar"),
				"param_name" => "hosted_ogg",
				"dependency" => Array('element' => "video_type", 'value' => array('hosted')),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("WEBM Video", "enar"),
				"description" => esc_html__("Upload WEBM video", "enar"),
				"param_name" => "hosted_webm",
				"dependency" => Array('element' => "video_type", 'value' => array('hosted')),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Video Height", "enar"),
				"description" => esc_html__("Self hosted video height in pixels, Example: 600", "enar"),
				"param_name" => "hosted_height",
				"dependency" => Array('element' => "video_type", 'value' => array('hosted')),
			),
		),
		"js_view" => 'VcColumnView'
	) );
	
	vc_map( array(
		"name" => esc_html__("Title", "enar"),
		"base" => "hm_title",
		"icon" => $imgs.'5.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"params" => array(
		 	array(
				"type" => "dropdown",
				"heading" => esc_html__("Title Type", "enar"),
				"description" => esc_html__("Choose your title type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Normal Title", "enar") => 'normal_title',
					esc_html__("Main Title", "enar") => 'main_title',
					esc_html__("Small Title", "enar") => 'small_title',
					esc_html__("Full Background Title", "enar") => 'bg_title',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Title Color", "enar"),
				"description" => esc_html__("Choose title icon color.", "enar"),
				"param_name" => "color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Title Icon", "enar"),
				"description" => esc_html__("Choose title icon.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose title background color.", "enar"),
				"param_name" => "full_bg",
				"dependency" => Array('element' => "type", 'value' => array('bg_title')),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Title Footer", "enar"),
				"description" => esc_html__("Choose the title footer type.", "enar"),
				"param_name" => "footer",
				"dependency" => Array('element' => "type", 'value' => array('main_title')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Line", "enar") => 'line',
					esc_html__("Line With Small Circle", "enar") => 'line_dot',
					esc_html__("Line With Icon", "enar") => 'line_icon',
					esc_html__("Short Line", "enar") => 'short_line',
					esc_html__("Side Line", "enar") => 'side_line',
					esc_html__("Background Title", "enar") => 'has_bg',
					esc_html__("None", "enar") => 'blank',
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Title Background Color", "enar"),
				"description" => esc_html__("Choose title background color.", "enar"),
				"dependency" => Array('element' => "footer", 'value' => array('has_bg')),
				"param_name" => "bg_color",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Line Color & Icon Color", "enar"),
				"description" => esc_html__("Choose title icon color.", "enar"),
				"dependency" => Array(
					'element' => "footer", 'value' => array('line', 'line_dot', 'line_icon'),
					'element' => "type", 'value' => array('small_title', 'normal_title', 'main_title')
				),
				"param_name" => "icon_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Title Size", "enar"),
				"description" => esc_html__("Choose your title size.", "enar"),
				"param_name" => "title_size",
				"dependency" => Array('element' => "type", 'value' => array('main_title')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Standard", "enar") => 'default',
					esc_html__("Medium", "enar") => 'small',
				),
			),
			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Title Text", "enar"),
				"description" => esc_html__("Here is your title text.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Title Transform", "enar"),
				"description" => esc_html__("To controls the title capitalization.", "enar"),
				"param_name" => "transform",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Uppercase", "enar") => 'uppercase',
					esc_html__("Capitalize", "enar") => 'capitalize',
					esc_html__("Lowercase", "enar") => 'lowercase',
					esc_html__("None", "enar") => 'none',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", "enar"),
				"description" => esc_html__("Choose text alignment.", "enar"),
				"param_name" => "align",
				"value" => array(
					esc_html__("Default", "enar") => '',
					esc_html__("Align Left", "enar") => 'capitalize',
					esc_html__("Align Right", "enar") => 'right',
					esc_html__("Align Center", "enar") => 'center',
				),
			),
		),
	  
    ) );
	
	vc_map( array(
		"name" => esc_html__("Description Text", "enar"),
		"base" => "hm_desc",
		"icon" => $imgs.'6.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"params" => array(
		 	array(
				"type" => "dropdown",
				"heading" => esc_html__("Description Type", "enar"),
				"description" => esc_html__("Choose your description type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Description 1", "enar") => '1',
					esc_html__("Description 2", "enar") => '2',
					esc_html__("Description 3", "enar") => '3',
					esc_html__("Description 4", "enar") => '4',
					esc_html__("Description 5", "enar") => '5',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Transform", "enar"),
				"description" => esc_html__("To controls text capitalization.", "enar"),
				"param_name" => "transform",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("None", "enar") => 'none',
					esc_html__("Uppercase", "enar") => 'uppercase',
					esc_html__("Capitalize", "enar") => 'capitalize',
					esc_html__("Lowercase", "enar") => 'lowercase',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align", "enar"),
				"description" => esc_html__("Choose text alignment.", "enar"),
				"param_name" => "align",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Default", "enar") => 'center',
					esc_html__("Align Left", "enar") => 'left',
					esc_html__("Align Right", "enar") => 'right',
					esc_html__("Align Center", "enar") => 'center',
				),
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Description Content", "enar"),
				"description" => esc_html__("Here is your description text content.", "enar"),
				"param_name" => "content",
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Light Box", "enar"),
		"base" => "hm_lightbox",
		"icon" => $imgs.'7.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"params" => array(
		 	array(
				"type" => "dropdown",
				"heading" => esc_html__("Light Box Type", "enar"),
				"description" => esc_html__("Choose light box type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Light-Box Type...", "enar") => '',
					esc_html__("Dialog", "enar") => "dialog",	 	
					esc_html__("Image", "enar") => "image",
					esc_html__("Gallery", "enar") => "gallery",
					esc_html__("Iframe", "enar") => "iframe",
					esc_html__("Ajax", "enar") => "ajax",
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Title", "enar"),
				"description" => esc_html__("The button title content.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('dialog')),
				"param_name" => "btn_title",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Button Color", "enar"),
				"description" => esc_html__("Choose button background color.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('dialog')),
				"param_name" => "btn_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Light Box Type", "enar"),
				"description" => esc_html__("Choose light box type.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('dialog')),
				"param_name" => "effect",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Zoom Effect", "enar") => "zoom",	 	
					esc_html__("Cube Effect", "enar") => "move",
				),
			),
			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Dialog Content", "enar"),
				"description" => esc_html__("Here is your dialog text content.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('dialog')),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Column Width", "enar"),
				"description" => esc_html__("Select your column width.", "enar"),
				"dependency" => Array(
					'element' => "type", 'value' => array('image', 'gallery')
				),
				"param_name" => "col",
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',
				),
				
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Image", "enar"),
				"description" => esc_html__("Upload an image to display as LightBox.", "enar"),
				"dependency" => Array(
					'element' => "type", 'value' => array('image', 'gallery')
				),
				"param_name" => "img",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Iframe Type", "enar"),
				"description" => esc_html__("We have three types to embed.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('iframe')),
				"param_name" => "iframe_type",
				"value" => array(
				    esc_html__("Select Iframe Type...", "enar") => '',
					esc_html__("Youtube", "enar") => 'youtube',
					esc_html__("Vimeo", "enar") => 'vimeo',
					esc_html__("Google Map", "enar") => 'map',
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Iframe Title", "enar"),
				"description" => esc_html__("Your iframe custom title here.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('iframe')),
				"param_name" => "iframe_title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Iframe URL", "enar"),
				"description" => esc_html__("The is your google map, youtube, vimeo iframe url.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('iframe')),
				"param_name" => "iframe_url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Iframe Container", "enar"),
				"description" => esc_html__("How would you like to see this iframe ?", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('iframe')),
				"param_name" => "iframe_con",
				"value" => array(
				    esc_html__("Select Iframe Container...", "enar") => '',
					esc_html__("Using Image", "enar") => 'image',
					esc_html__("Using Button", "enar") => 'as_button',
				),
				
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Poster Image", "enar"),
				"description" => esc_html__("Upload an image to display as background for the LightBox block.", "enar"),
				"dependency" => Array('element' => "iframe_con", 'value' => array('image')),
				"param_name" => "iframe_poster",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Title", "enar"),
				"description" => esc_html__("Your button custom title here.", "enar"),
				"dependency" => Array('element' => "iframe_con", 'value' => array('as_button')),
				"param_name" => "iframe_btn_text",
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Accordion Tab", "enar"),
		"base" => "hm_accordion_tab",
		"icon" => $imgs.'9.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_accordion'),
		
    	"show_settings_on_create" => false,
    	"is_container" => true,
		
		"params" => array(
		 	array(
				"type" => "dropdown",
				"heading" => esc_html__("Make It Expanded ?", "enar"),
				"description" => esc_html__("if you want the accordion item content is opened or closed.", "enar"),
				"param_name" => "expanded",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Not Expanded", "enar") => 'no',
					esc_html__("Expanded", "enar") => 'yes',
				),
				
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("The title for this tab accordion item.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Choose Icon", "enar"),
				"description" => esc_html__("The icon for this tab accordion item ( optional ).", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			/*array(
				"type" => "textarea_html",
				"heading" => esc_html__("The Content Text", "enar"),
				"description" => esc_html__("The content of this accordion tab item.", "enar"),
				"param_name" => "content",
			),*/
		), 
		"js_view" => 'VcColumnView' 
	));	
	
	vc_map( array(
		"name" => esc_html__("Accordion", "enar"),
		"base" => "hm_accordion",
		"icon" => $imgs.'8.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_accordion_tab'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Accordion Type", "enar"),
				"description" => esc_html__("Choose accordion type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Accordion Type...", "enar") => '',
					esc_html__("Accordion", "enar") => 'accordion',
					esc_html__("Toggle", "enar") => 'toggle',
				),
				
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Accordion Arrow", "enar"),
				"description" => esc_html__("Choose accordion arrow type.", "enar"),
				"param_name" => "arrow",
				"value" => array(
				    esc_html__("Select Accordion Arrow...", "enar") => '',
					esc_html__("Plus & Minus", "enar") => 'plus_minus',
					esc_html__("Arrow Style", "enar") => 'arrow_style',
				),
				
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Tab Item", "enar"),
		"base" => "hm_tab",
		"icon" => $imgs.'11.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		
		"content_element" => true,
    	"as_child" => array('only' => 'hm_tabs'),
		
		"as_parent" => array('except' => ''),
    	"show_settings_on_create" => false,
    	"is_container" => true,
		
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("The title for this tab accordion item.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Tab Image", "enar"),
				"description" => esc_html__("Upload an image to display inside this tab item.", "enar"),
				"param_name" => "img",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Choose Icon", "enar"),
				"description" => esc_html__("The icon for this tab item ( optional ).", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			/*array(
				"type" => "textarea_html",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The content text of this tab item.", "enar"),
				"param_name" => "content",
			),*/
		),
		"js_view" => 'VcColumnView'
	));	
	
	vc_map( array(
		"name" => esc_html__("Tabs", "enar"),
		"base" => "hm_tabs",
		"icon" => $imgs.'10.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		
		"as_parent" => array('only' => 'hm_tab'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Type", "enar"),
				"description" => esc_html__("Choose tabs type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Type...", "enar") => '',
					esc_html__("Style 1", "enar") => "style1",			 	
					esc_html__("Style 2", "enar") => "fill1",
					esc_html__("Style 3", "enar") => "fill_arrow1",			 	
					esc_html__("Style 4", "enar") => "2",			 	
					esc_html__("Style 5", "enar") => "fill2",
					esc_html__("Style 6", "enar") => "fill2_circle",
					esc_html__("Simple", "enar") => "simple",	  
					esc_html__("Vertical Style 1", "enar") => "ver1",
					esc_html__("Vertical Style 2", "enar") => "ver_gradient1",
				),
				
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Banner Text", "enar"),
		"base" => "hm_banner",
		"category" => esc_html__( 'Enar', 'enar'),
		"icon" => $imgs.'12.png',
		//"content_element" => true,
    	//"as_child" => array('only' => 'hm_banner_slider'),
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Banner Type", "enar"),
				"description" => esc_html__("Choose the banner type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Banner Type...", "enar") => '',
					esc_html__("Full Colored", "enar")  => "full_colored",			 	
					esc_html__("Boxed Colored", "enar")  => "boxed_colored",	
					esc_html__("Full White", "enar")  => "full_white",
					esc_html__("Boxed White", "enar")  => "boxed_white",	
					esc_html__("Full Colored 2", "enar")  => "full_colored2",
					esc_html__("Boxed Colored 2", "enar")  => "boxed_colored2",
					esc_html__("Classic White", "enar")  => "classic_white",
					esc_html__("Full Gray", "enar")  => "full_gray",
					esc_html__("Boxed Gray", "enar")  => "boxed_gray",				 	
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Banner Background Color", "enar"),
				"description" => esc_html__("Choose banner background color.", "enar"),
				"dependency" => Array(
					'element' => "type", 'value' => array('full_colored','boxed_colored','full_colored2','boxed_colored2','full_gray','boxed_gray')
				),
				"param_name" => "bg_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Banner Icon", "enar"),
				"description" => esc_html__("The icon for this banner ( optional ).", "enar"),
				"dependency" => Array(
					'element' => "type", 'value' => array('full_colored2','boxed_colored2','classic_white')
				),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Banner Title", "enar"),
				"description" => esc_html__("The title text for this banner.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Banner Content", "enar"),
				"description" => esc_html__("The content text for this banner.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Banner Text Align", "enar"),
				"description" => esc_html__("Choose text alignment for this banner.", "enar"),
				"param_name" => "align",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Align Left", "enar")  => "left",			 	
					esc_html__("Align Right", "enar")  => "right",	
					esc_html__("Align Center", "enar")  => "center",				 	
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Text", "enar"),
				"description" => esc_html__("Add the text that will display in the button.", "enar"),
				"param_name" => "btn_title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button URL", "enar"),
				"description" => esc_html__("Add the button url ex: http://example.com.", "enar"),
				"param_name" => "btn_url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Button Target", "enar"),
				"description" => esc_html__("Open banner button link in new window or in same window.", "enar"),
				"param_name" => "btn_target",
				"value" => array(
					esc_html__("Same Window", "enar")  => "_self",			 	
					esc_html__("New Window", "enar")  => "_blank",					 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Button Icon", "enar"),
				"description" => esc_html__("The icon for this banner ( optional ).", "enar"),
				"param_name" => "btn_icon",
				"value" => $all_icons,
			),
			
	)));	
	
	vc_map( array(
		"name" => esc_html__("Banner Text Slider", "enar"),
		"base" => "hm_banner_slider",
		"icon" => $imgs.'13.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_banner'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Spacer", "enar"),
		"base" => "hm_spacer",
		"icon" => $imgs.'16.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Spacer Height", "enar"),
				"description" => esc_html__("If You Want Space Between Content Parts (type Number) for example : 20", "enar"),
				"param_name" => "height",
			),
		),
	));
	
	vc_map( array(
		"name" => esc_html__("Skill Item", "enar"),
		"base" => "hm_skill",
		"icon" => $imgs.'15.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_skills'),
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Type", "enar"),
				"description" => esc_html__("Choose skills blocks type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Skills Type...", "enar") => '',
					esc_html__("Simple Bar", "enar") => "bar_simple",			 	
					esc_html__("3D Bar", "enar") => "bar_3d",	
					esc_html__("Circle", "enar") => "circle",  				 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Circle Column", "enar"),
				"description" => esc_html__("Select your circle column width.", "enar"),
				"param_name" => "col",
				"dependency" => Array('element' => "type", 'value' => array('circle')),
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',				 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Circle Path", "enar"),
				"description" => esc_html__("Select circle path type.", "enar"),
				"param_name" => "path_type",
				"dependency" => Array('element' => "type", 'value' => array('circle')),
				"value" => array(
				    esc_html__("Select Circle Path Type...", "enar") => '',
					esc_html__("Circle", "enar")  => "circle",	 	
					esc_html__("Square", "enar")  => "square",			 	
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("Add the skill title here.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Value", "enar"),
				"description" => esc_html__("Add skill value in percent %, Example: 50.", "enar"),
				"param_name" => "value",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Descripion", "enar"),
				"description" => esc_html__("The descripion text for this circle path.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('circle')),
				"param_name" => "content",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Path Color", "enar"),
				"description" => esc_html__("Choose the background color for skill path.", "enar"),
				"param_name" => "bg_color",
			),
			
	)));	
	
	vc_map( array(
		"name" => esc_html__("Skills", "enar"),
		"base" => "hm_skills",
		"icon" => $imgs.'14.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_skill'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Team Member", "enar"),
		"base" => "hm_member",
		"icon" => $imgs.'17.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_team'),
		"params" => array(
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Name", "enar"),
				"description" => esc_html__("Insert the name of the person.", "enar"),
				"param_name" => "name",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Job", "enar"),
				"description" => esc_html__("Insert the job title of the person.", "enar"),
				"param_name" => "job",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Profile Description", "enar"),
				"description" => esc_html__("Enter the content to be displayed.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Picture", "enar"),
				"description" => esc_html__("Upload an image to display.", "enar"),
				"param_name" => "image",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com ( Optional ).", "enar"),
				"param_name" => "url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Link Target", "enar"),
				"description" => esc_html__("Open member link in new window or in same window.", "enar"),
				"param_name" => "target",
				"value" => array(
					esc_html__("Same Window", "enar") => "_self",			 	
					esc_html__("New Window", "enar") => "_blank",					 	
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose member block background color.", "enar"),
				"param_name" => "bg_color",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook Link", "enar"),
				"param_name" => "facebook",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Twitter Link", "enar"),
				"param_name" => "twitter",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Google Plus Link", "enar"),
				"param_name" => "google",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Linkedin Link", "enar"),
				"param_name" => "linkedin",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Vimeo Link", "enar"),
				"param_name" => "vimeo",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Skype Link", "enar"),
				"param_name" => "skype",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("rss Link", "enar"),
				"param_name" => "rss",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Flickr Link", "enar"),
				"param_name" => "flickr",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Picassa Link", "enar"),
				"param_name" => "picassa",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Tumblr Link", "enar"),
				"param_name" => "tumblr",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Dribbble Link", "enar"),
				"param_name" => "dribbble",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Soundcloud Link", "enar"),
				"param_name" => "soundcloud",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Instagram Link", "enar"),
				"param_name" => "instagram",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Pinterest Link", "enar"),
				"param_name" => "pinterest",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("YouTube Link", "enar"),
				"param_name" => "youtube",
			),
			
	)));	
	
	vc_map( array(
		"name" => esc_html__("Team Members", "enar"),
		"base" => "hm_team",
		"icon" => $imgs.'18.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_member'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Members Blocks Style", "enar"),
				"description" => esc_html__("Choose members blocks style type.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Members Blocks Style...", "enar") => '',
					esc_html__("Flip Cart", "enar") => "flip_cart",			 	
					esc_html__("Slider", "enar") => "slider",	
					esc_html__("Blocks", "enar") => "blocks",  				 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Column Width", "enar"),
				"description" => esc_html__("Select column width.", "enar"),
				"param_name" => "col",
				"dependency" => Array('element' => "type", 'value' => array('flip_cart')),
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',				 	
				),
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Testimonial Item", "enar"),
		"base" => "hm_monial",
		"icon" => $imgs.'20.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_monials'),
		"params" => array(
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Name", "enar"),
				"description" => esc_html__("Insert the name of the person.", "enar"),
				"param_name" => "name",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Job Or Company", "enar"),
				"description" => esc_html__("Insert the job title or company name of the person.", "enar"),
				"param_name" => "job",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Testimonial Content", "enar"),
				"description" => esc_html__("Enter the content text to be displayed.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Picture", "enar"),
				"description" => esc_html__("Upload an image to display.", "enar"),
				"param_name" => "image",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com ( Optional ).", "enar"),
				"param_name" => "url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Link Target", "enar"),
				"description" => esc_html__("Open link in new window or in same window.", "enar"),
				"param_name" => "target",
				"value" => array(
					esc_html__("Same Window", "enar") => "_self",			 	
					esc_html__("New Window", "enar") => "_blank",					 	
				),
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Testimonials", "enar"),
		"base" => "hm_monials",
		"icon" => $imgs.'19.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_monial'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Testimonials Style", "enar"),
				"description" => esc_html__("Choose a design style for the testimonials.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Testimonials Style...", "enar") => '',
					esc_html__("Stle 1", "enar") => "1",			 	
					esc_html__("Stle 2", "enar") => "2",	 				 	
				),
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Client", "enar"),
		"base" => "hm_client",
		"icon" => $imgs.'22.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_clients'),
		"params" => array(
		    array(
				"type" => "attach_image",
				"heading" => esc_html__("Logo", "enar"),
				"description" => esc_html__("Choose logo image for this client.", "enar"),
				"param_name" => "logo",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Name", "enar"),
				"description" => esc_html__("Add the client name to show when rollover the logo.", "enar"),
				"param_name" => "name",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com ( Optional ).", "enar"),
				"param_name" => "url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Link Target", "enar"),
				"description" => esc_html__("Open link in new window or in same window.", "enar"),
				"param_name" => "target",
				"value" => array(
					esc_html__("Same Window", "enar") => "_self",			 	
					esc_html__("New Window", "enar") => "_blank",					 	
				),
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Clients", "enar"),
		"base" => "hm_clients",
		"icon" => $imgs.'21.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_client'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", "enar"),
				"description" => esc_html__("Choose the background style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Light Style", "enar") => "light",			 	
					esc_html__("Dark Style", "enar") => "dark",	 				 	
				),
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Padding Top & Bottom", "enar"),
				"description" => esc_html__("This is the container padding by pixel, for example : 30", "enar"),
				"param_name" => "spacer",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose the background color for clients section.", "enar"),
				"param_name" => "bg_color",
			),*/
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Counter Item", "enar"),
		"base" => "hm_count",
		"icon" => $imgs.'24.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_counter'),
		"params" => array(
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("Counter title text content.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Value", "enar"),
				"description" => esc_html__("The number to which the counter will animate.", "enar"),
				"param_name" => "number",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Icon", "enar"),
				"description" => esc_html__("Choose counter box icon.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Counters", "enar"),
		"base" => "hm_counter",
		"icon" => $imgs.'23.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_count'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", "enar"),
				"description" => esc_html__("Choose the style of all counter boxes.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Options...", "enar") => '',
					esc_html__("Style 1", "enar") => "1",			 	
					esc_html__("Style 2", "enar") => "2",	 				 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number of Columns", "enar"),
				"description" => esc_html__("Set the number of counter boxes.", "enar"),
				"param_name" => "col",
				"value" => array(
				    esc_html__("Select Number of Columns...", "enar") => '',
					esc_html__("1 Box", "enar") => "12",
					esc_html__("2 Boxes", "enar") => "6",
					esc_html__("3 Boxes", "enar") => "4",
					esc_html__("4 Boxes", "enar") => "3",
					esc_html__("6 Boxes", "enar") => "2", 				 	
				),
			),
			
			array(
				"type" => "textfield",
				"heading" => esc_html__("Animation Delay", "enar"),
				"description" => esc_html__("1000 equal one second.", "enar"),
				"param_name" => "delay",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Animation Type", "enar"),
				"description" => esc_html__("Select the type of animation.", "enar"),
				"param_name" => "animation",
				"value" => $animation,
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Icon Box", "enar"),
		"base" => "hm_icon",
		"icon" => $imgs.'26.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_icons'),
		"params" => array(
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("Counter box text title.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com ( Optional ).", "enar"),
				"param_name" => "url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Link Target", "enar"),
				"description" => esc_html__("Open link in new window or in same window.", "enar"),
				"param_name" => "target",
				"value" => array(
					esc_html__("Same Window", "enar") => "_self",			 	
					esc_html__("New Window", "enar") => "_blank",					 	
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Icon Color", "enar"),
				"description" => esc_html__("Choose icon color.", "enar"),
				"param_name" => "icon_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Icon", "enar"),
				"description" => esc_html__("Choose your icon.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Image Icon", "enar"),
				"description" => esc_html__("Upload an icon image to display.", "enar"),
				"param_name" => "img_icon",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose the box background color.", "enar"),
				"param_name" => "leaf_color",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The content of this icon item.", "enar"),
				"param_name" => "content",
			),
			
	)));	
	
	vc_map( array(
		"name" => esc_html__("Icon Boxes", "enar"),
		"base" => "hm_icons",
		"icon" => $imgs.'25.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_icon'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Boxes Style", "enar"),
				"description" => esc_html__("Choose the style of all icon boxes.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Boxes Style...", "enar") => '',
					esc_html__("Style 1", "enar")  => "style1",			 	
					esc_html__("Style 2", "enar")  => "style2", 
					esc_html__("Style 3", "enar")  => "style3",
					esc_html__("Style 4", "enar")  => "style4",
					esc_html__("Style 5", "enar")  => "style5",
					esc_html__("Style 6", "enar")  => "style6",			 	
					esc_html__("Style 7", "enar")  => "style7", 
					esc_html__("Icons Side By Side", "enar")  => "style8",
					esc_html__("List Icons Style", "enar")  => "style9",
					esc_html__("Tree Icons", "enar")  => "style10",
					esc_html__("Image Icons", "enar")  => "style11",
					esc_html__("Simple Icons", "enar")  => "style12",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Column Width", "enar"),
				"description" => esc_html__("Select column width.", "enar"),
				"param_name" => "col",
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',				 	
				),
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Picture", "enar"),
				"description" => esc_html__("Upload an icon image to display as main photo.", "enar"),
				"dependency" => Array('element' => "type", 'value' => array('style10')),
				"param_name" => "tree_image",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Animation Delay", "enar"),
				"description" => esc_html__("1000 equal one second.", "enar"),
				"param_name" => "delay",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Animation Type", "enar"),
				"description" => esc_html__("Select the type of animation.", "enar"),
				"param_name" => "animation",
				"value" => $animation,
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Button", "enar"),
		"base" => "hm_button",
		"icon" => $imgs.'27.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Button Style", "enar"),
				"description" => esc_html__("Choose button style.", "enar"),
				"param_name" => "type",
				"value" => array(
				    esc_html__("Select Button Style...", "enar")  => "",
					esc_html__("Sample", "enar")  => "simple",			 	
					esc_html__("Animated 1", "enar")  => "animated1", 
					esc_html__("Animated 2", "enar")  => "animated2",
					esc_html__("Animated 3", "enar")  => "animated3",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Button Size", "enar"),
				"description" => esc_html__("Choose button size.", "enar"),
				"param_name" => "size",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Medium", "enar")  => "medium",			 	
					esc_html__("Small", "enar")  => "small", 
					esc_html__("Large", "enar")  => "large",				 	
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Title", "enar"),
				"description" => esc_html__("Add the text that will display in the button.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com.", "enar"),
				"param_name" => "url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Link Target", "enar"),
				"description" => esc_html__("Open link in new window or in same window.", "enar"),
				"param_name" => "target",
				"value" => array(
					esc_html__("Same Window", "enar")  => "_self",			 	
					esc_html__("New Window", "enar")  => "_blank",					 	
				),
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Background Color", "enar"),
				"description" => esc_html__("Choose background color for this button.", "enar"),
				"param_name" => "bg_color",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Hover Background Color", "enar"),
				"description" => esc_html__("Choose background color when you rollover on this button.", "enar"),
				"param_name" => "bg_hover",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Padding Top", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20", "enar"),
				"param_name" => "margin_top",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Button Padding Bottom", "enar"),
				"description" => esc_html__("In pixels (px), Example: 20", "enar"),
				"param_name" => "margin_bottom",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Button Icon", "enar"),
				"description" => esc_html__("Choose button icon.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Google Map", "enar"),
		"base" => "hm_google_map",
		"icon" => $imgs.'28.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Latitude", "enar"),
				"description" => esc_html__("The latitude number.", "enar"),
				"param_name" => "latitude",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Longitude", "enar"),
				"description" => esc_html__("The longitude number.", "enar"),
				"param_name" => "longitude",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Description", "enar"),
				"description" => esc_html__("The description text for this location.", "enar"),
				"param_name" => "description",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Enable Box Border", "enar"),
				"description" => esc_html__("Enable or disable the box border.", "enar"),
				"param_name" => "bordered",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "yes",			 	
					esc_html__("Disable", "enar")  => "no",					 	
				),
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Tooltip", "enar"),
		"base" => "hm_tooltip",
		"icon" => $imgs.'29.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("Add the title text for this tooltip.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The text that display inside the tooltip box.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", "enar"),
				"description" => esc_html__("Choose the style for this tooltip box.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Style 1", "enar") => "1",		 	
					esc_html__("Style 2", "enar") => "2",
					esc_html__("Style 3", "enar") => "3",					 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Animation Effect", "enar"),
				"description" => esc_html__("Choose your animation effect.", "enar"),
				"param_name" => "effect",
				"dependency" => Array('element' => "style", 'value' => array('1')),
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Style 1", "enar") => "1",		 	
					esc_html__("Style 2", "enar") => "2",
					esc_html__("Style 3", "enar") => "3",	
					esc_html__("Style 4", "enar") => "4",
					esc_html__("Style 5", "enar") => "5",			 	
				),
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Picture", "enar"),
				"description" => esc_html__("Upload an image to display inside the tooltip box.", "enar"),
				"param_name" => "tol_image",
				"dependency" => Array('element' => "style", 'value' => array('1')),
			),
			
	)));
	
	vc_map( array(
		"name" => esc_html__("Text Box", "enar"),
		"base" => "hm_text",
		"icon" => $imgs.'30.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The content text here.", "enar"),
				"param_name" => "content",
			),
			
	)));
	
	vc_map( array(
		"name" => esc_html__("Blockquote", "enar"),
		"base" => "hm_quote",
		"icon" => $imgs.'31.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", "enar"),
				"description" => esc_html__("Choose the blockquote style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Style 1", "enar")  => "1",		 	
					esc_html__("Style 2", "enar")  => "2",		 	
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Footer", "enar"),
				"description" => esc_html__("The footer title text for this blockquote.", "enar"),
				"param_name" => "footer",
			),
			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The text that display inside the blockquote box.", "enar"),
				"param_name" => "content",
			),
	)));
	
	//=====> Pricing Tables
	
	vc_map( array(
		"name" => esc_html__("Pricing Plan Row", "enar"),
		"base" => "hm_pricing_plan_row",
		"icon" => $imgs.'34.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_pricing_plan'),
		"params" => array(
		    array(
				"type" => "textarea",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("Add title text for this plan feature row.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Icon Type", "enar"),
				"description" => esc_html__("Select the title icon type.", "enar"),
				"param_name" => "icon",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("No Icon", "enar")  => "no_icon",
					esc_html__("True Icon", "enar")  => "true", 
					esc_html__("Wrong Icon", "enar")  => "false",		 	
				),
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Pricing Plan", "enar"),
		"base" => "hm_pricing_plan",
		"icon" => $imgs.'33.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		
		"as_parent" => array('only' => 'hm_pricing_plan_row'),
    	"show_settings_on_create" => false,
    	"is_container" => true,
		
		"content_element" => true,
    	"as_child" => array('only' => 'hm_pricing_table'),
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Plan Column Width", "enar"),
				"description" => esc_html__("The pricing plan column width.", "enar"),
				"param_name" => "col",
				"value" => array(
				    esc_html__("Select Column Width...", "enar") => '',
					esc_html__("One Third ( 1/3 )", "enar") => '4',
					esc_html__("Two Thirds ( 2/3 )", "enar") => '8',
					esc_html__("One Fourth ( 1/4 )", "enar") => '3',
					esc_html__("Three Fourth ( 3/4 )", "enar") => '9',
					esc_html__("Two Fifth", "enar") => '5',
					esc_html__("Three Fifth", "enar") => '7',
					esc_html__("Four Fifth", "enar") => '11',
					esc_html__("One Sixth", "enar") => '2',
					esc_html__("Five Sixth", "enar") => '10',
					esc_html__("Half Sixth", "enar") => '1',
					esc_html__("One Half ( 1/2 )", "enar") => '6',
					esc_html__("One Column ( Full Width )", "enar") => '12',				 	
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Column Style", "enar"),
				"description" => esc_html__("Select plan column style width.", "enar"),
				"param_name" => "active",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Default", "enar") => 'no',
					esc_html__("Selected", "enar") => 'yes',			 	
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Plan Name", "enar"),
				"description" => esc_html__("Add the title text for this pricing plan.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Plan Price", "enar"),
				"description" => esc_html__("Add plan price, for example: 200.", "enar"),
				"param_name" => "price",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Plan Currency", "enar"),
				"description" => esc_html__("Add plan currency, for example: $.", "enar"),
				"param_name" => "currency",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Period Label", "enar"),
				"description" => esc_html__("The period label time for this plan, for example: Monthly.", "enar"),
				"param_name" => "time",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Plan Button Text", "enar"),
				"description" => esc_html__("Plan button text, for example: Order Now.", "enar"),
				"param_name" => "button_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Plan Button URL", "enar"),
				"description" => esc_html__("Add the url ex: http://example.com.", "enar"),
				"param_name" => "button_url",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Plan Button Link Target", "enar"),
				"description" => esc_html__("Open link in new window or in same window.", "enar"),
				"param_name" => "button_target",
				"value" => array(
					esc_html__("Same Window", "enar")  => "_self",			 	
					esc_html__("New Window", "enar")  => "_blank",					 	
				),
			),
		), 
		"js_view" => 'VcColumnView'
	));	
	
	vc_map( array(
		"name" => esc_html__("Pricing Table", "enar"),
		"base" => "hm_pricing_table",
		"icon" => $imgs.'32.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_pricing_plan'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Table Style", "enar"),
				"description" => esc_html__("Choose the pricing tables style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Style 1", "enar")  => "1",		 	
					esc_html__("Style 2", "enar")  => "2",
					esc_html__("Style 3", "enar")  => "3",
					esc_html__("Style 4", "enar")  => "4", 	
				),
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	$hm_args       = array('post_type' => 'post','post_status' => 'publish','posts_per_page' => -1, 'taxonomy'=> 'category');
	$the_query     = get_posts( $hm_args);
	$hm_categories = get_categories($hm_args);
	
	$hm_posts_store = array();
	$hm_cats_store = array();
	
	if($the_query){
		foreach($the_query as $post) {
			$hm_posts_store[$post->post_title] = $post->ID;
		}
	}
	if($hm_categories){
		foreach($hm_categories as $cat) {
			if( isset($cat->term_id)){
				$hm_cats_store[$cat->name] = $cat->term_id;
			}
		}
	}
	
	vc_map( array(
		"name" => esc_html__("Blog Carousel", "enar"),
		"base" => "hm_blog_carousel",
		"icon" => $imgs.'35.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Carousel Style", "enar"),
				"description" => esc_html__("Select the blog carousel style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Flip Effect Full Width", "enar")  => "flip_effect_full",
					esc_html__("Flip Effect Boxed", "enar")  => "flip_effect_boxed",
					esc_html__("Shadow Effect Full Width", "enar")  => "shadow_effect_full",
					esc_html__("Shadow Effect Boxed", "enar")  => "shadow_effect_boxed",
					esc_html__("Zoom-In Effect", "enar")  => "zoom_effect",
					esc_html__("Hover-Direction Effect", "enar")  => "hoverdir",),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Posts Title", "enar"),
				"description" => esc_html__("This option to Enable or disable the post title in this blog carousel.", "enar"),
				"param_name" => "show_title",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Posts Date", "enar"),
				"description" => esc_html__("This option to Enable or disable the post date in this blog carousel.", "enar"),
				"param_name" => "show_date",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Posts Categories", "enar"),
				"description" => esc_html__("This option to show or hide the posts categories.", "enar"),
				"param_name" => "show_cats",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Post Format", "enar"),
				"description" => esc_html__("This option to Enable or disable the post format icon in this blog carousel.", "enar"),
				"param_name" => "show_format",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Posts Number", "enar"),
				"description" => esc_html__("The posts number showing in this carousel, ex: 10.", "enar"),
				"param_name" => "posts_num",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Zoom Button Text", "enar"),
				"description" => esc_html__("The text content for zoom button.", "enar"),
				"param_name" => "zoom_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Details Button Text", "enar"),
				"description" => esc_html__("The text content for details button.", "enar"),
				"param_name" => "more_btn_text",
			),
			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Posts By", "enar"),
				"description" => esc_html__("Sort carousel posts by.", "enar"),
				"param_name" => "order_by",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",	
					esc_html__("Order By Data", "enar") => "date",		 	
					esc_html__("Order By ID", "enar") => "ID",
					esc_html__("Order By Author", "enar") => "author",	  
				    esc_html__("Order By Title", "enar") => "title",		 	
					esc_html__("Order Random", "enar") => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order By", "enar"),
				"description" => esc_html__("Sort carousel posts by ascending or descending order.", "enar"),
				"param_name" => "order",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Descending Order", "enar") => "DESC",		 	
					esc_html__("Ascending Order", "enar") => "ASC",		 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Get Posts From", "enar"),
				"description" => esc_html__("Choose where you get the carousel posts.", "enar"),
				"param_name" => "posts_from",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("From All Posts", "enar") => "from_all",		 	
					esc_html__("Choose From The Categories", "enar") => "from_cats",
					esc_html__("Select From The Posts", "enar") => "from_posts",	 		
				),
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From Categories", "enar"),
				"description" => esc_html__("Choose the categories that you like to include all its posts in the carousel.", "enar"),
				"param_name" => "categories",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_cats')),
				"value" => $hm_cats_store,
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From The Posts", "enar"),
				"description" => esc_html__("Choose the posts that you like to include in the carousel.", "enar"),
				"param_name" => "posts",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_posts')),
				"value" => $hm_posts_store,
			),
	)));
	
	global $wpdb;
	$get_portfolio_category = array();
	$get_portfolio_category_b = array();
	
	$wpdb_select_tax = 'SELECT * FROM '.$wpdb->terms.' AS t INNER JOIN '.$wpdb->term_taxonomy.' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "portfolio_category" AND tt.count > 0 ORDER BY  t.term_id DESC LIMIT 0 , 30';
	$get_portfolio_tax = $wpdb->get_results($wpdb_select_tax, ARRAY_A);
	
	if($get_portfolio_tax){
		foreach($get_portfolio_tax as $caty) {
			$get_portfolio_category[$caty['name']] = $caty['term_id'];
			$get_portfolio_category_b[$caty['name']] = $caty['slug'];
		}
	}
	
	$hm_porto_args = array('post_type' => 'portfolio','post_status' => 'publish','posts_per_page' => -1);
	$hm_porto_query     = get_posts( $hm_porto_args);
	$hm_porto_posts_store = array();
	
	if($hm_porto_query){
		foreach($hm_porto_query as $porto_post) {
			$hm_porto_posts_store[$porto_post->post_title] = $porto_post->ID;
		}
	}
	
	vc_map( array(
		"name" => esc_html__("Portfolio Carousel", "enar"),
		"base" => "hm_portfolio_carousel",
		"icon" => $imgs.'36.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Carousel Style", "enar"),
				"description" => esc_html__("Select projects carousel style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Flip Effect Full Width", "enar")  => "flip_effect_full",
					esc_html__("Flip Effect Boxed", "enar")  => "flip_effect_boxed",
					esc_html__("Shadow Effect Full Width", "enar")  => "shadow_effect_full",
					esc_html__("Shadow Effect Boxed", "enar")  => "shadow_effect_boxed",
					esc_html__("Zoom-In Effect", "enar")  => "zoom_effect",
					esc_html__("Hover-Direction Effect", "enar")  => "hoverdir",),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Projects Title", "enar"),
				"description" => esc_html__("This option to Enable or disable the projects title.", "enar"),
				"param_name" => "show_title",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Projects Date", "enar"),
				"description" => esc_html__("This option to Enable or disable the projects date.", "enar"),
				"param_name" => "show_date",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Projects Categories", "enar"),
				"description" => esc_html__("This option to Enable or disable the projects categories.", "enar"),
				"param_name" => "show_cats",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number Of Projects", "enar"),
				"description" => esc_html__("The projects posts number showing in this carousel, ex: 10.", "enar"),
				"param_name" => "posts_num",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Zoom Button Text", "enar"),
				"description" => esc_html__("The text content for zoom button.", "enar"),
				"param_name" => "zoom_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Details Button Text", "enar"),
				"description" => esc_html__("The text content for details button.", "enar"),
				"param_name" => "more_btn_text",
			),
			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Posts By", "enar"),
				"description" => esc_html__("Sort projects carousel by.", "enar"),
				"param_name" => "order_by",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Order By Data", "enar") => "date",		 	
					esc_html__("Order By ID", "enar") => "ID",
					esc_html__("Order By Author", "enar") => "author",	  
				    esc_html__("Order By Title", "enar") => "title",		 	
					esc_html__("Order Random", "enar") => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order By", "enar"),
				"description" => esc_html__("Sort carousel projects by ascending or descending order.", "enar"),
				"param_name" => "order",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Descending Order", "enar") => "DESC",		 	
					esc_html__("Ascending Order", "enar") => "ASC",		 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Get Projects From", "enar"),
				"description" => esc_html__("Choose where you get the carousel projects.", "enar"),
				"param_name" => "posts_from",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("From All Posts", "enar") => "from_all",		 	
					esc_html__("Choose From The Categories", "enar") => "from_cats",
					esc_html__("Select From The Posts", "enar") => "from_posts",	 		
				),
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From Categories", "enar"),
				"description" => esc_html__("Choose the categories that you like to include all its projects in the carousel.", "enar"),
				"param_name" => "categories",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_cats')),
				"value" => $get_portfolio_category,
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From The Projects", "enar"),
				"description" => esc_html__("Choose the custom projects that you like to include in the carousel.", "enar"),
				"param_name" => "posts",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_posts')),
				"value" => $hm_porto_posts_store,
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Portfolio Filter", "enar"),
		"base" => "hm_portfolio_filter",
		"icon" => $imgs.'37.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Style", "enar"),
				"description" => esc_html__("Choose the portfolio filter style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Simple Style", "enar")  => "simple",
					esc_html__("Bootom-Animate Effect", "enar")  => "bootmanim",
					esc_html__("Hover-Dir Effect", "enar")  => "hoverdir",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Layout", "enar"),
				"description" => esc_html__("Choose the layout style for portfolio filter items.", "enar"),
				"param_name" => "filter_layout",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Grid Boxes", "enar")  => "grid_porto",
					esc_html__("Masonry Layout", "enar")  => "masonry_porto",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Width", "enar"),
				"description" => esc_html__("Choose the layout width for the portfolio filter.", "enar"),
				"param_name" => "filter_width",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Boxed Layout", "enar")  => "boxed_portos",
					esc_html__("FullWidth Layout", "enar")  => "full_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Columns", "enar"),
				"description" => esc_html__("Choose how many projects boxes you want to show in one row.", "enar"),
				"param_name" => "filter_column",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("2 Columns", "enar")  => "two_blocks",		 	
					esc_html__("3 Columns", "enar")  => "three_blocks",
					esc_html__("4 Columns", "enar")  => "four_blocks",
					esc_html__("5 Columns", "enar")  => "five_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Blocks Spaces", "enar"),
				"description" => esc_html__("The blank space between projects boxes.", "enar"),
				"param_name" => "filter_spaces",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Has Spaces", "enar")  => "has_sapce_portos",
					esc_html__("No Spaces", "enar")  => "no_sapce_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Menu Counter", "enar"),
				"description" => esc_html__("The counter box shows the number of projects within each category.", "enar"),
				"param_name" => "items_counter",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Show Counter", "enar")  => "nav_with_nums",
					esc_html__("Hide Counter", "enar")  => "nav_no_nums",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Buttons Style", "enar"),
				"description" => esc_html__("Choose the portfolio filter buttons style.", "enar"),
				"param_name" => "buttons_style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Text Buttons", "enar")  => "text_but",
					esc_html__("Icon Buttons", "enar")  => "icon_but",
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("All-Projects Button Text", "enar"),
				"description" => esc_html__("The all-projects button text content.", "enar"),
				"param_name" => "all_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Zoom Image Button Text", "enar"),
				"description" => esc_html__("The project zoom button text content.", "enar"),
				"param_name" => "zoom_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Details Button Text", "enar"),
				"description" => esc_html__("The project details button text content.", "enar"),
				"param_name" => "more_btn_text",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Ajax Expand Button Text", "enar"),
				"description" => esc_html__("The project ajax expand button text content.", "enar"),
				"param_name" => "ajax_btn_text",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Sort-By )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Sort-By Option Text ).", "enar"),
				"param_name" => "sort_srtby_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Names )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Names Option Text ).", "enar"),
				"param_name" => "sort_names_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Dates )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Dates Option Text ).", "enar"),
				"param_name" => "sort_dates_text",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Likes )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Likes Option Text ).", "enar"),
				"param_name" => "sort_likes_text",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Comments )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Comments Option Text ).", "enar"),
				"param_name" => "sort_comnt_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number of Posts", "enar"),
				"description" => esc_html__("Select number of projects display in this filter, ex: 20.", "enar"),
				"param_name" => "posts_num",
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select Category", "enar"),
				"description" => esc_html__("", "enar"),
				"param_name" => "cats",
				"value" => $get_portfolio_category_b,
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Projects By", "enar"),
				"description" => esc_html__("Sort the projects by.", "enar"),
				"param_name" => "orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Order By Data", "enar")  => "date",		 	
					esc_html__("Order By ID", "enar")  => "ID",
					esc_html__("Order By Author", "enar")  => "author",
						  
					esc_html__("Order By Title", "enar")  => "title",		 	
					esc_html__("Order Random", "enar")  => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort Projects By", "enar"),
				"description" => esc_html__("Sort the projects by ascending or descending order.", "enar"),
				"param_name" => "sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Categories By", "enar"),
				"description" => esc_html__("Sort the projects categories by.", "enar"),
				"param_name" => "cat_orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Count", "enar")  => "count",			 	
					esc_html__("Name", "enar")  => "name",
					esc_html__("ID", "enar")  => "ID",	  
					esc_html__("Slug", "enar")  => "slug",	  
					esc_html__("Term Group", "enar")  => "term_group",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort Categories By", "enar"),
				"description" => esc_html__("Sort the categories by ascending or descending order.", "enar"),
				"param_name" => "cat_sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Empty", "enar"),
				"description" => esc_html__("Show or hide empty categories that not contains any projects.", "enar"),
				"param_name" => "hide_empty",
				"value" => array(
				    esc_html__("Show Or Hide...", "enar") => "",
					esc_html__("Show", "enar")  => "1",	
					esc_html__("Hide", "enar")  => "0",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show All-Projects Button", "enar"),
				"description" => esc_html__("This first button that will contains all the projects.", "enar"),
				"param_name" => "show_all_button",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			/*array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Ajax Expand Button", "enar"),
				"description" => esc_html__("Enable or disable ajax content expand button.", "enar"),
				"param_name" => "show_ajax_expand",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					"Enable"  => "show",	
					"Disable"  => "hide",	 		
				),
			),*/
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Filters Buttons", "enar"),
				"description" => esc_html__("Enable or disable the categories menu filters that contains the list of categories as a horizontal menu.", "enar"),
				"param_name" => "show_filters",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Sort-By Options", "enar"),
				"description" => esc_html__("Enable or disable sort-by options.", "enar"),
				"param_name" => "show_sortby",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Project Date", "enar"),
				"description" => esc_html__("This option to Enable or disable the project date.", "enar"),
				"param_name" => "show_date",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Project Categories", "enar"),
				"description" => esc_html__("This option to show or hide the project categories.", "enar"),
				"param_name" => "show_cats",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Comments Counter", "enar"),
				"description" => esc_html__("This option to Enable or disable the project comments counter.", "enar"),
				"param_name" => "show_comments",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			/*array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Project Like Icon", "enar"),
				"description" => esc_html__("This option to Enable or disable the project like button.", "enar"),
				"param_name" => "show_like",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable"  => "show",	
					esc_html__("Disable"  => "hide",	 		
				),
			),*/
	)));	
	
	$hm_blog_args       = array('post_type' => 'post','post_status' => 'publish','posts_per_page' => -1, 'taxonomy'=> 'category');
	$hm_blog_categories = get_categories($hm_blog_args);
	
	$hm_blog_cats_store = array();
	
	if($hm_blog_categories){
		foreach($hm_blog_categories as $catt) {
			if( isset($catt->term_id)){
				$hm_blog_cats_store[$catt->name] = $catt->slug;
			}
		}
	}
	
	vc_map( array(
		"name" => esc_html__("Blog Filter", "enar"),
		"base" => "hm_blog_filter",
		"icon" => $imgs.'38.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Style", "enar"),
				"description" => esc_html__("Choose the blog filter style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Simple Style", "enar")  => "simple",
					esc_html__("Bootom-Animate Effect", "enar")  => "bootmanim",
					esc_html__("Hover-Dir Effect", "enar")  => "hoverdir",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Layout", "enar"),
				"description" => esc_html__("Choose the layout style for blog filter items.", "enar"),
				"param_name" => "filter_layout",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Grid Boxes", "enar")  => "grid_porto",
					esc_html__("Masonry Layout", "enar")  => "masonry_porto",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Width", "enar"),
				"description" => esc_html__("Choose the layout width for the blog filter.", "enar"),
				"param_name" => "filter_width",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Boxed Layout", "enar")  => "boxed_portos",
					esc_html__("FullWidth Layout", "enar")  => "full_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Columns", "enar"),
				"description" => esc_html__("Choose how many posts boxes you want to show in one row.", "enar"),
				"param_name" => "filter_column",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("2 Columns", "enar")  => "two_blocks",		 	
					esc_html__("3 Columns", "enar")  => "three_blocks",
					esc_html__("4 Columns", "enar")  => "four_blocks",
					esc_html__("5 Columns", "enar")  => "five_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Blocks Spaces", "enar"),
				"description" => esc_html__("The blank space between posts boxes.", "enar"),
				"param_name" => "filter_spaces",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Has Spaces", "enar")  => "has_sapce_portos",
					esc_html__("No Spaces", "enar")  => "no_sapce_portos",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Filter Menu Counter", "enar"),
				"description" => esc_html__("The counter box shows the number of posts within each category.", "enar"),
				"param_name" => "items_counter",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Show Counter", "enar")  => "nav_with_nums",
					esc_html__("Hide Counter", "enar")  => "nav_no_nums",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Buttons Style", "enar"),
				"description" => esc_html__("Choose the blog filter buttons style.", "enar"),
				"param_name" => "buttons_style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Text Buttons", "enar")  => "text_but",
					esc_html__("Icon Buttons", "enar")  => "icon_but",
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("All-Posts Button Text", "enar"),
				"description" => esc_html__("The all-posts button text content.", "enar"),
				"param_name" => "all_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Zoom Button Text", "enar"),
				"description" => esc_html__("The post image zoom button text content.", "enar"),
				"param_name" => "zoom_btn_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Details Button Text", "enar"),
				"description" => esc_html__("The post details button text content.", "enar"),
				"param_name" => "more_btn_text",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Ajax Expand Button Text", "enar"),
				"description" => esc_html__("The post ajax expand button text content.", "enar"),
				"param_name" => "ajax_btn_text",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Sort-By )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Sort-By Option Text ).", "enar"),
				"param_name" => "sort_srtby_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Names )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Names Option Text ).", "enar"),
				"param_name" => "sort_names_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Dates )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Dates Option Text ).", "enar"),
				"param_name" => "sort_dates_text",
			),
			/*array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Likes )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Likes Option Text ).", "enar"),
				"param_name" => "sort_likes_text",
			),*/
			array(
				"type" => "textfield",
				"heading" => esc_html__("Sorting Menu ( Comments )", "enar"),
				"description" => esc_html__("The text content for sort-by menu ( Comments Option Text ).", "enar"),
				"param_name" => "sort_comnt_text",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Number of Posts", "enar"),
				"description" => esc_html__("Select number of posts display in this filter, ex: 20", "enar"),
				"param_name" => "posts_num",
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select Category", "enar"),
				"description" => esc_html__("", "enar"),
				"param_name" => "cats",
				"value" => $hm_blog_cats_store,
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Posts By", "enar"),
				"description" => esc_html__("Sort posts by...", "enar"),
				"param_name" => "orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Order By Data", "enar")  => "date",		 	
					esc_html__("Order By ID", "enar")  => "ID",
					esc_html__("Order By Author", "enar")  => "author",
						  
					esc_html__("Order By Title", "enar")  => "title",		 	
					esc_html__("Order Random", "enar")  => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort Posts By", "enar"),
				"description" => esc_html__("Sort posts by ascending or descending order.", "enar"),
				"param_name" => "sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Categories By", "enar"),
				"description" => esc_html__("Sort posts categories by...", "enar"),
				"param_name" => "cat_orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Count", "enar")  => "count",			 	
					esc_html__("Name", "enar")  => "name",
					esc_html__("ID", "enar")  => "ID",	  
					esc_html__("Slug", "enar")  => "slug",	  
					esc_html__("Term Group", "enar")  => "term_group",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort Categories By", "enar"),
				"description" => esc_html__("Sort the categories by ascending or descending order.", "enar"),
				"param_name" => "cat_sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Empty", "enar"),
				"description" => esc_html__("Show or hide empty categories that not contains any posts.", "enar"),
				"param_name" => "hide_empty",
				"value" => array(
				    esc_html__("Show Or Hide...", "enar") => "",
					esc_html__("Show", "enar")  => "1",	
					esc_html__("Hide", "enar")  => "0",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show All-Posts Button", "enar"),
				"description" => esc_html__("This first button that will show all posts.", "enar"),
				"param_name" => "show_all_button",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			/*array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Ajax Expand Button", "enar"),
				"description" => esc_html__("Enable or disable ajax content expand button.", "enar"),
				"param_name" => "show_ajax_expand",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					"Enable"  => "show",	
					"Disable"  => "hide",	 		
				),
			),*/
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Filters Buttons", "enar"),
				"description" => esc_html__("Enable or disable the categories menu filters that contains the list of categories as a horizontal menu.", "enar"),
				"param_name" => "show_filters",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Sort-By Options", "enar"),
				"description" => esc_html__("Enable or disable sort-by options.", "enar"),
				"param_name" => "show_sortby",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Posts Dates", "enar"),
				"description" => esc_html__("This option to show or hide the posts dates.", "enar"),
				"param_name" => "show_date",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Posts Categories", "enar"),
				"description" => esc_html__("This option to show or hide the post categories.", "enar"),
				"param_name" => "show_cats",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Comments Counter", "enar"),
				"description" => esc_html__("This option to show or hide the post comments counter.", "enar"),
				"param_name" => "show_comments",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			/*array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Post Like Icon", "enar"),
				"description" => esc_html__("This option to show or hide the post like button.", "enar"),
				"param_name" => "show_like",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable"  => "show",	
					esc_html__("Disable"  => "hide",	 		
				),
			),*/
	)));
	
	$get_faqs_categories = array();
	
	$wpdb_select_faqs = 'SELECT * FROM '.$wpdb->terms.' AS t INNER JOIN '.$wpdb->term_taxonomy.' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "faq_category" AND tt.count > 0 ORDER BY  t.term_id DESC LIMIT 0 , 30';
	$get_faqs_tax = $wpdb->get_results($wpdb_select_faqs, ARRAY_A);
	
	if($get_faqs_tax){
		foreach($get_faqs_tax as $faq_cat) {
			$get_faqs_categories[$faq_cat['name']] = $faq_cat['slug'];
		}
	}
	
	vc_map( array(
		"name" => esc_html__("FAQs Filter", "enar"),
		"base" => "hm_faqs",
		"icon" => $imgs.'39.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select Categories", "enar"),
				"description" => esc_html__("", "enar"),
				"param_name" => "cats",
				"value" => $get_faqs_categories,
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order By", "enar"),
				"description" => esc_html__("Sort FAQs posts by.", "enar"),
				"param_name" => "orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Order By Data", "enar")  => "date",		 	
					esc_html__("Order By ID", "enar")  => "ID",
					esc_html__("Order By Author", "enar")  => "author",
						  
					esc_html__("Order By Title", "enar")  => "title",		 	
					esc_html__("Order Random", "enar")  => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort By", "enar"),
				"description" => esc_html__("Sort FAQs posts by ascending or descending order.", "enar"),
				"param_name" => "sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Categories By", "enar"),
				"description" => esc_html__("Sort FAQs categories by.", "enar"),
				"param_name" => "cat_orderby",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Count", "enar")  => "count",			 	
					esc_html__("Name", "enar")  => "name",
					esc_html__("ID", "enar")  => "ID",	  
					esc_html__("Slug", "enar")  => "slug",	  
					esc_html__("Term Group", "enar")  => "term_group",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Sort Categories By", "enar"),
				"description" => esc_html__("Sort FAQs categories by ascending or descending order.", "enar"),
				"param_name" => "cat_sortby",
				"value" => array(
				    esc_html__("Sort By...", "enar") => "",
					esc_html__("Descending Order", "enar")  => "DESC",
					esc_html__("Ascending Order", "enar")  => "ASC",
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Empty", "enar"),
				"description" => esc_html__("Show or hide empty FAQs categories that not contains any posts.", "enar"),
				"param_name" => "hide_empty",
				"value" => array(
				    esc_html__("Show Or Hide...", "enar") => "",
					esc_html__("Show", "enar")  => "1",	
					esc_html__("Hide", "enar")  => "0",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Filters Buttons", "enar"),
				"description" => esc_html__("Enable or disable the FAQs categories menu filters that contains the list of categories as a horizontal menu.", "enar"),
				"param_name" => "show_filters",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show All-FAQs Button", "enar"),
				"description" => esc_html__("This first button that will contains all FAQs posts.", "enar"),
				"param_name" => "show_all_button",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("All-FAQs Button Text", "enar"),
				"description" => esc_html__("The all-FAQs button text content.", "enar"),
				"param_name" => "all_btn_text",
			),
	)));	
	
	$hm_slider_args = array('post_type' => 'sliders','posts_per_page' => -1);
	$hm_slider_query     = get_posts( $hm_slider_args);
	$hm_slider_posts_store = array();
	
	if($hm_slider_query){
		foreach($hm_slider_query as $slider_post) {
			$hm_slider_posts_store[$slider_post->post_title] = $slider_post->ID;
		}
	}
	
	vc_map( array(
		"name" => esc_html__("Slider", "enar"),
		"base" => "hm_sliders",
		"icon" => $imgs.'40.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Choose Slider", "enar"),
				"description" => esc_html__("Choose slider by the ID.", "enar"),
				"param_name" => "id",
				"value" => $hm_slider_posts_store,
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Portfolio Project Media", "enar"),
		"base" => "hm_project_media",
		"icon" => $imgs.'41.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
		
	)));
		
	vc_map( array(
		"name" => esc_html__("Social Media Sharing", "enar"),
		"base" => "hm_social_share",
		"icon" => $imgs.'42.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
		    array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("The title text for this share buttons.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Facebook", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on facebook.", "enar"),
				"param_name" => "facebook",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Twitter", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on twitter.", "enar"),
				"param_name" => "twitter",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Google+", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on googleplus.", "enar"),
				"param_name" => "googleplus",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Pinterest", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on pinterest.", "enar"),
				"param_name" => "pinterest",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Linkedin", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on linkedin.", "enar"),
				"param_name" => "linkedin",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Email", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on email.", "enar"),
				"param_name" => "email",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Stumbleupon", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on stumbleupon.", "enar"),
				"param_name" => "stumbleupon",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Digg", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on digg.", "enar"),
				"param_name" => "digg",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Reddit", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on reddit.", "enar"),
				"param_name" => "reddit",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Delicious", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on delicious.", "enar"),
				"param_name" => "delicious",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Tumblr", "enar"),
				"description" => esc_html__("Enable or disable the sharing button on tumblr.", "enar"),
				"param_name" => "tumblr",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("Social Media Links", "enar"),
		"base" => "hm_social_links",
		"icon" => $imgs.'43.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
		    array(
				"type" => "dropdown",
				"heading" => esc_html__("Social Links Style", "enar"),
				"description" => esc_html__("Choose social links style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Square Style", "enar")  => "default_socials",	
					esc_html__("Circle Style", "enar")  => "circle_socials",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Social Links Color Mode", "enar"),
				"description" => esc_html__("Choose social links color mode.", "enar"),
				"param_name" => "color_mode",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("Simple Style", "enar")  => "simple_socials",	
					esc_html__("Colored Style", "enar")  => "colored_socials",	 		
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Social Links Title", "enar"),
				"description" => esc_html__("Social links title text content, ex: Follow Us", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook Link", "enar"),
				"param_name" => "facebook",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Twitter Link", "enar"),
				"param_name" => "twitter",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Google Plus Link", "enar"),
				"param_name" => "googleplus",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Linkedin Link", "enar"),
				"param_name" => "linkedin",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Vimeo Link", "enar"),
				"param_name" => "vimeo",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Skype Link", "enar"),
				"param_name" => "skype",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("rss Link", "enar"),
				"param_name" => "rss",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Flickr Link", "enar"),
				"param_name" => "flickr",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Picassa Link", "enar"),
				"param_name" => "picasa",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Tumblr Link", "enar"),
				"param_name" => "tumblr",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Dribbble Link", "enar"),
				"param_name" => "dribble",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Soundcloud Link", "enar"),
				"param_name" => "soundcloud",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Instagram Link", "enar"),
				"param_name" => "instagram",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Pinterest Link", "enar"),
				"param_name" => "pinterest",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("YouTube Link", "enar"),
				"param_name" => "youtube",
			),
	)));
	
	vc_map( array(
		"name" => esc_html__("List Icon Item", "enar"),
		"base" => "hm_lists_row",
		"icon" => $imgs.'45.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_lists'),
		"params" => array(
		 	array(
				"type" => "textfield",
				"heading" => esc_html__("List Item Title", "enar"),
				"description" => esc_html__("The title for this list item.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("List Item Content Text", "enar"),
				"description" => esc_html__("The content text of this list item.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("List Item URL", "enar"),
				"description" => esc_html__("Go to this link when clicking on this list item.", "enar"),
				"param_name" => "url",
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("List Icon", "enar"),
		"base" => "hm_lists",
		"icon" => $imgs.'44.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_lists_row'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__("List Style", "enar"),
				"description" => esc_html__("Choose the arrows style for this list items.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select List Style...", "enar") => "",	
				    esc_html__("Check Arrows", "enar") => "check_arrows",			 	
					esc_html__("Red Rounded Arrows", "enar") => "red_rounded_arrows",	
					esc_html__("Gray Rounded Arrows", "enar") => "gray_rounded_arrows",	
					esc_html__("Blue Square Arrows", "enar") => "blue_square_arrows",
					esc_html__("No Arrows", "enar") => "no_arrow",
				),
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("Features Icons Item", "enar"),
		"base" => "hm_feature",
		"icon" => $imgs.'47.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_features'),
		"params" => array(
		 	array(
				"type" => "textfield",
				"heading" => esc_html__("Feature Item Title", "enar"),
				"description" => esc_html__("The feature item title text.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Feature Item Text", "enar"),
				"description" => esc_html__("The feature item content text.", "enar"),
				"param_name" => "content",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Feature Item Icon", "enar"),
				"description" => esc_html__("Choose the icon for this section.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Features Icons Slider", "enar"),
		"base" => "hm_features",
		"icon" => $imgs.'46.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_feature'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Feature Image", "enar"),
				"description" => esc_html__("Display the image as a main image.", "enar"),
				"param_name" => "image",
			)
		),
		"js_view" => 'VcColumnView'
	));
	
	vc_map( array(
		"name" => esc_html__("News Bar", "enar"),
		"base" => "hm_news",
		"icon" => $imgs.'48.png',
		"category" => esc_html__( 'Enar', 'enar'),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("The news bar title text.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Title", "enar"),
				"description" => esc_html__("This option to show or hide the news bar title.", "enar"),
				"param_name" => "show_title",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Title Icon", "enar"),
				"description" => esc_html__("This option to show or hide the news bar title icon.", "enar"),
				"param_name" => "show_icon",
				"value" => array(
					esc_html__("Select Option...", "enar") => "",
					esc_html__("Enable", "enar")  => "show",	
					esc_html__("Disable", "enar")  => "hide",			 		
				),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Posts Number", "enar"),
				"description" => esc_html__("The posts number showing in this news bar, ex: 10", "enar"),
				"param_name" => "posts_num",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order Posts By", "enar"),
				"description" => esc_html__("Sort news bar posts by.", "enar"),
				"param_name" => "order_by",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",	
					esc_html__("Order By Data", "enar") => "date",		 	
					esc_html__("Order By ID", "enar") => "ID",
					esc_html__("Order By Author", "enar") => "author",	  
				    esc_html__("Order By Title", "enar") => "title",		 	
					esc_html__("Order Random", "enar") => "rand",
					esc_html__("Order by number of comments", "enar")  => "comment_count",	 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Order By", "enar"),
				"description" => esc_html__("Sort news bar posts by ascending or descending order.", "enar"),
				"param_name" => "order",
				"value" => array(
				    esc_html__("Order By...", "enar") => "",
					esc_html__("Descending Order", "enar") => "DESC",		 	
					esc_html__("Ascending Order", "enar") => "ASC",		 		
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Get Posts From", "enar"),
				"description" => esc_html__("Choose where you get the news bar posts.", "enar"),
				"param_name" => "posts_from",
				"value" => array(
				    esc_html__("Select Option...", "enar") => "",
					esc_html__("From All Posts", "enar") => "from_all",		 	
					esc_html__("Choose From The Categories", "enar") => "from_cats",
					esc_html__("Select From The Posts", "enar") => "from_posts",	 		
				),
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From Categories", "enar"),
				"description" => esc_html__("Choose the categories that you like to include all its posts in the news bar.", "enar"),
				"param_name" => "categories",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_cats')),
				"value" => $hm_cats_store,
			),
			array(
				"type" => "checkbox",
				"heading" => esc_html__("Select From Posts", "enar"),
				"description" => esc_html__("Choose the posts that you like to include in the news bar.", "enar"),
				"param_name" => "posts",
				"dependency" => Array('element' => "posts_from", 'value' => array('from_posts')),
				"value" => $hm_posts_store,
			),
	)));
	
	//=========> Contact Details
	
	vc_map( array(
		"name" => esc_html__("Contact Details Row", "enar"),
		"base" => "hm_details_row",
		"icon" => $imgs.'50.png',
		//"category" => esc_html__( 'Enar', 'enar'),	
		"content_element" => true,
    	"as_child" => array('only' => 'hm_details'),
		"params" => array(
		 	array(
				"type" => "textfield",
				"heading" => esc_html__("Title", "enar"),
				"description" => esc_html__("The title for this details row.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("Content Text", "enar"),
				"description" => esc_html__("The content text of this tab item.", "enar"),
				"param_name" => "content",
			),
	)));	
	
	vc_map( array(
		"name" => esc_html__("Contact Details", "enar"),
		"base" => "hm_details",
		"icon" => $imgs.'49.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"as_parent" => array('only' => 'hm_details_row'),
    	"content_element" => true,
    	"show_settings_on_create" => false,
    	"is_container" => true,
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Main Title", "enar"),
				"description" => esc_html__("The title for this list item.", "enar"),
				"param_name" => "title",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Icon BG-Color", "enar"),
				"description" => esc_html__("Choose icon background color.", "enar"),
				"param_name" => "color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Icon", "enar"),
				"description" => esc_html__("Choose the main icon.", "enar"),
				"param_name" => "icon",
				"value" => $all_icons,
			),
		),
		"js_view" => 'VcColumnView'
	));
	
	//=========> Blog Posts
	
	vc_map( array(
		"name" => esc_html__("Blog Posts", "enar"),
		"base" => "hm_blog",
		"icon" => $imgs.'51.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"params" => array(
		 	array(
				"type" => "dropdown",
				"heading" => esc_html__("Posts Style", "enar"),
				//"description" => esc_html__("Choose posts design style.", "enar"),
				"param_name" => "style",
				"value" => array(
				    esc_html__("Select Style...", "enar") => "",
					esc_html__("Timeline Style", "enar") => "timeline",		 	
					esc_html__("Masonry Grid Style", "enar") => "grid",
					esc_html__("Masonry Colred Style", "enar") => "masonry",	 		
				),
			),
	)));
	
	//=========> Coming Soon
    
	vc_map( array(
		"name" => esc_html__("Coming Soon", "enar"),
		"base" => "hm_soon",
		"icon" => $imgs.'52.png',
		"category" => esc_html__( 'Enar', 'enar'),	
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Event Date", "enar"),
				"description" => esc_html__("The event date, for example: 12/20/2020.", "enar"),
				"param_name" => "evant_day",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Day Path Color", "enar"),
				"description" => esc_html__("Choose the background color for day path.", "enar"),
				"param_name" => "day_color",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Day Path Title", "enar"),
				"description" => esc_html__("This text will display as a title for ( days ) circle path.", "enar"),
				"param_name" => "day_title",
			),
			//===>
			array(
				"type" => "textfield",
				"heading" => esc_html__("Event Hour", "enar"),
				"description" => esc_html__("The event hour, from ( 1 to 24 ) 15 means 3PM hour.", "enar"),
				"param_name" => "evant_hour",
			),
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Hour Path Color", "enar"),
				"description" => esc_html__("Choose the background color for hour circle path.", "enar"),
				"param_name" => "hour_color",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Hour Path Title", "enar"),
				"description" => esc_html__("This text will display as a title for ( hours ) circle path.", "enar"),
				"param_name" => "hour_title",
			),
			//===>
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Minutes Path Color", "enar"),
				"description" => esc_html__("Choose the background color for minutes circle path.", "enar"),
				"param_name" => "minutes_color",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Minutes Path Title", "enar"),
				"description" => esc_html__("This text will display as a title for ( minutes ) circle path.", "enar"),
				"param_name" => "minutes_title",
			),
			//===>
			array(
				"type" => "colorpicker",
				"heading" => esc_html__("Seconds Path Color", "enar"),
				"description" => esc_html__("Choose the background color for seconds circle path.", "enar"),
				"param_name" => "seconds_color",
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Seconds Path Title", "enar"),
				"description" => esc_html__("This text will display as a title for ( seconds ) circle path.", "enar"),
				"param_name" => "seconds_title",
			),
	)));
	
	//=========> Coming Soon
    
	if ( class_exists( 'woocommerce' ) ) {
		$hm_woo_args   = array('post_type' => 'product','post_status' => 'publish','posts_per_page' => -1);
		$hm_woo_query  = get_posts( $hm_woo_args);
		$hm_woo_posts_store = array();
		
		if($hm_woo_query){
			foreach($hm_woo_query as $woo_post) {
				$hm_woo_posts_store[$woo_post->post_title] = $woo_post->ID;
			}
		}
		
		vc_map( array(
			"name" => esc_html__("WooCommerce Related Products", "enar"),
			"base" => "hm_related_product",
			"icon" => $imgs.'53.png',
			"category" => esc_html__( 'Enar', 'enar'),	
			"params" => array(
			    array(
					"type" => "checkbox",
					"heading" => esc_html__("Select Products", "enar"),
					"description" => esc_html__("Choose the products to include in the carousel.", "enar"),
					"param_name" => "posts",
					"value" => $hm_woo_posts_store,
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Posts Number", "enar"),
					"description" => esc_html__("Number of posts showing in this carousel, ex: 10", "enar"),
					"param_name" => "posts_num",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show Products Categories", "enar"),
					"description" => esc_html__("This option to show or hide the products categories.", "enar"),
					"param_name" => "show_cats",
					"value" => array(
						esc_html__("Select Option...", "enar") => "",
						esc_html__("Show", "enar")  => "show",	
						esc_html__("Hide", "enar")  => "hide",	 		
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show Products Price", "enar"),
					"description" => esc_html__("This option to show or hide the products price.", "enar"),
					"param_name" => "show_price",
					"value" => array(
						esc_html__("Select Option...", "enar") => "",
						esc_html__("Show", "enar")  => "show",	
						esc_html__("Hide", "enar")  => "hide",	 		
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show Products Review", "enar"),
					"description" => esc_html__("This option to show or hide the products reviews rating.", "enar"),
					"param_name" => "show_review",
					"value" => array(
						esc_html__("Select Option...", "enar") => "",
						esc_html__("Show", "enar")  => "show",	
						esc_html__("Hide", "enar")  => "hide",	 		
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show Products Cart Button", "enar"),
					"description" => esc_html__("This option to show or hide the products cart button.", "enar"),
					"param_name" => "show_cart_btn",
					"value" => array(
						esc_html__("Select Option...", "enar") => "",
						esc_html__("Show", "enar")  => "show",	
						esc_html__("Hide", "enar")  => "hide",	 		
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Order Posts By", "enar"),
					"description" => esc_html__("Sort products posts by.", "enar"),
					"param_name" => "order_by",
					"value" => array(
						esc_html__("Order By...", "enar") => "",	
						esc_html__("Order By Data", "enar") => "date",		 	
						esc_html__("Order By ID", "enar") => "ID",
						esc_html__("Order By Author", "enar") => "author",	  
						esc_html__("Order By Title", "enar") => "title",		 	
						esc_html__("Order Random", "enar") => "rand",
						esc_html__("Order by number of comments", "enar")  => "comment_count",	 		
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Order By", "enar"),
					"description" => esc_html__("Sort products posts by ascending or descending order.", "enar"),
					"param_name" => "order",
					"value" => array(
						esc_html__("Order By...", "enar") => "",
						esc_html__("Descending Order", "enar") => "DESC",		 	
						esc_html__("Ascending Order", "enar") => "ASC",		 		
					),
				),
		)));
	}
	
	//--------------------------------------------------------------------->
	
	if( !isset($_GET['vc_action']) ){
		
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
			class WPBakeryShortCode_Hm_Row extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Column extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Section extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Video extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Accordion_Tab extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Accordion extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Tabs extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Tab extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Banner_Slider extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Skills extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Team extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Monials extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Clients extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Counter extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Icons extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Pricing_Table extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Pricing_Plan extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Lists extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Features extends WPBakeryShortCodesContainer {}
			class WPBakeryShortCode_Hm_Details extends WPBakeryShortCodesContainer {}
		}
	
		if ( class_exists( 'WPBakeryShortCode' ) ) {
			class WPBakeryShortCode_Hm_Sliders extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Title extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Desc extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Lightbox extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Banner extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Spacer extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Skill extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Monial extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Client extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Count extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Icon extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Button extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Google_Map extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Tooltip extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Text extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Quote extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Pricing_Plan_Row extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Blog_Carousel extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Portfolio_Carousel extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Portfolio_Filter extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Blog_Filter extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Social_Share extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Social_Links extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Lists_Row extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Feature extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_News extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Details_Row extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Blog extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Faqs extends WPBakeryShortCode {}
			class WPBakeryShortCode_Hm_Soon extends WPBakeryShortCode {}
			if ( class_exists( 'woocommerce' ) ) {
				class WPBakeryShortCode_Hm_Related_Product extends WPBakeryShortCode {}
			}
		}
	}
}