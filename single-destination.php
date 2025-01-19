<?php
/**
 * Template Name: Upcoming Tours
 * Description: Upcoming Tours template
 */
?>
<?php get_header() ?>
    <div class="w-svw flex justify-around">
        
        <section id="sidebar" class="w-[25svw] max-h-[100%] overflow-y-auto overflow-x-hidden p-2 flex flex-col gap-2 items-center">
            <div class="text-2xl font-bold font-poppin">Upcoming Tours to <?php the_title();?></div>
            <div class="w-full h-full overflow-auto flex flex-col gap-2 p-4 items-center">
                <?php
                    // Get the current taxonomy term (works on taxonomy archive pages)
                    $current_term = get_queried_object();

                    // If the current page is a single post, get its taxonomy term
                    if (is_singular('tour') || is_singular('destination')) {
                        $current_terms = get_the_terms(get_the_ID(), 'destination');
                        if ($current_terms && !is_wp_error($current_terms)) {
                            $current_term = $current_terms[0]; // Use the first term (modify as needed)
                        }
                    }
                    if (!empty($current_term)) {
                        $args = array(
                            'post_type' => 'tour', // Query posts of type 'tour'
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'destination', // The taxonomy slug
                                    'field' => 'term_id',    // Use 'term_id' to match the term
                                    'terms' => $current_term->term_id, // Current term ID
                                ),
                            ),
                            'posts_per_page' => -1, // Fetch all posts (change as needed)
                        );

                        $tour_query = new WP_Query($args);

                        if ($tour_query->have_posts()) {
                            while ($tour_query->have_posts()) {
                                $tour_query->the_post();
                                
                            $post_id = get_the_ID();
        
                            $price = get_post_meta( $post_id, 'yatra_tour_meta_regular_price', true );
                            $saleprice = get_post_meta( $post_id, 'yatra_tour_meta_sales_price', true );
                            $per = get_post_meta( $post_id, 'yatra_tour_meta_price_per', true );
                            $days = get_post_meta( $post_id, 'yatra_tour_meta_tour_duration_days', true );
                            $nights = get_post_meta( $post_id, 'yatra_tour_meta_tour_duration_nights', true );
                                        
                            // Output the tour title (or any other post data you want)
                            echo '<div class="w-[85%] h-auto blue_shadow rounded-2xl flex flex-col items-center gap-4 py-4 max-lg:w-2/5 max-sm:w-[95%]">';
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
                            wp_reset_postdata(); // Reset the query
                        } else {
                            echo 'No tours found for this destination.';
                        }
                    } else {
                        echo 'No destination taxonomy found on this page.';
                    }

                ?>
            </div>
        </section>
        <section id='destination' class="w-[68svw]">
            <div class="text-6xl font-poppin font-bold text-primary py-4"><?php the_title(); ?></div>
            
            <?php if (has_post_thumbnail()): ?>
                <img src="<?php the_post_thumbnail_url('blog-large') ?>" alt="post-thumbnail" class="max-h-[50svh] rounded-lg">
            <?php endif; ?>
    
    
            <p><?php //echo get_the_date('l jS F, Y') ?></p>
            <div class=" font-poppin">
                <?php
                    the_content();
                ?>
            </div>
    
            <?php wp_link_pages() ?>
        </section>
</div>


<?php get_footer(); ?>