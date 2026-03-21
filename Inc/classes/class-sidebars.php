<?php
/**
 * Class to register sidebars and widget areas for the theme.
 * 
 * @package Matthew_CV
 */



namespace Matthew_CV\Inc; // Namespace declaration

// Use the Singleton trait for this class
class Sidebars {

    use Traits\Singleton;

    // Constructor method to set up hooks
    protected function __construct() {
        $this->setup_hooks();
    }
// Method to set up WordPress hooks for enqueuing styles and scripts
    protected function setup_hooks() {
         // Hook into the 'widgets_init' action to register sidebars
        add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
    }

    public function register_sidebars() {
        // Register the main sidebar
        register_sidebar( [
            'name'          => esc_html__( 'Main Sidebar', 'matthew-cv' ),
            'id'            => 'main-sidebar',
            'description'   => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'matthew-cv' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title h5 mb-3">',
            'after_title'   => '</h2>',
        ] );
    }
}
?>