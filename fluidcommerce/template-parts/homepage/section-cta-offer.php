<?php
/**
 * Template part for displaying the Special Offer CTA section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options
$offer_cta_headline = get_theme_mod( 'offer_cta_headline', __( 'Exclusive Offer This Week!', 'fluidcommerce' ) );
$offer_cta_description = get_theme_mod( 'offer_cta_description', __( 'Discover our limited-time collection with special discounts. Don\'t miss out!', 'fluidcommerce' ) );
$offer_cta_button_text = get_theme_mod( 'offer_cta_button_text', __( 'Shop the Offer', 'fluidcommerce' ) );
$offer_cta_button_url = get_theme_mod( 'offer_cta_button_url', esc_url( home_url( '/shop/sale/' ) ) ); // Example link
$offer_cta_image_url = get_theme_mod( 'offer_cta_image_url', get_template_directory_uri() . '/assets/images/placeholder-cta-offer.jpg' ); // Placeholder image

?>

<section id="cta-offer" class="homepage-section cta-offer-section">
	<div class="cta-offer-container <?php // Potentially add classes here for layout, e.g., 'split-layout-image-right' or 'split-layout-image-left' ?>">
		<div class="cta-offer-image-column" style="background-image: url('<?php echo esc_url( $offer_cta_image_url ); ?>');">
			<?php // Image is used as a background for the column, or you can use an <img> tag below ?>
			<?php /* <img src="<?php echo esc_url( $offer_cta_image_url ); ?>" alt="<?php echo esc_attr( $offer_cta_headline ); ?>"> */ ?>
		</div>
		<div class="cta-offer-content-column">
			<div class="cta-offer-content">
				<?php if ( ! empty( $offer_cta_headline ) ) : ?>
					<h2 class="section-title cta-headline"><?php echo esc_html( $offer_cta_headline ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $offer_cta_description ) ) : ?>
					<p class="cta-description"><?php echo wp_kses_post( $offer_cta_description ); // Using wp_kses_post for safety if HTML is allowed ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $offer_cta_button_text ) && ! empty( $offer_cta_button_url ) ) : ?>
					<a href="<?php echo esc_url( $offer_cta_button_url ); ?>" class="button cta-button"><?php echo esc_html( $offer_cta_button_text ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .cta-offer-container -->
</section><!-- #cta-offer -->
```
