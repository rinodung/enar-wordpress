<?php if (idealtheme_option('share_on_facebook') == true ) { ?>
	<a class="facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php print(esc_attr(urlencode(get_permalink()))); ?>&amp;t=<?php print(esc_attr(urlencode(the_title()))); ?>" target="_blank"><i class="ico-facebook4"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_twitter') == true ) { ?>
    <a class="twitter" href="http://twitter.com/share?text=<?php print( esc_attr(urlencode(the_title())) ); ?>&amp;url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;via=<?php echo esc_attr(idealtheme_option('twitter_username')); ?>" target="_blank"><i class="ico-twitter4"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_google') == true ) { ?>
	<a class="googleplus" href="https://plus.google.com/share?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;t=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-google-plus"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_pinterest') == true ) { ?>
	<a class="pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_attr( esc_url( idealtheme_fun_get_post_img('large') ) ); ?>&amp;url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;is_video=false&amp;description=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-pinterest-p"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_linkedin') == true ) { ?>
	<a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>&amp;source=<?php echo esc_attr( esc_url( get_permalink() )); ?>" target="_blank"><i class="ico-linkedin3"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_mail') == true ) { ?>
	<a class="email" href="mailto:mail@mail.com?subject=<?php print( esc_attr(urlencode(the_title())) ); ?>&amp;body=<?php print( esc_attr(urlencode(get_permalink())) ); ?>"><i class="ico-envelope-o"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_stumbleupon') == true ) { ?>
	<a class="stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-stumbleupon3"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_digg') == true ) { ?>
	<a class="digg" href="http://www.digg.com/submit?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-digg"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_reddit') == true ) { ?>
	<a class="reddit" href="http://www.reddit.com/submit?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-reddit"></i></a>
<?php } ?>

<?php /*?><a class="evernote" href="http://www.evernote.com/clip.action?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-evernote"></i></a><?php */?>

<?php if (idealtheme_option('share_on_delicious') == true ) { ?>
	<a class="delicious" href="http://del.icio.us/post?url=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;title=<?php print( esc_attr(urlencode(the_title())) ); ?>&amp;notes=<?php echo esc_attr(urlencode(get_the_excerpt())); ?>" target="_blank"><i class="ico-delicious"></i></a>
<?php } ?>

<?php if (idealtheme_option('share_on_tumblr') == true ) { ?>
	<a class="tumblr" href="http://www.tumblr.com/share?v=3&amp;u=<?php print( esc_attr(urlencode(get_permalink())) ); ?>&amp;t=<?php print( esc_attr(urlencode(the_title())) ); ?>" target="_blank"><i class="ico-tumblr"></i></a>
<?php } ?>
