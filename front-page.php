<?php get_header();?>

    <section id="hero" class="w-svw h-[82svh] bg-slate-50 flex items-center justify-space-between flex-col gap-[1svh] relative text-center" id="hero">
        <div class=" animate-slideInFromTop font-poppin text-6xl font-normal text-primary z-10 mt-[5svh] max-lg:text-5xl max-md:text-5xl max-sm:text-4xl max-sm:mt-[5svh] ">Let's Travel</div>
        <div class="animate-slideInFromTop font-poppin text-8xl font-bold text-primary z-10 max-lg:text-7xl max-md:text-7xl max-sm:text-6xl ">The World</div>
        <div class="animate-slideInFromTop font-poppin w-[60svw] text-2xl p-2 z-10 max-lg:text-base max-lg:w-[80svw] max-md:text-lg max-sm:text-base">
            Embark on unforgettable journeys with our premier Travel Agency. From dreamy beach escapes to thrilling adventures in exotic destinations, we specialize in crafting personalized travel experiences that cater to your every desire.
        </div>
        <button class="animate-slideInFromTop font-poppin w-1/5 h-[10%] text-white z-10 text-2xl bg-primary rounded-2xl bookanim active:scale-90 max-sm:w-1/2">
            Book Now <i class="fa-solid fa-arrow-right z-10"></i>
        </button>
        <img src="http://localhost/wordpress/wp-content/uploads/2025/01/cropped-1-1.png" alt="Intro Img" class="z-0 absolute bottom-0 w-2/5 h-auto max-lg:w-full max-md:w-[90%] pointer-events-none">
    </section>



    <section id="upcomingTours" class="blue-gradient w-svw min-h-svh flex flex-col justify-flex-start items-center pt-[10svh] gap-[2svh] text-center scroll-p-2.5 overflow-x-hidden ">
        <div class=" scroll-animate opacity-0 translate-y-5 transition-all duration-700 text-5xl font-jost font-bold text-blacktext ">Upcoming Tours</div>
        <div class="text-2xl font-poppin font-normal text-white">Exciting Destinations, Unforgettable Experience</div>
        <div class="w-3/4 h-[60svh] max-lg:w-[90%] max-lg:h-[95%]  max-md:w-full max-md:h-[95%]  max-sm:w-[90s] max-sm:h-full flex justify-center items-center gap-4 max-lg:flex-wrap max-sm:flex-col ">
            <?php get_template_part( "sections/section", "upcoming" );?>
        </div>
        <?php 
            $page_slug = 'upcoming-tours'; 
            $page = get_page_by_path($page_slug);
            $page_url = get_permalink($page->ID);
        ?>
        <a href="<?php echo $page_url?>" class="animate-slideInFromTop font-poppin w-[25%] h-[7.5svh] max-lg:w-1/2 max-lg:h-[5svh] max-md:w-[80%] max-md:h-[5svh] max-sm:w-[80%] max-sm:h-[5svh] flex justify-center items-center gap-1 text-white z-10 text-2xl bg-primary rounded-2xl max-sm:rounded-lg bookanim active:scale-90">
            View More<i class="fa-solid fa-arrow-right z-10"></i>
        </a>
    </section> 

<?php get_footer();?>