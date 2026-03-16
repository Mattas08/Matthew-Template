<?php
$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
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

</header>