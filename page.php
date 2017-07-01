<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vinali
 */
?>
<?php get_header(); ?>
    <?php get_template_part('templates/hero'); ?>
    <div class="page__content railed">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // End of the loop. ?>
    </div>
    <?php get_template_part('templates/contact'); ?>
<?php get_footer(); ?>