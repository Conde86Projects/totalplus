<?php
/**
 * Template part for displaying Product Categories section on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FluidCommerce
 */

// Placeholder for Customizer options
$categories_section_title = get_theme_mod( 'categories_section_title', __( 'Shop by Category', 'fluidcommerce' ) );
$number_of_categories_to_display = get_theme_mod( 'categories_section_count', 4 ); // Default to 4 categories
// Add options for selecting specific categories or parent category later via Customizer

?>

<section id="product-categories" class="homepage-section product-categories-section">
	<div class="container"> <?php // Optional: common container for width ?>
		<?php if ( ! empty( $categories_section_title ) ) : ?>
			<h2 class="section-title"><?php echo esc_html( $categories_section_title ); ?></h2>
		<?php endif; ?>

		<?php
		if ( class_exists( 'WooCommerce' ) ) {
			$args = array(
				'taxonomy'   => 'product_cat',
				'orderby'    => 'name', // or 'count', 'id', 'slug'
				'order'      => 'ASC',
				'hide_empty' => true, // Set to false to show empty categories
				'number'     => absint( $number_of_categories_to_display ),
				// 'parent'     => 0, // To display only top-level categories
			);
			$product_categories = get_terms( $args );

			if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
			?>
				<div class="categories-grid">
					<?php
					foreach ( $product_categories as $category ) :
						// Get category thumbnail ID
						$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
						// Get URL of the thumbnail image
						$image_url = wp_get_attachment_url( $thumbnail_id );
						// Fallback if no image
						if ( ! $image_url ) {
							// $image_url = wc_placeholder_img_src(); // WooCommerce placeholder
                            $image_url = get_template_directory_uri() . '/assets/images/placeholder-category.jpg'; // Or a theme placeholder
						}
					?>
						<div class="category-item">
							<a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="category-link">
								<div class="category-image-wrapper" style="background-image: url('<?php echo esc_url( $image_url ); ?>');">
									<?php // Could also use an <img> tag here: <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>"> ?>
								</div>
								<div class="category-info">
									<h3 class="category-name"><?php echo esc_html( $category->name ); ?></h3>
									<div class="category-icon-placeholder">
										<?php // Placeholder for a custom icon - could be SVG or font icon added via CSS/JS based on category or a Customizer setting ?>
										<span class="dashicons dashicons-tag"></span> <?php // Example using Dashicons ?>
									</div>
								</div>
							</a>
						</div>
					<?php
					endforeach;
					?>
				</div><!-- .categories-grid -->
			<?php
			else :
				echo '<p>' . esc_html__( 'No product categories found.', 'fluidcommerce' ) . '</p>';
			endif;
		} else {
			echo '<p>' . esc_html__( 'WooCommerce is not active.', 'fluidcommerce' ) . '</p>';
		}
		?>
	</div><!-- .container -->
</section><!-- #product-categories -->

```
