<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_recent_posts', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_recent_posts_section_id = lois_get_option('lois_frontpage_recent_posts_section_id');
    $lois_frontpage_recent_posts_background_color = lois_get_option('lois_frontpage_recent_posts_background_color');
    $lois_frontpage_recent_posts_text_color = lois_get_option('lois_frontpage_recent_posts_text_color');
    $lois_frontpage_recent_posts_padding_top = lois_get_option('lois_frontpage_recent_posts_padding_top');
    $lois_frontpage_recent_posts_padding_bottom = lois_get_option('lois_frontpage_recent_posts_padding_bottom');
    $lois_frontpage_recent_posts_heading = lois_get_option('lois_frontpage_recent_posts_heading');
    $lois_frontpage_recent_posts_text = lois_get_option('lois_frontpage_recent_posts_text');
    $lois_frontpage_recent_posts_number = lois_get_option('lois_frontpage_recent_posts_number');
    ?>
    <section
            id="<?php echo esc_html($lois_frontpage_recent_posts_section_id); ?>" <?php if ($lois_frontpage_recent_posts_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_recent_posts_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_recent_posts_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_recent_posts_padding_bottom); ?>px 0;" <?php } ?>
            class="">
        <div class="blog-style">
            <div class="container">
                <div class="title alignedcenter">
                    <?php if ($lois_frontpage_recent_posts_heading != '') { ?>
                        <h2 class="style-uppercase " <?php if ($lois_frontpage_recent_posts_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_recent_posts_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_recent_posts_heading); ?></h2>
                    <?php } ?>
                    <?php if ($lois_frontpage_recent_posts_text != '') { ?>
                        <p <?php if ($lois_frontpage_recent_posts_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_recent_posts_text_color); ?>;" <?php } ?>><?php echo wp_kses_post($lois_frontpage_recent_posts_text); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    global $post;
                    $temp = $post;
                    $i = 0;
                    $args = array('numberposts' => $lois_frontpage_recent_posts_number);
                    $recent_posts = get_posts($args);
                    foreach ($recent_posts as $post) {
                        setup_postdata($post);
                        ?>
                        <?php if ($i % 3 == 0 && $i != 0) { ?><div class="blog-style row"><?php } ?>
                        <div class="col-sm-4 col-md-4 col-xs-12 rabp-wd <?php lois_animate('zoomIn'); ?>"><?php get_template_part('template-parts/entry2');
                            $i++; ?></div>
                        <?php if ($i % 3 == 0) { ?></div><?php } ?>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
    </section>

<?php } ?>
