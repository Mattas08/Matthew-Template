 <?php 
/**
 * Single Post template file
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
            <?php } 
                // Start the Loop to display posts. Each post will be displayed in its own column.
                while ( have_posts() ) : the_post(); 
                 
                    get_template_part( 'template-parts/header/content' );
                    
                 endwhile; ?> 

            

        </div> <!-- End container -->
        <?php 
        else :
            get_template_part( 'template-parts/header/content-none' ); // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/componets/blogs/entry-header' ); // Include the entry header template part for the "No posts found" message.
        endif; // End if have_posts() 

?>
    </main>
</div>

<?php get_footer(); ?>