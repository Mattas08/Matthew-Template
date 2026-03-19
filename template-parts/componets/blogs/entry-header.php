<?php
/**
 * Template part for displaying the entry header in blog posts.
 *
 * @package Matthew_CV
 */ 
$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
$heading_class = ! empty($hide_title) && 'yes' === $hide_title ? 'hide-title' : ' ';
?>

<header class="entry-header mb-3">

    <?php if ($has_post_thumbnail) { ?>
        <div class="entry-thumbnail mb-3">

            <a href="<?php echo esc_url(get_permalink()); ?>">

                <?php 
                the_custom_post_thumbnail(
                    $the_post_id,
                    'featured-thumbnail', 
                    [
                        'sizes' => '(max-width: 322px) 322, 322',
                        'class' => 'attachment-featured-large size-featured-large'
                    ]
                ); 
                ?>

            </a>

        </div>
    <?php } 
    
  
        // Display the post title if it's not hidden
        if ( is_single() || is_page() ) {
            printf(
                '<h1 class="page-title text-dark %1$s">%2$s</h1>',
                esc_attr($heading_class),
                wp_kses_post( get_the_title() ) // Sanitize the title to allow only safe HTML tags
            );
        } else {
            printf(
                '<h2 class="entry-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
                esc_url(get_permalink()),
                wp_kses_post( get_the_title() ) // Sanitize the title to allow only safe HTML tags
            );
        }
        ?>

</header>