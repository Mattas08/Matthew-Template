<?php 
/**
 * Theme Functions
 * 
 * @package Matthew_CV
 */

if ( ! defined('MATTHEW_CV_DIR_PATH') ) {
    define('MATTHEW_CV_DIR_PATH', untrailingslashit(get_template_directory()));
}

if ( ! defined('MATTHEW_CV_DIR_URI') ) {
    define('MATTHEW_CV_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if ( ! defined('MATTHEW_CV_BUILD_URI') ) {
    define('MATTHEW_CV_BUILD_URI', untrailingslashit(get_template_directory_uri()). '/Assets/Build');
}

if ( ! defined('MATTHEW_CV_BUILD_JS_URI') ) {
    define('MATTHEW_CV_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()). '/Assets/Build/js');
}

if ( ! defined('MATTHEW_CV_BUILD_JS_DIR_PATH') ) {
    define('MATTHEW_CV_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/Assets/Build/js');
}

if ( ! defined('MATTHEW_CV_BUILD_CSS_URI') ) {
    define('MATTHEW_CV_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()). '/Assets/Build/css');
}

if ( ! defined('MATTHEW_CV_BUILD_CSS_DIR_PATH') ) {
    define('MATTHEW_CV_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/Assets/Build/css');
}




/**
 * Webpack build paths (FIXED)
 */
if ( ! defined('MATTHEW_CV_BUILD_URI') ) {
    define('MATTHEW_CV_BUILD_URI', MATTHEW_CV_DIR_URI . '/Assets/Build');
}

if ( ! defined('MATTHEW_CV_BUILD_PATH') ) {
    define('MATTHEW_CV_BUILD_PATH', MATTHEW_CV_DIR_PATH . '/Assets/Build');
}

/**
 * Load core files
 */
require_once MATTHEW_CV_DIR_PATH . '/inc/helpers/autoloader.php';
require_once MATTHEW_CV_DIR_PATH . '/inc/helpers/template-tags.php';

/**
 * Init theme
 */
function matthew_cv_get_theme_instance() {
    \Matthew_CV\Inc\MATTHEW_CV_THEME::get_instance();
}

matthew_cv_get_theme_instance();