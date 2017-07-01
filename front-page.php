<?php get_header(); ?>
    <?php get_template_part('templates/homepage-hero'); ?>
    <section class="homepage__section homepage__section--blocks railed">
        <h3 class="homepage__section-title"><em>PARTNER</em> with a winning <em>TEAM</em>, tailored to your <em>INDUSTRY</em></h3>
        <div class="homepage__section-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec turpis augue, efficitur cursus risus in, aliquet dapibus tellus. Aenean vehicula metus nec eros maximus, eget posuere est aliquam. Nullam vehicula commodo enim, eget dapibus lorem mattis sit amet. Donec ut accumsan orci, ac congue quam.</p>
        </div>
         <?php 
            $homeID = get_queried_object_id();
            $linked = get_post_custom_values('linkedin_title', $homeID);
            
            function getLinkedIn() {
                global $homeID;
                $values = array('title', 'link', 'subtitle');
                $linkedin = [];
                
                for ($i = 0; $i < count($values); $i++) {
                    $tmp = get_post_custom_values('linkedin_' . $values[$i], $homeID)[0];
                    if ($tmp === '') {
                        return [];
                    }
                    $linkedin[$values[$i]] = $tmp;
                }

                return $linkedin;
            }

            $linkedIn = getLinkedIn();
        
            $args = array(
                'category_name' => 'homepage-blocks'
            );

            $posts = get_posts($args);
        ?>
        <div class="homepage__blocks">
            <?php foreach($posts as $post) { 
                $thumbnail = get_the_post_thumbnail_url($post);
                $meta = get_post_meta($post->ID);
            ?>
            <div class="homepage__block">
                <div class="homepage__block-inner">
                    <img src="<?php echo $thumbnail; ?>" class="homepage__block-image" />
                    <div class="homepage__block-content">
                        <h4 class="homepage__block-title"><?php echo $post->post_title; ?></h4>
                        <p><?php echo $post->post_content; ?></p>
                        <?php if (isset($meta['link'])) { ?>
                            <div style="margin-top: auto;">
                                <a href="<?php echo $meta['link'][0]; ?>" class="vinali-cta homepage__block-link">Learn More</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section> 
    <?php if (!empty($linkedIn)) { ?>
        <div class="banner__linkedin railed">
            <div class="banner__linkedin-blur"></div>
            <div class="banner__linkedin-content">
                <h5><?php echo $linkedIn['title']; ?></h5>
                <p><?php echo $linkedIn['subtitle']; ?></p>
            </div>
            <a href="<?php echo $linkedIn['link']; ?>" class="vinali-cta vinali-cta--linkedin">
                connect<span class="fa fa-linkedin" aria-hidden="true"></span>
            </a>
        </div>
    <?php } ?>
    <div class="homepage__section homepage__summary railed">
        <div class="homepage__summary-content">
            <h3>Why <em>VINALI</em> is the right choice for your <em>STAFFING</em> needs</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique diam imperdiet diam volutpat fermentum. Curabitur a leo vel leo tempor vulputate vitae ut sapien. Suspendisse pellentesque lacus ut posuere tristique. Pellentesque magna leo, cursus ac dapibus in, gravida id tellus. Phasellus aliquet lobortis ipsum id sodales.</p>
            <p>Duis condimentum, justo ac maximus ultrices, orci diam vestibulum sem, in lobortis ex nunc in nulla. Donec elit arcu, iaculis a metus ut, tempor vehicula ex. Aliquam erat volutpat. Pellentesque dui arcu, tincidunt vel erat eget, commodo efficitur urna. Suspendisse dignissim arcu elementum ligula volutpat accumsan. Aliquam pellentesque, ipsum in imperdiet mollis, erat felis faucibus lectus, vitae fermentum massa odio at eros</p>
        </div>
        <div class="homepage__summary-images">
            <div class="homepage__summary-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/summary-mock1.jpg);"></div>
            <div class="homepage__summary-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/summary-mock2.jpg);"></div>
        </div>
    </div>
<?php get_footer(); ?>