<?php
/**
 * lois functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lois
 */

?>
<?php

/*------------------------------
 Customizer
 ------------------------------*/

function lois_customize_register($wp_customize)
{
    $wp_customize->get_section('colors')->title = esc_html__('Custom Colors', 'lois');
    $wp_customize->get_section('colors')->priority = 94;
    $wp_customize->get_section('colors')->priority = 95;
}

add_action('customize_register', 'lois_customize_register');

add_action('customize_controls_enqueue_scripts', 'lois_custom_customize_enqueue');
function lois_custom_customize_enqueue()
{
    wp_enqueue_style('lois-customizer', get_template_directory_uri() . '/inc/style.css');
}

/*------------------------------
 Setup
 ------------------------------*/

function lois_setup()
{
    global $lois_defaults;
    load_theme_textdomain('lois');

    register_nav_menus(array(
        'main' => esc_html__('Homepage', 'lois'),
        'primary' => esc_html__('Innerpage', 'lois'),
        'footer' => esc_html__('Footer', 'lois')));

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption'));
    add_editor_style(array('assets/css/editor-style.css', lois_fonts_url()));
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(347, 210, array('center', 'center'));
    add_image_size('lois-thumb', 347, 210, array('center', 'center'));
    add_image_size('lois-banner', 1090, 420, array('center', 'center'));
    add_image_size('lois-portfolio', 540, 496, array('center', 'center'));
    add_image_size('lois-service', 347, 225, array('center', 'center'));
    add_image_size('lois-large', 740, 380, array('center', 'center'));
    add_image_size('lois-related-ps', 200, 150, array('center', 'center'));
    add_image_size('lois-team', 251, 225, array('center', 'center'));
    add_post_type_support('page', 'excerpt');

  
}

add_action('after_setup_theme', 'lois_setup');

require_once get_template_directory() . '/trt-customize-pro/class-customize.php';

if (!class_exists('Kirki')) {
    require get_template_directory() . '/inc/kirki/kirki.php';
}
require get_template_directory() . '/inc/theme-defaults.php';
require get_template_directory() . '/inc/kirki-config.php';
require get_template_directory() . '/inc/customizer.php';


/*------------------------------
 Styles and Scripts
 ------------------------------*/
