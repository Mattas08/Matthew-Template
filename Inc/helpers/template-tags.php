<?php 
/**
 * Custom template tags for this theme
 * 
 * @package Matthew_CV
 */

/**
 * Returns a custom post thumbnail
 * 
 * @param int $post_id The post ID.
 * @param string $size The image size.
 * @param array $additional_attributes Additional attributes for the image tag.
 * @return string The custom post thumbnail HTML.
 */
function get_the_custom_post_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []) {
$custom_thumbnail = '';
    // If no post ID is provided, use the current post
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    // If the post has a featured image
    if ( has_post_thumbnail($post_id) ) {

        $default_attributes = [
            'loading' => 'lazy',
        ];

        $attributes = array_merge($default_attributes, $additional_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes
        );
    }

    // Return empty string if no thumbnail exists
    return $custom_thumbnail;
}

/**
 * Displays a custom post thumbnail
 *
 * @param int $post_id The post ID.
 * @param string $size The image size.
 * @param array $additional_attributes Additional attributes for the image tag.
 * @return void
 */
function the_custom_post_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = []) {
    echo get_the_custom_post_thumbnail($post_id, $size, $additional_attributes);
}

function matthew_cv_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // If modified, show both dates
    if ( get_the_time('U') !== get_the_modified_time('U') ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                        <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'Matthew-CV'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on text-secondary">' . $posted_on . '</span>';
}