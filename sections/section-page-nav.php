<header class="w-full h-[13svh] bg-white flex items-center justify-around">
    <a href="<?php echo get_site_url( null, '/');?>" class="">
        <?php
            if (function_exists('get_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                if (has_custom_logo()) {
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="h-[10svh] w-auto">';
                } else {
                    // Fallback to site title if no logo is set
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
            }
        ?>
    </a>
    <div class="w-1/2 h-full">

    </div>
</header>    