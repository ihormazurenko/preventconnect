<?php
/**
 * Template Name: Podcast
 */
get_header(); ?>

    <section class="section section-blog">
        <div class="container">
            <div class="section-title-box">
                <h1 class="section-title small"><?php echo get_the_title() ;?></h1>
            </div>
            <?php if (get_the_content()) { ?>
                <div class="section-desc content big">
                    <?php the_content(); ?>
                </div>
            <?php } ?>
            <?php
                global $wp_query;

                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'cat'            => 28,
                    'orderby'       => 'date',
                    'order'         => 'DESC',
                    'paged'         => $paged,
                );
                $new_query = new WP_Query( $args );

                if ($new_query->have_posts()) {
                    echo '<ul class="blog-list">';
                    while ( $new_query->have_posts() ) : $new_query->the_post();

                        get_template_part('inc/loop', 'podcast');

                    endwhile;
                    echo "</ul>";

                    get_template_part('inc/pagination');

                } else {
                    echo '<p class="no-results">' . __('Sorry, no podcasts found...', 'pc') . '</p>';
                }

                wp_reset_query();
            ?>
        </div>
    </section>

<?php get_footer(); ?>