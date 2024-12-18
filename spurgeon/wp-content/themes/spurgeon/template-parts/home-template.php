<?php
/*
    Template Name: Home page
*/
get_header('home');
?>
<div class="hero">

    <div class="hero__slider swiper-container">

        <div class="swiper-wrapper">
            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <article class="hero__slide swiper-slide">
                        <div class="hero__entry-image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
                        <div class="hero__entry-text">
                            <div class="hero__entry-text-inner">
                                <div class="hero__entry-meta">
                                    <span class="cat-links">
                                        <?php echo the_category();?>
                                    </span>
                                </div>
                                <h2 class="hero__entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <?php the_excerpt(); ?>
                                <a class="hero__more-link" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div> <!-- swiper-wrapper -->

        <!-- <div class="swiper-pagination"></div> -->

    </div>
</div>
<div id="bricks" class="bricks">
    <div class="masonry">
        <div class="bricks-wrapper">
            <div class="grid-sizer"></div>
            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $rows = get_field('repeat_post');
            $total_rows = count($rows);
            $posts_per_page = 12;
            $total_pages = ceil($total_rows / $posts_per_page);
            $start = ($paged - 1) * $posts_per_page;
            $rows_to_display = array_slice($rows, $start, $posts_per_page);
            if (!empty($rows_to_display)) :
                foreach ($rows_to_display as $row) :
                    $image = $row['image'];
                    $title = !empty($row['title']) ? $row['title'] : 'Default Title';
                    $description = !empty($row['description']) ? $row['description'] : 'No description available.';
                    $link = $row['category'];
            ?>
                    <article class="brick entry">
                        <div class="entry__thumb">
                            <a href="<?php echo esc_url($link ? $link : '#'); ?>">
                                <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php else : ?>
                                    <img src="<?php echo esc_url($fallback_image); ?>" alt="Placeholder Image" />
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="entry__text">
                            <h1 class="entry__title">
                                <a href="<?php echo esc_url($link); ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            </h1>
                            <p class="entry__excerpt">
                                <?php echo esc_html($description); ?>
                            </p>
                        </div>
                    </article>
            <?php
                endforeach;
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
        <div class="pgn">
            <?php
            echo paginate_links(array(
                'current'   => $paged,
                'total'     => $total_pages,
                'prev_text' => __('« Previous'),
                'next_text' => __('Next »'),
            ));
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>