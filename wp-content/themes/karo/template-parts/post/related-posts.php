<?php 
global $post,$smof_data;
$cat_list = get_the_category($post->ID);
$cat_ids = array();
foreach( $cat_list as $cat ){
	$cat_ids[] = $cat->term_id;
}
$cat_ids = implode(',', $cat_ids);

if( strlen($cat_ids) > 0 ){
	$arg = array(
		'post_type' => $post->post_type
		,'cat' => $cat_ids
		,'post__not_in' => array($post->ID)
		);
}
else{
	$arg = array(
		'post_type' => $post->post_type
		,'post__not_in' => array($post->ID)
		);
}

/* Remove the quote post format */
$arg['tax_query'] = array(
	array(
		'taxonomy'	=> 'post_format'
		,'field'	=> 'slug'
		,'terms'    => array( 'post-format-quote' )
		,'operator'	=> 'NOT IN'
		)
	);

$related_posts = new WP_Query($arg);

if( $related_posts->have_posts() ){
	$is_slider = true;
	if( isset($related_posts->post_count) && $related_posts->post_count <= 1 ){
		$is_slider = false;
	}
	?>
	<div class="related-posts related <?php echo esc_attr(($is_slider)?'loading':'') ?>">
		<header class="related-post-title">
			<h3 class="product_title"><span class="bg-heading"><span><?php esc_html_e('Related Posts', 'karo'); ?></span></span></h3>
		</header>
		<div class="meta-slider">
			<div class="blogs owl-carousel">
				<?php 
				while( $related_posts->have_posts() ): $related_posts->the_post();
				
				$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
				if( $is_slider && $post_format == 'gallery' ){ /* Remove Slider in Slider */
					$post_format = false;
				}
				?>
				<article>
					<div class="post-img">
						<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){ ?>
						<a class="blog-image <?php echo esc_attr($post_format); ?> <?php echo esc_attr(($post_format == 'gallery')?'loading':'') ?>" href="<?php the_permalink() ?>">
							<?php 
							if( $post_format == 'gallery' ){
								$gallery = get_post_meta($post->ID, 'ftc_gallery', true);
								$gallery_ids = explode(',', $gallery);
								if( is_array($gallery_ids) && has_post_thumbnail() ){
									array_unshift($gallery_ids, get_post_thumbnail_id());
								}
								foreach( $gallery_ids as $gallery_id ){
									echo wp_get_attachment_image( $gallery_id, 'ftc_blog_thumb', 0, array('class' => 'thumbnail-blog') );
								}

								if( !has_post_thumbnail() && empty($gallery) ){ /* Fix date position */
									$show_blog_thumbnail = 0;
								}
							}

							if( $post_format === false || $post_format == 'standard' ){
								if( has_post_thumbnail() ){
									the_post_thumbnail('ftc_blog_thumb', array('class' => 'thumbnail-blog'));
								}
								else{ /* Fix date position */
									$show_blog_thumbnail = 0;
								}
							}
							?>
						</a>
						<?php 
					}

					if( $post_format == 'video' ){
						$video_url = get_post_meta($post->ID, 'ftc_video_url', true);
						if( $video_url != '' ){
							echo do_shortcode('[ftc_video src="'.esc_url($video_url).'"]');
						}
					}

					if( $post_format == 'audio' ){
						$audio_url = get_post_meta($post->ID, 'ftc_audio_url', true);
						if( strlen($audio_url) > 4 ){
							$file_format = substr($audio_url, -3, 3);
							if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
								echo do_shortcode('[audio '.$file_format.'="'.esc_url($audio_url).'"]');
							}
							else{
								echo do_shortcode('[ftc_soundcloud url="'.esc_url($audio_url).'" width="100%" height="166"]');
							}
						}
					}
					?>
				</div>

				<div class="post-info">
					<header class="entry-header">
					
						<!-- Blog Title -->
						<h3 class="product_title blog-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
					<!-- Blog Date -->
					<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ): ?>
						<div class="date-time">
							<i class="fa fa-calendar"></i> <?php echo get_the_time(get_option('date_format')); ?>
						</div>
					<?php endif; ?>

						<?php 
						$categories_list = get_the_category_list(', ');
						if ( ($categories_list && $smof_data['ftc_blog_categories']) || $smof_data['ftc_blog_author'] ): 
							?>

						<!-- Blog Author -->
						<?php if( $smof_data['ftc_blog_author'] ): ?>
							<span class="vcard author"><?php esc_html_e('Posted by: ', 'karo'); ?><?php the_author_posts_link(); ?></span>
						<?php endif; ?>


						<!-- Blog View -->
				<?php if( $smof_data['ftc_blog_count_view'] ): ?>
					<span class="count-view">
				<i class="fa fa-eye"></i>
				<?php echo get_post_views(get_the_ID()); ?>
			</span>
					<?php endif; ?>

					<?php endif; ?>

					<!-- Blog Date Time -->
					<?php if( $post_format != 'gallery' && $post_format !== false && $post_format != 'standard' ): ?>
						<div class="date-time date-time-meta">
							<i class="fa fa-calendar"></i> <?php echo get_the_time(get_option('date_format')); ?>
						</div>
					<?php endif; ?>
				</header>	

				<!-- Blog Excerpt -->
				<div class="post-info"><p><?php ftc_the_excerpt_max_words(18, '', true, '', true); ?></p></div>

				<!-- Blog Author -->
				<!--<span class="author"><?php //esc_html_e('Post by ','karo') ?><?php //the_author_posts_link(); ?></span>-->

				<!-- Blog Read More -->
				<a href="<?php the_permalink(); ?>" class="button-readmore"><?php esc_html_e('Read More','karo') ?></a>
			</div>
		</article>
	<?php endwhile; ?>
</div>
</div>
</div>

<?php 
wp_reset_postdata();
}
?>