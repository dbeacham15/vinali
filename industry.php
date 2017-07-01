<?php
/**
 * The template for displaying all INDUSTRY TYPE PAGES
 * It allows for the multiple Types for Seekers/Employers
 *
 * Template Name: Industry

 * @package vinali
 */
?>
<?php get_header(); ?>
    <div class="page__hero">
        <?php the_post_thumbnail('full'); ?>
        <div class="page__hero-content railed">
            <h1 class="page__hero-title"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="page__content railed">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // End of the loop. ?>
    </div>
    <div class="industry__switch">
        <div class="industry__switch-header railed">
            <a class="industry__switch-tab" data-tab="0">Job Seekers</a>
            <a class="industry__switch-tab" data-tab="1">Employers</a>
        </div>
        <div class="industry__switch-content railed">
            <div class="industry__switch-content__copy">
                <?php the_field('job_seeker'); ?>
            </div>
            <div class="industry__switch-content__copy">
                <?php the_field('employer'); ?>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/contact'); ?>
<?php get_footer(); ?>