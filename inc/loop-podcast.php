<?php
    $title  = get_the_title();
    $url    = esc_url(get_permalink());
    $date   = get_the_date(get_option('date_format'));

    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');
?>
<li>
    <div class="blog-box">
        <div class="inner-box">
            <?php if( has_post_thumbnail() ) { ?>
                <div class="left-box">
                    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                        <div class="centered-img">
                            <?php the_post_thumbnail('archive-thumb', array(
                                'alt' => esc_attr($title)
                            )); ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="right-box">
                <div class="blog-content-box">
                    <?php if ($date) { ?>
                        <div class="single-post-detail">
                            <span class="blog-date"><?php echo $date; ?></span>
                        </div>
                        <?php /* <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>" class="blog-date" title="<?php echo esc_attr($date); ?>"><?php echo $date; ?></a> */ ?>
                    <?php } ?>
                    <?php if ($title) { ?>
                        <a href="<?php echo $url; ?>" class="blog-title" title="<?php echo esc_attr($title); ?>"><?php echo $title; ?></a>
                    <?php } ?>
                    <div class="content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <div class="card-btn-box">
                    <a href="<?php echo $url; ?>" title="<?php esc_attr_e('Listen','pc'); ?>"><?php _e('Listen', 'pc'); ?> <span class="icon icon-long-arrow"></span></a>
                </div>
            </div>
        </div>
    </div>
</li>
