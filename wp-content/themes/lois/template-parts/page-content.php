<?php
$lois_pages_featured_image_show = lois_get_option('lois_pages_featured_image_show');
$lois_pages_featured_image_full = lois_get_option('lois_pages_featured_image_full');
$banner_size = $lois_pages_featured_image_full == 1 ? 'full' : 'lois-banner';
$lois_posts_meta_show = lois_get_option('lois_posts_meta_show');
$lois_posts_date_show = lois_get_option('lois_posts_date_show');
$lois_posts_category_show = lois_get_option('lois_posts_category_show');
$lois_posts_author_show = lois_get_option('lois_posts_author_show');
$lois_posts_tags_show = lois_get_option('lois_posts_tags_show');
$lois_posts_featured_image_show = lois_get_option('lois_posts_featured_image_show');
?>

<!-- Page Content -->
<div id="page-<?php the_ID(); ?>" <?php post_class('details entry-page'); ?>>

    <?php /* featured Image */
    if ($lois_pages_featured_image_show == 1 && has_post_thumbnail()) { ?>
        <div class="entry-thumb"><?php the_post_thumbnail($banner_size, array('alt' => the_title_attribute(array('echo' => false)), 'class' => 'img-responsive')); ?></div>
    <?php } ?>

    <div class="entry-body-details-ps">
        <?php /* Title */
        if (get_the_title() != '') { ?>
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php } else { ?>
            <h1 class="entry-title"><a
                        href="<?php the_permalink(); ?>"><?php echo esc_html_e('Post ID: ', 'lois');
                    the_ID(); ?></a></h1>
        <?php } ?>
        <?php /* Meta */
        if ($lois_posts_meta_show == 1) { ?>

            <?php if ($lois_posts_tags_show == 1 && has_tag()) { ?>
                <div class="entry-tags">
                <span><?php echo esc_html_e('Tags: ', 'lois'); ?></span><?php the_tags('', ', '); ?></div><?php } ?>

            <ol class="entry-meta">
                <?php if ($lois_posts_date_show == 1) { ?>
                    <li><i class="fa fa-clock-o"></i> <?php echo get_the_date() ?></li><?php } ?>
                <li><a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i> <?php comments_number(); ?></a>
                </li>
                <?php if ($lois_posts_author_show == 1) { ?>
                    <li><i class="fa fa-user"></i> <a
                            href="<?php echo wp_kses( get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')) , allowed_tags()); ?>"><?php the_author(); ?></a>
                    </li><?php } ?>
            </ol>
        <?php } ?>

        <div class="entry-content clearfix">
            <?php the_content();
            wp_link_pages(); ?>
        </div>

    </div>

</div>
<!-- /Page Content -->