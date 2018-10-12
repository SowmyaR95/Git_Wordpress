<?php
$slider_display = esc_html(get_theme_mod('lois_display_slider_setting', 0));
$slider_cat = esc_html(get_theme_mod('lois_slide_category_setting'));
//$slider_count = get_theme_mod('lois_slider_counter');
//query posts
$args = array(
    'offset' => 0,
    'posts_per_page' => 20,
    'category_name' => $slider_cat,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);
//echo '<pre>';
//print_r($args);
$counter = 1;
$the_query = new WP_Query($args);
//echo '<pre>';
//print_r($the_query);
?>
<div id="home-slider">

    <?php if ($slider_display == 1) { ?>
        <?php if ($the_query->have_posts()) : ?>

            <div id="myCarousel" class="carousel slide " data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner ">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php

                        if (has_post_thumbnail()) {
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            $post_permalink = get_the_permalink();
                            ?>
                            <?php if ($counter < 10) { ?>
                                <a href="<?php echo esc_url($post_permalink); ?>">
                                    <div class="item bg<?php echo esc_html($counter); ?> <?php if ($counter == 1) {
                                        echo "active";
                                    } ?>">
                                        <div class="carousel-content-bg">
                                            <?php the_post_thumbnail('full', array('class' => 'full-slide')); ?>
                                            <div class="overlay"></div> <!-- banner-section overlay -->
                                            <div class="banner-area-content">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <a href="<?php echo esc_url($post_permalink); ?>">
                                                        <h1><?php echo get_the_title(); ?>
                                                        </h1>
                                                        <?php the_category(); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php $counter = $counter + 1; ?>
                            <?php } ?>
                        <?php }

                        ?>
                    <?php endwhile; ?>
                </div>
                <div class="arrows">
                    <a class="left carousel-control slick-prev" href="#myCarousel" data-slide="prev"><i
                                class="fa fa-angle-left fa-2x" aria-hidden="true"></i></a>
                    <a class="right carousel-control slick-next" href="#myCarousel" data-slide="next"><i
                                class="fa fa-angle-right fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        <?php endif; ?>
    <?php } ?>

</div>
<?php wp_reset_postdata(); ?>



