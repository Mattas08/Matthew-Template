<?php
/**
 * Content template
 * 
 * @package Matthew_CV
 */
?>
<a href="<?php the_permalink(); ?>">
    <?php the_custom_post_thumbnail(get_the_ID(), 'featured-large'); ?>
</a >
