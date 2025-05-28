<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays the custom homepage.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package FluidCommerce
 */

get_header();
?>

	<main id="primary" class="site-main homepage-main">

		<?php
		get_template_part( 'template-parts/homepage/section-hero' );
		get_template_part( 'template-parts/homepage/section-featured-products' );
		get_template_part( 'template-parts/homepage/section-categories' );
		get_template_part( 'template-parts/homepage/section-testimonials' );
		get_template_part( 'template-parts/homepage/section-cta-newsletter' );
		get_template_part( 'template-parts/homepage/section-cta-offer' );
		?>

	</main><!-- #primary -->

<?php
get_footer();
```
