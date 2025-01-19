
<footer class="w-[100svw] min-h-[30svh] blue_shadow_dark flex justify-evenly items-center max-sm:flex-col-reverse overflow-x-hidden gap-5 overflow-hidden max-sm:p-5">
    <div class="w-[35svw] h-[25svh] max-xl:w-[50svw] max-lg:w-[50svw] max-sm:w-[90svw] grow">

        <div class="w-full h-full flex flex-col items-center justify-evenly ">

            <div class="w-full  flex justify-center items-center gap-[3svw]">
                <a href="<?php echo get_site_url(null, '/'); ?>" class="">
                    <?php
                    if (function_exists('get_custom_logo')) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                        if (has_custom_logo()) {
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="h-[13svh] w-auto max-lg:h-auto max-lg:w-[25svw] max-sm:w-[13svw]">';
                        } else {
                            // Fallback to site title if no logo is set
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                    }
                    ?>
                </a>
                <div class="max-w-[20svw] h-auto max-xl:max-w-[45svw] flex flex-col items-start gap-2 max-sm:max-w-[70svw]">
                    <div class="text-2xl font-poppin font-bold max-lg:text-xl">Ocean Pacific Holidays</div>
                    <div class="text-sm font-poppin w-1/2 max-xl:w-2/3 max-lg:w-full">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                    </div>
                </div>
            </div>


            <div class="w-full flex justify-center items-center gap-2 text-lg max-lg:text-sm font-semibold text-graytext">
                <a href="#" class="">Terms and Conditions</a>
                <div>|</div>
                <a href="#" class="">Privacy and Polices </a>
            </div>
        </div>
    </div>
    <div class="max-sm:w-[90svw] max-sm:h-[1px] bg-[#000] rounded"></div>

    <div class="w-auto min-w-[30svw] h-[25svh] flex flex-col max-sm:w-[90svw] items-center gap-4 grow">
        <div class="text-3xl font-bold">Contact Us</div>
        <div class="flex flex-col items-start gap-2">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-mobile-screen text-3xl"></i>
                <div class="font-bold">
                    +91 34234 14249
                </div>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-envelope text-3xl"></i>
                <div class="font-semibold">
                    support@oceanpacificholidays.com
                </div>
            </div>
        </div>
        <div class="flex gap-4 text-3xl">
            <a href="#" class="px-1 rounded bg-skyblue"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="px-1 rounded bg-skyblue"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="#" class="px-1 rounded bg-skyblue"><i class="fa-brands fa-square-twitter"></i></a>
        </div>
    </div>
</footer>

<?php wp_footer()?>
</body>
</html>