<?php 
/**
 * Template part for displaying entry content in blogs.
 * 
 * To be used in the loop of blog posts to display the content of each post. It includes the main content and pagination for multi-page posts.
 *
 * @package Matthew_CV
 */ 
?>
<div class="entry-content">
   <?php
    /**
     * For single post views, display the full content of the post. For other views (like archives), display the excerpt. 
      * The "Continue reading" link is included for screen readers to provide context about the post title when navigating through excerpts.
     */
    if ( is_single()){
    the_content(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers. */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'matthew-cv' ),
                array(
                    'span' => array(  // Allow only <span> tags with a class attribute for screen readers.
                        'class' => array(), // Allow the 'class' attribute for <span> tags.
                    ),
                )
            ),
            the_title('<span class="screen-reader-text">"' , '"</span>') // Get the title of the current post to include in the "Continue reading" link for screen readers.
        )
    );

    wp_link_pages( // Display pagination for multi-page posts.
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'matthew-cv' ),
            'after'  => '</div>',
        )
    );
    } else {
        matthew_cv_excerpt(20); // For non-single views (like archives), display the excerpt instead of the full content.
        echo matthew_cv_excerpt_more(); // Add a "Continue reading" link after the excerpt for non-single views.
    }
    ?>
    </div>