<?php
/**
 * Template Name: Web Conferences (Past)
 */
get_header();

    $currentTime = date('U');
?>

    <section class="section section-blog">
        <div class="container">
            <div class="section-title-box">
                <h1 class="section-title small"><?php the_title(); ?></h1>
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
                    'cat'           => 32,
                    'orderby'       => array( 'meta_value_num' => 'DESC' ),
                    'paged'         => $paged,
                    'meta_query'    => array(
                        array(
                            'key'       => 'dates_end_U',
                            'value'     => $currentTime,
                            'compare'   => '<',
                            'type'      => 'NUMERIC'
                        )
                    )
                );
                $new_query = new WP_Query( $args );

                if ($new_query->have_posts()) {
                    echo '<ul class="blog-list">';
                    while ( $new_query->have_posts() ) : $new_query->the_post();

                        get_template_part('inc/loop', 'conference');

                    endwhile;
                    echo "</ul>";

                    get_template_part('inc/pagination');

                } else {
                    echo '<p class="no-results">' . __('Sorry, web conferences not found...', 'pc') . '</p>';
                }

                wp_reset_query();
            ?>
        </div>
    </section>

<?php get_footer(); ?>