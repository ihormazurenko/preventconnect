<?php
    $title  = get_the_title();
    $url    = esc_url(get_permalink());
    $dates  = get_field('dates') ? get_field('dates') : '';
?>
<li>
    <div class="blog-box">
        <div class="inner-box">
            <div class="left-box">
                <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
                    <div class="centered-img">
                        <?php the_post_thumbnail('archive-thumb', array(
                            'alt' => esc_attr($title)
                        )); ?>
                    </div>
                </a>
            </div>
            <div class="right-box">
                <div class="blog-content-box">
                    <?php if ($dates) { ?>
                        <span class="blog-date"><?php echo $dates['start'] ? $dates['start'] : $dates['end']; ?></span>
                    <?php } ?>
                    <?php if ($title) { ?>
                        <a href="<?php echo $url; ?>" class="blog-title" title="<?php echo esc_attr($title); ?>"><?php echo $title; ?></a>
                    <?php } ?>
                    <div class="content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <div class="card-btn-box">
                    <a href="<?php echo $url; ?>" title="<?php esc_attr_e('Read More','pc'); ?>"><?php _e('Read More', 'pc'); ?> <span class="icon icon-long-arrow"></span></a>
                    <?php
                    /*
                     <a href="#" title="Read More">Read More <span class="icon icon-long-arrow"></span></a>
                                            <a href="#" title="Register">Register</a>
                                            <a href="#" title="View recording">View recording</a>
                     */
                    ?>
                </div>
            </div>
        </div>
    </div>
</li>