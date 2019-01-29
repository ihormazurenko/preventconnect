<?php get_header(); ?>

    <section class="section section-content">
        <div class="container">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php the_title('<div class="section-title-box"><h1 class="section-title small">', '</h1></div>'); ?>

                <div class="content big">
                    <?php the_content(); ?>
                </div>

            <?php endwhile; else: endif; ?>

        </div><!--/content-->

        <?php get_sidebar(); ?>

    </section>

<?php get_footer(); ?>