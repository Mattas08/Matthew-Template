<?php 
/**
 * Template part for a message that posts cannot be found
 * 
 * @package Matthew_CV
 */
?>

<section class="no-results not-found">

    <header class="page-header">
        <h1 class="page-title">
            <?php esc_html_e( 'Nothing Found', 'matthew-cv' ); ?>
        </h1>
    </header>

    <div class="page-content">

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <!-- Message for users who can publish posts -->
            <p>
                <?php 
                printf(
                    wp_kses(
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'matthew-cv' ),
                        [
                            'a' => [ 'href' => [] ]
                        ]
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                ); 
                ?>
            </p>

        <?php elseif ( is_search() ) : ?>

            <!-- Message when search returns no results -->
            <p>
                <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'matthew-cv' ); ?>
            </p>

            <?php get_search_form(); // Display the search form ?>

        <?php else : ?>

            <!-- Message for other pages when no posts are found -->
            <p>
                <?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'matthew-cv' ); ?>
            </p>

            <?php get_search_form(); ?>

        <?php endif; ?>

    </div><!-- .page-content -->

</section><!-- .no-results -->