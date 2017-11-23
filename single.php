<?php
get_header(); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();

    // Include the post format-specific template for the content. If you want to
    get_template_part( 'content', get_post_format() );

    // End the loop.
endwhile;
?>

<?php get_footer(); ?>
