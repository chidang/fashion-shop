<?php 
$unique_id = esc_attr( uniqid( 'search-form-' ) );
$placeholder_text = esc_html__('Search', 'karo');
 ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo esc_attr($unique_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'karo' ); ?></span>
	</label>
    <input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr($placeholder_text); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo ftc_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_e( 'Search', 'karo' ); ?></span></button>
</form>
