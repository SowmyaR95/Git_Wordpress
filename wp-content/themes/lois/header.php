<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lois
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php if (is_singular() && 'open' === get_option('default_ping_status')) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll">
<div class="main-wrapper">
    <div class="header-wrapper">

        <!-- Header -->
        <header>
            <!-- Header Row 2 -->
            <div class="header-row header-row-2 header-color1">
                <div class="container">
                    <div class="row">
                        <!-- Left -->
                        <div class="header-row-2-left col-sm-3">
                            <div class="logo <?php if (lois_get_option('lois_image_logo_show') == 1) { ?>image-logo<?php } ?>">
                                <?php
                                if (lois_get_option('lois_image_logo_show') == 1) {
                                     the_custom_logo();
                                } else {
                                    $lois_text_logo = lois_get_option('lois_text_logo');
                                    if ($lois_text_logo == '') $lois_text_logo = get_bloginfo('name'); ?>
                                    <h1 class="header-logo-text pull-left"><a
                                                href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($lois_text_logo) ?></a>
                                    </h1>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /Left -->
                        <!-- Right -->
                        <div class="header-row-2-right col-sm-9 col-md-9">
                            <nav class="navbar navbar-default navbar-right">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target=".navbar-collapse" aria-expanded="false">
                                        <span class="sr-only"><?php echo esc_html_e('Toggle Navigation', 'lois'); ?></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <?php
                                $args = array('theme_location' => 'main',
                                    'depth' => 2,
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => 'lois_default_nav',
                                    'walker' => new wp_bootstrap_navwalker());
                                wp_nav_menu($args);
                                ?>
                            </nav>
                        </div>
                        <!-- /Right -->
                    </div>
                </div>
            </div>
            <!-- /Header Row 2 -->
        </header>
        <!-- /Header -->
    </div>
