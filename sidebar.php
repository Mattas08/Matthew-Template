<?php 
/**
 * The sidebar containing the main widget area.
 * If no active widgets in this sidebar, it will be hidden.
 * 
 * @package Matthew_CV
 */


?>

<aside id="secondary" role="complementary">/
    <?php dynamic_sidebar( 'main-sidebar' ); // Display the widgets in the "Main Sidebar" area. ?>
</aside>