<?php
    global $post;
	$user_ID    = get_the_author_meta( 'ID' );
	$user_meta  = get_user_meta($user_ID);
?>

<?php 
if ( isset($user_meta['twitter'][0]) ) {
	if ( $user_meta['twitter'][0] !== '') { ?>
        <a class="twitter" target="_blank" href="<?php echo esc_url($user_meta['twitter'][0]); ?>">
            <i class="ico-twitter4"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['facebook'][0]) ) {
	if ($user_meta['facebook'][0] !== '') { ?>
        <a class="facebook" target="_blank" href="<?php echo esc_url($user_meta['facebook'][0]); ?>">
            <i class="ico-facebook4"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['google_plus'][0]) ) { 
	if ($user_meta['google_plus'][0] !== '') { ?>    
        <a class="googleplus" target="_blank" href="<?php echo esc_url($user_meta['google_plus'][0]); ?>">
            <i class="ico-google-plus"></i>
        </a><?php 
	} 
} ?> 
<?php 
if ( isset($user_meta['linkedin'][0]) ) { 
	if ($user_meta['linkedin'][0] !== '') { ?> 
        <a class="linkedin" target="_blank" href="<?php echo esc_url($user_meta['linkedin'][0]); ?>">
            <i class="ico-linkedin3"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['dribbble'][0]) ) { 
	if ($user_meta['dribbble'][0] !== '') { ?>
        <a class="dribbble" target="_blank" href="<?php echo esc_url($user_meta['dribbble'][0]); ?>">
            <i class="ico-dribbble"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['blogger'][0]) ) { 
	if ($user_meta['blogger'][0] !== '') { ?>
        <a class="blogger" target="_blank" href="<?php echo esc_url($user_meta['blogger'][0]); ?>">
            <i class="ico-blogger"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['tumblr'][0]) ) { 
	if ($user_meta['tumblr'][0] !== '') { ?>
        <a class="tumblr" target="_blank" href="<?php echo esc_url($user_meta['tumblr'][0]); ?>">
            <i class="ico-tumblr"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['reddit'][0]) ) { 
	if ($user_meta['reddit'][0] !== '') { ?>
        <a class="reddit" target="_blank" href="<?php echo esc_url($user_meta['reddit'][0]); ?>">
            <i class="ico-reddit"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['yahoo'][0]) ) { 
	if ($user_meta['yahoo'][0] !== '') { ?>
        <a class="yahoo" target="_blank" href="<?php echo esc_url($user_meta['yahoo'][0]); ?>">
            <i class="ico-yahoo"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['deviantart'][0]) ) { 
	if ($user_meta['deviantart'][0] !== '') { ?>
        <a class="deviantart" target="_blank" href="<?php echo esc_url($user_meta['deviantart'][0]); ?>">
            <i class="ico-deviantart"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['vimeo'][0]) ) { 
	if ($user_meta['vimeo'][0] !== '') { ?>
        <a class="vimeo" target="_blank" href="<?php echo esc_url($user_meta['vimeo'][0]); ?>">
            <i class="ico-vimeo"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['youtube'][0]) ) { 
	if ($user_meta['youtube'][0] !== '') { ?>
        <a class="youtube" target="_blank" href="<?php echo esc_url($user_meta['youtube'][0]); ?>">
            <i class="ico-youtube3"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['pinterest'][0]) ) { 
	if ($user_meta['pinterest'][0] !== '') { ?>
        <a class="pinterest" target="_blank" href="<?php echo esc_url($user_meta['pinterest'][0]); ?>">
            <i class="ico-pinterest-p"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['digg'][0]) ) { 
	if ($user_meta['digg'][0] !== '') { ?>
        <a class="digg" target="_blank" href="<?php echo esc_url($user_meta['digg'][0]); ?>">
            <i class="ico-digg"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['flickr'][0]) ) { 
	if ($user_meta['flickr'][0] !== '') { ?>
        <a class="flickr" target="_blank" href="<?php echo esc_url($user_meta['flickr'][0]); ?>">
            <i class="ico-flickr2"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['forrst'][0]) ) { 
	if ($user_meta['forrst'][0] !== '') { ?>
        <a class="forrst" target="_blank" href="<?php echo esc_url($user_meta['forrst'][0]); ?>">
            <i class="ico-forrst"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['skype'][0]) ) { 
	if ($user_meta['skype'][0] !== '') { ?>
        <a class="skype" target="_blank" href="skype:<?php echo esc_attr($user_meta['skype'][0]); ?>?call">
            <i class="ico-skype2"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['instagram'][0]) ) { 
	if ($user_meta['instagram'][0] !== '') { ?>
        <a class="instagram" target="_blank" href="<?php echo esc_url($user_meta['instagram'][0]); ?>">
            <i class="ico-instagram3"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['paypal'][0]) ) { 
	if ($user_meta['paypal'][0] !== '') { ?>
        <a class="paypal" target="_blank" href="<?php echo esc_url($user_meta['paypal'][0]); ?>">
            <i class="ico-paypal"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['dropbox'][0]) ) { 
	if ($user_meta['dropbox'][0] !== '') { ?>
        <a class="dropbox" target="_blank" href="<?php echo esc_url($user_meta['dropbox'][0]); ?>">
            <i class="ico-dropbox"></i>
        </a><?php 
	} 
} ?>
<?php 
if ( isset($user_meta['soundcloud'][0]) ) { 
	if ($user_meta['soundcloud'][0] !== '') { ?>
        <a class="soundcloud" target="_blank" href="<?php echo esc_url($user_meta['soundcloud'][0]); ?>">
            <i class="ico-soundcloud"></i>
        </a><?php 
	} 
} ?>