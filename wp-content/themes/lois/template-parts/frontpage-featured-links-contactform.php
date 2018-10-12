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
    ?>
<section
        id="<?php echo esc_html($lois_frontpage_featured_link_contactform_section_id); ?>" <?php if ($lois_frontpage_featured_link_contactform_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_contactform_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_contactform_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_contactform_padding_bottom); ?>px 0;" <?php } ?>
        class="frontpage-featured-link-icons">
    <div class="agency-contact-form">
    <div class="container">
    <div class="row">
    <div class="title col-sm-12 col-md-12 padding-bottom">
    <?php if ($lois_frontpage_featured_link_contactform_heading != '') {
        ?>
        <h5 class="style-uppercase" <?php if ($lois_frontpage_featured_link_contactform_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_contactform_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_contactform_heading); ?></h5>
    <?php } ?>
    <?php if ($lois_frontpage_featured_link_contactform_description != '') {
        ?>
        <h2 <?php if ($lois_frontpage_featured_link_contactform_text_color != '') { ?> style="color:<?php echo esc_html($lois_frontpage_featured_link_contactform_text_color); ?>;" <?php } ?>><?php echo esc_html($lois_frontpage_featured_link_contactform_description); ?></h2>
        </div>
        <?php if ($lois_frontpage_featured_link_contactform_shortcode != '') {
            ?>
            <?php
            echo do_shortcode('[contact-form-7 id="' . $lois_frontpage_featured_link_contactform_shortcode . '" title="Contact form 1"]'); ?>
        <?php } ?>
        </div>
        </div>
        </div>
        </section>
    <?php }
} ?>

