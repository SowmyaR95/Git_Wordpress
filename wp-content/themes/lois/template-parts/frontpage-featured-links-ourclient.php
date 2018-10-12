<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_ourclient', $lois_frontpage_order)) {
    ?>

    <?php
    $lois_frontpage_featured_link_ourclient_section_id = lois_get_option('lois_frontpage_featured_link_ourclient_section_id');
    $lois_frontpage_featured_link_ourclient_background_color = lois_get_option('lois_frontpage_featured_link_ourclient_background_color');
    $lois_frontpage_featured_link_ourclient_text_color = lois_get_option('lois_frontpage_featured_link_ourclient_text_color');
    $lois_frontpage_featured_link_ourclient_padding_top = lois_get_option('lois_frontpage_featured_link_ourclient_padding_top');
    $lois_frontpage_featured_link_ourclient_padding_bottom = lois_get_option('lois_frontpage_featured_link_ourclient_padding_bottom');
    $lois_frontpage_featured_link_ourclient_heading = lois_get_option('lois_frontpage_featured_link_ourclient_heading');
    $lois_frontpage_featured_link_ourclient_text = lois_get_option('lois_frontpage_featured_link_ourclient_text');
    $lois_frontpage_featured_link_ourclient = lois_get_option('lois_frontpage_featured_link_ourclient');
    ?>
    <section
    id="<?php echo esc_html($lois_frontpage_featured_link_ourclient_section_id); ?>" <?php if ($lois_frontpage_featured_link_ourclient_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_ourclient_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_ourclient_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_ourclient_padding_bottom); ?>px 0;" <?php } ?>
    class="frontpage-featured-link-ourclient">
    <!-- partnership style03 start -->
    <div class="partnership-style companies">
        <div class="container">
            <div class="title alignedcenter">
                <?php if ($lois_frontpage_featured_link_ourclient_heading != '') { ?>
                <h2 class="style-uppercase " <?php if ($lois_frontpage_featured_link_ourclient_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_ourclient_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_ourclient_heading); ?></h2>
                <?php } ?>
                <?php if ($lois_frontpage_featured_link_ourclient_text != '') { ?>
                <p <?php if ($lois_frontpage_featured_link_ourclient_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_ourclient_text_color); ?>;" <?php } ?>><?php echo wp_kses_post($lois_frontpage_featured_link_ourclient_text); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <?php
            $n = count($lois_frontpage_featured_link_ourclient);
            if ($n > 0 && $lois_frontpage_featured_link_ourclient) {
                if ($n % 6 == 0) {
                    $class = 'col-md-2';
                    $num = 6;
                } else {
                    $class = 'col-md-3';
                    $num = 4;
                }
                ?>
                <?php
                $i = 0;
                foreach ($lois_frontpage_featured_link_ourclient as $item) {
                    $img_url = wp_get_attachment_url($item['lois_frontpage_featured_link_ourclient_image']);
                    $logo_url = $item['lois_frontpage_featured_link_ourclient_imagelink'];
                    ?>
                    <?php if ($i % $num == 0) { ?><div class="row"><?php } ?>
                        <div class="col-sm-2 col-md-2 title alignedcenter">
                         
                            <a href="<?php echo esc_url($logo_url); ?>" target="_blank">
                                <img src="<?php echo esc_url($img_url); ?>"></a>
                               
                            </div>
                           
                            <?php if (($i + 1) % $num == 0) { ?></div><?php } ?>
                            <?php $i++;
                        } ?>
                        <?php } ?>
                    </div>
                </section>
                <?php } ?>