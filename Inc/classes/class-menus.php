<?php
/**
 * Menus Class
 * 
 * @package Matthew_CV
 */

namespace Matthew_CV\Inc;

use Matthew_CV\Inc\Traits\Singleton;

class Menus {

    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action('init', [ $this, 'register_menus' ]);
    }

    public function register_menus() {

        register_nav_menus([
            'matthew-header-menu' => esc_html__('Primary Menu', 'matthew-cv'),
            'matthew-footer-menu' => esc_html__('Footer Menu', 'matthew-cv'),
        ]);

    }

    /**
     * Get menu ID by location
     *
     * @param string $location Menu location
     *
     * @return string Menu ID
     */
    public function get_menu_id($location) {

    // Get all the locations
        $locations = get_nav_menu_locations();
// Get object id by location
        $menu_id = $locations[$location] ?? '';
// Return menu id
        return !empty($menu_id) ? $menu_id : '';

    }

    /**
     * Get child menu items
     *
     * @param array $menu_items Menu items
     * @param int $parent_id Parent menu item ID
     *
     * @return array Child menu items
     */
    public function get_child_menu_items($menu_array, $parent_id) {

        $child_menu = [];

        if (!empty($menu_array) && is_array($menu_array)) {

            foreach ($menu_array as $menu) {

                if (intval($menu  ->menu_item_parent) === $parent_id)
                 {
                    array_push($child_menu, $menu);

                }

            }
 
        }

        return $child_menu;
    }

}
?>