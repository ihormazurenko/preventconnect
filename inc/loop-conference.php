<?php
    $title  = get_the_title();
    $url    = esc_url(get_permalink());
    $dates  = get_field('dates') ? get_field('dates') : '';

    $currentTime = date('U');
    $dates_end_U = get_post_meta( get_the_ID() , 'dates_end_U', true );


    if ($dates) {
        $date = $dates['start'] ? $dates['start'] : $dates['end'];
    } else {
        $date = get_the_date(get_option('date_format'));
    }


    $links_group    = get_field('links');
    if ($links_group && is_array($links_group) && count($links_group) > 0) {
        $register = ( $links_group['register'] && trim($links_group['register_url']) && $dates_end_U >= $currentTime ) ?
            '<a href="'.esc_url($links_group['register_url']).'" title="'.esc_attr__('Register', 'pc').'" target="_blank" rel="nofollow noopener">'.__('Register', 'pc').'</a>' : '';

        $view_recording = ( $links_group['view_recording'] && ($dates_end_U < $currentTime || $dates_end_U == NULL) ) ?
            '<a href="'.$url.'" title="'.esc_attr__('View Recording', 'pc').'">'.__('View Recording', 'pc').'</a>' : '';
    }
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
                        echo $register; // logic of outputting at the top of this php file
                        echo $view_recording; // logic of outputting at the top of this php file
                    ?>
                </div>
            </div>
        </div>
    </div>
</li>
