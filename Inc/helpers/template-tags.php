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

function matthew_cv_posted_by() {
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'Matthew-CV'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline text-secondary"> ' . $byline . '</span>';
}

function matthew_cv_excerpt( $trim_character_count = 0 ){
    if (! has_excerpt() || 0 === $trim_character_count ) {
        the_excerpt();
        return;
    }
    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = mb_substr($excerpt, 0, $trim_character_count);
    $excerpt = mb_substr($excerpt, 0, strpos($excerpt, ' ')); // Ensure we don't cut off in the middle of a word.
    echo $excerpt . '...';
}

function matthew_cv_excerpt_more( $more = '' ) {
    if ( ! is_single() ) {
       $more = sprintf('<button class = "btn btn-info"><a class = "matthew-cv-read-more text-white" href="%1$s">%2$s</a></button>',
            get_permalink( get_the_ID() ),
            __('Continue reading', 'Matthew-CV')
        );
    }

    return $more;
}

function matthew_cv_pagination() {
$allowed_tags = [
    'span' => [
        'class' => [],
    ],
    'a' => [
        'class' => [],
        'href' => [],
    ],
];
$args = [
    'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
    'after_page_number' => '</span>',
];
    printf('<nav class = "matthew-cv-pagination clearfix " role="navigation">%s</nav>', wp_kses_post( paginate_links($args), $allowed_tags )
    );
}