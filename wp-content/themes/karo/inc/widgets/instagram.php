<?php
add_action('widgets_init', 'ftc_instagram_load_widgets');

function ftc_instagram_load_widgets()
{
	register_widget('Ftc_Instagram_Widget');
}

if(!class_exists('Ftc_Instagram_Widget')){
	class Ftc_Instagram_Widget extends WP_Widget {

		function __construct(){
			$widgetOps = array('classname' => 'ftc-instagram-widget', 'description' => esc_html__('Display your photos from Instagram', 'karo'));
			parent::__construct('ftc_instagram', esc_html__('FTC - Instagram', 'karo'), $widgetOps);
		}

		function widget( $args, $instance ) {
			
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			if( strlen(trim($instance['username'])) == 0 ){
				return;
			}
			
			$username 		= $instance['username'];
			$number 		= absint($instance['number']);
			$column 		= absint($instance['column']);
			$size 			= $instance['size'];
			$target 		= $instance['target'];
			$cache_time 	= absint($instance['cache_time']);
			
			if( $cache_time == 0 ){
				$cache_time = 12;
			}
			
			print_r($before_widget);
			if( $title ){
				print_r($before_title) ; print_r($title) ; print_r($after_title); 
			}
			unset($instance['title']);
			$transient_key = 'instagram_'.implode('', $instance);
			
			$cache = get_transient($transient_key);
			
			if( $cache !== false ){
			 print_r($cache);
			}
			else{
				$media_array = $this->scrape_instagram( $username, $number );
				if ( is_wp_error( $media_array ) ) {
					echo wp_kses_post( $media_array->get_error_message() );
				} else {
					ob_start();
					?>
					<div class="ftc-instagram columns-<?php echo esc_attr($column); ?>">
						<?php foreach( $media_array as $index => $item ){ ?>
						<div class="item">
							<a href="<?php echo esc_url( $item['link'] ) ?>" target="<?php echo esc_attr( $target ) ?>">
								<img src="<?php echo esc_url( $item[$size] ) ?>" alt="<?php echo esc_attr( $item['description'] ) ?>" title="<?php echo esc_attr( $item['description'] ) ?>" />
							</a>
						</div>
						<?php } ?>
					</div>
					<?php
					$output = ob_get_clean();
					print_r($output);
					set_transient($transient_key, $output, $cache_time * HOUR_IN_SECONDS);
				}
			}
			print_r($after_widget);
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;	
			$instance['title'] 				=  strip_tags($new_instance['title']);
			$instance['username'] 			=  $new_instance['username'];
			$instance['number'] 			=  $new_instance['number'];
			$instance['column'] 			=  $new_instance['column'];
			$instance['size'] 				=  $new_instance['size'];									
			$instance['target'] 			=  $new_instance['target'];									
			$instance['cache_time'] 		=  $new_instance['cache_time'];									
			return $instance;
		}

		function form( $instance ) {
			$array_default = array(
							'title'			=> 'Instagram'
							,'username' 	=> ''
							,'number' 		=> 9
							,'column' 		=> 3
							,'size' 		=> 'large'
							,'target' 		=> '_self'
							,'cache_time'	=> 12
							);
							
			$instance = wp_parse_args( (array) $instance, $array_default );
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter your title', 'karo'); ?> </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php esc_html_e('Username', 'karo'); ?> </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('username')); ?>" name="<?php echo esc_attr($this->get_field_name('username')); ?>" type="text" value="<?php echo esc_attr($instance['username']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of photos', 'karo'); ?> </label>
				<input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('column')); ?>"><?php esc_html_e('Column', 'karo'); ?> </label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('column')); ?>" name="<?php echo esc_attr($this->get_field_name('column')); ?>" >
					<?php for( $i = 1; $i <= 4; $i++ ): ?>
					<option value="<?php print_r($i); ?>" <?php selected($instance['column'], $i); ?> ><?php echo esc_attr($i); ?></option>
					<?php endfor; ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size', 'karo'); ?> </label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>" >
					<option value="thumbnail" <?php selected($instance['size'], 'thumbnail'); ?> ><?php esc_html_e('Thumbnail', 'karo') ?></option>
					<option value="small" <?php selected($instance['size'], 'small'); ?> ><?php esc_html_e('Small', 'karo') ?></option>
					<option value="large" <?php selected($instance['size'], 'large'); ?> ><?php esc_html_e('Large', 'karo') ?></option>
					<option value="original" <?php selected($instance['size'], 'original'); ?> ><?php esc_html_e('Original', 'karo') ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Target', 'karo'); ?> </label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>" >
					<option value="_self" <?php selected($instance['target'], '_self'); ?> ><?php esc_html_e('Current window', 'karo') ?></option>
					<option value="_blank" <?php selected($instance['target'], '_blank'); ?> ><?php esc_html_e('New window', 'karo') ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('cache_time')); ?>"><?php esc_html_e('Cache time (hours)', 'karo'); ?> </label>
				<input class="widefat" type="number" min="1" id="<?php echo esc_attr($this->get_field_id('cache_time')); ?>" name="<?php echo esc_attr($this->get_field_name('cache_time')); ?>" value="<?php echo esc_attr($instance['cache_time']); ?>" />
			</p>
			
			<?php 
		}
		
		function scrape_instagram( $username, $slice = 9 ) {

			$username = trim( strtolower( $username ) );
			switch ( substr( $username, 0, 1 ) ) {
				case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;
				default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
			}
			if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {
				$remote = wp_remote_get( $url );
				if ( is_wp_error( $remote ) ) {
					return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'karo' ) );
				}
				if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
					return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'karo' ) );
				}
				$shards      = explode( 'window._sharedData = ', $remote['body'] );
				$insta_json  = explode( ';</script>', $shards[1] );
				$insta_array = json_decode( $insta_json[0], true );
				if ( ! $insta_array ) {
					return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'karo' ) );
				}
				if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
					$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
				} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
					$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
				} else {
					return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'karo' ) );
				}
				if ( ! is_array( $images ) ) {
					return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'karo' ) );
				}
				$instagram = array();
				foreach ( $images as $image ) {
					if ( true === $image['node']['is_video'] ) {
						$type = 'video';
					} else {
						$type = 'image';
					}
					$caption = esc_html__( 'Instagram Image', 'karo' );
					if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
						$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
					}
					$instagram[] = array(
						'description' => $caption,
						'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
						'time'        => $image['node']['taken_at_timestamp'],
						'comments'    => $image['node']['edge_media_to_comment']['count'],
						'likes'       => $image['node']['edge_liked_by']['count'],
						'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
						'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
						'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
						'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
						'type'        => $type,
					);
			} // End foreach().
			// do not set an empty transient - should help catch private or empty accounts.
		}

		if ( ! empty( $instagram ) ) {
				return array_slice( $instagram, 0, $slice );
			} else {
				return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'gon' ) );
			}
		
	}
}
}