<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" style="display: none">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
        <span class="orderby-title"><?php echo esc_html_e('Sort by:', 'karo'); ?></span>
	<ul class="orderby">
		<li><span class="orderby-current"><?php echo esc_html($catalog_orderby_options[$orderby]); ?></span>
			<ul class="dropdown">
				<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<li><a href="#" data-orderby="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr(($orderby == $id)?'current':'') ?>"><?php echo esc_html( $name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
	</ul>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
