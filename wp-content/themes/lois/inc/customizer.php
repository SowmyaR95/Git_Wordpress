<?php
/**
 * Customizer functionality
 *
 */
?>
<?php
/*------------------------------
 Panels and Sections
 ------------------------------*/
// require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';
get_template_part( '/inc/select/category-dropdown-custom-control.php' );

function lois_customizer_scripts()
{
    wp_enqueue_media();
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('lois-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customizer', 'wp-color-picker'));
    wp_enqueue_style('lois-customizer', get_template_directory_uri() . '/assets/css/customizer.css');
}

add_action('customize_enqueue_scripts', 'lois_customizer_scripts', 99);

function lois_customizer_panels_sections($wp_customize)
{

    $wp_customize->add_panel('lois_home_featured', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Home Page Slider', 'lois'),
        'description' => __('Home Page Slider Panel', 'lois'),
    ));
    /**
     *slider
     **/
    $wp_customize->add_section('lois_slider_section', array(
        'title' => __('Slider', 'lois'),
        'priority' => 20,
        'description' => __('Slider Option', 'lois'),
        'panel' => 'lois_home_featured',
    ));
    $wp_customize->add_setting('lois_display_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'lois_sanitize_checkbox',
    ));
    $wp_customize->add_control('lois_display_slider_control', array(
        'settings' => 'lois_display_slider_setting',
        'label' => __('Display Slider', 'lois'),
        'section' => 'lois_slider_section',
        'type' => 'checkbox',
        'priority' => 24
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    foreach ($categories as $category) {
        if ($i == 0) {
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }

    /* setting for select a single category */

    $wp_customize->add_setting('lois_slide_category_setting', array(
        'default' => '',
        'sanitize_callback' => 'lois_sanitize_category',
    ));

    $wp_customize->add_control('lois_slide_category_control', array(
        'settings' => 'lois_slide_category_setting',
        'type' => 'select',
        'label' => __('Select Category:', 'lois'),
        'section' => 'lois_slider_section',
        'choices' => $cats,
        'priority' => 24
    ));
    /**
     * Set Speed
     **/
    $wp_customize->add_setting('lois_slider_speed_setting', array(
        'default' => '6000',
        'sanitize_callback' => 'lois_sanitize_integer',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lois_slider_speed', array(
        'label' => __('Slider Speed (milliseconds)', 'lois'),
        'section' => 'lois_slider_section',
        'settings' => 'lois_slider_speed_setting',
        'priority' => 60
    )));

    #Color Setting for Theme

    $wp_customize->add_section(
        'lois_theme',
        array(
            'title' => __('Theme Options', 'lois'),
            'description' => __('This is a settings section.', 'lois'),
            'priority' => 96,
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'theme_header_bg_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_header_bg_color',
            array(
                'label' => __('Header Background Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_header_bg_color',
            )
        )
    );
    $wp_customize->add_setting(
        'theme_header_text_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_header_text_color',
            array(
                'label' => __('Menu Text Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_header_text_color',
            )
        )
    );
    $wp_customize->add_setting(
        'theme_header_link_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_header_link_color',
            array(
                'label' => __('Menu Active & Hover Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_header_link_color',
            )
        )
    );
    $wp_customize->add_setting(
        'theme_link_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_link_color',
            array(
                'label' => __('Theme Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_link_color',
            )
        )
    );
    $wp_customize->add_setting(
        'theme_pricing_text_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_pricing_text_color',
            array(
                'label' => __('Pricing Table Text Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_pricing_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'theme_pricing_plan_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_pricing_plan_color',
            array(
                'label' => __('Pricing Table Plan Background Color', 'lois'),
                'section' => 'colors',
                'settings' => 'theme_pricing_plan_color',
            )
        )
    );

    #lois_section_theme_info
    $wp_customize->add_section('lois_section_theme_info', array(
        'title' => esc_html__('Lois - Info', 'lois'),
        'priority' => 0
    ));
    #lois_section_theme_info
    $wp_customize->add_section('lois_section_footer', array(
        'title' => esc_html__('Social Links', 'lois'),
        'priority' => 90
    ));

    #lois_section_theme_info
    $wp_customize->add_section('lois_section_docu', array(
        'title' => esc_html__('Lois Documentation', 'lois'),
        'priority' => 129
    ));
    #lois_panel_frontpage
    $wp_customize->add_panel('lois_panel_frontpage', array(
        'priority' => 61,
        'title' => esc_html__('Front Page', 'lois'),
    ));
    $wp_customize->add_section('lois_section_frontpage_order', array(
        'title' => esc_html__('Sections Order', 'lois'),
        'priority' => 63,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_images', array(
        'title' => esc_html__('About Us Links / Pages', 'lois'),
        'priority' => 64,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_icons', array(
        'title' => esc_html__('Our Team Links / Pages', 'lois'),
        'priority' => 65,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_counters', array(
        'title' => esc_html__(' Counters Links / Pages (Counters)', 'lois'),
        'priority' => 76,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_portfolios', array(
        'title' => esc_html__(' Portfolios Links / Pages (Portfolios)', 'lois'),
        'priority' => 77,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_ourclient', array(
        'title' => esc_html__('Our Client', 'lois'),
        'priority' => 78,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_services', array(
        'title' => esc_html__(' Services Links / Pages (Services)', 'lois'),
        'priority' => 79,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_pricing', array(
        'title' => esc_html__(' Pricing Links / Pages (Pricing)', 'lois'),
        'priority' => 80,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_recent_posts', array(
        'title' => esc_html__('Recent Posts', 'lois'),
        'priority' => 81,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_contactus', array(
        'title' => esc_html__('Contact Us Information', 'lois'),
        'priority' => 82,
        'panel' => 'lois_panel_frontpage',
    ));
    $wp_customize->add_section('lois_section_frontpage_featured_links_contactform', array(
        'title' => esc_html__('Contact Form Information', 'lois'),
        'priority' => 83,
        'panel' => 'lois_panel_frontpage',
    ));
    #lois_section_blog_feed
    $wp_customize->add_section('lois_section_blog_feed', array(
        'title' => esc_html__('Blog Feed', 'lois'),
        'priority' => 90
    ));
    #lois_section_posts
    $wp_customize->add_section('lois_section_posts', array(
        'title' => esc_html__('Posts', 'lois'),
        'priority' => 91,
    ));
    #lois_section_pages
    $wp_customize->add_section('lois_section_pages', array(
        'title' => esc_html__('Pages', 'lois'),
        'priority' => 92,
    ));
}

add_action('customize_register', 'lois_customizer_panels_sections');

/*------------------------------
 Fields
 ------------------------------*/

function lois_customizer_fields($fields)
{

    global $lois_defaults;

    #lois_section_theme_info
    #-----------------------------------------

    #title_tagline
    #-----------------------------------------

    $fields[] = array(
        'type' => 'switch',
        'settings' => 'lois_image_logo_show',
        'label' => esc_html__('Show Image Logo?', 'lois'),
        'description' => esc_html__('Choose whether to display the image logo.', 'lois'),
        'section' => 'title_tagline',
        'priority' => 1,
        'default' => $lois_defaults['lois_image_logo_show'],
        'choices' => array('on' => esc_attr__('SHOW', 'lois'), 'off' => esc_attr__('HIDE', 'lois')),
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_text_logo',
        'label' => esc_html__('Text Logo', 'lois'),
        'description' => esc_html__('Displayed when `Show Image Logo?` is set to `Show` or if there is no logo image uploaded.', 'lois'),
        'section' => 'title_tagline',
        'priority' => 2,
        'default' => $lois_defaults['lois_text_logo'],
        'active_callback' => array(array('setting' => 'lois_image_logo_show', 'operator' => '==', 'value' => '0')),
        'sanitize_callback' => 'sanitize_text_field'
    );

    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_text_logo_sep1',
        'label' => '<hr />',
        'section' => 'title_tagline',
        'priority' => 3
    );

    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_footer_copyright',
        'label' => esc_html__('Copyright Text', 'lois'),
        'description' => esc_html__('Accepts HTML.', 'lois'),
        'section' => 'title_tagline',
        'priority' => 100,
        'default' => $lois_defaults['lois_footer_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    );

    #footer_section

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_social_facebook',
        'label' => esc_html__('Facebook Link', 'lois'),
        'section' => 'lois_section_footer',
        'priority' => 16,
        'default' => $lois_defaults['lois_social_facebook'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_social_twitter',
        'label' => esc_html__('Twitter Link', 'lois'),
        'section' => 'lois_section_footer',
        'priority' => 17,
        'default' => $lois_defaults['lois_social_twitter'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_social_dribbble',
        'label' => esc_html__('Dribbble Link', 'lois'),
        'section' => 'lois_section_footer',
        'priority' => 18,
        'default' => $lois_defaults['lois_social_dribbble'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_social_google',
        'label' => esc_html__('Google Link', 'lois'),
        'section' => 'lois_section_footer',
        'priority' => 19,
        'default' => $lois_defaults['lois_social_google'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_social_pinterest',
        'label' => esc_html__('Pinterest Link', 'lois'),
        'section' => 'lois_section_footer',
        'priority' => 19,
        'default' => $lois_defaults['lois_social_pinterest'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'section' => 'lois_section_docu',
        'type' => 'custom',
        'priority' => 1,
        'description' => wp_kses_post('Check out <a target="_blank" href="https://www.sanyog.in/lois-free-wordpress-themes/">Lois Pro version</a> for full control over <strong>section order</strong> and <strong>section styling</strong>! ', 'lois'),
        'sanitize_callback' => 'sanitize_text',
    );

    #lois_section_frontpage_order
    #-----------------------------------------

    $fields[] = array(
        'type' => 'sortable',
        'settings' => 'lois_frontpage_order',
        'label' => esc_html__('Order of Frontpage Sections', 'lois'),
        'description' => esc_html__('Choose which sections to display by clicking on the `eye` icon and rearrange them in the order you would like them displayed.', 'lois'),
        'section' => 'lois_section_frontpage_order',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_order'],
        'choices' => array(
            'frontpage_section_order_content' => esc_attr__('Frontpage Content', 'lois'),
            'frontpage_section_order_featured_links_images' => esc_attr__('About Us Links/Pages', 'lois'),
            'frontpage_section_order_featured_links_icons' => esc_attr__('Team Links/Pages', 'lois'),
            'frontpage_section_order_featured_links_counters' => esc_attr__('counters Links/Pages (counters)', 'lois'),
            'frontpage_section_order_featured_links_portfolios' => esc_attr__('Portfolios Links/Pages (Portfolios)', 'lois'),
            'frontpage_section_order_featured_links_ourclient' => esc_attr__('Our Client', 'lois'),
            'frontpage_section_order_featured_links_services' => esc_attr__('Services Links/Pages (Services)', 'lois'),
            'frontpage_section_order_featured_links_pricing' => esc_attr__('Pricing Links/Pages (Pricing)', 'lois'),
            'frontpage_section_order_recent_posts' => esc_attr__('Recent Posts', 'lois'),
            'frontpage_section_order_featured_links_contactus' => esc_attr__('Contact Us', 'lois'),
            'frontpage_section_order_featured_links_contactform' => esc_attr__('Contact Form', 'lois'),
        ),
    );

    #lois_section_frontpage_featured_links_images
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_images_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the featured links section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_featured_link_images_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_text'],
        'sanitize_callback' => 'wp_kses_post',
    );

    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_images_pages',
        'label' => esc_html__('featured Link / Page', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'description' => esc_html__('These items will be shown 2 in a row. You can add as many as you like. Click `Add new row` to add a new item. Get Icon shortcode please visit http://fontawesome.io/icons/', 'lois'),
        'priority' => 3,
        'fields' => array(
            'lois_frontpage_featured_link_images_page' => array(
                'type' => 'dropdown-pages',
                'label' => esc_attr__('Select Page', 'lois'),
            ),
            'lois_frontpage_featured_link_images_icon' => array(
                'type' => 'text',
                'label' => esc_attr__('Font Awesome Icon', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_images_color' => array(
                'type' => 'color',
                'label' => esc_attr__('Icon Color', 'lois'),
                'sanitize_callback' => 'sanitize_hex_color',
            ),
        ),
        'choices' => array(
            'limit' => 3,
        ),

    );

    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_images_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 4
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_images_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_images_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_images_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_images_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_images_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_images',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_images_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_icons
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_icons_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the featured links (icons) section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_featured_link_icons_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_icons',
        'label' => esc_html__('featured Link / Page', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        //'max_row'      => 4, // Maximum item can add
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item.', 'lois'),
        'priority' => 3,
        'fields' => array(
            'lois_frontpage_featured_link_icons_image' => array(
                'type' => 'image',
                'label' => esc_attr__('Team Profile Pic', 'lois'),
                'desc' => '',
            ),
            'lois_frontpage_featured_link_icons_profile' => array(
                'type' => 'text',
                'label' => esc_attr__('Profile Link', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_icons_facebook' => array(
                'type' => 'text',
                'label' => esc_attr__('Facebook Url', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_icons_twitter' => array(
                'type' => 'text',
                'label' => esc_attr__('Twitter Url', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_icons_google' => array(
                'type' => 'text',
                'label' => esc_attr__('Google Url', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_icons_linkedin' => array(
                'type' => 'text',
                'label' => esc_attr__('Linkedin Url', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
        ),
        'choices' => array(
            'limit' => 4
        ),

    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_icons_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_icons_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_icons_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_icons_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_icons_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_icons_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_icons',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_icons_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_counters
    #-----------------------------------------

    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_counters',
        'label' => esc_html__('featured Link / Page', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_counters',
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item.', 'lois'),
        'priority' => 3,
        'fields' => array(

            'lois_frontpage_featured_link_counters_name' => array(
                'type' => 'text',
                'label' => esc_attr__('Counters Name', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_counters_value' => array(
                'type' => 'text',
                'label' => esc_attr__('Counters Value', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
        ),
        'choices' => array(
            'limit' => 4,
        ),

    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_counters_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_counters',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_counters_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_counters',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_counters_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_counters_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_counters',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_counters_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_counters_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_counters',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_counters_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_counters_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_counters',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_counters_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_portfolios
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_portfolios_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the featured links (portfolios) section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_featured_link_portfolios_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_portfolios',
        'label' => esc_html__('Portfolios Link / Page', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item.', 'lois'),
        'priority' => 3,
        'fields' => array(
            'lois_frontpage_featured_link_portfolios_page' => array(
                'type' => 'dropdown-pages',
                'label' => esc_attr__('Select Page', 'lois'),
            ),
        ),
        'choices' => array(
            'limit' => 2,
        ),

    );

    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_portfolios_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_portfolios_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_portfolios_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_portfolios_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_portfolios_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_portfolios_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_portfolios',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_portfolios_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_services
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_services_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the featured links (services) section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_featured_link_services_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_services',
        'label' => esc_html__('Services Link / Page', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item. Get Icon shortcode please visit http://fontawesome.io/icons/ ', 'lois'),
        'priority' => 3,
        'fields' => array(
            'lois_frontpage_featured_link_services_page' => array(
                'type' => 'dropdown-pages',
                'label' => esc_attr__('Select Page', 'lois'),
            ),
            'lois_frontpage_featured_link_services_icon' => array(
                'type' => 'text',
                'label' => esc_attr__('Font Awesome Icon', 'lois'),
                'sanitize_callback' => 'sanitize_html_class',
            ),
            'lois_frontpage_featured_link_services_color' => array(
                'type' => 'color',
                'label' => esc_attr__('Icon Color', 'lois'),
                'sanitize_callback' => 'sanitize_hex_color',
            ),
        ),
        'choices' => array(
            'limit' => 3,
        ),

    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_services_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_services_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_services_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_services_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_services_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_services_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_services',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_services_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_ourclient
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_ourclient_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the Our Client section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_featured_link_ourclient_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'lois_frontpage_featured_link_ourclient',
        'label' => esc_html__('Our Client', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item.', 'lois'),
        'priority' => 3,
        'fields' => array(
            'lois_frontpage_featured_link_ourclient_image' => array(
                'type' => 'image',
                'label' => __('Photo', 'lois'),
                'default' => '',
            ),
            'lois_frontpage_featured_link_ourclient_imagelink' => array(
                'label' => esc_attr__('Logo Link', 'lois'),
                'type' => 'text',
                'default' => '',
            ),
        ),
        'choices' => array(
            'limit' => 6,
        ),

    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_ourclient_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_ourclient_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_ourclient_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_ourclient_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_ourclient_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_ourclient_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_ourclient',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_ourclient_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_recent_posts
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_recent_posts_heading',
        'label' => esc_html__('Heading', 'lois'),
        'description' => esc_html__('Heading for the recent posts section.', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_recent_posts_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'textarea',
        'settings' => 'lois_frontpage_recent_posts_text',
        'label' => esc_html__('Text/Description', 'lois'),
        'description' => esc_html__('Text to be displayed under the heading.', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_recent_posts_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type' => 'select',
        'settings' => 'lois_frontpage_recent_posts_number',
        'label' => esc_html__('Number of Posts to Display', 'lois'),
        'description' => esc_html__('Posts display 2 in a row. Choose how many you want to show in the recent posts section on the front page.', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 3,
        'default' => $lois_defaults['lois_frontpage_recent_posts_number'],
        'choices' => array('limit' => 3,
        ),
        'sanitize_callback' => 'absint',
    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_recent_posts_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_recent_posts_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_recent_posts_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_recent_posts_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_recent_posts_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_recent_posts_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_recent_posts_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_recent_posts_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_recent_posts_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_recent_posts_text_color',
        'label' => esc_html__('Section Text Color', 'lois'),
        'section' => 'lois_section_frontpage_recent_posts',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_recent_posts_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_contactus
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_heading1',
        'label' => esc_html__('Heading 1', 'lois'),
        'description' => esc_html__('Heading 1 section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_heading1'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_email1',
        'label' => esc_html__('Email 1', 'lois'),
        'description' => esc_html__('Email 1.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_email1'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_email2',
        'label' => esc_html__('Email 2', 'lois'),
        'description' => esc_html__('Email 2.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 3,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_email2'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_heading2',
        'label' => esc_html__('Heading 2', 'lois'),
        'description' => esc_html__('Heading 2 section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 4,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_heading2'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_phone1',
        'label' => esc_html__('Phone 1', 'lois'),
        'description' => esc_html__('Phone 1.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_phone1'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_phone2',
        'label' => esc_html__('Phone 2', 'lois'),
        'description' => esc_html__('Phone 2.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_phone2'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_heading3',
        'label' => esc_html__('Heading 3', 'lois'),
        'description' => esc_html__('Heading 3 section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_heading3'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_address1',
        'label' => esc_html__('Address 1', 'lois'),
        'description' => esc_html__('Address 1.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_address1'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_address2',
        'label' => esc_html__('Address 2', 'lois'),
        'description' => esc_html__('Address 2.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_address2'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_contactus_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 10
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 11,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 12,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactus_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 13,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_contactus_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactus',
        'priority' => 14,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactus_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    #lois_section_frontpage_featured_links_contactform
    #-----------------------------------------

    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_heading',
        'label' => esc_html__('Contact Form Heading', 'lois'),
        'description' => esc_html__('Contact Form Heading section.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 1,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_description',
        'label' => esc_html__('Contact Form Description', 'lois'),
        'description' => esc_html__('Contact Form Description.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 2,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_description'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_shortcode',
        'label' => esc_html__('Contact Form Shortcode', 'lois'),
        'description' => esc_html__('Contact Form Shortcode.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 3,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_shortcode'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_frontpage_featured_link_contactform_sep',
        'label' => '<hr />',
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 4
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_padding_top',
        'label' => esc_html__('Section Padding Top.', 'lois'),
        'description' => esc_html__('Section Padding Top.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 5,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_padding_top'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_padding_bottom',
        'label' => esc_html__('Section Padding Bottom.', 'lois'),
        'description' => esc_html__('Section Padding Bottom.', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 6,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_padding_bottom'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type' => 'text',
        'settings' => 'lois_frontpage_featured_link_contactform_section_id',
        'label' => esc_html__('Section ID', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'lois'),
        'priority' => 7,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_section_id'],
        'sanitize_callback' => 'sanitize_html_class',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_contactform_background_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 8,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    $fields[] = array(
        'type' => 'color',
        'settings' => 'lois_frontpage_featured_link_contactform_text_color',
        'label' => esc_html__('Section Background Color', 'lois'),
        'section' => 'lois_section_frontpage_featured_links_contactform',
        'priority' => 9,
        'default' => $lois_defaults['lois_frontpage_featured_link_contactform_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );

    /* lois_section_blog_feed */
    #-----------------------------------------

    $fields[] = array(
        'type' => 'switch',
        'settings' => 'lois_blog_feed_meta_show',
        'label' => esc_html__('Show Meta?', 'lois'),
        'description' => esc_html__('Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 1,
        'default' => $lois_defaults['lois_blog_feed_meta_show'],
        'choices' => array('on' => esc_attr__('SHOW', 'lois'), 'off' => esc_attr__('HIDE', 'lois'),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_blog_feed_date_show',
        'label' => esc_html__('Show Date?', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 2,
        'default' => $lois_defaults['lois_blog_feed_date_show'],
        'active_callback' => array(array('setting' => 'lois_blog_feed_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_blog_feed_category_show',
        'label' => esc_html__('Show Category?', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 3,
        'default' => $lois_defaults['lois_blog_feed_category_show'],
        'active_callback' => array(array('setting' => 'lois_blog_feed_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_blog_feed_comments_show',
        'label' => esc_html__('Show Comments?', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 5,
        'default' => $lois_defaults['lois_blog_feed_comments_show'],
        'active_callback' => array(array('setting' => 'lois_blog_feed_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_blog_feed_sep1',
        'label' => '<hr />',
        'section' => 'lois_section_blog_feed',
        'priority' => 6
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_blog_feed_sidebar_show',
        'label' => esc_html__('Show Sidebar?', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 7,
        'description' => esc_html__('Sidebar is not shown by default. If the sidebar is disabled, then the blog feed will be shown in a two-column layout.', 'lois'),
        'default' => $lois_defaults['lois_blog_feed_sidebar_show'],
    );
    $fields[] = array(
        'type' => 'radio',
        'settings' => 'lois_blog_feed_post_format',
        'label' => esc_html__('Post Display Format (With Sidebar)', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 7,
        'description' => esc_html__('This setting is ignored and only excerpts will be displayed (`Excerpt Only`) in a two-column format if the sidebar is disabled.', 'lois'),
        'default' => $lois_defaults['lois_blog_feed_post_format'],
        'choices' => array(
            'Full' => array(
                esc_attr__('Full Content', 'lois'),
            ),
            'Small' => array(
                esc_attr__('Excerpt Only', 'lois'),
            ),
        ),
    );
    $fields[] = array(
        'type' => 'radio',
        'settings' => 'lois_blog_feed_post_images',
        'label' => esc_html__('Post Images', 'lois'),
        'section' => 'lois_section_blog_feed',
        'priority' => 8,
        'description' => esc_html__('Choosing `None` will hide all featured images from the blog feed. `Images - Always` will show the posts with their featured images and the theme default/sample images in place of any missing featured images. `Images - Available` will only show the featured images you have uploaded and no sample images will be shown for the posts where the featured image is missing.', 'lois'),
        'default' => $lois_defaults['lois_blog_feed_post_images'],
        'choices' => array(
            'None' => array(
                esc_attr__('None', 'lois'),
            ),
            'Always' => array(
                esc_attr__('Images - Always', 'lois'),
            ),
            'Available' => array(
                esc_attr__('Images - Available', 'lois'),
            ),
        ),
    );

    /* lois_section_posts */
    #-----------------------------------------
    $fields[] = array(
        'type' => 'switch',
        'settings' => 'lois_posts_meta_show',
        'label' => esc_html__('Show Meta?', 'lois'),
        'description' => esc_html__('Choose whether to display date, category, author, tags for posts on the post page.', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 1,
        'default' => $lois_defaults['lois_posts_meta_show'],
        'choices' => array('on' => esc_attr__('SHOW', 'lois'), 'off' => esc_attr__('HIDE', 'lois'),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_date_show',
        'label' => esc_html__('Show Date?', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 2,
        'default' => $lois_defaults['lois_posts_date_show'],
        'active_callback' => array(array('setting' => 'lois_posts_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_category_show',
        'label' => esc_html__('Show Category?', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 3,
        'default' => $lois_defaults['lois_posts_category_show'],
        'active_callback' => array(array('setting' => 'lois_posts_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_author_show',
        'label' => esc_html__('Show Author?', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 4,
        'default' => $lois_defaults['lois_posts_author_show'],
        'active_callback' => array(array('setting' => 'lois_posts_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_tags_show',
        'label' => esc_html__('Show Tags?', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 5,
        'default' => $lois_defaults['lois_posts_tags_show'],
        'active_callback' => array(array('setting' => 'lois_posts_meta_show', 'operator' => '==', 'value' => '1',),)
    );
    $fields[] = array(
        'type' => 'custom',
        'settings' => 'lois_posts_sep1',
        'label' => '<hr />',
        'section' => 'lois_section_posts',
        'priority' => 6
    );
    $fields[] = array(
        'type' => 'radio-image',
        'settings' => 'lois_posts_sidebar',
        'label' => esc_html__('Layout', 'lois'),
        'description' => esc_html__('Choose whether to display the sidebar.', 'lois'),
        'section' => 'lois_section_posts',
        'default' => $lois_defaults['lois_posts_sidebar'],
        'priority' => 7,
        'choices' => array('0' => trailingslashit(get_template_directory_uri()) . '/assets/images/full.png',
            '1' => trailingslashit(get_template_directory_uri()) . '/assets/images/sidebar.png',),
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_featured_image_show',
        'label' => esc_html__('Show featured Image?', 'lois'),
        'description' => esc_html__('Whether to show featured image at the beginning of the post.', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 8,
        'default' => $lois_defaults['lois_posts_featured_image_show']
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_posts_featured_image_full',
        'label' => esc_html__('Show Banner in Full Size?', 'lois'),
        'description' => esc_html__('Whether to show featured image in full size on the post page.', 'lois'),
        'section' => 'lois_section_posts',
        'priority' => 8,
        'default' => $lois_defaults['lois_posts_featured_image_full']
    );

    /* lois_section_pages */
    #-----------------------------------------

    $fields[] = array(
        'type' => 'radio-image',
        'settings' => 'lois_pages_sidebar',
        'label' => esc_html__('Layout', 'lois'),
        'description' => esc_html__('Choose whether to display the sidebar.', 'lois'),
        'section' => 'lois_section_pages',
        'default' => $lois_defaults['lois_pages_sidebar'],
        'priority' => 1,
        'choices' => array('0' => trailingslashit(get_template_directory_uri()) . '/assets/images/full.png',
            '1' => trailingslashit(get_template_directory_uri()) . '/assets/images/sidebar.png',),
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_pages_featured_image_show',
        'label' => esc_html__('Show featured Image ?', 'lois'),
        'description' => esc_html__('Whether to show featured image at the beginning of the page.', 'lois'),
        'section' => 'lois_section_pages',
        'priority' => 2,
        'default' => $lois_defaults['lois_pages_featured_image_show']
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_pages_featured_image_full',
        'label' => esc_html__('Show Banner in Full Size?', 'lois'),
        'description' => esc_html__('Whether to show featured image in full size on the page.', 'lois'),
        'section' => 'lois_section_pages',
        'priority' => 8,
        'default' => $lois_defaults['lois_pages_featured_image_full']
    );
    $fields[] = array(
        'type' => 'toggle',
        'settings' => 'lois_pages_featured_image_half',
        'label' => esc_html__('Show Banner in Full Size?', 'lois'),
        'description' => esc_html__('Whether to show featured image in full size on the page.', 'lois'),
        'section' => 'lois_section_pages',
        'priority' => 9,
        'default' => $lois_defaults['lois_pages_featured_image_half']
    );
    return $fields;
}

add_filter('kirki/fields', 'lois_customizer_fields');

/**
 * Sanitize checkbox
 */

if (!function_exists('lois_sanitize_checkbox')) :
    function lois_sanitize_checkbox($input)
    {
        if ($input != 1) {
            return 0;
        } else {
            return 1;
        }
    }
endif;

if (!function_exists('lois_sanitize_category')) {
    function lois_sanitize_category($input)
    {
        $categories = get_categories();
        $cats = array();
        $i = 0;
        foreach ($categories as $category) {
            if ($i == 0) {
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $valid = $cats;

        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';

        }
    }
}

function lois_sanitize_text_field($str)
{
    return sanitize_text_field($str);
}

/**
 * Enqueue scripts for customizer
 */
function lois_customizer_pro_js()
{
    wp_enqueue_script('lois-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), '1.3.0', true);

    // wp_localize_script('lois-customizer', 'lois_customizer_pro_js_obj', array(
    //     'pro' => __('Upgrade To Lois Pro', 'lois')
    // ));
    wp_enqueue_style('lois-customizer', get_template_directory_uri() . '/assets/css/customizer.css');
}

add_action('customize_controls_enqueue_scripts', 'lois_customizer_pro_js');

add_action('wp_head', 'lois_styles');
function lois_styles()
{
    $theme_link_color = esc_html( get_theme_mod("theme_link_color") );
    $theme_header_bg_color = esc_html( get_theme_mod("theme_header_bg_color") );
    $theme_header_text_color = esc_html( get_theme_mod("theme_header_text_color") );
    $theme_header_link_color = esc_html( get_theme_mod("theme_header_link_color") );
    $theme_pricing_text_color = esc_html( get_theme_mod("theme_pricing_text_color") );
    $theme_pricing_plan_color = esc_html( get_theme_mod("theme_pricing_plan_color") );

    ?>
    <style type="text/css">
        .header-color1 {
            background-color: <?php echo esc_html($theme_header_bg_color);?>
        }

        .navbar-default .navbar-nav > li > a {
            color: <?php echo esc_html($theme_header_text_color);?>
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
            color: <?php echo esc_html($theme_header_link_color);?>;
        }

        .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
            color: <?php echo esc_html($theme_header_link_color);?>;
        }

        .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
            color: <?php echo esc_html($theme_header_link_color);?>;
        }

        .navbar-default .navbar-nav > li > a:focus {
            color: <?php echo esc_html($theme_header_link_color);?> !important;
        }
        .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover{
            border-color:<?php echo esc_html($theme_link_color);?>;
        }
        .navbar-default .navbar-toggle:focus .icon-bar, .navbar-default .navbar-toggle:hover .icon-bar{
            background-color: <?php echo esc_html($theme_link_color);?>;
        }

        .light-box-style .light-style-boxes-bg:hover {
            border-color: <?php echo esc_html($theme_link_color);?>;
        }

        a:hover, a:focus {
            color: <?php echo esc_html($theme_link_color);?>;
        }
        .team-v11 .team-wrapper-v11:hover > p:before{
            background: <?php echo esc_html($theme_link_color);?>;
        }
        .wpcf7 input[type="submit"], .cont-form .wpcf7 input[type="submit"]{
             background-color: <?php echo esc_html($theme_link_color);?>;
        }
        .single-box-style:hover span.boxIcon{
            background-color: <?php echo esc_html($theme_link_color);?>;
        }
        
        .agency-contact-area-content h6 {
            color: <?php echo esc_html($theme_link_color);?>;
        }

        a {
            color: <?php echo esc_html($theme_link_color);?>;
        }

        #myBtn {
            background-color: <?php echo esc_html($theme_link_color);?>;
        }
        .boxIcon{
            border: 1px solid <?php echo esc_html($theme_link_color);?>;
        }
        .button.full_bg_1 {
            background-color: <?php echo esc_html($theme_link_color);?>;
        }

        a.button_theme_1 {
            border-color: <?php echo esc_html($theme_link_color);?>;
        }

        .agency-membership-plan-content a.button_theme_1 {
            border-color: <?php echo esc_html($theme_link_color);?>;
        }

        .agency-membership-plan-content .button.full_bg_1 {
            background-color: <?php echo esc_html($theme_link_color);?>;
        }

        .widget ul > li > a:focus,
        .widget ul > li:hover a {
            color: <?php echo esc_html($theme_link_color);?>;
        }

        .team-rsp:hover a.view-photo {
            background-color: <?php echo esc_html($theme_link_color);?>;
        }
        .portfolio .portfolio-content-box a.view-photo {
            background-color: <?php echo esc_html($theme_link_color);?>;
        }

        .entry-title a:focus, .entry-title a:hover {
            color: <?php echo esc_html($theme_link_color);?>;
        }

        .btn-blue, .btn-blue:focus, .btn-blue:hover {
            border-color: <?php echo esc_html($theme_link_color);?>;
            background-color: <?php echo esc_html($theme_link_color);?>;
        }

        /* pricing color */
        .agency-membership-plan-content h4, .agency-membership-plan-content h2, .agency-membership-plan-content ul li {
            color: <?php echo esc_html($theme_pricing_text_color);?>;
        }

        .agency-membership-plan-content ul {
            border-color: <?php echo esc_html($theme_pricing_text_color);?>;
        }

        .agency-membership-plan-block .trial-membership-plan-label {
            background: linear-gradient(140deg, <?php echo esc_html($theme_pricing_plan_color); ?> 50px, transparent 20px);
        }

    </style>
    <?php
}
