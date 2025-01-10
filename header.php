<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Pacific Holidays</title>
    <?php wp_head()?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="min-h-svh w-svw overflow-x-hidden ">


    <header class="h-[15svh] w-full bg-slate-50 flex items-center px-[5svw] duration-500 transition max-sm:justify-center">
        <a href="<?php echo get_site_url( null, "/" )?>">
            <?php
                if (function_exists('get_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if (has_custom_logo()) {
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="h-[90%] w-auto">';
                    } else {
                        // Fallback to site title if no logo is set
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                }
            ?>
        </a>
        
    </header>