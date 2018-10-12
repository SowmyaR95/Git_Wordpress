<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lois
 */
if (is_front_page()) {
    get_header();
} else {
    get_header('others');
} ?>
<?php $lois_blog_feed_sidebar_show = lois_get_option('lois_blog_feed_sidebar_show'); ?>

    <section class="blog-feed sample-post">
        <div class="container">
            <?php if ($lois_blog_feed_sidebar_show == 1) { ?>
                <div class="">
                    <div class="col-md-8">
                        <div class="main-column two-columns ">
                            <h1 class="feed-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
                            <?php get_template_part('template-parts/feed'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="main-column one-column">
                    <h1 class="feed-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
                    <?php get_template_part('template-parts/feed'); ?>
                </div>
                <?php get_template_part('template-parts/feed', 'pagination'); ?>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>