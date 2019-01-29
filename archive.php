<?php get_header(); ?>

    <section class="section section-blog">
        <div class="container">
            <div class="section-title-box">
                <h1 class="section-title small"><?php the_archive_title(); ?></h1>
            </div>

            <?php if ( have_posts() ) : ?>

                <ul class="blog-list">
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part('inc/loop', 'post');
                    endwhile;
                    ?>
                </ul>

            <?php
            else: echo "<div class='no-results-wrap'><p class='not-found'>".__('Sorry, no articles found...', 'pc')."</p></div>";
            endif;
            ?>
        </div>
    </section>

<?php get_footer(); ?>