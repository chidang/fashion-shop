<?php 
/**
 * Plugin Name: FTC Importer
 * Plugin URI: http://themeftc.com
 * Description: Import demo content ThemeFTC's theme
 * Version: 1.1.3
 * Author: ThemeFTC
 * Author URI: http://themeftc.com
 */

if( !class_exists('FTC_Importer') ){
	class FTC_Importer{

		function __construct(){
			/* Register js, css */
			add_action('admin_enqueue_scripts', array($this, 'ftc_register_scripts'));
			
			/* Register Menu Page */
			add_action('admin_menu', array($this, 'ftc_menu_page'));
			
			/* Register ajax action */			
			add_action( 'wp_ajax_ftc_import_revslider', array($this, 'import_revslider') );
			add_action( 'wp_ajax_ftc_import_theme_options', array($this, 'import_theme_options') );
			add_action( 'wp_ajax_ftc_mmm_options_backup', array($this, 'mmm_options_backup') );
			add_action( 'wp_ajax_ftc_import_widget', array($this, 'import_widget') );
			add_action( 'wp_ajax_ftc_import_config', array($this, 'import_config') );
			add_action( 'wp_ajax_ftc_import_content', array($this, 'import_content') );
			add_action( 'wp_ajax_ftc_import_menu', array($this, 'import_menu') );
			
		}
		
		function ftc_register_scripts(){
			wp_enqueue_style( 'ftc-import-style', plugins_url( '/assets/style.css', __FILE__ ) );
			wp_register_script( 'ftc-import-script', plugins_url( '/assets/script.js', __FILE__ ), array( 'jquery' ), false, true );
		}
		
		function ftc_menu_page(){
			add_menu_page( 'Import Demo Data', 'FTC Importer', 'switch_themes', 'ftc_importer', array($this, 'ftc_import_demo_content'), '', 40);
		}
		
		function ftc_import_demo_content(){
			wp_enqueue_script( 'ftc-import-script' );
			?>

			<div class="ftc-importer-wrapper">
				<div class="note" style="width:100%">
					<div class="note_import">
						<div class="logo"><img src="<?php echo plugins_url( 'assets/logo.png', __FILE__ ); ?>"></div>
						<div class="heading">
							<h2>ThemeFTC - Import Demo Content</h2>
							<p style="font-size: 15px;padding-left: 0; font-style: italic;">Thank you for purchasing our premium eCommerce theme.</p>
						</div>

						<h4>Please read before importing:</h4>
						<p>This importer will help you build your site look like our demo.</p>
						<p>Please installed and activated <strong> ThemeFTC, WooCommerce, Visual Composer, Mega Main Menu and Revolution Slider plugins.</strong></p>
						<p>If you need support please contact our support team: <a href="https://themeftc.ticksy.com">https://themeftc.ticksy.com</a></p>
						
					</div>
					<?php $theme_obj = wp_get_theme(); ?>
					<div class="screen" style="background-image: url(<?php echo esc_url($theme_obj->get_screenshot()) ?>); background-size:cover; height:350px;">
						
						
					</div>

				</div>
				<h3>Full Import:</h3>
				<div class="options">
					<div class="button-wrapper">
						<button id="ftc-import-button-full">Full Import</button>
						<i class="fa fa-spinner fa-spin importing-button hidden"></i>
					</div>	
					<h3>Select the options for custom import:</h3>				
					<div class="option">
						<label for="ftc_import_theme_options">
							<input type="checkbox" name="ftc_import_theme_options" id="ftc_import_theme_options" value="1" />
							Theme Options
						</label>
					</div>
					<div class="option">
						<label for="ftc_mmm_options_backup">
							<input type="checkbox" name="ftc_mmm_options_backup" id="ftc_mmm_options_backup" value="1" />
							Mega Main Menu
						</label>
					</div>
					<div class="option">
						<label for="ftc_import_widget">
							<input type="checkbox" name="ftc_import_widget" id="ftc_import_widget" value="1" />
							Widgets
						</label>
					</div>
					<div class="option">
						<label for="ftc_import_revslider">
							<input type="checkbox" name="ftc_import_revslider" id="ftc_import_revslider" value="1" />
							Revolution Slider
						</label>
					</div>
					<div class="option">
						<label for="ftc_import_demo_content">
							<input type="checkbox" name="ftc_import_demo_content" id="ftc_import_demo_content" value="1" />
							Demo Content
						</label>
					</div>
				</div>
				<div class="button-wrapper">
					<button id="ftc-import-button" disabled>Import</button>
					<i class="fa fa-spinner fa-spin importing-button hidden"></i>
				</div>
				<div class="import-result hidden">
					<div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar"
						aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
						0% Complete
					</div>
				</div>
				<div class="messages">
					
				</div>
			</div>
			<div class="option_page">
				<h3><a href="" onclick="my_function()">Reload page</a> to select Homepage in here, If you omit this option, the default home page is "Home".</h3>
				<script>
					function my_function() {
						location.reload();
					}
				</script>
				<form action="#" method="post">
					<?php wp_dropdown_pages(''); ?>
					<input type="submit" name="submit" value="Set HomePage" class="set_page_home" />
				</form>
				<?php $mes =''; ?>
				<?php if(isset($_POST['submit'])){
					$mes = 'Set up the homepage successfully, Click <a href="../" target="blank">Here</a> to go to homepage !';
				}?>
				<?php echo $mes; ?>
			</div>
		</div>
		<?php
	}

	/* Include Importer Classes */
	function include_importer_classes(){
		if ( ! class_exists( 'WP_Importer' ) ) {
			include ABSPATH . 'wp-admin/includes/class-wp-importer.php';
		}

		if ( ! class_exists('WP_Import') ) {
			include_once dirname(__FILE__) . '/includes/wordpress-importer.php';
		}
	}

	/* Dont Resize image while importing */
	function no_resize_image( $sizes ){
		return array();
	}

	/* Import XML */
	function import_content(){
			set_time_limit(0);
			if ( !defined('WP_LOAD_IMPORTERS') ){ 
				define('WP_LOAD_IMPORTERS', true); 
			}
			
			add_filter('intermediate_image_sizes_advanced', array($this, 'no_resize_image'));
			
			$file_name = isset($_POST['file_name'])?$_POST['file_name']:'';
			$file_path = dirname(__FILE__) . '/data/content/'.$file_name.'.xml';
			
			if( file_exists($file_path) ){
				$this->include_importer_classes();
				
				$importer = new WP_Import();
				$importer->fetch_attachments = true;
				ob_start();
				$value_import = $importer->import($file_path);
				ob_end_clean();
				echo 'Successful Import Demo Content';
			}
		$menu_name1   = 'Main menu';
			wp_delete_nav_menu($menu_name1);
				$menu_name2   = 'Second Menu';//name,id,slug
				wp_delete_nav_menu($menu_name2);	
			
		
			
			wp_die();
		}
		function import_menu(){
			set_time_limit(0);
			if ( !defined('WP_LOAD_IMPORTERS') ){ 
				define('WP_LOAD_IMPORTERS', true); 
			}
$file_menu = dirname(__FILE__) . '/data/content/menu.xml';
		if( file_exists($file_menu) ){
			$this->include_importer_classes();
			$importer = new WP_Import();
			$importer->fetch_attachments = true;
			ob_start();
			$importer->import($file_menu);
			ob_end_clean();
		}
			wp_die();
		}
		function import_config(){
			$this->woocommerce_settings();
			$this->menu_locations();
			$this->update_options();
			echo 'Config successfully';
			wp_die();
		}

		

		/* Import Theme Options */
		function import_theme_options(){
			$theme_options_path = dirname(__FILE__) . '/data/theme_options.json';
			if( !file_exists($theme_options_path) && !class_exists( 'ReduxFramework' ) ){
				wp_die();
			}
			$theme_options_url = untrailingslashit( plugin_dir_url(__FILE__) ) . '/data/theme_options.json';
			$theme_options_content = wp_remote_get( $theme_options_url );
			$redux_options_data = json_decode( $theme_options_content['body'], true );
			$redux_framework = \ReduxFrameworkInstances::get_instance( 'smof_data' );
			if ( isset( $redux_framework->args['opt_name'] ) ){ 
				$redux_framework->set_options( $redux_options_data );
			}

			echo 'Successful Import Theme Options';
			wp_die();
		}

		/* Import Mega Main Menu */
		function mmm_options_backup() {
			global $mega_main_menu;
			$mega_main_menu_options_path = dirname(__FILE__) . '/data/mega_main_menu.txt';
			if( !file_exists($mega_main_menu_options_path) ){
				wp_die();
			}
			$mega_main_menu_options_url = untrailingslashit( plugin_dir_url(__FILE__) ) . '/data/mega_main_menu.txt';
			$backup_file_content = wp_remote_get( $mega_main_menu_options_url );
			$options_backup = json_decode( $backup_file_content['body'], true );
			if ( isset( $options_backup['last_modified'] ) ) {
				$options_backup['last_modified'] = time() + 30;
				update_option($mega_main_menu->constant[ 'MM_OPTIONS_NAME' ], $options_backup );
			}

			echo 'Successful Import Mega Main Menu';
			wp_die();
		}

		/* Delete the default widgets */
		function delete_widgets_from_home_sidebar(){
			$sidebar_id = 'home-sidebar';
			$sidebars_widgets = get_option('sidebars_widgets', array());
			if( isset($sidebars_widgets[$sidebar_id]) && is_array($sidebars_widgets[$sidebar_id]) ){
				foreach( $sidebars_widgets[$sidebar_id] as $widget_id ){
					$widget_base 	= substr($widget_id, 0, (int)strrpos($widget_id, '-'));
					$number 		= substr($widget_id, (int)strrpos($widget_id, '-') + 1);
					if( is_numeric($number) ){
						$widget = get_option('widget_' . $widget_base, array());
						if( !empty($widget) ){
							unset( $widget[$number] );
							update_option('widget_' . $widget_base, $widget);
						}
					}
				}
				$sidebars_widgets[$sidebar_id] = array();
				update_option('sidebars_widgets', $sidebars_widgets);
			}
		}

		function import_custom_sidebars(){
			$file_path = dirname(__FILE__) . '/data/custom_sidebars.txt';
			if( file_exists($file_path) ){
				$file_url = untrailingslashit( plugin_dir_url(__FILE__) ) . '/data/custom_sidebars.txt';
				$custom_sidebars = wp_remote_get( $file_url );
				$custom_sidebars = maybe_unserialize( trim( $custom_sidebars['body'] ) );
				update_option('ftc_custom_sidebars', $custom_sidebars);
			}
		}

		/* Import Widgets */
		function import_widget(){
			$this->delete_widgets_from_home_sidebar();
			$this->import_custom_sidebars();

			$file_path = dirname(__FILE__) . '/data/widget_data.wie';
			if( !file_exists($file_path) ){
				wp_die();
			}

			$data = implode( '', file( $file_path ) );
			$data = json_decode( $data );

			global $wp_registered_sidebars;

			/* Add custom sidebars to registered sidebars variable */
			$custom_sidebars = get_option('ftc_custom_sidebars');
			if( is_array($custom_sidebars) && !empty($custom_sidebars) ){
				foreach( $custom_sidebars as $name ){
					$custom_sidebar = array(
						'name' 			=> ''.$name.''
						,'id' 			=> sanitize_title($name)
						,'description' 	=> ''
						,'class'		=> 'ftc-custom-sidebar'
					);
					if( !isset($wp_registered_sidebars[$custom_sidebar['id']]) ){
						$wp_registered_sidebars[$custom_sidebar['id']] = $custom_sidebar;
					}
				}
			}

			// Have valid data?
			// If no data or could not decode.
			if ( empty( $data ) || ! is_object( $data ) ) {
				wp_die( 'Import data could not be read. Please try a different file.' );
			}

			// Get all available widgets site supports.
			$available_widgets = $this->get_available_widgets();

			// Get all existing widget instances.
			$widget_instances = array();
			foreach ( $available_widgets as $widget_data ) {
				$widget_instances[ $widget_data['id_base'] ] = get_option( 'widget_' . $widget_data['id_base'] );
			}

			// Begin results.
			$results = array();

			// Loop import data's sidebars.
			foreach ( $data as $sidebar_id => $widgets ) {

				// Skip inactive widgets (should not be in export file).
				if ( 'wp_inactive_widgets' === $sidebar_id ) {
					continue;
				}

				// Check if sidebar is available on this site.
				// Otherwise add widgets to inactive, and say so.
				if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
					$sidebar_available    = true;
					$use_sidebar_id       = $sidebar_id;
					$sidebar_message_type = 'success';
					$sidebar_message      = '';
				} else {
					$sidebar_available    = false;
					$use_sidebar_id       = 'wp_inactive_widgets'; // Add to inactive if sidebar does not exist in theme.
					$sidebar_message_type = 'error';
					$sidebar_message      = 'Widget area does not exist in theme (using Inactive)';
				}

				// Result for sidebar
				// Sidebar name if theme supports it; otherwise ID.
				$results[ $sidebar_id ]['name']         = ! empty( $wp_registered_sidebars[ $sidebar_id ]['name'] ) ? $wp_registered_sidebars[ $sidebar_id ]['name'] : $sidebar_id;
				$results[ $sidebar_id ]['message_type'] = $sidebar_message_type;
				$results[ $sidebar_id ]['message']      = $sidebar_message;
				$results[ $sidebar_id ]['widgets']      = array();

				// Loop widgets.
				foreach ( $widgets as $widget_instance_id => $widget ) {

					$fail = false;

					// Get id_base (remove -# from end) and instance ID number.
					$id_base            = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
					$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

					// Does site support this widget?
					if ( ! $fail && ! isset( $available_widgets[ $id_base ] ) ) {
						$fail                = true;
						$widget_message_type = 'error';
						$widget_message = 'Site does not support widget'; // Explain why widget not imported.
					}

					// Convert multidimensional objects to multidimensional arrays
					// Some plugins like Jetpack Widget Visibility store settings as multidimensional arrays
					// Without this, they are imported as objects and cause fatal error on Widgets page
					// If this creates problems for plugins that do actually intend settings in objects then may need to consider other approach
					// It is probably much more likely that arrays are used than objects, however.
					$widget = json_decode( wp_json_encode( $widget ), true );

					// Does widget with identical settings already exist in same sidebar?
					if ( ! $fail && isset( $widget_instances[ $id_base ] ) ) {

						// Get existing widgets in this sidebar.
						$sidebars_widgets = get_option( 'sidebars_widgets' );
						$sidebar_widgets = isset( $sidebars_widgets[ $use_sidebar_id ] ) ? $sidebars_widgets[ $use_sidebar_id ] : array(); // Check Inactive if that's where will go.

						// Loop widgets with ID base.
						$single_widget_instances = ! empty( $widget_instances[ $id_base ] ) ? $widget_instances[ $id_base ] : array();
						foreach ( $single_widget_instances as $check_id => $check_widget ) {

							// Is widget in same sidebar and has identical settings?
							if ( in_array( "$id_base-$check_id", $sidebar_widgets, true ) && (array) $widget === $check_widget ) {

								$fail = true;
								$widget_message_type = 'warning';

								// Explain why widget not imported.
								$widget_message = 'Widget already exists';

								break;

							}

						}

					}

					// No failure.
					if ( ! $fail ) {

						// Add widget instance
						$single_widget_instances = get_option( 'widget_' . $id_base ); // All instances for that widget ID base, get fresh every time.
						$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array(
							'_multiwidget' => 1, // Start fresh if have to.
						);
						$single_widget_instances[] = $widget; // Add it.

						// Get the key it was given.
						end( $single_widget_instances );
						$new_instance_id_number = key( $single_widget_instances );

						// If key is 0, make it 1
						// When 0, an issue can occur where adding a widget causes data from other widget to load,
						// and the widget doesn't stick (reload wipes it).
						if ( '0' === strval( $new_instance_id_number ) ) {
							$new_instance_id_number = 1;
							$single_widget_instances[ $new_instance_id_number ] = $single_widget_instances[0];
							unset( $single_widget_instances[0] );
						}

						// Move _multiwidget to end of array for uniformity.
						if ( isset( $single_widget_instances['_multiwidget'] ) ) {
							$multiwidget = $single_widget_instances['_multiwidget'];
							unset( $single_widget_instances['_multiwidget'] );
							$single_widget_instances['_multiwidget'] = $multiwidget;
						}

						// Update option with new widget.
						update_option( 'widget_' . $id_base, $single_widget_instances );

						// Assign widget instance to sidebar.
						// Which sidebars have which widgets, get fresh every time.
						$sidebars_widgets = get_option( 'sidebars_widgets' );

						// Avoid rarely fatal error when the option is an empty string
						if ( ! $sidebars_widgets ) {
							$sidebars_widgets = array();
						}

						// Use ID number from new widget instance.
						$new_instance_id = $id_base . '-' . $new_instance_id_number;

						// Add new instance to sidebar.
						$sidebars_widgets[ $use_sidebar_id ][] = $new_instance_id;

						// Save the amended data.
						update_option( 'sidebars_widgets', $sidebars_widgets );

						// After widget import action.
						$after_widget_import = array(
							'sidebar'           => $use_sidebar_id,
							'sidebar_old'       => $sidebar_id,
							'widget'            => $widget,
							'widget_type'       => $id_base,
							'widget_id'         => $new_instance_id,
							'widget_id_old'     => $widget_instance_id,
							'widget_id_num'     => $new_instance_id_number,
							'widget_id_num_old' => $instance_id_number,
						);

						// Success message.
						if ( $sidebar_available ) {
							$widget_message_type = 'success';
							$widget_message      = 'Imported';
						} else {
							$widget_message_type = 'warning';
							$widget_message      = 'Imported to Inactive';
						}

					}

					// Result for widget instance
					$results[ $sidebar_id ]['widgets'][ $widget_instance_id ]['name'] = isset( $available_widgets[ $id_base ]['name'] ) ? $available_widgets[ $id_base ]['name'] : $id_base; // Widget name or ID if name not available (not supported by site).
					$results[ $sidebar_id ]['widgets'][ $widget_instance_id ]['title']        = ! empty( $widget['title'] ) ? $widget['title'] : 'No Title'; // Show "No Title" if widget instance is untitled.
					$results[ $sidebar_id ]['widgets'][ $widget_instance_id ]['message_type'] = $widget_message_type;
					$results[ $sidebar_id ]['widgets'][ $widget_instance_id ]['message']      = $widget_message;

				}

			}
			
			echo 'Successful Import Widgets';
			wp_die();
		}
		
		function get_available_widgets() {

			global $wp_registered_widget_controls;

			$widget_controls = $wp_registered_widget_controls;

			$available_widgets = array();

			foreach ( $widget_controls as $widget ) {

				// No duplicates.
				if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[ $widget['id_base'] ] ) ) {
					$available_widgets[ $widget['id_base'] ]['id_base'] = $widget['id_base'];
					$available_widgets[ $widget['id_base'] ]['name']    = $widget['name'];
				}

			}

			return $available_widgets;
		}

		/* Import Revolution Slider */
		function import_revslider(){
				$slider_directory  = dirname(__FILE__) . '/data/revslider/';
				$slider_files = array();
				$slider = new RevSliderSliderImport();
				foreach( glob( $slider_directory . '*.zip' ) as $filename ) {
					$filename = basename($filename);
					$slider_files[] = $slider_directory . $filename;
				}
				foreach($slider_files as $index => $filepath){				
					ob_start();
					$response = $slider->import_slider(true, $filepath);
					ob_clean();
					ob_end_clean();
				}
			
		}

		/* WooCommerce Settings */
		function woocommerce_settings(){
			$woopages = array(
				'woocommerce_shop_page_id' 			=> 'Shop'
				,'woocommerce_cart_page_id' 		=> 'Shopping cart'
				,'woocommerce_checkout_page_id' 	=> 'checkout'
				,'woocommerce_myaccount_page_id' 	=> 'My Account'
				,'yith_wcwl_wishlist_page_id' 		=> 'Wishlist'
			);
			foreach( $woopages as $woo_page_name => $woo_page_title ) {
				$woopage = get_page_by_title( $woo_page_title );
				if( isset( $woopage->ID ) && $woopage->ID ) {
					update_option($woo_page_name, $woopage->ID);
				}
			}
			$catalog = array(
				'width' 	=> '300',
				'height'	=> '300',
				'crop'		=> 1 
			);

			$single = array(
				'width' 	=> '600',
				'height'	=> '600',
				'crop'		=> 1 
			);

			$thumbnail = array(
				'width' 	=> '300',
				'height'	=> '300',
				'crop'		=> 1 
			);

			update_option( 'shop_catalog_image_size', $catalog );
			update_option( 'shop_single_image_size', $single ); 	
			update_option( 'shop_thumbnail_image_size', $thumbnail ); 

			if( class_exists('YITH_Woocompare') ){
				update_option('yith_woocompare_compare_button_in_products_list', 'yes');
			}

			if( class_exists('WC_Admin_Notices') ){
				WC_Admin_Notices::remove_notice('install');
			}
			delete_transient( '_wc_activation_redirect' );

			flush_rewrite_rules();
		}

		/* Menu Locations */
		function menu_locations(){
			$locations = get_theme_mod( 'nav_menu_locations' );
			$menus = wp_get_nav_menus();

			if( $menus ) {
				foreach($menus as $menu) {
					if( $menu->name == 'Main menu' ) {
						$locations['primary'] = $menu->term_id;
					}
					if( $menu->name == 'Vertical menu' ) {
						$locations['vertical'] = $menu->term_id;
					}
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );
		}

		/* Update Options */
		function update_options(){
			$homepage = get_page_by_title( 'Home' );
			if( isset( $homepage ) && $homepage->ID ){
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID);
			}
		}
		
	}
	function get_page_name($page_id){
		global $wpdb;
		$page_id = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '".$page_id."'");
		return $page_id;
	}
	if(isset($_POST['submit'])){
		$selected_val = $_POST['page_id'];
		$select = get_page_name($selected_val);
		$homepage = get_page_by_title( $select );
		if( isset( $homepage ) && $selected_val  ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $selected_val );
			$mes = "Select sucssess !";

		}
		else{
			$homepage = get_page_by_title( 'home' );
			update_option('show_on_front', 'page');
			update_option('page_on_front', $homepage->ID);
		}
	}
	new FTC_Importer();
}
?>