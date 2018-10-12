<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_services', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_featured_link_services_section_id = lois_get_option('lois_frontpage_featured_link_services_section_id');
    $lois_frontpage_featured_link_services_background_color = lois_get_option('lois_frontpage_featured_link_services_background_color');
    $lois_frontpage_featured_link_services_text_color = lois_get_option('lois_frontpage_featured_link_services_text_color');
    $lois_frontpage_featured_link_services_padding_top = lois_get_option('lois_frontpage_featured_link_services_padding_top');
    $lois_frontpage_featured_link_services_padding_bottom = lois_get_option('lois_frontpage_featured_link_services_padding_bottom');
    $lois_frontpage_featured_link_services_heading = lois_get_option('lois_frontpage_featured_link_services_heading');
    $lois_frontpage_featured_link_services_text = lois_get_option('lois_frontpage_featured_link_services_text');
    $lois_frontpage_featured_link_services = lois_get_option('lois_frontpage_featured_link_services');
    ?>
    <section
            id="<?php echo esc_html($lois_frontpage_featured_link_services_section_id); ?>" <?php if ($lois_frontpage_featured_link_services_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_services_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_services_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_services_padding_bottom); ?>px 0;" <?php } ?>
            class="frontpage-featured-link-icons">
        <div class="about-us-area agency-service-area">
            <div class="container">
                <div class="services">
                    <div class="title col-sm-6 col-md-6">
                        <?php if ($lois_frontpage_featured_link_services_heading != '') { ?>
                            <h5 class="style-uppercase <?php lois_animate('zoomIn'); ?>" <?php if ($lois_frontpage_featured_link_services_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_services_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_services_heading); ?></h5>
                        <?php } ?>
                        <?php if ($lois_frontpage_featured_link_services_text != '') { ?>
                            <h2 <?php if ($lois_frontpage_featured_link_services_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_services_text_color); ?>;" <?php } ?>><?php echo wp_kses_post($lois_frontpage_featured_link_services_text); ?></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <?php
                $n = count($lois_frontpage_featured_link_services);
                if ($n > 0 && $lois_frontpage_featured_link_services) {
                    if ($n % 4 == 0) {
                        $class = 'col-md-3';
                        $num = 4;
                    } else {
                        $class = 'col-md-4';
                        $num = 3;
                    }
                    ?>
                    <?php
                    $i = 0;
                    foreach ($lois_frontpage_featured_link_services as $item) {
                        $page = $item['lois_frontpage_featured_link_services_page'];
                        $pageid = $item['lois_frontpage_featured_link_services_page'];
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
                        $icon = $item['lois_frontpage_featured_link_services_icon'];
                        $color = $item['lois_frontpage_featured_link_services_color'] == '' ?
                            lois_get_option('lois_frontpage_featured_link_services_icon_fallback_color') : $item['lois_frontpage_featured_link_services_color'];
                        ?>
                        <?php if ($i % $num == 0) { ?><div class="row"><div class="about-us-4col"><?php } ?>
                        <div class="col-sm-4 col-md-4">
                            <div class="ui-design-block">
                                <div class="media">
                                    <div class="media-left"><a href="<?php echo esc_url($link); ?>"
                                                               style="color:<?php echo esc_html($color); ?>"><i
                                                    class="fa <?php echo esc_html($icon); ?>"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="<?php echo esc_url($link); ?>">
                                                <?php echo esc_html($title); ?>
                                            </a></h4>
                                        <p><?php echo wp_kses( substr(esc_html($excerpt), 0, 150) , allowed_tags() ); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (($i + 1) % $num == 0) { ?></div></div><?php } ?>
                        <?php $i++;
                    } ?>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>