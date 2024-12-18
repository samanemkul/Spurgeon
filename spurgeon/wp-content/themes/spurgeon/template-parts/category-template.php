<?php
/*
    Template Name: Category Page
*/
get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$rows = get_field('repeat_post');
$total_rows = count($rows);
$posts_per_page = 9; 
$total_pages = ceil($total_rows / $posts_per_page);
$start = ($paged - 1) * $posts_per_page;
$rows_to_display = array_slice($rows, $start, $posts_per_page);
?>

<div id="bricks" class="bricks">
    <div class="masonry">
        <div class="bricks-wrapper">
            <div class="grid-sizer"></div>
            <?php
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