<?php $lois_blog_feed_sidebar_show = lois_get_option('lois_blog_feed_sidebar_show'); ?>
<?php if (get_next_posts_link() || get_previous_posts_link()) { ?>
    <?php if ($lois_blog_feed_sidebar_show == 1) { ?>
        <div class="post-pagination clearfix">
            <?php $args = array('prev_text' => __('Previous', 'lois'), 'next_text' => __('Next', 'lois'));
            the_posts_navigation($args); ?>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="post-pagination clearfix">
                    <?php $args = array('prev_text' => __('Previous', 'lois'), 'next_text' => __('Next', 'lois'));
                    the_posts_navigation($args); ?>
                </div>
            </div>
        </div>
    <?php }
} ?>