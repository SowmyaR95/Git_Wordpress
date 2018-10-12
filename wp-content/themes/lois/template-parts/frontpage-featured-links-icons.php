<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_icons', $lois_frontpage_order)) {
    ?>

    <?php
    $lois_frontpage_featured_link_icons_section_id = lois_get_option('lois_frontpage_featured_link_icons_section_id');
    $lois_frontpage_featured_link_icons_background_color = lois_get_option('lois_frontpage_featured_link_icons_background_color');
    $lois_frontpage_featured_link_icons_text_color = lois_get_option('lois_frontpage_featured_link_icons_text_color');
    $lois_frontpage_featured_link_icons_heading = lois_get_option('lois_frontpage_featured_link_icons_heading');
    $lois_frontpage_featured_link_icons_text = lois_get_option('lois_frontpage_featured_link_icons_text');
    $lois_frontpage_featured_link_icons = lois_get_option('lois_frontpage_featured_link_icons');
    $lois_frontpage_featured_link_icons_padding_top = lois_get_option('lois_frontpage_featured_link_icons_padding_top');
    $lois_frontpage_featured_link_icons_padding_bottom = lois_get_option('lois_frontpage_featured_link_icons_padding_bottom');
    ?>
    <section id="<?php echo esc_html($lois_frontpage_featured_link_icons_section_id); ?>"
             class="frontpage-featured-link-icons" <?php if ($lois_frontpage_featured_link_icons_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_icons_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_icons_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_icons_padding_bottom); ?>px 0;" <?php } ?> >
        <div class="meet-my-team team-v1 team_style light-box-style">
            <div class="container">
                <div class="title alignedcenter">
                    <?php if ($lois_frontpage_featured_link_icons_heading != '') { ?>
                        <h2 class="style-uppercase" <?php if ($lois_frontpage_featured_link_icons_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_icons_text_color); ?>" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_icons_heading); ?></h2>
                    <?php } ?>
                    <?php if ($lois_frontpage_featured_link_icons_text != '') { ?>
                        <p <?php if ($lois_frontpage_featured_link_icons_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_icons_text_color); ?>" <?php } ?>><?php echo wp_kses_post($lois_frontpage_featured_link_icons_text); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <?php
                $n = count($lois_frontpage_featured_link_icons);
                if ($n > 0 && $lois_frontpage_featured_link_icons) {
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
                    foreach ($lois_frontpage_featured_link_icons as $item) {
                        $profile = $item['lois_frontpage_featured_link_icons_profile'];
                        $id = $item['lois_frontpage_featured_link_icons_image'];
                        $img_url = wp_get_attachment_image_src( $id, 'lois-team');
                         $url = $img_url[0];
                        $image = get_post($id);
                        $image_title = $image->post_title;
                        $image_caption = $image->post_excerpt;
                        $facebook = $item['lois_frontpage_featured_link_icons_facebook'];
                        $twitter = $item['lois_frontpage_featured_link_icons_twitter'];
                        $google = $item['lois_frontpage_featured_link_icons_google'];
                        $linkedin = $item['lois_frontpage_featured_link_icons_linkedin'];
                        
                        ?>
                        <?php if ($i % $num == 0) { ?><div class="row"><?php } ?>
                        <div class="team-rsp col-md-3 col-sm-6 col-xs-12">
                            <div class="meet-team-single-member"> <!-- Single Team Member section start -->
                                <div class="meet-team-image"> <!-- Team Member image start -->
                                    <img src="<?php echo esc_url($url); ?>"
                                         alt="<?php echo esc_html($image_title); ?>">

                                    <div class="meet-team-overlay"></div>
                                    <div class="after-overlay"> <!-- single properties hover title start -->
                                        <div class="overlay-display">
                                            <div class="overlay-middle">
                                                <?php if ($profile != '') { ?>
                                                    <a class="view-photo fancybox-button"
                                                       href="<?php echo esc_url($profile); ?>"
                                                       title="<?php echo esc_attr($image_title); ?>"
                                                       rel="fancybox-button">
                                                        <span class="button-text"><?php esc_html_e('view profile', 'lois'); ?></span>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div> <!-- single properties hover title end -->
                                </div>  <!-- Team Member image start -->
                                <div class="meet-team-details alignedcenter">
                                    <h4 class="meet-team-link"><a><?php echo esc_html($image_title); ?></a></h4>
                                    <p><?php echo esc_html($image_caption); ?></p>
                                    <ul>
                                        <li><a href="<?php echo esc_url($facebook); ?>" aria-hidden="true"
                                               rel="noopener noreferrer" data-placement="top" data-toggle="tooltip"
                                               data-original-title="<?php esc_attr_e('Facebook','lois'); ?>" target="_blank"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo esc_url($twitter); ?>" aria-hidden="true"
                                               rel="noopener noreferrer" data-placement="top" data-toggle="tooltip"
                                               data-original-title="<?php esc_attr_e('Twitter','lois'); ?>" target="_blank"><i
                                                        class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo esc_url($google); ?>" aria-hidden="true"
                                               rel="noopener noreferrer" data-placement="top" data-toggle="tooltip"
                                               data-original-title="<?php esc_attr_e('Google+','lois'); ?>" target="_blank"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                        <li><a href="<?php echo esc_url($linkedin); ?>" aria-hidden="true"
                                               rel="noopener noreferrer" data-placement="top" data-toggle="tooltip"
                                               data-original-title="<?php esc_attr_e('LinkedIn','lois'); ?>" target="_blank"><i
                                                        class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (($i + 1) % $num == 0) { ?></div><?php } ?>
                        <?php $i++;
                    } ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>