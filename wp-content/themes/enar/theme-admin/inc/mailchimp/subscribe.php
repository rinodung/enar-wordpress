<?php	

require_once( ENAR_INC . '/mailchimp/Mailchimp.class.php');

function hm_newsletter_sebscribe_js() {
	wp_enqueue_script( 'mailchimp-script', get_template_directory_uri() . '/theme-admin/ajax/mailchimp.js', array(), '1.0', true );
}
add_action('wp_footer', 'hm_newsletter_sebscribe_js');

add_action( 'wp_ajax_hm_newsletter_sebscribe', 'hm_newsletter_sebscribe' );
add_action( 'wp_ajax_nopriv_hm_newsletter_sebscribe', 'hm_newsletter_sebscribe' );

function hm_newsletter_sebscribe(){

	if(isset($_POST['subs_mail']) && !empty($_POST['subs_mail'])) {
		$subscribe_mail = $_POST['subs_mail'];
	}else{
		$subscribe_mail = "";
	}
	
	//$api = new MCAPI('f87ebdc730daf71372c9d9c78d527ed1-us10');	
	$hm_chimp_api = idealtheme_option('mailchimp_api');
	
	$api = new MCAPI($hm_chimp_api);	
	$merge_vars = array();
	
	// Submit subscriber data to MailChimp
	// For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
	//$retval = $api->listSubscribe( 'ec11379951', $subscribe_mail, $merge_vars, 'html', true, true );
	$hm_chimp_list = idealtheme_option('mailchimp_list');
	$retval = $api->listSubscribe( $hm_chimp_list, $subscribe_mail, $merge_vars, 'html', true, true );
	
	if ($api->errorCode){
		echo '<h4>'.esc_html__( 'An unexpected error occured. Please Try Again later.','enar').'</h4>';
	} else {
		echo '<h4>'.esc_html__( 'Thank you, you have been added to our mailing list.','enar').'</h4>';
	}

    wp_die();
}