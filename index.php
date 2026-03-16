<?php 
/**
 * Main template file
 * 
 * @package Matthew_CV
 */
get_header();
?>
      
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php if ( have_posts() ) : ?>
        <div class="container">

            <?php if ( is_home() && ! is_front_page() ) { ?>
            <header class="mb-4">
                <h1 class="page-title screen-reader-text">
                    <?php single_post_title(); ?>
                </h1>
            </header>
            <?php } ?>

            <div class="row g-4"> <!-- g-4 adds spacing between columns -->

                <?php while ( have_posts() ) : the_post(); ?>
                    <!-- Each post is its own column -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <?php get_template_part( 'template-parts/header/content' ); ?> 
                    </div>
                <?php endwhile; ?>

            </div> <!-- End row -->

        </div> <!-- End container -->
        <?php 
        else :
            get_template_part( 'template-parts/header/content-none' ); // If no content, include the "No posts found" template.
        
        endif; // End if have_posts() 

?>
    </main>
</div>

<?php get_footer(); ?>