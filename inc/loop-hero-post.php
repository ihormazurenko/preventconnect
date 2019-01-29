<?php
    $title = get_the_title();
    $url = get_permalink();
    $date = get_the_date(get_option('date_format'));

    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');
?>
<li>
    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
        <div class="home-blog-box">
            <div class="centered-img">
	            <?php the_post_thumbnail('medium_large', array(
		            'alt'   => esc_attr($title)
	            )); ?>
            </div>
            <div class="home-blog-detail">
                <?php if ($title) { ?>
                <h3 class="home-blog-title"><?php echo $title; ?></h3>
                <?php } ?>
            </div>
        </div>
    </a>
</li>