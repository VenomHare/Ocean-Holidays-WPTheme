<div class="w-[75%] h-[60svh] flex justify-center items-center gap-2 max-lg:w-full max-lg:flex-col max-lg:h-auto">
<?php
    // Arguments for WP_Query to fetch tours with "upcoming" tag in the meta array
    $args = array(
        'post_type'      => 'destination',         // Only fetch posts of type 'tour'
        'post_status'    => 'publish',      // Only fetch published posts
        'posts_per_page' => 6,             // 3 posts
    );

    // Query the database
    $tour_query = new WP_Query($args);

    // Check if any tours were found
    if ($tour_query->have_posts()) {
        while ($tour_query->have_posts()) {
            $tour_query->the_post(); // Set up post data
            // Output the tour title (or any other post data you want)
            if (!has_post_thumbnail()){
                continue;
            }
            /*
            *   Desktop Ui
            */
            echo '<a href="'.get_permalink( get_the_ID()).'" class="visible max-lg:hidden h-full basis-0 flex-grow hover:flex-grow-3 transition-all duration-300 relative group">';
                echo "<img class=' rounded-xl h-full w-auto object-cover' src='".get_the_post_thumbnail_url()."' alt='Destination Thumbnail'>";
                echo "<div class='w-full absolute bottom-[20%] py-2 text-white text-3xl font-semibold text-center bg-primaryA opacity-0 group-hover:opacity-100 transition-opacity duration-300'>".get_the_title()."</div>";
            echo '</a>';
            /*
            *   Mobile Ui
            */
            echo '<a href="'.get_permalink( get_the_ID()).'" class="hidden max-lg:block w-[90%] max-h-[35svh] relative">';
                echo "<img src='".get_the_post_thumbnail_url()."' alt='Destination Thumbnail' class='w-full h-full max-h-[35svh] max-lg:h-auto rounded-lg object-cover'/>";
                echo "<div class='absolute px-4 py-2 bg-primaryA text-white rounded bottom-0 text-xl'>".get_the_title()."</div>"; 
            echo '</a>';
        }
    } else {
        echo '<p class="text-2xl font-poppin">No Destinations Posts Found.</p>';
    }

    // Reset the post data to avoid conflicts
    wp_reset_postdata();
?>
</div>