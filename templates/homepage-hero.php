<?php 
    $args = array(
        'category_name' => 'heros'
    );

    $posts = get_posts($args);
?>
<section class="homepage__hero">
    <?php foreach($posts as $post) { ?>
        <?php
            $thumbnail = get_the_post_thumbnail_url($post);
            $meta = get_post_meta($post->ID);
         ?>
        <div class="homepage__hero-item">
            <div class="homepage__hero-scale">
                <img src="<?php echo $thumbnail; ?>" class="homepage__hero-item-image" />
            </div>
            <div class="homepage__hero-item-scrim"></div>
            <div class="homepage__hero-item-content">
                <h2 class="homepage__hero-item-title"><?php echo $post->post_title; ?></h2>
                <p class="homepage__hero-item-copy">
                    <?php echo $post->post_content; ?>
                </p>
                <?php if (isset($meta['link']) && isset($meta['label'])) { ?>
                    <div class="homepage__hero-item-btns">
                        <a href="<?php echo $meta['link'][0]; ?>" class="vinali-cta vinali-cta--primary"><?php echo $meta['label'][0]; ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
        <div class="homepage__hero-indicators"></div>
</section>