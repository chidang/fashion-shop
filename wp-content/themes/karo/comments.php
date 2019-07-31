<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
		esc_html_e('Comments ', 'karo');
		echo '('.zeroise(get_comments_number(), 2).')';
		?>
	</h2>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'avatar_size' => 100,
			'style'       => 'ol',
			'short_ping'  => true,
			'reply_text'  => ftc_get_svg( array( 'icon' => 'mail-reply' ) ) . esc_html__( 'Reply', 'karo' ),
			) );
			?>
		</ol>
		<div class="commentPaginate">
			<?php paginate_comments_links( array('prev_text' => '&laquo; PREV', 'next_text' => 'NEXT &raquo;') ); ?>
		</div>
		


	<?php endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'karo' ); ?></p>
	<?php
	endif;

	comment_form();
	?>
	

</div><!-- #comments -->
