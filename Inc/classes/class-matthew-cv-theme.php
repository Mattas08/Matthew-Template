<?php
/**
 * Bootstraps the theme
 *
 * Initializes and sets up the theme by loading necessary files,
 * registering hooks, and configuring theme settings.
 * 
 * @package Matthew_CV
 */

namespace Matthew_CV\Inc; 

use Matthew_CV\Inc\Traits\Singleton;

 class MATTHEW_CV_THEME{
    use Singleton;
    protected function __construct(){
        //Load class.
        Menus::get_instance();
        Assets::get_instance(); 

        $this->setup_hooks();
 }

    protected function setup_hooks(){
        //Actions and filters will be registered here
        add_action('after_setup_theme' , [ $this, 'theme_setup']);
    }   
    public function theme_setup(){
        //Theme supports will be added here
        add_theme_support('title-tag'); //Enables dynamic title tags in the theme
        
        //Enables support for a custom logo in the theme
        add_theme_support('custom-logo', [
            'height' => 80, // Set the desired height for the custom logo
            'width' => 300, // Set the desired width for the custom logo
            'flex-height' => true, // Allow flexible height for the custom logo
            'flex-width' => true, // Allow flexible width for the custom logo
        ]); 

         //Enables support for custom backgrounds in the theme
        add_theme_support('custom-background',[
    'default-color' => 'ffffff', // Set the default background color (optional)
    'default-image' => '', // Set the default background image (optional)   
        ]
        );

        add_theme_support('post-thumbnails'); //Enables support for featured images in posts and pages
    }
 }

?> 