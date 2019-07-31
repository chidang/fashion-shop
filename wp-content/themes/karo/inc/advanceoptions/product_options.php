<?php 
$options = array();
global $ftc_default_sidebars;
$sidebar_options = array(
				'0'	=> esc_html__('Default', 'karo')
				);
foreach( $ftc_default_sidebars as $key => $_sidebar ){
	$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
}

$options[] = array(
				'id'		=> 'prod_layout_heading'
				,'label'	=> esc_html__('Product Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);
			
$options[] = array(
				'id'		=> 'prod_layout'
				,'label'	=> esc_html__('Product Layout', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'0'			=> esc_html__('Default', 'karo')
									,'0-1-0'  	=> esc_html__('Fullwidth', 'karo')
									,'1-1-0' 	=> esc_html__('Left Sidebar', 'karo')
									,'0-1-1' 	=> esc_html__('Right Sidebar', 'karo')
									,'1-1-1' 	=> esc_html__('Left & Right Sidebar', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'prod_left_sidebar'
				,'label'	=> esc_html__('Left Sidebar', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);
			
$options[] = array(
				'id'		=> 'prod_right_sidebar'
				,'label'	=> esc_html__('Right Sidebar', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> $sidebar_options
			);

$options[] = array(
				'id'		=> 'prod_custom_tab_heading'
				,'label'	=> esc_html__('Custom Tab', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);
			
$options[] = array(
				'id'		=> 'prod_custom_tab'
				,'label'	=> esc_html__('Custom Tab', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
									'0'		=> esc_html__('Default', 'karo')
									,'1'	=> esc_html__('Override', 'karo')
								)
			);
			
$options[] = array(
				'id'		=> 'prod_custom_tab_title'
				,'label'	=> esc_html__('Custom Tab Title', 'karo')
				,'desc'		=> ''
				,'type'		=> 'text'
			);
			
$options[] = array(
				'id'		=> 'prod_custom_tab_content'
				,'label'	=> esc_html__('Custom Tab Content', 'karo')
				,'desc'		=> ''
				,'type'		=> 'textarea'
			);
			
$options[] = array(
				'id'		=> 'prod_breadcrumb_heading'
				,'label'	=> esc_html__('Breadcrumbs', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);

$options[] = array(
				'id'		=> 'bg_breadcrumbs'
				,'label'	=> esc_html__('Breadcrumb Background Image', 'karo')
				,'desc'		=> ''
				,'type'		=> 'upload'
			);
			
$options[] = array(
				'id'		=> 'prod_video_heading'
				,'label'	=> esc_html__('Video', 'karo')
				,'desc'		=> ''
				,'type'		=> 'heading'
			);

$options[] = array(
				'id'		=> 'prod_video_url'
				,'label'	=> esc_html__('Video URL', 'karo')
				,'desc'		=> esc_html__('Enter Youtube or Vimeo video URL', 'karo')
				,'type'		=> 'text'
			);
$options[] = array(
	'id'		=> 'prod_size_chart_heading'
	,'label'	=> esc_html__('Product Size Chart', 'karo')
	,'desc'		=> ''
	,'type'		=> 'heading'
);

$options[] = array(
	'id'		=> 'show_size_chart'
	,'label'	=> esc_html__('Show Size Chart', 'karo')
	,'desc'		=> esc_html__('You can show or hide Size Chart for all product on Theme Option > Product Detail', 'karo')
	,'type'		=> 'select'
	,'options'	=> array(
		'1'		=> esc_html__('Show', 'karo')
		,'0'	=> esc_html__('Hide', 'karo')
	)
);

$options[] = array(
	'id'		=> 'prod_size_chart'
	,'label'	=> esc_html__('Size Chart Image', 'karo')
	,'desc'		=> esc_html__('You can upload size chart image for product', 'karo')
	,'type'		=> 'upload'
);			
?>