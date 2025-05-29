<?php
/**
 * Template part for displaying the Hero section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options for hero section (e.g., background image, text, button)
$hero_background_image_url = get_theme_mod( 'hero_background_image', get_template_directory_uri() . '/assets/images/placeholder-hero.jpg' ); // Example placeholder
$hero_headline = get_theme_mod( 'hero_headline', __( 'Welcome to FluidCommerce', 'fluidcommerce' ) );
$hero_subheadline = get_theme_mod( 'hero_subheadline', __( 'Discover amazing products that fit your style.', 'fluidcommerce' ) );
$hero_button_text = get_theme_mod( 'hero_button_text', __( 'Shop Now', 'fluidcommerce' ) );
$hero_button_url = get_theme_mod( 'hero_button_url', esc_url( home_url( '/shop/' ) ) ); // Example link to a shop page

?>

<section id="hero" class="homepage-section hero-section" style="background-image: url('<?php echo esc_url( $hero_background_image_url ); ?>');">
	<div class="hero-overlay"></div> <?php // For darkening/tinting the background image for text readability ?>
	<div class="hero-content-container container"> <?php // 'container' class for centered content, if theme uses one ?>
		<div class="hero-content">
			<?php if ( ! empty( $hero_headline ) ) : ?>
				<h1 class="hero-headline animate-on-load"><?php echo esc_html( $hero_headline ); ?></h1>
			<?php endif; ?>
			<?php if ( ! empty( $hero_subheadline ) ) : ?>
				<p class="hero-subheadline animate-on-load"><?php echo esc_html( $hero_subheadline ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $hero_button_text ) && ! empty( $hero_button_url ) ) : ?>
				<a href="<?php echo esc_url( $hero_button_url ); ?>" class="button hero-button animate-on-load"><?php echo esc_html( $hero_button_text ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section><!-- #hero -->
