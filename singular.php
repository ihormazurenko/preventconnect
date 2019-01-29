<?php get_header(); ?>

    <section class="section section-content">
        <div class="container">

	        <?php the_title('<div class="section-title-box"><h1 class="section-title small">', '</h1></div>'); ?>

            <div class="content big">

				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					the_content();

				endwhile; else: endif;
				?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>