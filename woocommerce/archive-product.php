<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<div class="about-banner">
<?php
echo wp_get_attachment_image(357, $size='full', true);
?>

<h1 class="menu-banner">Menu</h1>
<a href="<?php echo wc_get_page_permalink( 'catering' ); ?>" class="menu-cta">Need catering? Click here!</a>
</div>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		
			$taxonomy = 'product_cat';
			$terms = get_terms(
				array(
					'taxonomy' => $taxonomy
				)
			);
			?>
			
			<article class="front-page-menu">
				
			<?php

			if($terms && ! is_wp_error($terms) ){
				?><ul id="icon-menu"><?php
				foreach($terms as $term){
				
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					if ( $image ) {
						?> <li > <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>#<?php echo $term->slug; ?>"> <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" /><h4><?php echo $term->name; ?></h4></a> </li>
						<?php
					}
				}//end foreach
				?></ul><?php
			}//end if
			?>
				
			</article>
			<div class="product-menu-display">
			<?php
			if($terms && ! is_wp_error($terms) ){
				foreach($terms as $term){
					$term_args = array(
						'post_type'      => 'product',
						'orderby' => 'title',
						'posts_per_page' => -1,
						'tax_query'      => array(
								array(
									'taxonomy' => $taxonomy,
									'field'    => 'slug',
									'terms'    => $term->slug,
								)
						),
					);
					$term_query = new WP_Query ($term_args);
					if ( $term_query->have_posts() ) {
						//display the term name dynamically
						
						echo '<section class= "categories" id="' . $term->slug . '">';
						echo '<h2 class="category-name">' . $term->name . '</h2>';
						while($term_query->have_posts()){
							$term_query->the_post();
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}//end while
						echo '</section>';
						echo '</article>';
						wp_reset_postdata();
					}// end if
				}//end foreach
			}//end if
	}

	woocommerce_product_loop_end();
	

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?> </div> <?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
