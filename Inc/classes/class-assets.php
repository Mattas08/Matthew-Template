<?php 
/**
 * Bootstrap the theme's assets
 * 
 * @package Matthew_CV
 */

namespace Matthew_CV\Inc;

class Assets{
    use Traits\Singleton;
   
      protected function __construct(){

        $this->setup_hooks();
    }

    protected function setup_hooks(){
        //Actions and filters will be registered here
        add_action('wp_enqueue_scripts' , [ $this, 'register_styles']);
    }

    // public function to register styles
     public function register_styles(){
        //Register styles
    wp_register_style('stylesheet' , get_stylesheet_uri() , [] , filemtime( MATTHEW_CV_DIR_PATH . '/style.css'), 'all' );
    wp_register_style('bootstrap-css', MATTHEW_CV_DIR_URI . '/Assets/src/libary/css/bootstrap.min.css' , [] , false, 'all' );

     //Enqueue styles
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('bootstrap-css');


    }

    // public function to register scripts
    public function register_scripts(){
     //Register scripts   
    wp_register_script('main-js' , MATTHEW_CV_DIR_URI  . '/Assets/main.js' , [] , filemtime( MATTHEW_CV_DIR_PATH . '/Assets/main.js'), true  );
    wp_register_script('boostrap-js' , MATTHEW_CV_DIR_URI  . '/Assets/src/libary/js/bootstrap.min.js' , ['jquery'] , false , true  );
      
     //Enqueue styles
    wp_enqueue_script('main-js');
    wp_enqueue_script('boostrap-js');
    }
}
?>