<?php
/**
 * Template part for displaying the Newsletter CTA section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options
$newsletter_cta_headline = get_theme_mod( 'newsletter_cta_headline', __( 'Stay Updated, Join Our Newsletter!', 'fluidcommerce' ) );
$newsletter_cta_subheadline = get_theme_mod( 'newsletter_cta_subheadline', __( 'Get the latest news, special offers, and updates directly in your inbox.', 'fluidcommerce' ) );
$newsletter_cta_placeholder = get_theme_mod( 'newsletter_cta_placeholder', __( 'Enter your email address', 'fluidcommerce' ) );
$newsletter_cta_button_text = get_theme_mod( 'newsletter_cta_button_text', __( 'Subscribe', 'fluidcommerce' ) );

?>

<section id="cta-newsletter" class="homepage-section cta-newsletter-section">
	<div class="container"> <?php // Optional: common container for width ?>
		<div class="cta-newsletter-content">
			<?php if ( ! empty( $newsletter_cta_headline ) ) : ?>
				<h2 class="section-title cta-headline"><?php echo esc_html( $newsletter_cta_headline ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $newsletter_cta_subheadline ) ) : ?>
				<p class="cta-subheadline"><?php echo esc_html( $newsletter_cta_subheadline ); ?></p>
			<?php endif; ?>

			<form class="newsletter-form">
				<label for="newsletter-email" class="screen-reader-text"><?php echo esc_html( $newsletter_cta_placeholder ); ?></label>
				<input type="email" id="newsletter-email" name="email" class="newsletter-email-input" placeholder="<?php echo esc_attr( $newsletter_cta_placeholder ); ?>" required>
				<button type="submit" class="button newsletter-submit-button"><?php echo esc_html( $newsletter_cta_button_text ); ?></button>
			</form>
			<div class="newsletter-form-messages" style="display: none;">
                <p class="success-message"><?php esc_html_e( 'Thanks for subscribing!', 'fluidcommerce' ); ?></p>
                <p class="error-message"><?php esc_html_e( 'Something went wrong. Please try again.', 'fluidcommerce' ); ?></p>
            </div>
		</div>
	</div><!-- .container -->
</section><!-- #cta-newsletter -->
