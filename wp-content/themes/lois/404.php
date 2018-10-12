<?php if (is_front_page()) {
    get_header();
} else {
    get_header('others');
} ?>
    <section class="page-full">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 error-form">
                   <br />
                   <br />
                   <br />
                </div>
                <div class="col-sm-12">
                    <!-- 404  -->
                    <div id="404-page" <?php post_class(); ?>>
                        <div class="entry-body">
                            <span class="error-404"><?php esc_html_e('404 Page Not Found', 'lois'); ?></span>
                            <br />
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>