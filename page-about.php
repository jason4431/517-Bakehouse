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

	<div id="primary" class="content-area about"><!-- content-area -->
		<main id="main" class="site-main about"><!-- site-main -->
			<section class="about"><!-- section about -->
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
					endwhile; // End of the loop.
				?>

      			<?php
	     			if( function_exists( 'get_field' )):
				   ?>
	 <div class="about-section-content">
				<div class="about-box"> <!-- about-box -->
					<div class="about-image">
						<?php if( get_field( 'about_image')):
							echo wp_get_attachment_image( get_field( 'about_image' ), 'medium','',array( 'class' => 'alignright'));
							endif;
						?>
					</div>
					<div class="about-content">	
						<p>
						<?php	
							if( get_field( 'about_content')) :
								the_field( 'about_content' );
							endif;
						?>
						</p>
					</div>  
				</div><!-- End about-box -->
			<div class="vision-box"><!-- vision-box -->
				<div class="vision-title">
					<h2>
					<?php if( get_field( 'vision_title')):
							the_field( 'vision_title' );
							endif;
					?>
					</h2>
				</div>
				<div class="vision-image">
					<?php
						if( get_field( 'vision_image')):
							echo wp_get_attachment_image( get_field( 'vision_image' ), 'medium','',array( 'class' => 'alignleft'));
						endif;
					?>
				</div>
				<div class="vision-content">
					<p>	
					<?php
						if( get_field( 'vision_content')):
							the_field( 'vision_content' );
						endif;
					?>
					</p>
				<div>
			</div><!-- End vision-box -->

			<div class="beginnings-box"><!-- beginnings-box -->
				<div class="beg-title">
					<h2> 
					<?php
						if( get_field( 'our_beginnings_title')):	
							the_field( 'our_beginnings_title' );
						endif;
					?>
					</h2>
				</div>
				<div class="beg-image">
					<?php		
						if( get_field( 'beginnings_image')):
							echo wp_get_attachment_image( get_field( 'beginnings_image' ), 'medium','',array( 'class' => 'alignright'));
						endif;
					?>
				</div>
				<div class="beg-content">
					<p>
					<?php		
						if( get_field( 'our_beginnings_content')):
							the_field( 'our_beginnings_content' );
						endif;
					?>
					</p>
				</div>
			</div><!-- End beginnings-box -->
		  	<?php		
				endif;
			?>

		<h2>Meet Our Bakers</h2>
		<div class="baker-list">
			<?php 
				// Load bakers posts
				$args = array( 'post_type' => 'bakehouse-baker', 'posts_per_page' => -1, 'orderby' => 'title', 'order'   => 'ASC' );
				$blog_query = new WP_Query( $args );
				if ( $blog_query -> have_posts() ){
					while ( $blog_query -> have_posts() ) {
						$blog_query -> the_post();  
			?>
			<div class="baker">
				<h3>
					<?php  
						the_title();
					?>
				</h3>
				<?php
					the_post_thumbnail( 'medium' );
					the_content();
				?>
			</div>								
			<?php 
				if( 'hs-student' === get_post_type() ){
					echo get_the_term_list(
					$post->ID
				);
			?>
			<?php	
						}
					}
					wp_reset_postdata();
				}
			?>
		
	   </div><!-- End of baker-list -->
	</div>
       </section><!-- End  -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();