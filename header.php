<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="header-container">
        <!-- Logo -->
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="header-search">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search …" value="<?php echo get_search_query(); ?>" name="s" />
                </label>
                <input type="submit" class="search-submit" value="Search" />
            </form>
        </div>

        <!-- Menu -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'main-menu',
                'container' => false,
                'fallback_cb' => false,
            ));
            ?>
        </nav>

        <!-- Ícones -->
        <div class="header-icons">
            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('wishlist')); ?>" class="header-icon">
                    <i class="fas fa-heart"></i>
                </a>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="header-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="header-icon">
                    <i class="fas fa-user"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<div id="content" class="site-content">
</body>
</html> 
