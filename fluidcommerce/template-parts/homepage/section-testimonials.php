<?php
/**
 * Template part for displaying the Testimonials section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options
$testimonials_section_title = get_theme_mod( 'testimonials_section_title', __( 'What Our Customers Say', 'fluidcommerce' ) );

// Placeholder for testimonial data. This would ideally come from a Custom Post Type, Theme Options, or Customizer controls.
// For now, we'll use a static array.
$testimonials = array(
	array(
		'quote'  => __( 'This is the best service I have ever used! The products are top-notch and the support is fantastic. Highly recommended!', 'fluidcommerce' ),
		'name'   => __( 'Jane Doe', 'fluidcommerce' ),
		'role'   => __( 'CEO, ExampleCorp', 'fluidcommerce' ),
		'image'  => get_template_directory_uri() . '/assets/images/placeholder-avatar-1.jpg', // Placeholder avatar
	),
	array(
		'quote'  => __( 'FluidCommerce has transformed our shopping experience. The website is beautiful and so easy to navigate.', 'fluidcommerce' ),
		'name'   => __( 'John Smith', 'fluidcommerce' ),
		'role'   => __( 'Marketing Manager, TechSolutions', 'fluidcommerce' ),
		'image'  => get_template_directory_uri() . '/assets/images/placeholder-avatar-2.jpg', // Placeholder avatar
	),
    array(
		'quote'  => __( 'Amazing quality and fast delivery. I will definitely be shopping here again. Five stars!', 'fluidcommerce' ),
		'name'   => __( 'Alice Brown', 'fluidcommerce' ),
		'role'   => __( 'Freelancer', 'fluidcommerce' ),
		'image'  => '', // Example of no image / use default
	),
);

?>

<section id="testimonials" class="homepage-section testimonials-section">
	<div class="container"> <?php // Optional: common container for width ?>
		<?php if ( ! empty( $testimonials_section_title ) ) : ?>
			<h2 class="section-title"><?php echo esc_html( $testimonials_section_title ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $testimonials ) ) : ?>
			<div class="testimonials-slider-wrapper"> <?php // Wrapper for carousel library if needed ?>
				<div class="testimonial-slider"> <?php // This would be targeted by a JS carousel library ?>
					<?php foreach ( $testimonials as $testimonial ) : ?>
						<div class="testimonial-item">
							<div class="testimonial-content">
								<blockquote class="testimonial-quote">
									<?php echo wp_kses_post( $testimonial['quote'] ); // Using wp_kses_post for safety if HTML is allowed in quotes ?>
								</blockquote>
							</div>
							<div class="testimonial-author">
								<?php if ( ! empty( $testimonial['image'] ) ) : ?>
									<img src="<?php echo esc_url( $testimonial['image'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>" class="testimonial-avatar">
								<?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder-avatar-default.jpg' ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>" class="testimonial-avatar placeholder-avatar">
                                <?php endif; ?>
								<div class="author-info">
									<p class="testimonial-name"><?php echo esc_html( $testimonial['name'] ); ?></p>
									<?php if ( ! empty( $testimonial['role'] ) ) : ?>
										<p class="testimonial-role"><?php echo esc_html( $testimonial['role'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div><!-- .testimonial-slider -->
                <?php // Add navigation arrows/dots for the slider here if needed by the JS library ?>
                <!-- Example:
                <div class="slider-nav">
                    <button class="prev-slide" aria-label="Previous testimonial">&lt;</button>
                    <button class="next-slide" aria-label="Next testimonial">&gt;</button>
                </div>
                -->
			</div><!-- .testimonials-slider-wrapper -->
		<?php else : ?>
			<p><?php esc_html_e( 'No testimonials to display at the moment.', 'fluidcommerce' ); ?></p>
		<?php endif; ?>

	</div><!-- .container -->
</section><!-- #testimonials -->
```
