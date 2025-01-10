<?php
// Define a constant array of tags inside the code (static)
define('TOUR_TAGS', ['upcoming', 'featured', 'popular']); // Static array of tags

// Function to display and manage tour tags
function manage_tour_tags_page() {
    // Check if a specific tour is selected for tag management
    $selected_tour_id = isset($_GET['tour_id']) ? intval($_GET['tour_id']) : null;

    if ($selected_tour_id) {
        // Handle form submission for saving tags
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tour_tags_nonce'])) {
            // Verify nonce for security
            if (wp_verify_nonce($_POST['tour_tags_nonce'], 'save_tour_tags')) {
                $tags = [];

                // Check each predefined tag checkbox
                foreach (TOUR_TAGS as $tag) {
                    if (isset($_POST[$tag]) && $_POST[$tag] == '1') {
                        $tags[] = $tag;
                    }
                }

                // Update the meta data for the selected tour
                update_post_meta($selected_tour_id, '_custom_meta_array', $tags);

                echo '<div class="updated"><p>Tags updated successfully for "' . get_the_title($selected_tour_id) . '"!</p></div>';
            } else {
                echo '<div class="error"><p>Invalid nonce. Please try again.</p></div>';
            }
        }

        // Fetch current tags for the selected tour
        $current_tags = get_post_meta($selected_tour_id, '_custom_meta_array', true) ?: [];

        // Display the tag management interface
        ?>
        <div class="wrap">
            <h1>Manage Tags for "<?php echo get_the_title($selected_tour_id); ?>"</h1>
            <form method="POST">
                <?php wp_nonce_field('save_tour_tags', 'tour_tags_nonce'); ?>

                <table class="form-table">
                    <?php foreach (TOUR_TAGS as $tag): ?>
                        <tr>
                            <th scope="row">
                                <label for="<?php echo $tag; ?>">Add Tour to "<?php echo ucfirst($tag); ?>" Tours </label>
                            </th>
                            <td>
                                <input type="checkbox" name="<?php echo $tag; ?>" id="<?php echo $tag; ?>" value="1" <?php checked(in_array($tag, $current_tags)); ?>>
                                <p class="description">Check this box to add this tour to the "<?php echo ucfirst($tag); ?>" list.</p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <?php submit_button('Save Tags'); ?>
            </form>
            <p><a href="<?php echo admin_url('admin.php?page=manage-tour-tags'); ?>">&laquo; Back to Tour Listings</a></p>
        </div>
        <?php
    } else {
        // Fetch all tours for listing
        $args = [
            'post_type'      => 'tour',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        ];
        $tours = get_posts($args);

        ?>
        <div class="wrap">
            <h1>Manage Tour Tags</h1>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">Post ID</th>
                        <th>Tour Title</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tours as $tour): ?>
                        <tr>
                            <td><?php echo $tour->ID; ?></td>
                            <td><?php echo $tour->post_title; ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=manage-tour-tags&tour_id=' . $tour->ID); ?>" class="button">Manage Tags</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

// Hook to add the admin menu
function tour_tags_admin_menu() {
    add_menu_page(
        'Manage Tour Tags',          // Page title
        'Tour Tags',                 // Menu title
        'manage_options',            // Capability
        'manage-tour-tags',          // Menu slug
        'manage_tour_tags_page'      // Callback function
    );
}
add_action('admin_menu', 'tour_tags_admin_menu');
