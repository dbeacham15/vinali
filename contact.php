<?php
/**
 * The template for displaying all INDUSTRY TYPE PAGES
 * It allows for the multiple Types for Seekers/Employers
 *
 * Template Name: Contact Page

 * @package vinali
 */
?>
<?php get_header(); ?>
     <?php get_template_part('templates/hero'); ?>
     <div class="page__content page__contact railed">
            <div class="page__contact-flex">
                <div>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; // End of the loop. ?>
                </div>
                <a href="/available-jobs" class="vinali-cta vinali-cta--dark"><span class="fa fa-search vinali-cta__icon"></span>Find a Job</a>
            </div>
    </div>
    <div class="page__contact page__contact--full railed">
        <div class="page__contact-column">
            <?php echo do_shortcode('[caldera_form id="CF59678a16862c4"]'); ?>
         </div>
         <div class="page__contact-column">
             <?php if( get_field('address') ): ?>
                <div class="fa fa-home page__contact-addr">
                    <addr><?php the_field('address'); ?></addr>
                </div>
            <?php endif; ?>
            <?php if( get_field('phone_number') ): ?>
                <a class="fa fa-phone page__contact-link" href="tel:<?php the_field('phone_number'); ?>">
                    <?php the_field('phone_number'); ?>
                </a>
            <?php endif; ?>
            <?php if( get_field('email_address') ): ?>
                <a class="fa fa-envelope-o page__contact-link" href="mailto:<?php the_field('email_address'); ?>">
                    <?php the_field('email_address'); ?>
                </a>
            <?php endif; ?>
             <div class="page__contact-social">
                 <?php if (get_field('facebook_link')) : ?>
                    <a href="<?php the_field('facebook_link'); ?>" class="fa fa-facebook"></a>
                 <?php endif; ?>
                 <?php if (get_field('linkedin_link')) : ?>
                    <a href="<?php the_field('linkedin_link'); ?>" class="fa fa-linkedin"></a>
                 <?php endif; ?>
                 <?php if (get_field('twitter_link')) : ?>
                    <a href="<?php the_field('twitter_link'); ?>" class="fa fa-twitter"></a>
                 <?php endif; ?>
             </div>
         </div>
    </div>
<?php get_footer(); ?>