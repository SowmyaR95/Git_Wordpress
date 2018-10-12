<?php
$post_format = get_post_format();

$lois_blog_feed_sidebar_show = lois_get_option('lois_blog_feed_sidebar_show');
$lois_blog_feed_post_images = lois_get_option('lois_blog_feed_post_images');

$image_size = 'lois-thumb';
if (is_front_page() && !is_home()) {
    $image_size = 'lois-thumb';
} else {
    $image_size = $lois_blog_feed_sidebar_show == 1 ? 'lois-large' : 'lois-thumb';
}

$show_video = false;
$lois_show_entry_image = false;
$lois_post_meta = get_post_meta(get_the_ID(), '_video_post_meta', TRUE);
if ($lois_post_meta != '' && array_key_exists('youtube_link', $lois_post_meta)) {
    $show_video = true;
} else {
    $lois_show_entry_image = true;
}
?>

<?php if ($lois_blog_feed_post_images == 'None') { ?>
    <div class="agency-blog-hover"></div><?php } else { ?>
    <div class="agency-blog-img <?php if ($show_video) echo wp_kses( $post_format , allowed_tags() ); ?>">
        <?php

        /* Video */
        if ($post_format == '
        ' && $show_video
        ) { ?>
            <?php
        }

        /* featured Image */
        if ($post_format != 'video' || $lois_show_entry_image) {
            if ($lois_blog_feed_post_images == 'Always' || $lois_blog_feed_post_images == 'Available') {
                if (has_post_thumbnail()) { ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($image_size, array('alt' => the_title_attribute(array('echo' => false)), 'class' => 'img-responsive')); ?></a>
                <?php } else if ($lois_blog_feed_post_images == 'Always') { ?>
                    <a href="<?php the_permalink(); ?>"><img
                                src="<?php echo esc_url(lois_get_sample_image($image_size)) ?>"
                                alt="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="img-responsive"/></a> <?php }
            }
        }

        ?>
    </div>
<?php } ?>

