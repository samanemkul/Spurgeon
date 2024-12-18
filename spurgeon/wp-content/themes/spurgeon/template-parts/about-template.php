<?php
/*
Template Name: About page
*/
get_header();
?>

<div id="content" class="s-content s-content--page">

    <div class="row entry-wrap">
        <div class="column lg-12">
            <?php
            $title = get_field('title');
            $para_1 = get_field('para_1');
            $para_2 = get_field('para_2');
            $para_3 = get_field('para_3');
            $image_id = get_field('image');
            ?>

            <article class="entry">

                <header class="entry__header entry__header--narrow">

                    <h1 class="entry__title">
                        <?php echo $title; ?>
                    </h1>

                </header>

                <div class="entry__media">
                    <figure class="featured-image">
                        <?php
                        $size = 'full';
                        echo wp_get_attachment_image($image_id, $size, false, array(
                            'sizes' => '(max-width: 2400px) 100vw, 2400px'
                        ));
                        ?>
                    </figure>
                </div>

                <div class="content-primary">

                    <div class="entry__content">

                        <p class="lead">
                            <?php echo $para_1; ?>
                        </p>

                        <div class="row block-lg-one-half block-tab-whole">
                            <div class="column">
                                <p class="drop-cap">
                                    <?php echo $para_2; ?>
                                </p>
                            </div>
                            <div class="column">
                                <p>
                                    <?php echo $para_3; ?>
                                </p>
                            </div>
                        </div>

                    </div> <!-- end content-primary -->

            </article> <!-- end entry -->

        </div>
    </div> <!-- end entry-wrap -->

    </section> <!-- end s-content -->
    <?php get_footer(); ?>