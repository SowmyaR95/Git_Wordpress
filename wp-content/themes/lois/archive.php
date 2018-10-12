<?php
/**
 * The template for displaying archive pages
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
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="main-column two-columns">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <?php
                                if (have_posts()) : ?>
                                    <header class="page-header">
                                        <?php
                                        the_archive_title('<h1 class="page-title">', '</h1>');
                                        the_archive_description('<div class="archive-description">', '</div>');
                                        ?>
                                    </header><!-- .page-header -->
                                    <?php
                                    /* Start the Loop */
                                    while (have_posts()) : the_post();
                                        if ($lois_pages_sidebar == 1) {
                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part('template-parts/page', 'content');
                                            if (comments_open()) {
                                                comments_template();
                                            }
                                         } 
                                        
                                    endwhile;
                                    ?>
                                    <div class="col-sm-12"><?php
                                    the_posts_navigation();
                                    ?>
                                    </div><?php
                                else :
                                    get_template_part('template-parts/page', 'content');
                                endif; ?>
                            </main><!-- #main -->
                        </div><!-- #primary -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <?php
                        get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
