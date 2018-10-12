<?php
$lois_posts_meta_show = lois_get_option('lois_posts_meta_show');
$lois_posts_date_show = lois_get_option('lois_posts_date_show');
$lois_posts_category_show = lois_get_option('lois_posts_category_show');
$lois_posts_author_show = lois_get_option('lois_posts_author_show');
$lois_posts_tags_show = lois_get_option('lois_posts_tags_show');
$lois_posts_featured_image_show = lois_get_option('lois_posts_featured_image_show');
$lois_posts_featured_image_full = lois_get_option('lois_posts_featured_image_full');
$banner_size = $lois_posts_featured_image_full == 1 ? 'full' : 'lois-banner';
?>
<!-- Post Content -->
<div id="post-<?php the_ID(); ?>" <?php post_class('details entry-single'); ?>>
    <div class="entry-body-details vs5 ">
        <div class="shadow-details">
            <div class="row">
                <div class="blog-post-top col-md-9 col-sm-9 clearfix pull-left">
                    <div class="blog-post-author">
                        <div class="author-img-post-top">
                            <div id="author-avatar" class="author-post-top">
                                <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('lois_author_bio_avatar_size', 50)); ?>
                            </div><!-- #author-avatar -->
                        </div>
                    </div>
                    <?php if ($lois_posts_meta_show == 1) { ?>
                        <div class="blog-description">
                            <?php if ($lois_posts_author_show == 1) { ?>
                            <p>
                                <b><a href="<?php echo wp_kses( get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) , allowed_tags()); ?>"
                                      class="text-color-dark"><?php the_author(); ?></a></b> <?php } if ($lois_posts_date_show == 1) { ?>
                                - <?php echo get_the_date() ?></p>
                        <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="blog-post-right col-md-3 col-sm-3 clearfix pull-right">
                    <div class="comment">
                        <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i>
                            <?php comments_number();
                            ?></a>
                    </div>
                </div>
            </div>
            <div class="entry-content clearfix">
                <?php if (get_post_format() == 'video') {
                    $lois_post_meta = get_post_meta(get_the_ID(), '_video_post_meta', TRUE);
                    if (array_key_exists('youtube_link', $lois_post_meta)) { ?>
                    <?php }
                } ?>
                <?php the_content();
                wp_link_pages(); ?>
            </div>
        </div>
        <div class="padding-top">
            <div class="shadow-details ">
                <?php
                if ($lois_posts_tags_show == 1) {
                    $tags = get_terms('post_tag');
                    echo '<ul class="list-inline  padding-bottom">';
                    echo '<li><b><a href="" class="text-color-dark">' . esc_html_e('Tags:', 'lois') . '</a></b></li>';
                    foreach ($tags as $tag) {
                        echo '<li><a href="" class="text-color-dark">' . wp_kses( $tag->name , allowed_tags()) . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
            <div class="shadow-details">
                <?php lois_includes('post-navigation'); ?>
            </div>
            <div class="blog-published blog-tab-area col-sm-12 shadow-details">
                <div class="col-sm-3 col-md-3 pl">
                    <div class="author-img-post">
                        <div id="author-avatar" class="author-post">
                            <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('lois_author_bio_avatar_size', 140)); ?>
                        </div><!-- #author-avatar -->
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 pl pr">
                    <h5><a href=""
                           class="text-color-dark"><?php esc_html_e('Published by', 'lois'); ?><?php the_author(); ?></a>
                    </h5>
                    <?php if (get_the_author_meta('description')) : ?>
                        <p> <?php the_author_meta('description'); ?>
                        </p>
                    <?php endif; ?>
                    <h6><a href=""
                           class="text-color-dark"><?php esc_html_e('View all post by', 'lois'); ?><?php the_author(); ?></a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="padding-top ">
            <div class="shadow-details col-sm-12">
                <?php lois_includes('related-post'); ?>
            </div>
        </div>
    </div>
</div>

<!-- /Post Content -->