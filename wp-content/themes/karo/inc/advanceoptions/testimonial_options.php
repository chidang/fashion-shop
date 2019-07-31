<?php 
$options = array();

$options[] = array(
				'id'		=> 'gravatar_email'
				,'label'	=> esc_html__('Gravatar Email Address', 'karo')
				,'desc'		=> esc_html__('Enter in an e-mail address, to use a Gravatar, instead of using the "Featured Image". You have to remove the "Featured Image".', 'karo')
				,'type'		=> 'text'
			);
			
$options[] = array(
				'id'		=> 'byline'
				,'label'	=> esc_html__('Byline', 'karo')
				,'desc'		=> esc_html__('Enter a byline for the customer giving this testimonial (for example: "CEO of ThemeFTC").', 'karo')
				,'type'		=> 'text'
			);
			
$options[] = array(
				'id'		=> 'url'
				,'label'	=> esc_html__('URL', 'karo')
				,'desc'		=> esc_html__('Enter a URL that applies to this customer (for example: http://themeftc.com/).', 'karo')
				,'type'		=> 'text'
			);
			
$options[] = array(
				'id'		=> 'rating'
				,'label'	=> esc_html__('Rating', 'karo')
				,'desc'		=> ''
				,'type'		=> 'select'
				,'options'	=> array(
						'-1'	=> esc_html__('no rating', 'karo')
						,'0'	=> esc_html__('0 star', 'karo')
						,'0.5'	=> esc_html__('0.5 star', 'karo')
						,'1'	=> esc_html__('1 star', 'karo')
						,'1.5'	=> esc_html__('1.5 star', 'karo')
						,'2'	=> esc_html__('2 stars', 'karo')
						,'2.5'	=> esc_html__('2.5 stars', 'karo')
						,'3'	=> esc_html__('3 stars', 'karo')
						,'3.5'	=> esc_html__('3.5 stars', 'karo')
						,'4'	=> esc_html__('4 stars', 'karo')
						,'4.5'	=> esc_html__('4.5 stars', 'karo')
						,'5'	=> esc_html__('5 stars', 'karo')
				)
			);
?>