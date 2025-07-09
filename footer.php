<footer>
    <nav>
        <?php 
        wp_nav_menu([
            'theme_location' => 'footer_menu',
            'container'      => false,
            'menu_class'     => 'footer-menu'
        ]); 
        ?>
    </nav>
    <div class="footer-widgets">
        <div class="footer-column">
            <?php if (is_active_sidebar('footer_widget_1')) {
                dynamic_sidebar('footer_widget_1');
            } ?>
        </div>
        <div class="footer-column">
            <?php if (is_active_sidebar('footer_widget_2')) {
                dynamic_sidebar('footer_widget_2');
            } ?>
        </div>
        <div class="footer-column">
            <?php if (is_active_sidebar('footer_widget_3')) {
                dynamic_sidebar('footer_widget_3');
            } ?>
        </div>
    </div>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    <?php
$fixed_image_1 = get_theme_mod('fantadu_fixed_image_1');
$fixed_image_link_1 = get_theme_mod('fantadu_fixed_image_link_1');
$fixed_image_toggle_1 = get_theme_mod('fantadu_fixed_image_toggle_1', false);

$fixed_image_2 = get_theme_mod('fantadu_fixed_image_2');
$fixed_image_link_2 = get_theme_mod('fantadu_fixed_image_link_2');
$fixed_image_toggle_2 = get_theme_mod('fantadu_fixed_image_toggle_2', false);
?>

<?php if ($fixed_image_1 && $fixed_image_toggle_1) : ?>
    <div class="fixed-image-container image-1">
        <a href="<?php echo esc_url($fixed_image_link_1 ? $fixed_image_link_1 : '#'); ?>" target="_blank">
            <img src="<?php echo esc_url($fixed_image_1); ?>" alt="Fixes Bild 1">
        </a>
    </div>
<?php endif; ?>

<?php if ($fixed_image_2 && $fixed_image_toggle_2) : ?>
    <div class="fixed-image-container image-2">
        <a href="<?php echo esc_url($fixed_image_link_2 ? $fixed_image_link_2 : '#'); ?>" target="_blank">
            <img src="<?php echo esc_url($fixed_image_2); ?>" alt="Fixes Bild 2">
        </a>
    </div>
<?php endif; ?>
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/fantadusi.png" alt="Fantadusi" class="fantadusi-logo">
<div class="partner-logos">
    <?php for ($i = 1; $i <= 4; $i++):
        $logo = get_theme_mod("fantadu_partner_logo_$i");
        $link = get_theme_mod("fantadu_partner_logo_link_$i");
        if ($logo): ?>
            <a href="<?php echo esc_url($link ?: '#'); ?>" target="_blank" rel="noopener" class="partner-logo">
                <img src="<?php echo esc_url($logo); ?>" alt="Partnerlogo <?php echo $i; ?>">
            </a>
        <?php endif;
    endfor; ?>
</div>
</footer>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var menuToggle = document.getElementById("menu-toggle");
    var menu = document.getElementById("main-menu");

    if (menuToggle && menu) {
        menuToggle.addEventListener("click", function(event) {
            event.preventDefault(); // Verhindert das Neuladen der Seite
            menu.classList.toggle("active");
        });
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
