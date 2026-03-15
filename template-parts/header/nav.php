<?php 
/**
 * Header navigation template
 * @package Matthew_CV
 */

// Get menu items for header menu
$menu_class = \Matthew_CV\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('matthew-header-menu'); // Get menu ID by location
$header_menus = wp_get_nav_menu_items($header_menu_id); // Get menu items by menu ID
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container">

<?php
// Display the custom logo if it's set
if ( function_exists('the_custom_logo') ) {
    the_custom_logo();
}
?>

<button class="navbar-toggler" type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent"
aria-expanded="false"
aria-label="Toggle navigation">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<?php if ( !empty($header_menus) && is_array($header_menus) ) : ?>

<ul class="navbar-nav me-auto">

<?php foreach ($header_menus as $menu_item) : ?>

<?php if ( !$menu_item->menu_item_parent ) :

$child_menu = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
$has_child_menu = !empty($child_menu) && is_array($child_menu);

?>

<?php if ( !$has_child_menu ) : ?>

<li class="nav-item">
<a class="nav-link"
href="<?php echo esc_url($menu_item->url); ?>">
<?php echo esc_html($menu_item->title); ?>
</a>
</li>

<?php else : ?>

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle"
href="#"
id="dropdown-<?php echo $menu_item->ID; ?>"
role="button"
data-bs-toggle="dropdown"
aria-expanded="false">

<?php echo esc_html($menu_item->title); ?>

</a>

<ul class="dropdown-menu"
aria-labelledby="dropdown-<?php echo $menu_item->ID; ?>">

<?php foreach ($child_menu as $child_menu_item) : ?>

<li>
<a class="dropdown-item"
href="<?php echo esc_url($child_menu_item->url); ?>">
<?php echo esc_html($child_menu_item->title); ?>
</a>
</li>

<?php endforeach; ?>

</ul>

</li>

<?php endif; ?>

<?php endif; ?>

<?php endforeach; ?>

</ul>

<?php endif; ?>

<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Search">
<button class="btn btn-outline-success" type="submit">Search</button>
</form>

</div>
</div>
</nav>