<?php get_header();

    $web_conferences    = get_field('web_conferences');
    $podcasts           = get_field('podcasts');
    $blog               = get_field('blog');
?>

<?php if (($web_conferences && is_array($web_conferences) && count($web_conferences) > 0)|| ($podcasts && is_array($podcasts) && count($podcasts) > 0)) : ?>
    <section class="section section-home-card">
        <div class="container">
            <ul class="home-card-list">
                <?php
                if ($web_conferences && $web_conferences['show']) :
                    $cat_web_id         = 32;
                    $web_section_title  = $web_conferences['section_title'];
                    $web_select         = $web_conferences['select'];
                    $web_post_id        = '';
                    $web_title          = '';
                    $web_excerpt        = '';
                    $web_link           = '';

                    if ($web_select == 'manual') {
                        $web_manual         = $web_conferences['manual'][0];
                        $web_post_id        = $web_manual->ID;
                        $podcast_title      = $web_manual->post_title;
                        $web_excerpt        = get_the_excerpt($web_post_id);
                        $web_link           = get_permalink($web_post_id);
                    } else {
                        global $wp_query;

                        $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'posts_per_page' => 1,
                            'cat'            => $cat_web_id,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        );

                        $new_query = new WP_Query( $args );

                        if ($new_query->have_posts()) {
                            while ( $new_query->have_posts() ) : $new_query->the_post();
                                $web_post_id    = get_the_ID();
                                $web_title      = get_the_title();
                                $web_excerpt    = get_the_excerpt();
                                $web_link       = get_permalink();
                            endwhile;
                        }

                        wp_reset_query();
                    }

                    if ($web_title || $web_excerpt || $web_section_title) :
                        ?>
                        <li>
                            <div class="card-box">
                                <?php if ( $web_section_title ) { ?>
                                    <h1 class="section-title"><?php echo $web_section_title; ?></h1>
                                <?php } ?>
                                <div class="card-content-box">
                                    <?php if( has_post_thumbnail($web_post_id) ) { ?>
                                        <div class="left-box">
                                            <a href="<?php echo esc_url($web_link); ?>" title="<?php echo esc_attr($web_title); ?>">
                                                <div class="card-img-wrap">
                                                    <?php echo get_the_post_thumbnail( $web_post_id, 'featured-thumb' ); ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="right-box">
                                        <?php if ($web_title) { ?>
                                            <a href="<?php echo esc_url($web_link); ?>" title="<?php echo esc_attr($web_title); ?>">
                                                <h2 class="card-title"><?php echo $web_title; ?></h2>
                                            </a>
                                        <?php } ?>

                                        <?php if ($web_excerpt) { ?>
                                            <div class="content">
                                                <p><?php echo $web_excerpt; ?></p>
                                            </div>
                                        <?php } ?>

                                        <div class="card-btn-box">
                                            <a href="<?php echo esc_url($web_link); ?>" title="<?php esc_attr_e('Read More', 'pc'); ?>"> <?php _e('Read More', 'pc'); ?> <span class="icon icon-long-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo get_permalink(21744); ?>" title=<?php esc_attr_e('All Web Conferences', 'pc'); ?>"" class="btn-circle">
                                    <span class="btn-table">
                                        <span class="btn-cell">
                                           <span class="icon icon-conference"></span>
                                            <?php _e('All podcast Conferences', 'pc'); ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                    <?php
                    endif;
                endif;
                ?>

                <?php
                if ($podcasts && $podcasts['show']) :
                    $cat_podcast_id         = 28;
                    $podcast_section_title  = $podcasts['section_title'];
                    $podcast_select         = $podcasts['select'];
                    $podcast_post_id        = '';
                    $podcast_title          = '';
                    $podcast_excerpt        = '';
                    $podcast_link           = '';

                    if ($podcast_select == 'manual') {
                        $podcast_manual     = $podcasts['manual'][0];
                        $podcast_post_id    = $podcast_manual->ID;
                        $podcast_title      = $podcast_manual->post_title;
                        $podcast_excerpt    = get_the_excerpt($podcast_post_id);
                        $podcast_link       = get_permalink($podcast_post_id);
                    } else {
                        global $wp_query;

                        $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'posts_per_page' => 1,
                            'cat'            => $cat_podcast_id,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        );

                        $podcast_query = new WP_Query( $args );

                        if ($podcast_query->have_posts()) {
                            while ( $podcast_query->have_posts() ) : $podcast_query->the_post();
                                $podcast_post_id    = get_the_ID();
                                $podcast_title      = get_the_title();
                                $podcast_excerpt    = get_the_excerpt();
                                $podcast_link       = get_permalink();
                            endwhile;
                        }

                        wp_reset_query();
                    }

                    if ($podcast_title || $podcast_excerpt || $podcast_section_title) :
                        ?>
                        <li class="right">
                            <div class="card-box">
                                <?php if ( $podcast_section_title ) { ?>
                                    <h1 class="section-title"><?php echo $podcast_section_title; ?></h1>
                                <?php } ?>
                                <div class="card-content-box">
                                    <?php if( has_post_thumbnail($podcast_post_id) ) { ?>
                                        <div class="left-box">
                                            <a href="<?php echo esc_url($podcast_link); ?>" title="<?php echo esc_attr($podcast_title); ?>">
                                                <div class="card-img-wrap">
                                                    <?php echo get_the_post_thumbnail( $podcast_post_id, 'featured-thumb' ); ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="right-box">
                                        <?php if ($podcast_title) { ?>
                                            <a href="<?php echo esc_url($podcast_link); ?>" title="<?php echo esc_attr($podcast_title); ?>">
                                                <h2 class="card-title"><?php echo $podcast_title; ?></h2>
                                            </a>
                                        <?php } ?>

                                        <?php if ($podcast_excerpt) { ?>
                                            <div class="content">
                                                <p><?php echo $podcast_excerpt; ?></p>
                                            </div>
                                        <?php } ?>

                                        <div class="card-btn-box">
                                            <a href="<?php echo esc_url($podcast_link); ?>" title="<?php esc_attr_e('Read More', 'pc'); ?>"> <?php _e('Read More', 'pc'); ?> <span class="icon icon-long-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo get_permalink(21742); ?>" title=<?php esc_attr_e('All Podcasts', 'pc'); ?>"" class="btn-circle">
                                    <span class="btn-table">
                                        <span class="btn-cell">
                                           <span class="icon icon-conference"></span>
                                            <?php _e('All Podcasts', 'pc'); ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>
                    <?php
                    endif;
                endif;
                ?>
            </ul>
        </div>
    </section>
<?php endif; ?>

<?php if ($blog && is_array($blog) && count($blog) > 0) : ?>
    <?php
    if ($blog['show']) :
        $blog_section_title = $blog['section_title'];
        $blog_arr           = ($blog['select'] == 'manual') ? $blog['manual'] : [];
        $cat_blog_id        = $blog_arr ? '' : 38;
        ?>
        <section class="section section-home-blog">
            <div class="container">
                <?php if ( $blog_section_title ) { ?>
                    <div class="section-title-box">
                        <h1 class="section-title"><?php echo $blog_section_title; ?></h1>
                    </div>
                <?php } ?>
                <div class="home-blog-wrap">
                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'post__in'       => $blog_arr,
                        'posts_per_page' => 3,
                        'cat'            => $cat_blog_id,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );

                    $blog_query = new WP_Query( $args );

                    if ($blog_query->have_posts()) {
                        echo '<ul class="home-blog-list">';

                        while ( $blog_query->have_posts() ) : $blog_query->the_post();

                            get_template_part('inc/loop', 'hero-post');

                        endwhile;

                        echo "</ul>";
                    }

                    wp_reset_query();
                    ?>
                    <a href="<?php echo get_permalink(21656); ?>" title="<?php esc_attr_e('All Blog Posts', 'pc'); ?>" class="btn-circle">
                        <span class="btn-table">
                            <span class="btn-cell">
                                <span class="icon icon-blog"></span>
                                <?php _e('All Blog Posts', 'pc'); ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </section>
    <?php
    endif;
endif
?>

<?php get_footer(); ?>