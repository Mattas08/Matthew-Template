<?php 
/**
 * Theme Functions
 * 
 * @package Matthew_CV
 */

if (! defined('MATTHEW_CV_DIR_PATH')){
    define('MATTHEW_CV_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (! defined('MATTHEW_CV_DIR_URI')){

    define('MATTHEW_CV_DIR_URI', untrailingslashit(get_template_directory_uri()));
}


require_once MATTHEW_CV_DIR_PATH . '/inc/helpers/autoloader.php'; // Autoloader for classes
require_once MATTHEW_CV_DIR_PATH . '/inc/helpers/template-tags.php'; // Custom template tags for the theme

function matthew_cv_get_theme_instance(){
    \Matthew_CV\Inc\MATTHEW_CV_THEME::get_instance();
}   

matthew_cv_get_theme_instance();

?>

