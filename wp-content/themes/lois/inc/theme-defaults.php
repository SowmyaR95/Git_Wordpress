<?php
/**
 * lois theme defaults
 *
 */
?>
<?php


$lois_defaults['lois_theme_credits'] = esc_attr__('Designed with love by : ', 'lois') .'<a href="'.esc_url( __( 'https://www.sanyog.in', 'lois' ) ).'">'. esc_attr__('Sanyog Shelar', 'lois').'</a>';

$lois_defaults['lois_image_logo_show'] = 0;
$lois_defaults['lois_text_logo'] = get_bloginfo('name');

$lois_defaults['lois_footer_copyright'] = '&copy; ' . date_i18n(__('Y','lois')) . ' <a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a>';

$lois_defaults['lois_social_facebook'] = '';
$lois_defaults['lois_social_twitter'] = '';
$lois_defaults['lois_social_dribbble'] = '';
$lois_defaults['lois_social_google'] = '';
$lois_defaults['lois_social_pinterest'] = '';


$lois_defaults['lois_frontpage_order'] = array(
    'frontpage_section_order_content',
    'frontpage_section_order_featured_links_images',
    'frontpage_section_order_featured_links_icons',
    'frontpage_section_order_featured_links_counters',
    'frontpage_section_order_featured_links_portfolios',
    'frontpage_section_order_featured_links_ourclient',
    'frontpage_section_order_featured_links_services',
    'frontpage_section_order_recent_posts',
    'frontpage_section_order_featured_links_contactus',
    'frontpage_section_order_featured_links_contactform',


);

$lois_defaults['lois_frontpage_featured_link_images_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_images_text'] = '';

$lois_defaults['lois_frontpage_featured_link_images_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_images_padding_top'] = esc_attr__('80', 'lois');
$lois_defaults['lois_frontpage_featured_link_images_padding_bottom'] = esc_attr__('40', 'lois');
$lois_defaults['lois_frontpage_featured_link_images_background_color'] = esc_attr__('#f5f5f5', 'lois');
$lois_defaults['lois_frontpage_featured_link_images_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_featured_link_images_text_color'] = '';
$lois_defaults['lois_frontpage_featured_link_images_icon_fallback_color'] = esc_attr__('#d6af62', 'lois');

$lois_defaults['lois_frontpage_featured_link_icons_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_icons_text'] = '';
$lois_defaults['lois_frontpage_featured_link_icons_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_icons_padding_top'] = esc_attr__('60', 'lois');
$lois_defaults['lois_frontpage_featured_link_icons_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_icons_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_featured_link_icons_text_color'] = '';

$lois_defaults['lois_frontpage_featured_link_icons_icon_fallback_color'] = esc_attr__('#e57373', 'lois');

$lois_defaults['lois_frontpage_featured_link_counters_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_counters_text'] = '';
$lois_defaults['lois_frontpage_featured_link_counters_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_counters_padding_top'] = esc_attr__('40', 'lois');
$lois_defaults['lois_frontpage_featured_link_counters_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_counters_background_color'] = esc_attr__('#000000', 'lois');
$lois_defaults['lois_frontpage_featured_link_counters_icon_fallback_color'] = esc_attr__('#15141a', 'lois');

$lois_defaults['lois_frontpage_featured_link_portfolios_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_portfolios_text'] = '';
$lois_defaults['lois_frontpage_featured_link_portfolios_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_portfolios_padding_top'] = esc_attr__('60', 'lois');
$lois_defaults['lois_frontpage_featured_link_portfolios_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_portfolios_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_featured_link_portfolios_text_color'] = '';
$lois_defaults['lois_frontpage_featured_link_portfolios_icon_fallback_color'] = esc_attr__('#e57373', 'lois');

