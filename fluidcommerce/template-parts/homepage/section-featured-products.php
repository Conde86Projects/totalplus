<?php
/**
 * Template part for displaying the Featured Products section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options
$featured_products_title = get_theme_mod( 'featured_products_title', __( 'Our Featured Products', 'fluidcommerce' ) );
$featured_products_count = get_theme_mod( 'featured_products_count', 8 );
// In a real scenario, you might have options for selecting products by category, tag, or manually.
// For now, we'll just get recent products or products marked as 'featured' if WooCommerce is active.

?>

<section id="featured-products" class="homepage-section featured-products-section">
	<div class="container"> <?php // Optional: common container for width ?>
		<?php if ( ! empty( $featured_products_title ) ) : ?>
			<h2 class="section-title"><?php echo esc_html( $featured_products_title ); ?></h2>
		<?php endif; ?>

		<div class="products-carousel-wrapper"> <?php // Wrapper for carousel library if needed ?>
			<?php
			if ( class_exists( 'WooCommerce' ) ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => absint( $featured_products_count ),
					'orderby'        => 'date', // Or 'rand', 'popularity'
					'order'          => 'DESC',
					// To get actual "featured" products, WooCommerce uses a taxonomy:
					// 'tax_query' => array(
					// array(
					// 'taxonomy' => 'product_visibility',
					// 'field'    => 'name',
					// 'terms'    => 'featured',
					// ),
					// )
				);
				$featured_query = new WP_Query( $args );

				if ( $featured_query->have_posts() ) :
				?>
					<div class="product-carousel"> <?php // This would be targeted by a JS carousel library ?>
						<?php
						while ( $featured_query->have_posts() ) :
							$featured_query->the_post();
							global $product;
						?>
							<div class="carousel-item product-item">
								<div class="product-card">
									<a href="<?php the_permalink(); ?>" class="product-image-link">
										<?php woocommerce_template_loop_product_thumbnail(); // Displays the product thumbnail ?>
									</a>
									<div class="product-info">
										<h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php woocommerce_template_loop_price(); // Displays the product price ?>
										
										<div class="product-actions">
											<?php woocommerce_template_loop_add_to_cart(); // Displays the Add to Cart button ?>
											<button class="button quick-view-button" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">
												<?php esc_html_e( 'Quick View', 'fluidcommerce' ); ?>
											</button>
										</div>
									</div>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .product-carousel -->
				<?php
				else :
					echo '<p>' . esc_html__( 'No featured products found.', 'fluidcommerce' ) . '</p>';
				endif;
			} else {
				echo '<p>' . esc_html__( 'WooCommerce is not active.', 'fluidcommerce' ) . '</p>';
			}
			?>
		</div><!-- .products-carousel-wrapper -->

	</div><!-- .container -->
</section><!-- #featured-products -->

<?php // Placeholder for Quick View Modal Structure (initially hidden) ?>
<div id="quick-view-modal" class="quick-view-modal" style="display: none;">
	<div class="quick-view-modal-content">
		<button class="quick-view-close-button">&times;</button>
		<div id="quick-view-product-details">
			<?php // Product details will be loaded here via AJAX or JS ?>
			<p><?php esc_html_e( 'Loading product...', 'fluidcommerce' ); ?></p>
		</div>
	</div>
</div>
