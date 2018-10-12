<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
get_theme_mod('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_portfolios', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_featured_link_portfolios_section_id = lois_get_option('lois_frontpage_featured_link_portfolios_section_id');
    $lois_frontpage_featured_link_portfolios_background_color = lois_get_option('lois_frontpage_featured_link_portfolios_background_color');
    $lois_frontpage_featured_link_portfolios_text_color = lois_get_option('lois_frontpage_featured_link_portfolios_text_color');
    $lois_frontpage_featured_link_portfolios_padding_top = lois_get_option('lois_frontpage_featured_link_portfolios_padding_top');
    $lois_frontpage_featured_link_portfolios_padding_bottom = lois_get_option('lois_frontpage_featured_link_portfolios_padding_bottom');
    $lois_frontpage_featured_link_portfolios_heading = lois_get_option('lois_frontpage_featured_link_portfolios_heading');
    $lois_frontpage_featured_link_portfolios_text = lois_get_option('lois_frontpage_featured_link_portfolios_text');
    $lois_frontpage_featured_link_portfolios = lois_get_option('lois_frontpage_featured_link_portfolios');
    ?>
    <section
            id="<?php echo esc_html($lois_frontpage_featured_link_portfolios_section_id); ?>" <?php if ($lois_frontpage_featured_link_portfolios_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_portfolios_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_portfolios_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_portfolios_padding_bottom); ?>px 0;" <?php } ?>
            class="frontpage-featured-link-icons">
        <div class="portfolio">
            <div class="container">
                <div class="title col-sm-6 col-md-6">
                    <?php if ($lois_frontpage_featured_link_portfolios_heading != '') { ?>
                        <h5 class="style-uppercase <?php lois_animate('zoomIn'); ?>" <?php if ($lois_frontpage_featured_link_portfolios_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_portfolios_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_portfolios_heading); ?></h5>
                    <?php } ?>
                    <?php if ($lois_frontpage_featured_link_portfolios_text != '') { ?>
                        <h2 class="site-heading" <?php if ($lois_frontpage_featured_link_portfolios_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_portfolios_text_color); ?>;" <?php } ?>><?php echo wp_kses_post($lois_frontpage_featured_link_portfolios_text); ?></h2>
                    <?php } ?>
                </div>
                <?php
                $n = count($lois_frontpage_featured_link_portfolios);
                if ($n > 0 && $lois_frontpage_featured_link_portfolios) {
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
                    foreach ($lois_frontpage_featured_link_portfolios as $item) {
                        $page = $item['lois_frontpage_featured_link_portfolios_page'];
                        $pageid = $item['lois_frontpage_featured_link_portfolios_page'];
                        $args = array(
                            'p' => $pageid, // ID of a page, post, or custom type
                            'post_type' => 'any'
                        );
                        $pagedets = new WP_Query($args);
                        while ($pagedets->have_posts()) : $pagedets->the_post();
                            $title = get_the_title();
                            $content = get_the_content();
                            $link = get_the_permalink();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'lois-portfolio');
                        endwhile;

                        ?>
                        <?php if ($i % $num == 0) { ?><div class="row"><?php } ?>
                        <?php if ($i % 2 == 0) {
                            ?>
                            <div class="col-md-12 col-sm-12 tw-part-port-col">
                                <div class="col-md-6 col-sm-6">
                                   <?php
                                        $src = wp_get_attachment_image_src(get_post_thumbnail_id($page), 'lois-portfolio');
                                        $url = $src[0];
                                        ?>
                                        <a href="<?php echo wp_kses( esc_url($link) , allowed_tags() ); ?>"><img src="<?php echo wp_kses( $url , allowed_tags() ); ?>"></a>
                                    
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 portfolio-content-box">
                                    <div class="portfolio-content">
                                        <h4><a href="<?php echo esc_url($link); ?>">
                                                <?php echo esc_html($title); ?>
                                            </a></h4>
                                        <p class="para-01">
                                            <?php echo wp_kses( substr(esc_html($content), 0, 180) , allowed_tags() ); ?>
                                        </p>
                                        <a class="view-photo fancybox-button"
                                                       href="<?php echo esc_url($link); ?>"
                                                       rel="fancybox-button">
                                                        <span class="button-text"><?php esc_html_e('Read More', 'lois'); ?></span>
                                                    </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-md-12 col-sm-12 tw-part-port-col2">
                                <div class="col-md-6 col-sm-6 portfolio-content-box">
                                    <div class="portfolio-content">
                                        <h4>
                                            <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?>
                                            </a></h4>
                                        <p class="para-01">
                                            <?php echo wp_kses( substr(esc_html($content), 0, 180) , allowed_tags() ); ?>
                                        </p>
                                        
                                            <a class="view-photo fancybox-button"
                                                       href="<?php echo esc_url($link); ?>"
                                                       rel="fancybox-button">
                                                        <span class="button-text"><?php esc_html_e('Read More', 'lois'); ?></span>
                                                    </a>
                                                
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 pull-right">
                                    <a href="<?php the_permalink(); ?>"> <?php
                                        $src = wp_get_attachment_image_src(get_post_thumbnail_id($page), 'lois-portfolio');
                                        $url = $src[0];
                                        ?>
                                        <a href="<?php echo esc_url($link); ?>"><img src="<?php echo wp_kses( $url , allowed_tags()); ?>"></a>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if (($i + 1) % $num == 0) { ?></div><?php } ?>
                        <?php $i++;
                    } ?>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>