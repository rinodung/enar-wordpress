<div class="search_block">
<form method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<!--<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>-->
	<input type="search" class="search-field serch_input" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
    <button class="search_btn animate" id="searchsubmit" type="submit">
            <i class="ico-search8"></i>
    </button>
	<input type="hidden" name="post_type" value="product" />
</form>
</div>