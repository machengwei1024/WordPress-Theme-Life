<?php
get_header();

// Start the loop.
while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'content', 'page' );

    // End the loop.
endwhile;
?>

<?php get_footer(); ?>
