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

	<article class="front-page">

	<section class="banner">
		
		<div class="menu-banner">
			<?php
			if( function_exists( 'get_field')) {

			$images = get_field('banner_image');
			$size= 'full';
			if( $images){
				echo wp_get_attachment_image( $images, $size );  
			}

			if( get_field( 'banner_text'))
				{
					?>
					<h1 class="banner-text"><?php the_field( 'banner_text'); ?></h1>
					<?php
				}
			?>
		</div>	

		<div class="slider-banner">
		<div class="slider">
			<?php
				$images = get_field('banner_slideshow_gallary');
				$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
				if( $images ){
						foreach( $images as $image_id )
						{
							echo wp_get_attachment_image( $image_id, $size ); 
						}		
					}
			?>
		</div>
		<div class="slider-text">
			<?php
			 
			 if( get_field( 'banner_slideshow_text'))
				{
					?>
				<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="banner-text"><?php the_field( 'banner_slideshow_text'); ?></a>
				
					
					<?php

				}
			
			?>
		</div>

		</div>
		

	</section>

	<section class="home-info"><?php

			if( get_field( 'home_title'))
				{
					?>
					<h2>
					<?php the_field( 'home_title'); ?>
					</h2>
					<?php
				}
			if( get_field( 'home_info'))
				{
					?> 
					<p> 
					<?php the_field( 'home_info'); ?> 
					</p> 
					<?php
				}
		
			?>
    </section> 
	<section class="front-page-menu">
		<?php
		$taxonomy = 'product_cat';
		$terms = get_terms(
			array(
				'taxonomy' => $taxonomy
			)
		);
		if($terms && ! is_wp_error($terms) ){
			
			foreach($terms as $term){
			
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if ( $image ) {
					?> <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>#<?php echo $term->slug; ?>"> <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" /><h4><?php echo $term->name; ?></h4></a>
					<?php
				}
			}//end foreach
		}//end if
	}
		?>
	</section>
	<section class="cta-home">

	<div class="cta_image">
			
			<?php
			if( function_exists( 'get_field')) {

				$images = get_field('cta_image');
				$size= 'medium';
				if( $images){
					echo wp_get_attachment_image( $images, $size );  
				}
			}
		?>

	</div>


		<div  class="cta_button">
				<?php
				
				if( get_field( 'cta_textbox'))
				{
					?>
					<h2>
					<?php the_field( 'cta_textbox'); ?>
					</h2>
					<?php
				}
				?><?php
				if( get_field( 'cta_button'))
						{
							?>
							<a href="<?php echo get_permalink( get_page_by_title( 'Catering' ) ); ?>" class="cta_button_cater"><?php the_field( 'cta_button'); ?></a>
							<?php
						}
				?>
					
		</div>
		

	</section>
	
	<section class="instagram" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php bakehouse_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bakehouse' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</section><!-- #post-<?php the_ID(); ?> -->

	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
		<?php

		
	endwhile; // End of the loop.

	?>




	</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
