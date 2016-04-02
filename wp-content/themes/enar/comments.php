<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
        <div class="small_title">
            <span class="small_title_con">
                <span class="s_icon"><i class="ico-comment-o"></i></span>
                <span class="s_text"><?php
				printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'enar' ),
					$wrap_num = '<span class="comment_calc_con"><span class="comment_calc">'.number_format_i18n( get_comments_number() ).'</span></span>');
			?></span>
            </span>
        </div>

		<ol class="comments_list clearfix">
			<?php wp_list_comments( array( 'callback' => 'idealtheme_comment', 'style' => 'ol' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'enar' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'enar' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'enar' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.' , 'enar' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );	
	$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit-comment',
	'title_reply' => '<span class="small_title">
						<span class="small_title_con">
							<span class="s_icon"><i class="ico-pencil6"></i></span>
							<span class="s_text">'.esc_html__( 'Leave a Reply' , 'enar' ).'</span>
						</span>
					 </span>',
	'title_reply_to' => '<span class="small_title">
						<span class="small_title_con">
							<span class="s_icon"><i class="ico-pencil6"></i></span>
							<span class="s_text">'.esc_html__( 'Leave a Reply to' , 'enar' ).' %s</span>
						</span>
					 </div>',
	'cancel_reply_link' => esc_html__( 'Cancel Reply' , 'enar' ),
	'label_submit' => esc_html__( 'Post Comment' , 'enar' ),
	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" placeholder="'.esc_html__( 'Comment...', 'enar' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'must_log_in' => '<p class="must-log-in">' .  sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'enar' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as ', 'enar' ).'<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" name="author" type="text" placeholder="'.esc_html__( 'Name (required)', 'enar' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
		'email' => '<input id="email" name="email" type="text" placeholder="'.esc_html__( 'Email (required)', 'enar' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
		'url' => '<input id="url" name="url" type="text" placeholder="'.esc_html__( 'Website', 'enar' ).'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' ) ) );
	?>
	
	<?php comment_form($args); ?>

</div><!-- #comments .comments-area -->