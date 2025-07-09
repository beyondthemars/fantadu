<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO & Open Graph für Social Media -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">

	<!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png?v=2">
	
    <!-- Titel dynamisch setzen -->
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <!-- WordPress Header -->
    <?php wp_head(); ?>
</head>
<header>
    <div class="logo-container">
        <?php
        $logo = get_theme_mod('fantadu_logo');
        $logo_width = get_theme_mod('fantadu_logo_width', 200); // Standardwert 200px

        if ($logo) : ?>
            <div class="logo-container">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="site-logo-img">
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Hamburger-Menü-Button -->
    <button id="menu-toggle">☰ Menü</button>

    <!-- Navigation -->
    <nav id="main-menu">
        <?php 
        wp_nav_menu([
            'theme_location' => 'main_menu',
            'container'      => false,
            'menu_class'     => 'nav-menu'
        ]); 
        ?>
    </nav>   
</header>
