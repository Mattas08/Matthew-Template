<?php 
get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-10 col-md-12">
                    
                    <?php if ( have_posts() ) : ?>

                        <?php if ( is_home() && ! is_front_page() ) { ?>
                            <header class="mb-4">
                                <h1 class="page-title screen-reader-text">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                        <?php } ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <?php get_template_part( 'template-parts/header/content' ); ?>

                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php 
                        get_template_part( 'template-parts/header/content-none' ); 
                        get_template_part( 'template-parts/componets/blogs/entry-header' ); 
                        ?>

                    <?php endif; ?>
                    <div class="prev-link"><?php previous_posts_link( 'Previous posts' ); ?></div>
            <div class="next-link"><?php next_posts_link( 'Next posts' ); ?></div>

                </div>

                <div class="col-lg-2 col-md-12">
                    <?php get_sidebar(); ?>
                </div>

            </div>
        </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>