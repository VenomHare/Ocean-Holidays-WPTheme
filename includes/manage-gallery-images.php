<?php
// Callback function for the menu page
function image_manager_page() {
    ?>
    <div class="wrap">
        <h1>Image Manager</h1>
        <form method="post" action="options.php">
            <?php
            // Register settings
            settings_fields('image_manager_settings');
            do_settings_sections('image-manager');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function image_manager_settings() {
    // Register a new setting
    register_setting('image_manager_settings', 'gallery_images');

    // Add a section
    add_settings_section(
        'image_manager_section',
        'Manage Images',
        'image_manager_section_callback',
        'image-manager'
    );

    // Add a field
    add_settings_field(
        'image_urls_field',
        'Select Images',
        'image_urls_field_callback',
        'image-manager',
        'image_manager_section'
    );
}
add_action('admin_init', 'image_manager_settings');

// Section callback
function image_manager_section_callback() {
    echo '<p>Select and manage images from the Media Library.</p>';
}

function image_urls_field_callback() {
    $images = get_option('gallery_images', []); // Get saved images
    ?>
    <div id="image-fields">
        <?php if (!empty($images)) : ?>
            <?php foreach ($images as $image) : ?>
                <div class="image-wrapper">
                    <img src="<?php echo esc_url($image); ?>" style="max-width: 150px;" />
                    <input type="hidden" name="gallery_images[]" value="<?php echo esc_url($image); ?>">
                    <button type="button" class="remove-image button">Remove</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button type="button" id="add-images" class="button">Add Images</button>
    <script>
        (function($) {
            $(document).ready(function() {
                $('#add-images').on('click', function(e) {
                    e.preventDefault();

                    // Check the current number of images
                    var currentCount = $('#image-fields .image-wrapper').length;
                    var maxImages = 10;

                    if (currentCount >= maxImages) {
                        alert(`You can only add up to ${maxImages} images.`);
                        return;
                    }

                    var frame = wp.media({
                        title: 'Select Images',
                        button: {
                            text: 'Add Images'
                        },
                        multiple: true // Allow multiple selection
                    });

                    frame.on('select', function() {
                        var selection = frame.state().get('selection');
                        selection.each(function(attachment) {
                            if (currentCount >= maxImages) {
                                alert(`You can only add up to ${maxImages} images.`);
                                return false; // Exit loop when limit is reached
                            }

                            attachment = attachment.toJSON();
                            $('#image-fields').append(`
                                <div class="image-wrapper">
                                    <img src="${attachment.url}" style="max-width: 150px;" />
                                    <input type="hidden" name="gallery_images[]" value="${attachment.url}">
                                    <button type="button" class="remove-image button">Remove</button>
                                </div>
                            `);
                            currentCount++; // Increment image count
                        });
                    });

                    frame.open();
                });

                // Handle image removal
                $('#image-fields').on('click', '.remove-image', function(e) {
                    e.preventDefault();
                    $(this).closest('.image-wrapper').remove();

                    // Update image count after removal
                    var currentCount = $('#image-fields .image-wrapper').length;
                });
            });
        })(jQuery);
    </script>
    <?php
}
?>
