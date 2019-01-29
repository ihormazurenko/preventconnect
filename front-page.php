<?php get_header(); ?>

    <section class="section section-home-card">
        <div class="container">
            <ul class="home-card-list">
                <li>
                    <div class="card-box">
                        <h1 class="section-title">Web Conferences </h1>
                        <div class="card-content-box">
                            <div class="left-box">
                                <div class="card-img-wrap">
                                    <img src="../img/web_conference.jpg" alt="Web Conferences">
                                </div>
                            </div>
                            <div class="right-box">
                                <a href="#" title="">
                                    <h2 class="card-title">Getting Started on Supporting Economic Opportunity for Sexual
                                        and Domestic Violence Prevention</h2>
                                </a>
                                <div class="content">
                                    <p>Research shows that improving financial security and economic opportunities may
                                        reduce risk for sexual and domestic violence. From sustainable living wages to
                                        pay equity and paid family leave, advocates and practitioners are diving into
                                        new policy and practice areas to advance sexual and domestic violence
                                        prevention...</p>
                                </div>
                                <div class="card-btn-box">
                                    <a href="#" title="Read More">Read More <span class="icon icon-long-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <a href="#" title="All web conferences" class="btn-circle">
                                    <span class="btn-table">
                                        <span class="btn-cell">
                                           <span class="icon icon-conference"></span>
                                            All Web Conferences
                                        </span>
                                    </span>
                        </a>
                    </div>
                </li>
                <li class="right">
                    <div class="card-box">
                        <h1 class="section-title">Podcasts</h1>
                        <div class="card-content-box">
                            <div class="left-box">
                                <div class="card-img-wrap">
                                    <img src="../img/podcast.jpg" alt="Podcasts">
                                </div>
                            </div>
                            <div class="right-box">
                                <a href="#" title="">
                                    <h2 class="card-title">2018 National Sexual Assault Conference: Building Leaders to
                                        Keep Children Safe in Communities of Color Using Indigenous Circle Process</h2>
                                </a>
                                <div class="content">
                                    <p>The 2018 National Sexual Assault Conference, “Bold Moves: Ending Sexual Violence
                                        in One Generation,” was held in Anaheim, CA, August 29-31, 2018. This workshop
                                        was part of the Child Sexual Abuse track, sponsored by the California Coalition
                                        Against Sexual Assault...</p>
                                </div>
                                <div class="card-btn-box">
                                    <a href="#" title="Read More">Read More <span class="icon icon-long-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <a href="#" title="All web conferences" class="btn-circle">
                                    <span class="btn-table">
                                        <span class="btn-cell">
                                            <span class="icon icon-podcast"></span>  All Podcasts
                                        </span>
                                    </span>
                        </a>

                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section section-home-blog">
        <div class="container">
            <div class="section-title-box">
                <h1 class="section-title"><?php _e('Blog', 'pc') ?></h1>
            </div>
            <div class="home-blog-wrap">
	            <?php
	            //events
	            global $wp_query;

	            $args = array(
		            'post_type'     => 'post',
		            'post_status'   => 'publish',
		            'posts_per_page' => 3,
		            'orderby'       => 'date',
		            'order'         => 'DESC',
	            );

	            $new_query = new WP_Query( $args );

	            if ($new_query->have_posts()) {
		            echo '<ul class="home-blog-list">';

                        while ( $new_query->have_posts() ) : $new_query->the_post();

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

<?php get_footer(); ?>