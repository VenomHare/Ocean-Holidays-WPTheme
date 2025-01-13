<?php
/**
 * Template Name: Upcoming Tours
 * Description: Upcoming Tours template
 */
?>
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

    <?php get_template_part( 'sections/section', "page-nav")?>
    
    
    <section class="w-full h-full bg-white flex flex-col items-center gap-4">
        <div class="text-5xl font-bold text-primary font-poppin text-center">Upcoming Tours</div>
        <?php get_search_form() ?>
        <div class="w-full flex flex-wrap justify-center gap-2 py-5 max-sm:flex-col max-sm:items-center ">
            <?php
                // Arguments for WP_Query to fetch tours with "upcoming" tag in the meta array
                $args = array(
                    'post_type'      => 'tour',         // Only fetch posts of type 'tour'
                    'post_status'    => 'publish',      // Only fetch published posts
                    'posts_per_page' => -1,             // 3 posts
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
                        $days = get_post_meta( $post_id, 'yatra_tour_meta_tour_duration_days', true );
                        $nights = get_post_meta( $post_id, 'yatra_tour_meta_tour_duration_nights', true );
                                    
                        // Output the tour title (or any other post data you want)
                        echo '<div class="w-[25%] h-auto blue_shadow rounded-2xl flex flex-col items-center gap-4 py-4 max-lg:w-2/5 max-sm:w-[95%]">';
                            echo '<img class="w-[90%] h-[60%] object-cover rounded-xl" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" />';
                                echo '<div class="w-full h-full flex flex-col items-center gap-4  ">';
                                    echo '<div class="text-2xl font-bold font-poppin ">'.get_the_title().'</div>';
                                    echo '<div class="w-[90%] h-auto py-1 font-poppin rounded flex items-center justify-evenly gap-2 bg-gray">';
                                        echo "<div class=''>";
                                            echo "<div class=''>$days Days $nights Nights </div>";
                                        echo "</div>";
                                        echo "<div class='h-[5svh] w-[1px] rounded-xl bg-[#000]'></div>";
                                        echo "<div class=''>";
                                            if (empty($saleprice))
                                            {
                                                echo "<div>₹".$price."</div>";
                                            }
                                            else
                                            {
                                                echo "<s class=' text-sm'>₹".$price."</s>";
                                                echo "<div>₹".$saleprice."</div>";
                                            }
                                        echo '</div>';
                                    echo "</div>";
                                    echo '<a href="'.get_permalink(get_the_ID()).'" class="px-3 py-2 rounded text-white bg-primary transition-all hover:scale-105 ">View Details</a>';
                                echo '</div>';
                            echo '</div>';
                    }
                } else {
                    echo '<p class="text-2xl font-poppin">No upcoming tours found.</p>';
                }
    
                // Reset the post data to avoid conflicts
                wp_reset_postdata();
            ?>
        </div>
    </section>
<?php get_footer();?>