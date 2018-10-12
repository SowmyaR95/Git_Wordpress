<?php

$lois_blog_feed_meta_show = lois_get_option('lois_blog_feed_meta_show');
$lois_blog_feed_date_show = lois_get_option('lois_blog_feed_date_show');
$lois_blog_feed_category_show = lois_get_option('lois_blog_feed_category_show');
$lois_blog_feed_author_show = lois_get_option('lois_blog_feed_author_show');
$lois_blog_feed_comments_show = lois_get_option('lois_blog_feed_comments_show');
$lois_blog_feed_sidebar_show = lois_get_option('lois_blog_feed_sidebar_show');
$lois_blog_feed_post_format = lois_get_option('lois_blog_feed_post_format');
$lois_blog_feed_post_images = lois_get_option('lois_blog_feed_post_images');

#post size
if (is_front_page() && !is_home()) {
    $lois_blog_feed_post_format = 'Small';
} else {
    $lois_blog_feed_post_format = $lois_blog_feed_sidebar_show == 0 ? 'Small' : $lois_blog_feed_post_format;
}

$class = '';

#no thumbnail
if ($lois_blog_feed_post_images == 'None') {
    $class = $class . ' no-thumb';
} else if ($lois_blog_feed_post_images == 'Available' && !has_post_thumbnail()) {
    $class = $class . ' no-thumb';
}

#post format
$post_format = get_post_format();
$class = $class . ' ' . $post_format . ' wow fadeIn ';
?>

<div class="agency-blog-hover" <?php post_class('entry ' . $class); ?> id="post-<?php the_ID(); ?>">
    <?php get_template_part('template-parts/entry', 'image'); ?>
    <div class="agency-blog-content">
        <?php /* Category */
        if ($lois_blog_feed_meta_show == 1 && $lois_blog_feed_category_show == 1) { ?>
            <p class="entry-category"><?php //echo get_the_category_list(', ') ?></p>
        <?php } ?>
        <?php /* Title */
        if (get_the_title() != '') { ?>
            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
                    <?php the_title(); ?>
                </a></h3>
        <?php } else { ?>
            <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html_e('Post ID: ', 'lois');
                    the_ID(); ?></a></h3>
        <?php } ?>
        <?php /* Content */
        if ($lois_blog_feed_post_format == 'Small') { ?>
            <p><?php echo wp_kses( substr(get_the_excerpt(), 0, 90) , allowed_tags() );
                wp_link_pages(); ?></p>
        <?php } ?>
        <?php /* Meta */
        if ($lois_blog_feed_meta_show == 1) { ?>
            <div class="agency-blog-icons">
                <?php if ($lois_blog_feed_date_show == 1) { ?><p><i
                        class="fa fa-clock-o"></i> <?php echo get_the_date() ?></p><?php } ?>
                <?php if ($lois_blog_feed_comments_show == 1) { ?></p><a href="<?php comments_link(); ?>"><i
                        class="fa fa-comment"></i><?php comments_number(); ?></a></p><?php } ?>
                <?php if ($lois_blog_feed_author_show == 1) { ?><p><i class="fa fa-user"></i><a
                            href="<?php echo wp_kses( get_author_posts_url( get_the_author_meta('ID'), get_the_author_meta('user_nicename')) , allowed_tags() ); ?>"><?php the_author(); ?></a>
                    </p><?php } ?>
            </div>
        <?php } ?>
    </div>
</div>