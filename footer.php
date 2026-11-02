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
            <span class="close-fixed-image">&times;</span>
            <a href="<?php echo esc_url($fixed_image_link_1 ? $fixed_image_link_1 : '#'); ?>" target="_blank">
                <img src="<?php echo esc_url($fixed_image_1); ?>" alt="Fixes Bild 1">
            </a>
        </div>
    <?php endif; ?>

    <?php if ($fixed_image_2 && $fixed_image_toggle_2) : ?>
        <div class="fixed-image-container image-2">
            <span class="close-fixed-image">&times;</span>
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
    var menuToggle = document.getElementById('menu-toggle');
    var menu = document.getElementById('main-menu');
    var mobile = window.matchMedia('(max-width: 768px)');
    if (menuToggle && menu) {
        document.documentElement.classList.add('mobile-menu-ready');
        var groups = [];
        menu.querySelectorAll('li').forEach(function(item, index) {
            var link = item.querySelector(':scope > a');
            var submenu = item.querySelector(':scope > ul');
            if (!link || !submenu) return;
            submenu.id = 'fantadu-submenu-' + index;
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'submenu-toggle';
            button.setAttribute('aria-controls', submenu.id);
            button.setAttribute('aria-label', 'Untermenü ' + link.textContent.trim());
            button.textContent = '+';
            item.insertBefore(button, submenu);
            function expand(open) {
                button.setAttribute('aria-expanded', String(open));
                button.textContent = open ? '−' : '+';
                submenu.hidden = mobile.matches && !open;
            }
            button.addEventListener('click', function() {
                expand(button.getAttribute('aria-expanded') !== 'true');
            });
            link.addEventListener('click', function(event) {
                if (mobile.matches && (link.getAttribute('href') === '#' ||
                    link.href === location.href.split('#')[0] + '#')) {
                    event.preventDefault();
                    expand(button.getAttribute('aria-expanded') !== 'true');
                }
            });
            groups.push({ expand: expand });
        });
        function setOpen(open, restoreFocus) {
            menu.classList.toggle('active', open);
            menuToggle.setAttribute('aria-expanded', String(open));
            menuToggle.textContent = open ? '× Menü schließen' : '☰ Menü';
            if (restoreFocus) menuToggle.focus();
        }
        function reset() {
            setOpen(false);
            groups.forEach(function(group) { group.expand(false); });
        }
        menuToggle.addEventListener('click', function() {
            setOpen(!menu.classList.contains('active'));
        });
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && mobile.matches && menu.classList.contains('active')) {
                setOpen(false, true);
            }
        });
        document.addEventListener('click', function(event) {
            if (mobile.matches && !menu.contains(event.target) && !menuToggle.contains(event.target)) setOpen(false);
        });
        menu.addEventListener('click', function(event) {
            if (mobile.matches && event.target.closest('a') && !event.defaultPrevented) setOpen(false);
        });
        mobile.addEventListener('change', reset);
        reset();
    }

    // Fixed-Images Close-Buttons
    document.querySelectorAll('.close-fixed-image').forEach(function(btn) {
        btn.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
