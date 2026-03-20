<?php
/**
 * Template part for displaying the entry meta information in blog posts.
 *
 * @package Matthew_CV
 */
?>

<div class="entry-meta mb-3">
    <?php
    // Display the post date and time using the matthew_cv_posted_on() function defined in template-tags.php
    matthew_cv_posted_on();
    // Display the post author using the matthew_cv_posted_by() function defined in template-tags.php
    matthew_cv_posted_by();
    ?>
</div>