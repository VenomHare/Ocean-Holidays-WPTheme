<?php
    // Arguments for WP_Query to fetch tours with "upcoming" tag in the meta array
    $args = array(
        'post_type'      => 'tour',         // Only fetch posts of type 'tour'
        'post_status'    => 'publish',      // Only fetch published posts
        'posts_per_page' => 3,             // 3 posts
        'meta_query'     => array(
            array(
                'key'     => '_custom_meta_array',   // The meta key for the custom meta array
                'value'   => 'upcoming',             // The value to check (the 'upcoming' tag)
                'compare' => 'LIKE',                 // Compare using LIKE to search within the array
            ),
        ),
    );

    // Query the database
    $tour_query = new WP_Query($args);

    // Check if any tours were found
    if ($tour_query->have_posts()) {
        while ($tour_query->have_posts()) {
            $tour_query->the_post(); // Set up post data

            $post_id = get_the_ID();

            $price = get_post_meta( $post_id, 'yatra_tour_meta_regular_price', true );
            $saleprice = get_post_meta( $post_id, 'yatra_tour_meta_sales_price', true );
            $per = get_post_meta( $post_id, 'yatra_tour_meta_price_per', true );
            
            // Output the tour title (or any other post data you want)
            echo '<a href="'.get_permalink( get_the_ID()).'" class="TourDisplay">';
                echo '<img class="TourDisplayImg" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" />';
                echo '<div class="TourDisplayInfo">';
                    echo '<div class="TourDisplayTitle">'.get_the_title().'</div>';
                    if (empty($saleprice))
                    {
                        echo "<div>₹".$price." per $per</div>";
                    }
                    else
                    {
                        echo "<s class='striked-am'>₹".$price." per $per</s>";
                        echo "<div>₹".$saleprice." per ".$per." </div>";
                    }
                    echo "<div class='h-seperator'></div>";
                    echo "<div>View Details</div>";
                echo '</div>';
            echo '</a>';
        }
    } else {
        echo '<p class="text-2xl font-poppin">No upcoming tours found.</p>';
    }

    // Reset the post data to avoid conflicts
    wp_reset_postdata();
?>