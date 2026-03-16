<?php
/**
 * Register metaboxes
 * 
 * @package Matthew_CV
 */

namespace Matthew_CV\Inc;

use Matthew_CV\Inc\Traits\Singleton;

class Meta_Boxes {

    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action('add_meta_boxes', [ $this, 'add_custom_meta_box' ]);
        add_action('save_post', [ $this, 'save_meta_box_data' ]);
    }

    public function add_custom_meta_box() {

        $screens = ['post',]; // Add the meta box to the 'post' post type. You can add more post types to this array as needed.

        foreach ($screens as $screen) {
            add_meta_box(
                'custom_meta_box_id',
                __('Hide Page Title', 'Matthew-CV'),
                [ $this, 'custom_meta_box_html' ],
                $screen,
                'side',
                'low'
            );
        }
    }

    public function custom_meta_box_html($post) {

        $value = get_post_meta($post->ID, '_hide_page_title', true);

        /**
         * Use wp_nonce_field() to create a nonce field for security. 
         * This helps to verify that the request to save the meta box data is coming from the correct source and prevents unauthorized access.
         */
        wp_nonce_field( plugin_basename( __FILE__ ), 'matthew_hide_title_field_nonce');
        ?>

        <label for="matthew-field"><?php esc_html_e('Hide Page Title', 'Matthew-CV'); ?></label>

        <select name="matthew_hide_title_field" id="matthew-field">

            <option value=""><?php esc_html_e('Select', 'Matthew-CV'); ?></option>

            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e('No', 'Matthew-CV'); ?>
            </option>

            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'Matthew-CV'); ?>
            </option>

        </select>

        <?php
    }

    public function save_meta_box_data($post_id) {

    /**
     * Check if our nonce is set and verify it.
     * This is a security measure to prevent unauthorized access to the meta box data.
     */

        if ( ! current_user_can('edit_post', $post_id) ) {
            return;
        }

        /**
         * Check if the nonce field is set and valid. This ensures that the request to save the meta box data is coming from the correct source and prevents CSRF attacks.
         *
         */

        if ( ! isset($_POST['matthew_hide_title_field_nonce']) || 
                ! wp_verify_nonce($_POST['matthew_hide_title_field_nonce'], plugin_basename( __FILE__ )) ) {
            return;

        $value = sanitize_text_field($_POST['matthew_hide_title_field']); // Sanitize the input to ensure it's safe to save in the database

        update_post_meta($post_id, '_hide_page_title', $value);
    }
} 