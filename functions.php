<?php
function fantadu_theme_setup() {
    // Theme-Unterstützung aktivieren
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Menü registrieren
    register_nav_menus([
        'main_menu' => 'Hauptmenü',
        'footer_menu' => 'Footer-Menü'
    ]);
}
add_action('after_setup_theme', 'fantadu_theme_setup');

function fantadu_enqueue_styles() {
    wp_enqueue_style('fantadu-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'fantadu_enqueue_styles');

// Widgets aktivieren
function fantadu_widgets_init() {
    register_sidebar([
        'name'          => 'Haupt-Sidebar',
        'id'            => 'main_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => 'Footer Widget 1',
        'id'            => 'footer_widget_1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => 'Footer Widget 2',
        'id'            => 'footer_widget_2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => 'Footer Widget 3',
        'id'            => 'footer_widget_3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'fantadu_widgets_init');

function fantadu_customizer_settings($wp_customize) {
    // Neue Sektion für das Logo hinzufügen
    $wp_customize->add_section('fantadu_logo_section', array(
        'title'    => __('Logo-Einstellungen', 'fantadu'),
        'priority' => 30,
    ));

    // Logo-Upload ermöglichen
    $wp_customize->add_setting('fantadu_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Logo-Steuerelement hinzufügen
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fantadu_logo', array(
        'label'    => __('Logo hochladen', 'fantadu'),
        'section'  => 'fantadu_logo_section',
        'settings' => 'fantadu_logo',
    )));

    // Logo-Größe-Einstellung hinzufügen (Schieberegler)
    $wp_customize->add_setting('fantadu_logo_width', array(
        'default' => 200,
        'sanitize_callback' => 'absint',
    ));

    
}
add_action('customize_register', 'fantadu_customizer_settings');

function fantadu_customizer_fixed_images($wp_customize) {
    // Sektion für fixe Bilder
    $wp_customize->add_section('fantadu_fixed_images_section', array(
        'title'    => __('Jobs und Kinder Einstellungen', 'fantadu'),
        'priority' => 30,
    ));

    // Erstes Bild
    $wp_customize->add_setting('fantadu_fixed_image_1', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fantadu_fixed_image_1', array(
        'label'    => __('Fixes Bild unten rechts hochladen', 'fantadu'),
        'section'  => 'fantadu_fixed_images_section',
        'settings' => 'fantadu_fixed_image_1',
    )));

    // Link für das erste Bild
    $wp_customize->add_setting('fantadu_fixed_image_link_1', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('fantadu_fixed_image_link_1', array(
        'type'    => 'url',
        'section' => 'fantadu_fixed_images_section',
        'label'   => __('Link für fixes Bild unten rechts', 'fantadu'),
    ));

    // Checkbox für das erste Bild (Ein/Aus)
    $wp_customize->add_setting('fantadu_fixed_image_toggle_1', array(
        'default'           => false,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('fantadu_fixed_image_toggle_1', array(
        'type'    => 'checkbox',
        'section' => 'fantadu_fixed_images_section',
        'label'   => __('Fixes Bild unten rechts anzeigen?', 'fantadu'),
    ));

    // Zweites Bild
    $wp_customize->add_setting('fantadu_fixed_image_2', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fantadu_fixed_image_2', array(
        'label'    => __('Fixes Bild unten links hochladen', 'fantadu'),
        'section'  => 'fantadu_fixed_images_section',
        'settings' => 'fantadu_fixed_image_2',
    )));

    // Link für das zweite Bild
    $wp_customize->add_setting('fantadu_fixed_image_link_2', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('fantadu_fixed_image_link_2', array(
        'type'    => 'url',
        'section' => 'fantadu_fixed_images_section',
        'label'   => __('Link für fixes Bild unten links', 'fantadu'),
    ));

    // Checkbox für das zweite Bild (Ein/Aus)
    $wp_customize->add_setting('fantadu_fixed_image_toggle_2', array(
        'default'           => false,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('fantadu_fixed_image_toggle_2', array(
        'type'    => 'checkbox',
        'section' => 'fantadu_fixed_images_section',
        'label'   => __('Fixes Bild 2 anzeigen?', 'fantadu'),
    ));
}
add_action('customize_register', 'fantadu_customizer_fixed_images');

// Beiträge in wp-admin ausblenden
function remove_posts_menu_for_all() {
    remove_menu_page('edit.php'); // Entfernt "Beiträge"
}
add_action('admin_menu', 'remove_posts_menu_for_all');

// Kommentare in wp-admin ausblenden
function remove_comments_menu_for_all() {
    remove_menu_page('edit-comments.php'); // Entfernt "Kommentare"
}
add_action('admin_menu', 'remove_comments_menu_for_all');

// Kommentare komplett deaktivieren
function fantadu_disable_comments() {
    // Entfernt Kommentare-Support bei allen Post Types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'fantadu_disable_comments');


//Partnerlogos

function fantadu_customizer_partnerlogos($wp_customize) {
    $wp_customize->add_section('fantadu_partnerlogos_section', array(
        'title'    => __('Partnerlogos im Footer', 'fantadu'),
        'priority' => 35,
    ));

    for ($i = 1; $i <= 4; $i++) {
        // Bild
        $wp_customize->add_setting("fantadu_partner_logo_$i", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "fantadu_partner_logo_$i", array(
            'label' => __("Partnerlogo $i", 'fantadu'),
            'section' => 'fantadu_partnerlogos_section',
            'settings' => "fantadu_partner_logo_$i",
        )));

        // Link
        $wp_customize->add_setting("fantadu_partner_logo_link_$i", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("fantadu_partner_logo_link_$i", array(
            'type' => 'url',
            'label' => __("Link für Partnerlogo $i", 'fantadu'),
            'section' => 'fantadu_partnerlogos_section',
        ));
    }
}
add_action('customize_register', 'fantadu_customizer_partnerlogos');
