<?php
/**
 * Template part for displaying the entry header in blog posts.
 *
 * @package Matthew_CV
 */ 
$the_post_id = get_the_ID();
$has_post_thumbnail = has_post_thumbnail($the_post_id);
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
    <?php } ?>
    
    <?php
    /**
     * Display the post title. If the title is hidden,
     * add a class to visually hide it but keep it accessible for screen readers. 
     * For single posts and pages, use an <h1> tag; for other contexts (like archives), 
     * use an <h2> tag with a link to the post.
     * 
     */
    if ( is_single() || is_page() ) { // For single posts and pages, use an <h1> tag without a link.
        printf(
            '<h1 class="page-title text-dark %1$s">%2$s</h1>',
            esc_attr($heading_class),
            wp_kses_post( get_the_title() )
        );
    } else { // For other contexts (like archives), use an <h2> tag with a link to the post.
        printf(
            '<h2 class="entry-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h2>',
            esc_url(get_permalink()),
            wp_kses_post( get_the_title() )
        );
    }
    ?>
</header>