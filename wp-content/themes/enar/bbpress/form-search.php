<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="search_block">
<form role="search" method="get" id="bbp-search-form" action="<?php bbp_search_url(); ?>">
	<div>
		<!--<label class="screen-reader-text hidden" for="bbp_search"><?php esc_html_e( 'Search for:', 'bbpress' ); ?></label>-->
		<input type="hidden" name="action" value="bbp-search-request" />
		<input class="serch_input" tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" name="bbp_search" id="bbp_search" placeholder="<?php esc_html_e( 'Search...', 'bbpress' ); ?>" />
        <button tabindex="<?php bbp_tab_index(); ?>" class="search_btn animate" id="bbp_search_submit" type="submit">
            <i class="ico-search8"></i>
    	</button>
    	<div class="clear"></div>
	</div>
</form>
</div>
