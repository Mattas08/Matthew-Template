<?php
/**
 * Assets Class
 * 
 * @package Matthew_CV
 */



namespace Matthew_CV\Inc; // Namespace declaration

// Use the Singleton trait for this class
class Assets {

    use Traits\Singleton;

    // Constructor method to set up hooks
    protected function __construct() {
        $this->setup_hooks();
    }
// Method to set up WordPress hooks for enqueuing styles and scripts
    protected function setup_hooks() {
        add_action('wp_enqueue_scripts', [ $this, 'register_styles' ]);
        add_action('wp_enqueue_scripts', [ $this, 'register_scripts' ]);
    }
//  Method to register and enqueue stylesheets
    public function register_styles() {
        wp_register_style(
            'bootstrap-css',
            MATTHEW_CV_DIR_URI . '/Assets/src/libary/css/bootstrap.min.css',
            [],
            false,
            'all'
        );
// Register the main theme stylesheet with a dynamic version number based on file modification time for cache busting
        wp_register_style(
            'theme-style',
            get_stylesheet_uri(),
            [],
            filemtime(MATTHEW_CV_DIR_PATH . '/style.css'),
            'all'
        );
// Enqueue the registered styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('theme-style');
    }

    // Method to register and enqueue JavaScript files
    public function register_scripts() {
        // Bootstrap Bundle (includes Popper)
        wp_register_script(
            'bootstrap-js',
            MATTHEW_CV_DIR_URI . '/Assets/src/libary/js/bootstrap.bundle.min.js',
            [],
            false,
            true
        );

        // Main theme JS
        wp_register_script(
            'main-js',
            MATTHEW_CV_DIR_URI . '/Assets/main.js',
            [],
            filemtime(MATTHEW_CV_DIR_PATH . '/Assets/main.js'),
            true
        );
// Enqueue the registered scripts
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('main-js');
    }

}
?>