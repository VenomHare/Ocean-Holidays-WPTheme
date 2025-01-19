<?php

function custom_menu_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Handle saving data
    if (isset($_POST['custom_menu_items'])) {
        update_option('custom_menu_items', json_encode($_POST['custom_menu_items']));
    }

    // Retrieve saved menu data
    $menu_items = json_decode(get_option('custom_menu_items', '[]'), true);

    ?>
    <div class="wrap">
        <h1>Custom Menu Manager</h1>
        <form method="POST" id="custom-menu-form">
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="menu-items-container">
                    <?php if (!empty($menu_items)) : ?>
                        <?php foreach ($menu_items as $index => $item) : ?>
                            <tr>
                                <td><input type="text" name="custom_menu_items[<?php echo $index; ?>][label]" value="<?php echo esc_attr($item['label']); ?>" class="regular-text"></td>
                                <td><input type="text" name="custom_menu_items[<?php echo $index; ?>][url]" value="<?php echo esc_url($item['url']); ?>" class="regular-text"></td>
                                <td><button type="button" class="button remove-item">Remove</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <p>
                <button type="button" id="add-menu-item" class="button">Add Menu Item</button>
            </p>
            <p>
                <button type="submit" class="button button-primary">Save Menu</button>
            </p>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('menu-items-container');
            const addButton = document.getElementById('add-menu-item');

            addButton.addEventListener('click', function () {
                const index = container.children.length;
                const row = `
                    <tr>
                        <td><input type="text" name="custom_menu_items[${index}][label]" class="regular-text"></td>
                        <td><input type="text" name="custom_menu_items[${index}][url]" class="regular-text"></td>
                        <td><button type="button" class="button remove-item">Remove</button></td>
                    </tr>
                `;
                container.insertAdjacentHTML('beforeend', row);
            });

            container.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-item')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
    <?php
}
