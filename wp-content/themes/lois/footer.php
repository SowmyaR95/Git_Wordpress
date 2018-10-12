<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lois
 */

?>
<footer class="footer_variation_style_01">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 fv_sty_left">
                <div class="logo <?php if (lois_get_option('lois_image_logo_show') == 1) { ?>image-logo<?php } ?>">
                    <?php
                    if (lois_get_option('lois_image_logo_show') == 1) {
                        the_custom_logo();
                    } else {
                        $lois_text_logo = lois_get_option('lois_text_logo');
                        if ($lois_text_logo == '') $lois_text_logo = get_bloginfo('name'); ?>
                        <h1 class="header-logo-text"><a
                                    href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($lois_text_logo) ?></a>
                        </h1>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="footer_variation_socialicon pull-right">
                    <?php $lois_social_facebook = lois_get_option('lois_social_facebook');
                    $lois_social_twitter = lois_get_option('lois_social_twitter');
                    $lois_social_dribbble = lois_get_option('lois_social_dribbble');
                    $lois_social_google = lois_get_option('lois_social_google');
                    ?>
                    <?php if( !empty($lois_social_facebook) ){?>
                    <a class="footer_socialiconbutton iconbutton theme_facebook_btn-color footer_theme_circleicon"
                       href="<?php if(!empty($lois_social_facebook) ){ echo esc_url($lois_social_facebook); }  ?>">
                        <span class="fa fa-facebook icon_button"></span>
                    </a>
                    <?php } if( !empty($lois_social_twitter) ){?>
                    <a class="footer_socialiconbutton iconbutton theme_twitter_btn-color footer_theme_circleicon"
                       href="<?php if(!empty($lois_social_twitter)){echo esc_url($lois_social_twitter); } ?>">
                        <span class="fa fa-twitter icon_button"></span>
                    </a>
                    <?php } if( !empty($lois_social_dribbble) ){?>
                    <a class="footer_socialiconbutton iconbutton theme_dribbble_btn-color footer_theme_circleicon"
                       href="<?php if(!empty($lois_social_dribbble)){ echo esc_url($lois_social_dribbble); } ?>">
                        <span class="fa fa-dribbble icon_button"></span>
                    </a>
                    <?php } if( !empty($lois_social_google) ){?>
                    <a class="footer_socialiconbutton iconbutton theme_google-plus_btn-color footer_theme_circleicon"
                       href="<?php if(!empty($lois_social_google)){ echo esc_url($lois_social_google); } ?>">
                        <span class="fa fa-google-plus"></span>
                    </a>
                    <?php } ?>
                    <button onclick="topFunction()" id="myBtn" title="<?php esc_attr_e('Go to top','lois'); ?>"><i class="fa fa-angle-up"></i></button>
                </div>
                <?php $lois_footer_copyright = lois_get_option('lois_footer_copyright');
                if ($lois_footer_copyright) { ?>
                    <div class="rights-res"><?php echo wp_kses_post($lois_footer_copyright); ?></div>
                <?php } ?>
                <div class="rights-res"><?php echo wp_kses_post(lois_get_option('lois_theme_credits')); ?></div>
            </div>
        </div>
    </div>
</footer>
</div><!-- /Main Wrapper -->
<?php wp_footer(); ?>
</body>
</html>












