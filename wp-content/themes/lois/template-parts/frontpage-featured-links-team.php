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
        <div class="meet-my-team team-v11">
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
                <div class="row">
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
                            $image_content = $image->post_content;
                            $facebook = $item['lois_frontpage_featured_link_icons_facebook'];
                            $twitter = $item['lois_frontpage_featured_link_icons_twitter'];
                            $google = $item['lois_frontpage_featured_link_icons_google'];
                            $linkedin = $item['lois_frontpage_featured_link_icons_linkedin'];
                            ?>
                            <?php if ($i % $num == 0) { ?><div class="team-v11-sd row"><?php } ?>
                            <div class="col-sm-3 col-md-3 col-xs-12 team-wrapper-v11">
                                <div class="meet-team-single-member-team-v11">
                                    <a href="<?php the_permalink(); ?>"><img
                                                src="<?php echo esc_url($url); ?>"
                                                alt="<?php echo esc_html($image_title); ?>">
                                    </a>
                                    <div class="meet-team-details-team-v11">
                                        <div class="meet-team-overlay-team-v11">
                                            <a class="iconbutton1 theme_facebook_btn2 theme_bordericon"
                                               href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                <i class="fa fa-facebook icon_button"></i>
                                            </a>
                                        </div>
                                        <div class="meet-team-overlay-team-v11">
                                            <a class="iconbutton1 theme_twitter_btn2 theme_bordericon"
                                               href="<?php echo esc_url($twitter); ?>" target="_blank">
                                                <i class="fa fa-twitter icon_button"></i>
                                            </a>
                                        </div>
                                        <div class="meet-team-overlay-team-v11">
                                            <a class="iconbutton1 theme_google-plus_btn2 theme_bordericon"
                                               href="<?php echo esc_url($google); ?>" target="_blank">
                                                <i class="fa fa-google-plus icon_button"></i>
                                            </a>
                                        </div>
                                        <div class="meet-team-overlay-team-v11">
                                            <a class="iconbutton1 theme_linkedin_btn2 theme_bordericon"
                                               href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                <i class="fa fa-linkedin icon_button"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html($image_title); ?></a>
                                </h3>
                                <h4><?php echo esc_html($image_caption); ?></h4>
                                <p><?php echo esc_html($image_content); ?></p>
                            </div>
                            <?php if (($i + 1) % $num == 0) { ?></div><?php } ?>
                            <?php $i++;
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>