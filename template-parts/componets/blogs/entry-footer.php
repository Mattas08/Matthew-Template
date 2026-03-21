<?php 
/**
 * Template part for entry footer in blogs.
 * 
 * To be used in "The Loop" of blog posts to display the footer of each post.
 * 
 * @package Matthew_CV
 */

$the_post_id = get_the_ID();
$article_terms = get_the_terms( $the_post_id, 'category' ); // Get the categories associated with the current post.

if ( empty($article_terms) || is_wp_error($article_terms) ) {
    return;
}
?>
<div class="entry-footer mt-4">
    <?php foreach ( $article_terms as $term ) : ?>
        <button class="btn border border-secondary mb-3 mr-2">
            <a class="entry-footer-link text-black-50 text-decoration-none"
               href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                <?php echo esc_html( $term->name ); ?>
            </a>
        </button>
    <?php endforeach; ?>
</div>