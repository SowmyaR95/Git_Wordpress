<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
<?php $lois_pages_sidebar = lois_get_option('lois_pages_sidebar'); ?>
<?php while (have_posts()) : the_post(); ?>
    <section class="page">
        <div class="container">
            <?php if ($lois_pages_sidebar == 1) { ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-column two-columns">
                            <?php get_template_part('template-parts/page', 'content'); ?>
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
                <?php get_template_part('template-parts/page', 'content'); ?>
                <?php if (comments_open()) {
                    comments_template();
                } ?>
            <?php } ?>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>