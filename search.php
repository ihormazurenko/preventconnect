<?php get_header(); ?>

	<section class="section section-blog search">
		<div class="container">

			<div class="section-title-box">
				<h1 class="section-title small"><?php printf( esc_html__( 'Search Results for: %s', 'pc' ), '<span><i>' . trim(get_search_query()) . '</i></span>' ); ?></h1>
			</div>

			<?php
				if (have_posts()) {
					echo '<ul class="blog-list">';

					while ( have_posts() ) : the_post();
						get_template_part('inc/loop', 'post');
					endwhile;

					echo "</ul>";

					get_template_part('inc/pagination');

				} else {
					if ( is_search() ) {
						?>
						<p class="search-sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pc' ); ?></p>
						<?php get_search_form(); ?>
						<?php
					} else {
						?>
						<p class="search-sorry-text"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pc' ); ?></p>
						<?php get_search_form(); ?>
						<?php
					}
				};
			?>

		</div>
	</section>

<?php get_footer(); ?>