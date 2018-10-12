<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lois
 */

if (is_front_page()) {
    get_header();
} else {
    get_header('others');
} ?>
<?php $lois_posts_sidebar = lois_get_option('lois_posts_sidebar'); ?>
<?php
$lois_posts_meta_show = lois_get_option('lois_posts_meta_show');
$lois_posts_date_show = lois_get_option('lois_posts_date_show');
$lois_posts_category_show = lois_get_option('lois_posts_category_show');
$lois_posts_author_show = lois_get_option('lois_posts_author_show');
$lois_posts_tags_show = lois_get_option('lois_posts_tags_show');
$lois_posts_featured_image_show = lois_get_option('lois_posts_featured_image_show');
$lois_posts_featured_image_full = lois_get_option('lois_posts_featured_image_full');
$banner_size = $lois_posts_featured_image_full == 1 ? 'full' : 'lois-banner';
$lois_blog_feed_post_images = lois_get_option('lois_blog_feed_post_images');
$image_size = 'lois-thumb';
?>
<?php while (have_posts()) : the_post(); ?>
    <div class="banner-area">
        <?php /* featured Image */
        if ($lois_posts_featured_image_show == 1 && has_post_thumbnail()) { ?>
            <div class="entry-thumb"><a
                        href="<?php the_permalink(); ?>"><?php the_post_thumbnail($banner_size, array('alt' => the_title_attribute(array('echo' => false)), 'class' => 'img-responsive')); ?></a>
            </div>
        <?php } else {
            ?>
            <div class="entry-thumb"><a href="<?php the_permalink(); ?>"><img
                            src="<?php echo esc_url(lois_get_sample_image($image_size)) ?>"
                            alt="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="img-responsive"/></a></div>
            <?php
        } ?>
        <div class="container">
            <div class="banner-desp">
                <div class="container">
                    <?php
                    if ($lois_posts_meta_show == 1 && $lois_posts_category_show == 1) { ?>
                        <h3 class="entry-category"><?php echo wp_kses( get_the_category_list(', ') , allowed_tags() ); ?></h3>
                    <?php } ?>
                    <?php /* Title */
                    if (get_the_title() != '') {
                        ?>
                        <h2 class="entry-title text-color-white content-black"><?php echo wp_kses( substr(get_the_title(), 0, 30) , allowed_tags() ); ?></h2>
                    <?php } else { ?>
                        <h2 class="entry-title"><?php echo esc_html_e('Post ID: ', 'lois');
                            the_ID(); ?></h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-post">
        <div class="container">
            <?php if ($lois_posts_sidebar == 1) { ?>
                <div class="row">
                    <div class="col-md-8 main-class">
                        <div class="main-column two-columns">
                            <?php get_template_part('template-parts/single', 'content'); ?>
                            <?php if (comments_open()) {
                                comments_template();
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <?php get_template_part('template-parts/single', 'content'); ?>
                <?php if (comments_open()) {
                    comments_template();
                } ?>
            <?php } ?>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>