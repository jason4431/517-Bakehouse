<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bakehouse
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
		 ?>
			
			<article id="post<?php the_ID(); ?>" <?php post_class(); ?> >
					<header class="entry-header-about">
						<div class="about-banner"><?php the_post_thumbnail('full')?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php
						
						the_content();

						wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakehouse' ),
						'after'  => '</div>',
						) );
						?>
					</div>
				</article>
				<?php
				
			// get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>
 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();