<?php

/**
 * Template part for displaying posts
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
				<header class="entry__header entry__header--narrow">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry__title">', '</h1>');
					else :
						the_title('<h2 class="entry__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;
					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<div class="entry__meta-author">
								<i class="fas fa-user"></i> <?php the_author(); ?>
							</div>
							<div class="entry__meta-date">
								<i class="fas fa-clock"></i> <?php the_date('F j, Y'); ?>
							</div>
							<div class="entry__meta-cat">
								<i class="fas fa-folder"></i> <?php the_category(', '); ?>
							</div>
						</div>
					<?php endif; ?>
				</header><!-- .entry-header -->
				<?php spurgeon_post_thumbnail(); ?>
				<div class="content-primary">
					<div class="entry__content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'spurgeon'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'spurgeon'),
								'after'  => '</div>',
							)
						);
						?>
						<p class="entry__tags">
							<span class="entry__tag-list">
								<?php the_tags('Tags: ', ' ', ''); ?>
							</span>
						</p>
					</div><!-- .entry-content -->
				</div>
		</div>
	</div>
</div>



</article><!-- #post-<?php the_ID(); ?> -->