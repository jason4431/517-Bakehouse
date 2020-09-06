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

<div id="primary" class="content-area contact-page">
	<main id="main" class="contact-page site-main">
		<section class="contact-form">
			<?php while ( have_posts() ) : the_post();?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			        <header class="entry-header-about">
						<div class="about-banner"><?php the_post_thumbnail('full')?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
					</header><!-- .entry-header -->

			
      
				<div class="contact entry-content">
					<?php
						the_content();
						wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakehouse' ),
						'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->
		</section><!-- End contact-form -->
		<h2 class="location-title">
			Our Locations
		</h2>
    <div class="contact-info-box">
	
		<div class="google-map">
			<?php if( have_rows('map') ): ?>
			<div class="acf-map" data-zoom="16">
				<?php 
					while ( have_rows('map') ) : the_row(); 
					// Load sub field values.
					$location = get_sub_field('location');
				?>
				<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
					<h3> <?php echo esc_html( $title ); ?> </h3>
					<p><em> <?php echo esc_html( $location['address'] ); ?> </em></p>
				</div><!-- End marker -->
				<?php endwhile; ?>
			</div><!-- End acf-map -->
			<?php endif; ?>
		</div><!-- End google-map -->

		<section class="contact-info">
			<?php if ( function_exists( 'get_field' ))
				{ ?>
					<div class="contact-page-location location-01">
						<h3>
							<?php if( get_field( 'location_title_1')):
							the_field( 'location_title_1' );
							endif;?>
						</h3>
						<p>
							<?php if( get_field( 'location_address_1')):
							the_field( 'location_address_1' );
							endif;?>
						</p>
						<p>
							<?php if( get_field( 'location_hours_1')):
							echo do_shortcode (get_field( 'location_hours_1' ));
							endif;?>
						</p>
					</div><!-- End contact-box-location-1 -->

					<div class="contact-page-location location-02">
						<h3> 
							<?php if( get_field( 'location_title_2')):
							the_field( 'location_title_2' );
							endif;?>
						</h3>
						<p> 
							<?php if( get_field( 'location_address_2')):
							the_field( 'location_address_2' );
							endif;?>
						</p>
						<p>
							<?php if( get_field( 'location_hours_2')):
							echo do_shortcode (get_field( 'location_hours_2' ));
							endif;?>
						</p>
					</div><!-- End contact-box-location-2 -->

					<div class="contact-page-location location-03">
						<h3>
							<?php if( get_field( 'location_title_3')):
							the_field( 'location_title_3' );
							endif;?>
						</h3>
						<p>
							<?php if( get_field( 'location_address_3')):
							the_field( 'location_address_3' );
							endif;?>
						</p>
						<p>
							<?php if( get_field( 'location_hours_3')):
							echo do_shortcode (get_field( 'location_hours_3' ));
							endif;?>
						</p>
					</div><!-- End contact-box-location-3 -->
			<?php 
				}  // End of IF statement
			?>
		</section><!-- End contact-info -->
		</div><!-- End contact-info-box -->
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
		comments_template();
		endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();