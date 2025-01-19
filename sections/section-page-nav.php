<header>
    <nav class="w-[100svw] h-fit fixed z-20">
        <div class="w-[100svw] h-[13svh] bg-white flex items-center justify-between max-lg:px-6 overflow-hidden px-[10svw] z-50">
            <a href="<?php echo get_site_url(null, '/'); ?>" class="">
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
            <div class="max-lg:hidden w-[80%] h-full flex justify-center items-center gap-4">
                <?php
    
                    function get_template_rendering_url() {
                        global $post; // Access the current post object
    
                        if (is_front_page()) {
                            return home_url('/'); // Front page URL
                        } elseif (is_home()) {
                            return get_permalink(get_option('page_for_posts')); // Blog page URL
                        } elseif (is_single() || is_page()) {
                            return get_permalink($post); // Single post or page URL
                        } elseif (is_category()) {
                            return get_category_link(get_queried_object_id()); // Category archive URL
                        } elseif (is_tag()) {
                            return get_tag_link(get_queried_object_id()); // Tag archive URL
                        } elseif (is_author()) {
                            return get_author_posts_url(get_the_author_meta('ID')); // Author archive URL
                        } elseif (is_archive()) {
                            return get_post_type_archive_link(get_post_type()); // Custom post type archive URL
                        } elseif (is_search()) {
                            return get_search_link(); // Search results page URL
                        } elseif (is_404()) {
                            return home_url('/404'); // 404 page URL
                        } else {
                            return home_url(add_query_arg([], $wp->request)); // Default fallback URL
                        }
                    }
    
                    $current_url = get_template_rendering_url();
    
                    $menu_items = json_decode(get_option('custom_menu_items', '[]'), true);
    
                    if (is_array($menu_items)) {
                        foreach ($menu_items as $item) {
                            $label = esc_html($item['label']);
                            $url = esc_url($item['url']);
                            if ($url == $current_url)
                            {
                                echo "<div class='p-3 text-lg rounded bg-primary text-white hover:text-gray-400'>{$label}</div>";
                            }
                            else{
                                echo "<a href='{$url}' class='p-3 text-lg  rounded  hover:text-gray-400'>{$label}</a>";
                            }
                        }
                    }
                ?>
            </div>
            <div id="menubtn" class="hidden max-lg:block" >
                <i class="fa-solid fa-bars text-2xl"></i>
            </div>
        </div>
        <div id="menuobject" class="animate-slideInFromTopFast w-full h-fit bg-menubg flex-col hidden">
            <?php
                $current_url = get_template_rendering_url();

                $menu_items = json_decode(get_option('custom_menu_items', '[]'), true);

                if (is_array($menu_items)) {
                    foreach ($menu_items as $item) {
                        $label = esc_html($item['label']);
                        $url = esc_url($item['url']);
                        if ($url == $current_url)
                        {
                            echo "<div class='p-3 text-lg rouded bg-primary text-white hover:text-gray-400'>{$label}</div>";
                        }
                        else
                        {
                            echo "<a href='{$url}' class='p-3 text-lg border-b-[#4f4f4f] border-b-[1px] hover:text-gray-400'>{$label}</a>";
                        }
                    }
                }
            ?>
        </div>
    </nav>
    <!-- DUMMY -->
    <div class="w-[100svw] h-[13svh] bg-white">
    </div>
</header>