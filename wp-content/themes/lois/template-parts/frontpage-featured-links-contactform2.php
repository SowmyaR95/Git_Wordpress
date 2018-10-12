<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (in_array('frontpage_section_order_featured_links_contactform', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_featured_link_contactform_section_id = lois_get_option('lois_frontpage_featured_link_contactform_section_id');
    $lois_frontpage_featured_link_contactform_background_color = lois_get_option('lois_frontpage_featured_link_contactform_background_color');
    $lois_frontpage_featured_link_contactform_text_color = lois_get_option('lois_frontpage_featured_link_contactform_text_color');

    $lois_frontpage_featured_link_contactform_padding_top = lois_get_option('lois_frontpage_featured_link_contactform_padding_top');
    $lois_frontpage_featured_link_contactform_padding_bottom = lois_get_option('lois_frontpage_featured_link_contactform_padding_bottom');

    $lois_frontpage_featured_link_contactform_heading = lois_get_option('lois_frontpage_featured_link_contactform_heading');
    $lois_frontpage_featured_link_contactform_description = lois_get_option('lois_frontpage_featured_link_contactform_description');
    $lois_frontpage_featured_link_contactform_shortcode = lois_get_option('lois_frontpage_featured_link_contactform_shortcode');

    $lois_frontpage_featured_link_contactform = lois_get_option('lois_frontpage_featured_link_contactform');

    $lois_frontpage_featured_link_contactus_padding_top = lois_get_option('lois_frontpage_featured_link_contactus_padding_top');
    $lois_frontpage_featured_link_contactus_padding_bottom = lois_get_option('lois_frontpage_featured_link_contactus_padding_bottom');
    $lois_frontpage_featured_link_contactus_heading1 = lois_get_option('lois_frontpage_featured_link_contactus_heading1');
    $lois_frontpage_featured_link_contactus_email1 = lois_get_option('lois_frontpage_featured_link_contactus_email1');
    $lois_frontpage_featured_link_contactus_email2 = lois_get_option('lois_frontpage_featured_link_contactus_email2');
    $lois_frontpage_featured_link_contactus_heading2 = lois_get_option('lois_frontpage_featured_link_contactus_heading2');
    $lois_frontpage_featured_link_contactus_phone1 = lois_get_option('lois_frontpage_featured_link_contactus_phone1');
    $lois_frontpage_featured_link_contactus_phone2 = lois_get_option('lois_frontpage_featured_link_contactus_phone2');
    $lois_frontpage_featured_link_contactus_heading3 = lois_get_option('lois_frontpage_featured_link_contactus_heading3');
    $lois_frontpage_featured_link_contactus_address1 = lois_get_option('lois_frontpage_featured_link_contactus_address1');
    $lois_frontpage_featured_link_contactus_address2 = lois_get_option('lois_frontpage_featured_link_contactus_address2');
    $lois_frontpage_featured_link_contactus = lois_get_option('lois_frontpage_featured_link_contactus');


    ?>
<section
        id="<?php echo esc_html($lois_frontpage_featured_link_contactform_section_id); ?>" <?php if ($lois_frontpage_featured_link_contactform_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_contactform_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_contactform_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_contactform_padding_bottom); ?>px 0;" <?php } ?>
        class="frontpage-featured-link-icons">
    <div class="lawyer-contact-form">
    <div class="container">
    <div class="row">
    <div class="col-md-12 cont-form">
    <div class="title col-sm-12 col-md-12 padding-bottom">
    <?php if ($lois_frontpage_featured_link_contactform_heading != '') {
        ?>
        <h2 class="style-uppercase text-center" <?php if ($lois_frontpage_featured_link_contactform_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_contactform_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_contactform_heading); ?></h2>
    <?php } ?>
    <?php if ($lois_frontpage_featured_link_contactform_description != '') {
        ?>
        <p class="text-center" <?php if ($lois_frontpage_featured_link_contactform_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_contactform_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_contactform_description); ?></p>
        <?php
        ?>
        </div>
        <?php if ($lois_frontpage_featured_link_contactform_shortcode != '') {
            ?>
            <?php
            echo do_shortcode('[contact-form-7 id="' . $lois_frontpage_featured_link_contactform_shortcode . '" title="Contact form 1"]'); ?>
        <?php } ?>
        </div>
        <div class="col-sm-12" style="padding-top:<?php echo esc_html($lois_frontpage_featured_link_contactus_padding_top); ?>px; padding-bottom:<?php echo esc_html($lois_frontpage_featured_link_contactus_padding_bottom); ?>px;">
             <div class="agency-contact-area">
                        <div class="col-sm-4 col-md-4">
                            <div class="agency-contact-area-content bordr-">
                                <?php if ($lois_frontpage_featured_link_contactus_heading1 != '') {
                                    ?>
                                    <h6><?php echo esc_html($lois_frontpage_featured_link_contactus_heading1); ?></h6>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_email1 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_email1); ?></p>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_email2 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_email2); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="agency-contact-area-content">
                                <?php if ($lois_frontpage_featured_link_contactus_heading2 != '') {
                                    ?>
                                    <h6><?php echo esc_html($lois_frontpage_featured_link_contactus_heading2); ?></h6>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_phone1 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_phone1); ?></p>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_phone2 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_phone2); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="agency-contact-area-content">
                                <?php if ($lois_frontpage_featured_link_contactus_heading3 != '') {
                                    ?>
                                    <h6><?php echo esc_html($lois_frontpage_featured_link_contactus_heading3); ?></h6>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_address1 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_address1); ?></p>
                                <?php } ?>
                                <?php if ($lois_frontpage_featured_link_contactus_address2 != '') {
                                    ?>
                                    <p><?php echo esc_html($lois_frontpage_featured_link_contactus_address2); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
        </div>

        </div>
        </div>
        </div>
        </section>
    <?php }
} ?>

