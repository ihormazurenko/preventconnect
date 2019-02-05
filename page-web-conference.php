<?php
/**
 * Template Name: Web Conferences
 */
get_header();

$web_conferences        = get_field('web_conferences');
$upcoming_section_title = get_field('section_title');
?>
<?php
    if ($web_conferences && is_array($web_conferences) && count($web_conferences) > 0) :
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
				        $web_post_id    =  get_the_ID();
				        $web_title      = get_the_title();
				        $web_excerpt    = get_the_excerpt();
				        $web_link       = get_permalink();
			        endwhile;
		        }

		        wp_reset_query();
	        }

            ?>
            <section class="section section-top-post">
                <div class="container">
                    <div class="section-title-box">
                        <h1 class="section-title small"><?php echo get_the_title() ;?></h1>
                    </div>
                    <?php if ($web_title || $web_excerpt || $web_section_title) : ?>
                        <div class="top-post-box">
	                        <?php if ($web_title) { ?>
                                <h2 class="box-title"><?php echo $web_title; ?></h2>
	                        <?php } ?>
                            <?php if( has_post_thumbnail($web_post_id) ) { ?>
                                <div class="top-box">
	                                <?php echo get_the_post_thumbnail( $web_post_id, 'medium_large' ); ?>
                                </div>
                            <?php } ?>
                            <div class="bottom-box">
                                <?php if ($web_excerpt) { ?>
                                    <div class="content">
                                        <p><?php echo $web_excerpt; ?></p>
                                    </div>
                                <?php } ?>
                                <div class="card-btn-box">
                                    <a href="<?php echo esc_url($web_link); ?>" title="<?php esc_attr_e('Learn More', 'pc'); ?>"> <?php _e('Learn More', 'pc'); ?> <span class="icon icon-long-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <?php
        endif;
    endif;
?>

    <section class="section section-blog">
        <div class="container">
            <?php if ($upcoming_section_title) { ?>
                <div class="section-title-box">
                    <h1 class="section-title small"><?php echo $upcoming_section_title; ?></h1>
                </div>
            <?php } ?>
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
                    'cat'            => 32,
                    'orderby'       => 'date',
                    'order'         => 'DESC',
                    'paged'         => $paged,
                );
                $new_query = new WP_Query( $args );

                if ($new_query->have_posts()) {
                    echo '<ul class="blog-list">';
                    while ( $new_query->have_posts() ) : $new_query->the_post();

                        get_template_part('inc/loop', 'post');

                    endwhile;
                    echo "</ul>";

                    get_template_part('inc/pagination');

                } else {
                    echo '<p class="no-results">' . __('Sorry, articles not found...', 'pc') . '</p>';
                }

                wp_reset_query();
            ?>
        </div>
    </section>

<?php get_footer(); ?>