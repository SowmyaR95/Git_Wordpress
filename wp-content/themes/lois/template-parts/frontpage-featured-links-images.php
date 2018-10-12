<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_images', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_featured_link_images_section_id = lois_get_option('lois_frontpage_featured_link_images_section_id');
    $lois_frontpage_featured_link_images_heading = lois_get_option('lois_frontpage_featured_link_images_heading');
    $lois_frontpage_featured_link_images_text = lois_get_option('lois_frontpage_featured_link_images_text');
    $lois_frontpage_featured_link_images_background_color = lois_get_option('lois_frontpage_featured_link_images_background_color');
    $lois_frontpage_featured_link_images_text_color = lois_get_option('lois_frontpage_featured_link_images_text_color');
    $lois_frontpage_featured_link_images_padding_top = lois_get_option('lois_frontpage_featured_link_images_padding_top');
    $lois_frontpage_featured_link_images_padding_bottom = lois_get_option('lois_frontpage_featured_link_images_padding_bottom');
    $lois_frontpage_featured_link_images_type = 'Pages';
    ?>
    <?php
    if ($lois_frontpage_featured_link_images_type == 'Pages') {
        $lois_frontpage_featured_link_images_pages = lois_get_option('lois_frontpage_featured_link_images_pages');
        if (count($lois_frontpage_featured_link_images_pages) > 0 && $lois_frontpage_featured_link_images_pages) {
            ?>
            <section
                    id="<?php echo esc_html($lois_frontpage_featured_link_images_section_id); ?>" <?php if ($lois_frontpage_featured_link_images_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_images_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_images_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_images_padding_bottom); ?>px 0;" <?php } ?>
                    class="frontpage-featured-link-images">
                <div class="light-box-style">
                    <div class="container">
                        <div class="title alignedcenter">
                            <?php if ($lois_frontpage_featured_link_images_heading != '') { ?>
                                <h2 class="style-uppercase" <?php if ($lois_frontpage_featured_link_images_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_images_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_images_heading); ?></h2>
                            <?php } ?>
                            <?php if ($lois_frontpage_featured_link_images_text != '') { ?>
                                <p <?php if ($lois_frontpage_featured_link_images_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_images_text_color); ?>;" <?php } ?>><?php echo wp_kses_post($lois_frontpage_featured_link_images_text); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="container">
                        <div class="light-style-boxes row">
                            <div class="">
                                <?php

                                foreach ($lois_frontpage_featured_link_images_pages as $item) {
                                    $pageid = $item['lois_frontpage_featured_link_images_page'];
                                    $icon = $item['lois_frontpage_featured_link_images_icon'];
                                    $color = $item['lois_frontpage_featured_link_images_color'] == '' ?
                                        lois_get_option('lois_frontpage_featured_link_images_icon_fallback_color') : $item['lois_frontpage_featured_link_images_color'];
                                    $args = array(
                                        'p' => $pageid, // ID of a page, post, or custom type
                                        'post_type' => 'any'
                                    );
                                    $pagedets = new WP_Query($args);
                                    while ($pagedets->have_posts()) : $pagedets->the_post();
                                        $title = get_the_title();
                                        $excerpt = get_the_excerpt();
                                        $link = get_the_permalink();
                                    endwhile;
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-top rls-wd">
                                        <div class="light-style-boxes-bg alignedcenter">
                                            <div class="light-style-boxes-img">
                                                <a href="<?php echo esc_url($link); ?>"
                                                   style="color:<?php echo esc_html($color); ?>"><i
                                                            class="fa <?php echo esc_html($icon); ?>"></i>
                                                </a>
                                            </div>
                                            <h2 class="flip-box-heading"><a
                                                        href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a>
                                            </h2>
                                            <p>
                                                <?php echo wp_kses( substr(esc_html($excerpt), 0, 100) , allowed_tags() ); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <?php
        }
    }
    ?>

<?php } ?>