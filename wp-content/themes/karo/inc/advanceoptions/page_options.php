<?php
$options = array();
global $ftc_default_sidebars;
$sidebar_options = array();
foreach( $ftc_default_sidebars as $key => $_sidebar ){
	$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
}

/* Get list menus */
$menus = array('0' => esc_html__('Default', 'karo'));
$nav_terms = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
if( is_array($nav_terms) ){
	foreach( $nav_terms as $term ){
		$menus[$term->term_id] = $term->name;
	}
}

$options[] = array(
				'id'		=> 'page_layout_heading'
				,'label'	=> esc_html__('Page Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);

$options[] = array(
				'id'		=> 'layout_style'
				,'label'	=> esc_html__('Layout Style', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'default'  	=> esc_html__('Default', 'karo')
									,'boxed' 	=> esc_html__('Boxed', 'karo')
									,'wide' 	=> esc_html__('Wide', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'page_layout'
				,'label'	=> esc_html__('Page Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'0-1-0'  => esc_html__('Fullwidth', 'karo')
									,'1-1-0' => esc_html__('Left Sidebar', 'karo')
									,'0-1-1' => esc_html__('Right Sidebar', 'karo')
									,'1-1-1' => esc_html__('Left & Right Sidebar', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'left_sidebar'
				,'label'	=> esc_html__('Left Sidebar', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);

$options[] = array(
				'id'		=> 'right_sidebar'
				,'label'	=> esc_html__('Right Sidebar', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);
			
$options[] = array(
				'id'		=> 'left_right_padding'
				,'label'	=> esc_html__('Left Right Padding', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default'	=> '0'
			);
			
$options[] = array(
				'id'		=> 'full_page'
				,'label'	=> esc_html__('Full Page', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default'	=> '0'
			);
$options[] = array(
				'id'		=> 'dark_layout'
				,'label'	=> esc_html__('Dark Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default'	=> '0'
			);
$options[] = array(
				'id'		=> 'box_layout'
				,'label'	=> esc_html__('Box Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default'	=> '0'
			);
			
$options[] = array(
				'id'		=> 'header_breadcrumb_heading'
				,'label'	=> esc_html__('Header - Breadcrumb', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);
			
$options[] = array(
				'id'		=> 'header_layout'
				,'label'	=> esc_html__('Header Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
					'default'  	=> esc_html__('Default', 'karo')
					,'layout1'  		=> esc_html__('Header Layout 1', 'karo')
					,'layout2'  		=> esc_html__('Header Layout 2', 'karo')
					,'layout3'  		=> esc_html__('Header Layout 3', 'karo')
					,'layout4'  		=> esc_html__('Header Layout 4', 'karo')
					,'layout5'  		=> esc_html__('Header Layout 5', 'karo')
					,'layout6'  		=> esc_html__('Header Layout 6', 'karo')
					,'layout7'  		=> esc_html__('Header Layout 7', 'karo')
					,'layout8'  		=> esc_html__('Header Layout 8', 'karo')
					,'layout9'  		=> esc_html__('Header Layout 9', 'karo')
					,'layout10'  		=> esc_html__('Header Layout 10', 'karo')
					,'layout11'  		=> esc_html__('Header Layout 11', 'karo')
					,'layout12'  		=> esc_html__('Header Layout 12', 'karo')
					,'layout13'  		=> esc_html__('Header Layout 13', 'karo')
					,'layout14'  		=> esc_html__('Header Layout 14', 'karo')
				)
			);
			
$options[] = array(
				'id'		=> 'header_transparent'
				,'label'	=> esc_html__('Transparent Header', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default'	=> '0'
			);
			
$options[] = array(
				'id'		=> 'header_text_color'
				,'label'	=> esc_html__('Header Text Color', 'karo')
				,'desc'		=> esc_html__('Only available on transparent header', 'karo')
				,'type'		=> 'select'
				,'options'	=> array(
								'default'	=> esc_html__('Default', 'karo')
								,'light'	=> esc_html__('Light', 'karo')
								)
			);

$options[] = array(
				'id'		=> 'menu_id'
				,'label'	=> esc_html__('Primary Menu', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $menus
			);
			
$options[] = array(
				'id'		=> 'show_page_title'
				,'label'	=> esc_html__('Show Page Title', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'show_breadcrumb'
				,'label'	=> esc_html__('Show Breadcrumb', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'breadcrumb_layout'
				,'label'	=> esc_html__('Breadcrumb Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'default'  	=> esc_html__('Default', 'karo')
									,'v1'  		=> esc_html__('Breadcrumb Layout 1', 'karo')
									,'v2' 		=> esc_html__('Breadcrumb Layout 2', 'karo')
									,'v3' 		=> esc_html__('Breadcrumb Layout 3', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'breadcrumb_bg_parallax'
				,'label'	=> esc_html__('Breadcrumb Background Parallax', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'default'  	=> esc_html__('Default', 'karo')
								,'1'		=> esc_html__('Yes', 'karo')
								,'0'		=> esc_html__('No', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'bg_breadcrumbs'
				,'label'	=> esc_html__('Breadcrumb Background Image', 'karo')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);	
			
$options[] = array(
				'id'		=> 'logo'
				,'label'	=> esc_html__('Logo', 'karo')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);
			
$options[] = array(
				'id'		=> 'logo_mobile'
				,'label'	=> esc_html__('Mobile Logo', 'karo')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);
			
$options[] = array(
				'id'		=> 'logo_sticky'
				,'label'	=> esc_html__('Sticky Logo', 'karo')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);
			
$revolution_exists = class_exists('RevSliderSlider');

$page_sliders = array();
$page_sliders[0] = esc_html__('No Slider', 'karo');
if( $revolution_exists ){
	$page_sliders['revslider']	= esc_html__('Revolution Slider', 'karo');
}
$options[] = array(
				'id'		=> 'page_slider'
				,'label'	=> esc_html__('Page Slider', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'1'		=> esc_html__('Yes', 'karo')
								,'0'	=> esc_html__('No', 'karo')
								)
				,'default' =>'0'
			);

			
$options[] = array(
				'id'		=> 'page_slider_position'
				,'label'	=> esc_html__('Page Slider Position', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
							'before_header'			=> esc_html__('Before Header', 'karo')
							,'before_main_content'	=> esc_html__('Before Main Content', 'karo')
							)
				,'default'	=> 'before_main_content'
			);

if( $revolution_exists ){
	global $wpdb;
	$revsliders = array();
	$revsliders[0] = esc_html__('Select a slider', 'karo');
	$sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');
	if( $sliders ) {
		foreach( $sliders as $slider ) {
			$revsliders[$slider->id] = $slider->title;
		}
	}
				
	$options[] = array(
					'id'		=> 'rev_slider'
					,'label'	=> esc_html__('Select Revolution Slider', 'karo')
					,'desc'		=> ''
					,'type'		=> 'select'
					,'options'	=> $revsliders
				);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'primary_color'
				,'label'	=> esc_html__('Primary color', 'karo')
				,'desc'		=> ''
				,'type'		=> 'colorpicker'
			);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'secondary_color'
				,'label'	=> esc_html__('Secondary color', 'karo')
				,'desc'		=> ''
				,'type'		=> 'colorpicker'
			);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'body_font_enable_google_font'
				,'label'	=> esc_html__('Enable Google Font', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
								'default'  	=> esc_html__('Default', 'karo')
								,'1'		=> esc_html__('Yes', 'karo')
								,'0'		=> esc_html__('No', 'karo')
								)
			);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'body_font_family'
				,'label'	=> esc_html__('Body Font family', 'karo')
				,'desc'		=> ''
				,'type'		=> 'text'
			);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'body_font_google'
				,'label'	=> esc_html__('Body Font Google', 'karo')
				,'desc'		=> ''
				,'type'		=> 'text'
			);
}
if( class_exists('ThemeFtc_GET') ){
$options[] = array(
				'id'		=> 'secondary_body_font_google'
				,'label'	=> esc_html__('Secondary Font Google', 'karo')
				,'desc'		=> ''
				,'type'		=> 'text'
			);
}

if( !class_exists('Ftc_Demo') ){			
	$footer_blocks = array('0' => '');
	
	$args = array(
		'post_type'			=> 'ftc_footer'
		,'post_status'	 	=> 'publish'
		,'posts_per_page' 	=> -1
	);
	
	$posts = new WP_Query($args);
	
	if( !empty( $posts->posts ) && is_array( $posts->posts ) ){
		foreach( $posts->posts as $p ){
			$footer_blocks[$p->ID] = $p->post_title;
		}
	}

	wp_reset_postdata();
	
	$options[] = array(
				'id'		=> 'page_footer_heading'
				,'label'	=> esc_html__('Page Footer', 'karo')
				,'desc'		=> esc_html__('You also need to add the FTC - Footer widget into Footer widget', 'karo')
				,'type'		=> 'heading'
			);

	$options[] = array(
			'id'		=> 'footer_center'
			,'label'	=> esc_html__('Footer Center', 'karo')
			,'desc'		=> ''
			,'type'		=> 'select'
			,'options'	=> $footer_blocks
		);
		
	$options[] = array(
			'id'		=> 'footer_bottom'
			,'label'	=> esc_html__('Footer Bottom', 'karo')
			,'desc'		=> ''
			,'type'		=> 'select'
			,'options'	=> $footer_blocks
		);
}
?>