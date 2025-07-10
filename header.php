<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
    if (is_page('karriere')) {
    ?>
        <meta name="description" content="Arbeiten im Kinderladen Fantadu e.V. in Kiel Suchsdorf – Jobs mit Herz, Sinn & Kinderlachen.">
        <meta property="og:title" content="Jobs & Karriere | Kinderladen Fantadu">
        <meta property="og:description" content="Arbeiten im Kinderladen Fantadu e.V. in Kiel Suchsdorf – Jobs mit Herz, Sinn & Kinderlachen. Bewirb dich jetzt!">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo get_permalink(); ?>">
        <meta property="og:image" content="https://kila-fantadu.de/wp-content/uploads/2025/07/Opengraph.png">
    <?php
    } else {
    ?>
        <meta name="description" content="Kinderladen Fantadu e.V. in Kiel Suchsdorf – Kita mit Herz, Musik & Natur. Jetzt entdecken!">
        <meta property="og:title" content="Kinderladen Fantadu | Kita in Kiel Suchsdorf">
        <meta property="og:description" content="Der Kinderladen Fantadu e.V. ist deine Kita in Kiel Suchsdorf – liebevoll, kreativ & naturverbunden.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo esc_url(home_url()); ?>">
        <meta property="og:image" content="https://kila-fantadu.de/wp-content/uploads/2025/07/Opengraph.png">
    <?php
    }
    ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png?v=2">

    <!-- Dynamischer Titel -->
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<header>
    <div class="logo-container">
        <?php
        $logo = get_theme_mod('fantadu_logo');
        $logo_width = get_theme_mod('fantadu_logo_width', 200);

        if ($logo) : ?>
            <div class="logo-container">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="site-logo-img">
                </a>
            </div>
        <?php endif; ?>
    </div>

    <button id="menu-toggle">☰ Menü</button>

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
