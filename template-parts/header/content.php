<?php
/**
 * Content template for displaying posts in the index.php and single.php templates.
 * 
 * @package Matthew_CV
 */
?>
<a href="<?php the_permalink(); ?>">
 <?php get_template_part( 'template-parts/componets/blogs/entry-header' ); ?>
    <?php get_template_part( 'template-parts/componets/blogs/entry-meta' ); ?>
    <?php get_template_part( 'template-parts/componets/blogs/entry-content' ); ?>
    <?php get_template_part( 'template-parts/componets/blogs/entry-footer' ); ?>

</a >