$lois_defaults['lois_frontpage_featured_link_ourclient_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_ourclient_text'] = '';
$lois_defaults['lois_frontpage_featured_link_ourclient_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_ourclient_padding_top'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_ourclient_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_ourclient_background_color'] = esc_attr__('#15141a', 'lois');
$lois_defaults['lois_frontpage_featured_link_ourclient_text_color'] = '';
$lois_defaults['lois_frontpage_featured_link_ourclient_icon_fallback_color'] = esc_attr__('#d6af62', 'lois');

$lois_defaults['lois_frontpage_featured_link_services_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_services_text'] = '';
$lois_defaults['lois_frontpage_featured_link_services_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_services_padding_top'] = esc_attr__('80', 'lois');
$lois_defaults['lois_frontpage_featured_link_services_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_services_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_featured_link_services_text_color'] = '';
$lois_defaults['lois_frontpage_featured_link_services_icon_fallback_color'] = esc_attr__('#d6af62', 'lois');

$lois_defaults['lois_frontpage_recent_posts_heading'] = '';
$lois_defaults['lois_frontpage_recent_posts_text'] = '';
$lois_defaults['lois_frontpage_recent_posts_number'] = esc_attr__('3', 'lois');
$lois_defaults['lois_frontpage_recent_posts_padding_top'] = esc_attr__('60', 'lois');
$lois_defaults['lois_frontpage_recent_posts_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_recent_posts_section_id'] = esc_attr__('latest', 'lois');
$lois_defaults['lois_frontpage_recent_posts_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_recent_posts_text_color'] = '';


$lois_defaults['lois_frontpage_featured_link_contactus_heading1'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_email1'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_email2'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_heading2'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_phone1'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_phone2'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_heading3'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_address1'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_address2'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_contactus_padding_top'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactus_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactus_background_color'] = esc_attr__('#15141a', 'lois');


$lois_defaults['lois_frontpage_featured_link_contactform_heading'] = '';
$lois_defaults['lois_frontpage_featured_link_contactform_description'] = '';
$lois_defaults['lois_frontpage_featured_link_contactform_shortcode'] = esc_attr__('contact-form-1', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactform_section_id'] = '';
$lois_defaults['lois_frontpage_featured_link_contactform_padding_top'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactform_padding_bottom'] = esc_attr__('20', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactform_background_color'] = esc_attr__('#ffffff', 'lois');
$lois_defaults['lois_frontpage_featured_link_contactform_text_color'] = '';


$lois_defaults['lois_frontpage_featured_link_images_background_image_show'] = 1;
$lois_defaults['lois_blog_feed_meta_show'] = 1;
$lois_defaults['lois_blog_feed_date_show'] = 1;
$lois_defaults['lois_blog_feed_category_show'] = 1;
$lois_defaults['lois_blog_feed_comments_show'] = 1;
$lois_defaults['lois_blog_feed_sidebar_show'] = 0;
$lois_defaults['lois_blog_feed_post_format'] = esc_attr__('Small', 'lois');
$lois_defaults['lois_blog_feed_post_images'] = esc_attr__('Always', 'lois');
$lois_defaults['lois_frontpage_featured_link_images_background_image'] = 1;
$lois_defaults['lois_posts_meta_show'] = 1;
$lois_defaults['lois_posts_date_show'] = 1;
$lois_defaults['lois_posts_category_show'] = 1;
$lois_defaults['lois_posts_author_show'] = 0;
$lois_defaults['lois_posts_tags_show'] = 1;
$lois_defaults['lois_posts_sidebar'] = '1';
$lois_defaults['lois_posts_featured_image_show'] = 1;
$lois_defaults['lois_posts_featured_image_full'] = 0;

$lois_defaults['lois_pages_sidebar'] = 0;
$lois_defaults['lois_pages_featured_image_show'] = 1;
$lois_defaults['lois_pages_featured_image_full'] = 0;
$lois_defaults['lois_pages_featured_image_half'] = 0;

/* sample images */

#1000x600
$lois_defaults['lois_featured_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured1.jpg';
$lois_defaults['lois_featured_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured2.jpg';
$lois_defaults['lois_featured_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured3.jpg';
$lois_defaults['lois_featured_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured4.jpg';
$lois_defaults['lois_featured_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured5.jpg';

#740x380
$lois_defaults['lois_featured_large_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured1_large.jpg';
$lois_defaults['lois_featured_large_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured2_large.jpg';
$lois_defaults['lois_featured_large_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured3_large.jpg';
$lois_defaults['lois_featured_large_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured4_large.jpg';
$lois_defaults['lois_featured_large_sample'][] = esc_url(get_template_directory_uri()) . '/assets/images/featured5_large.jpg';

?>