function lois_scripts()
{

    /* Styles */
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_register_style('bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.css');

    $lois_custom_colors = 0;
    $lois_custom_typography = 0;

    if ($lois_custom_typography == 0) {
        wp_enqueue_style('lois-fonts', lois_fonts_url(), array(), null);
    }
    //default stylesheet
    $deps = array('bootstrap', 'font-awesome', 'bootstrap-select');
    $this_theme = wp_get_theme();
    wp_enqueue_style('lois-style', get_stylesheet_uri(), $deps, $this_theme->get('Version'));

    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css');
    // Load html5shiv.js
    wp_enqueue_script('lois-html5', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '3.7.0');
    wp_script_add_data('lois-html5', 'conditional', 'lt IE 9');
    // Load respond.js
    wp_enqueue_script('lois-respond', get_template_directory_uri() . '/assets/js/respond.js', array(), '1.3.0');
    wp_script_add_data('lois-html5', 'conditional', 'lt IE 9');
    /* Scripts */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '3.3.5', true);
    wp_enqueue_style('slick-slider-styles', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_script('slick-slider-js', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'));
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.js', array('jquery'), '1.5.4', true);
    wp_enqueue_script('lois-custom_js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'imagesloaded'));
    wp_enqueue_script('lois-counter_js', get_template_directory_uri() . '/assets/js/counterup.js', array('jquery'));
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css');

    $lois_slider_speed = 6000;
    if (get_theme_mod('lois_slider_speed_setting')) {
        $lois_slider_speed = esc_html( get_theme_mod('lois_slider_speed_setting') );
    }
    wp_localize_script("lois_custom-js", "lois_slider_speed", array('vars' => $lois_slider_speed));


    //comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

}

add_action('wp_enqueue_scripts', 'lois_scripts');


if (!function_exists('lois_fonts_url')) :
    /**
     * Register Google fonts for lois.
     *
     * Create your own lois_fonts_url() function to override in a child theme.
     *
     * @since lois 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function lois_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Source Sans Pro font: on or off', 'lois')) {
            $fonts[] = 'Source Sans Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;

/* Related Post */
require get_template_directory() . '/inc/options/related.php';
require get_template_directory() . '/inc/options/lois-includes.php';
require get_template_directory() . '/inc/options/lois-nav.php';

/*-----------------------------------------------------------------------------------*/
# @ Get lois Custom Thumbnail Resizer
/*-----------------------------------------------------------------------------------*/

function lois_thumbnail($pagename, $imgtype = '', $the_thumb = '')
{
    if ($pagename == 'related') {
        $the_thumb = 'lois-related-ps';
        $size = array(220, 150);
    }
    if (has_post_thumbnail()) {
        if ($imgtype) { ?>
            <a class="lois-thumb <?php echo esc_html($imgtype); ?>" href="<?php the_permalink(); ?>"
               title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php
                if (get_theme_mod('resizer_enable')) {
                    lois_thumb();
                } else {
                    the_post_thumbnail($the_thumb, array('alt' => get_the_title()));
                } ?>
                <span class="fa overlay-icon"></span>
            </a>
        <?php } else { ?>
            <a class="lois-thumb" href="<?php the_permalink(); ?>"><?php
                if (get_theme_mod('resizer_enable')) {
                    lois_thumb();
                } else {
                    the_post_thumbnail($the_thumb, array('alt' => get_the_title(), 'title' => get_the_title()));
                } ?>
            </a>
        <?php }
    }
}

function lois_widgets_init()
{

    register_sidebar(array(
        'name' => esc_html__('Sidebar - Default', 'lois'),
        'id' => 'sidebar-default',
        'before_widget' => '<div id="%1$s" class="default-widget widget widget-sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar - Post', 'lois'),
        'id' => 'sidebar-single',
        'before_widget' => '<div id="%1$s" class="single-widget widget widget-sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar - Page', 'lois'),
        'id' => 'sidebar-page',
        'before_widget' => '<div id="%1$s" class="page-widget widget widget-sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_widget('lois_random_post_widgets');
}

add_action('widgets_init', 'lois_widgets_init');

/**
 * Load custom widgets.
 */
require get_template_directory() . '/inc/lois_widgets.php';

require get_template_directory() . '/inc/widgets/lois-random-posts.php';
/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/lois-featured-post.php';
/*------------------------------
 Content Width 
 ------------------------------*/

function lois_content_width()
{
    $content_width = 1200;
    $GLOBALS['content_width'] = apply_filters('lois_content_width', $content_width);
}

add_action('after_setup_theme', 'lois_content_width', 0);

/*------------------------------
 wp_bootstrap_navwalker
 ------------------------------*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Load TGMPA Configs.
 */
require get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm-plugin-activation/tgmpa-lois.php';

/*------------------------------
 Filters
 ------------------------------*/


#move comment field to the bottom of the comments form
function lois_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'lois_move_comment_field_to_bottom');

#excerpt length
function lois_excerpt_length($length)
{
    return 50;
}

add_filter('excerpt_length', 'lois_excerpt_length', 999);

#add class to page nav
function lois_wp_page_menu_class($class)
{
    return preg_replace('/<ul>/', '<ul class="nav navbar-nav">', $class, 1);
}

add_filter('wp_page_menu', 'lois_wp_page_menu_class');

#add class to pagination links
add_filter('next_posts_link_attributes', 'lois_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'lois_prev_posts_link_attributes');

function lois_next_posts_link_attributes()
{
    return 'class="btn btn-blue post-pagination-prev"';
}

function lois_prev_posts_link_attributes()
{
    return 'class="btn btn-blue post-pagination-next"';
}

function lois_archive_title($title)
{
    if (is_home() && get_option('page_for_posts')) {
        $title = get_page(get_option('page_for_posts'))->post_title;
    } else if (is_home()) {
        $title = esc_html__("Home", 'lois');
    }
    return $title;
}

add_filter('get_the_archive_title', 'lois_archive_title');

/*------------------------------
 Theme Functions
 ------------------------------*/

#lois_get_option
if (!function_exists('lois_get_option')) :
    function lois_get_option($key)
    {
        global $lois_defaults;
        if (array_key_exists($key, $lois_defaults))
            $value = get_theme_mod($key, $lois_defaults[$key]);
        else
            $value = get_theme_mod($key);
        return $value;
    }
endif;

if (!function_exists('lois_animate')):
    function lois_animate($x)
    {
        echo esc_html( 'wow ' . $x );
    }
endif;

/*------------------------------
 Example
 ------------------------------*/

#default nav top level pages
function lois_default_nav()
{
    echo '<div class="navbar-collapse collapse">';
    echo '<ul class="nav navbar-nav">';
    $pages = get_pages();
    $n = count($pages);
    $i = 0;
    foreach ($pages as $page) {
        $menu_name = $page->post_title;
        $menu_link = get_page_link($page->ID);
        if (get_the_ID() == $page->ID) $current_class = "current_page_item";
        else {
            $current_class = '';
            $home_current_class = '';
        }
        $menu_class = "page-item-" . $page->ID;
        echo "<li class='page_item " . wp_kses( esc_html( $menu_class ) , allowed_tags() ) . " ". wp_kses( esc_html($current_class) , allowed_tags() ) ."'><a href='" . esc_url($menu_link) . "'>" . wp_kses( esc_html($menu_name) , allowed_tags() ) . "</a></li>";
        $i++;
    }
    echo '</ul>';
    echo '</div>';
}

#lois_get_sample_image
function lois_get_sample_image($what)
{
    global $lois_defaults;
    switch ($what) {
        case 'lois-large':
            $images = $lois_defaults['lois_featured_large_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
        case 'thumbnail':
        case 'lois-thumb':
            $images = $lois_defaults['lois_featured_sample'];
            $rand_key = array_rand($images, 1);
            return ($images[$rand_key]);
    }
}
?>