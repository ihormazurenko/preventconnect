<?php get_header(); ?>

    <section class="section section-content">
        <div class="container">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php
                    $date   = get_the_date(get_option('date_format'));
                    $author = get_the_author();
                    $show_links = 1;
                    $archive_year  = get_the_time('Y');
                    $archive_month = get_the_time('m');
                    $archive_day   = get_the_time('d');
                    $archive_day_link = get_day_link( $archive_year, $archive_month, $archive_day);
                    $categories = get_the_category();

                    if ($categories && is_array($categories) && count($categories) > 0) {
                        foreach ($categories as $category) {
                            if ($category->taxonomy == 'category' && $category->slug == 'web-conferences') {
                                $show_links = 0;
                                break;
                            }
                        }
                    }

                    if (( $date && $archive_day_link )|| $author) {
                        if ($show_links) {
                            ?>
                            <div class="single-post-detail">
                                <?php if ($author) { ?>
                                    <?php _e('By ', 'pc'); ?>
                                    <?php echo get_the_author_posts_link(); ?>
                                <?php } ?>
                                <?php if ($date || $archive_day_link) { ?>
                                    <?php if ($author) {
                                        _e('on ', 'pc');
                                    } ?>
                                    <a href="<?php echo $archive_day_link; ?>" class="blog-date"
                                       title="<?php echo esc_attr($date); ?>"><?php echo $date; ?></a>
                                <?php } ?>
                            </div>
                        <?php }
                    }?>

                <?php the_title('<div class="section-title-box"><h1 class="section-title small">', '</h1></div>'); ?>

                <div class="content big">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; else: endif; ?>

        </div>

        <?php get_sidebar(); ?>

    </section>

<?php get_footer(); ?>