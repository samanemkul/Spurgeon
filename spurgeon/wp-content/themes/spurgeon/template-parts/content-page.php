<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spurgeon_theme
 */

?>

<div id="content" class="s-content s-content--page">
	<div class="row entry-wrap">
		<div class="column lg-12">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>class="entry">
				<?php spurgeon_post_thumbnail(); ?>
				<div class="entry_content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'spurgeon'),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</article>
		</div>
	</div>
</div>
<?php if (get_edit_post_link()) : ?>
	</div>
	<footer class="s-footer">
		<!-- <?php
				edit_post_link(
					sprintf(
						wp_kses(

							__('Edit <span class="screen-reader-text">%s</span>', 'spurgeon'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					),
					'<span class="edit-link">',
					'</span>'
				);
				?> -->
	</footer>
<?php endif; ?>
<?php the_ID(); ?>