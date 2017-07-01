<?php
/**
 * The template for displaying all INDUSTRY TYPE PAGES
 * It allows for the multiple Types for Seekers/Employers
 *
 * Template Name: About

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
    <?php 
        $args = array(
            'category_name' => 'about-slide'
        );

        $posts = get_posts($args);
    ?>
    <div class="about-carousel">
        <?php foreach($posts as $post) { 
            $meta = get_post_meta($post->ID);
        ?>
            <div class="about-carousel__item railed">
                <div class="about-carousel__item-image">
                    <?php if (isset($meta['icon'])) { ?>
                        <span class="fa fa-<?php echo $meta['icon'][0]; ?>"></span>
                    <?php } ?>
                </div>
                <div class="about-carousel__item-content">
                    <h4 class="about-carousel__item-title"><?php echo $post->post_title; ?></h4>
                    <div class="about-carousel__item-copy">
                        <p><?php echo $post->post_content; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php get_template_part('templates/contact'); ?>
<?php get_footer(); ?>