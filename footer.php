<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakehouse
 */

?>

	</div><!-- #content -->

<footer id="colophon" class="site-footer">
<div class="footer-details">   
	<div class="inner-width">
		<?php
			if( !is_page( 'contact'))
			{
				if( function_exists( 'get_field'))
				{
					?>
					<div class="contact-box">
						<div class="contact-box-location-1">
						<?php
						if( get_field( 'contact_address_location_1', 75))
						{
							get_template_part('images/location');
							the_field( 'contact_address_location_1', 75);
						}
						?>
						</div>
						<div class="contact-box-location-2">
						<?php
						if( get_field( 'contact_address_location_2', 75))
						{
							get_template_part('images/location');
							the_field( 'contact_address_location_2', 75);
						}
						?>
						</div>
						<div class="contact-box-location-3">
						<?php
						if( get_field( 'contact_address_location_3', 75))
						{
							get_template_part('images/location');
							the_field( 'contact_address_location_3', 75);
						}
						?>
						</div>
					</div>
					<?php
				}
			}
		?>
	</div>	



		<div class="site">

			<div class="footer-menus">	</div>
				<div class="site-info">
             
				<?php esc_html_e( 'Created by ', 'twd' ); ?>
					
					<ul>
						<li><a target="_blank" href="http://nha.bcitwebdeveloper.ca/">Nina</a></li>
						<li><a target="_blank" href="http://tcullingham.bcitwebdeveloper.ca/">Tim C</a></li>
						<li><a target="_blank" href="http://sjaiswal.bcitwebdeveloper.ca/">	Sonam</a> </li>
						<li><a target="_blank" href="http://jlee.bcitwebdeveloper.ca/">Jason L</a></li>	
					<ul>
		     
	
				</div><!-- .site-info -->
		</div><!-- .site -->

</div>
			<div class="author-info">
				<a href="www.facebook.com">
					<img src="<?php echo get_template_directory_uri() . '/images/facebook.png' ?>" target="_blank" alt="Facebook"/>
				</a>
			    &nbsp;&nbsp;&nbsp;
                <a href="www.instagram.com">
					<img src="<?php echo get_template_directory_uri() . '/images/instagram.png' ?>" target="_blank" alt="Instagram"/>
				</a>
				&nbsp;&nbsp;&nbsp;
				<a href="www.pinterest.ca">
					<img src="<?php echo get_template_directory_uri() . '/images/pin.png' ?>" target="_blank" alt="Pin-insternt"/>
				</a>	
			</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#top" class="smoothup" id="smoothup" title="Back to top">
	<img src="<?php echo get_template_directory_uri() . '/images/arrow.png' ?>" alt="back to top">
</a>
<?php wp_footer(); ?>


</body>
</html>

