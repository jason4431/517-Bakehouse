<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bakehouse
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			
			<header class="page-header">
				<div class="about-banner">
				<?php
				echo wp_get_attachment_image(333, $size='full', true);
				?>
				
				<h1 class="job-banner">Come Work With Us</h2>
				</div>
				<?php
				the_archive_title( '<h1 class="page-job-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				
				?>
			</header><!-- .page-header -->

			<?php
			
			/* Start the Loop */
			?><div class="article_job_post"><?php
			while ( have_posts() ) :
			
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
                
			endwhile;
			?><div><?php
			echo do_shortcode('[wpforms id="96" title="false" description="false"]');
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
