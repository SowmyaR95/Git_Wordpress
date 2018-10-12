<?php $lois_blog_feed_sidebar_show = lois_get_option('lois_blog_feed_sidebar_show'); ?>

<?php
$i = 0;
if (have_posts()) {
    while (have_posts()) : the_post();
        if ($lois_blog_feed_sidebar_show == 0 && $i % 3 == 0) { ?> <div class="row"> <?php }
    if ($lois_blog_feed_sidebar_show == 0) { ?>
        <div class="col-md-4"> <?php }
        get_template_part('template-parts/entry');
        $i++;
    if ($lois_blog_feed_sidebar_show == 0) { ?> </div> <?php }
        if ($lois_blog_feed_sidebar_show == 0 && $i % 3 == 0) { ?> </div> <?php }
    endwhile;
    if ($lois_blog_feed_sidebar_show == 0 && $i % 3 != 0) { ?> </div> <?php }
}
?>
<?php if ($lois_blog_feed_sidebar_show == 1) get_template_part('template-parts/feed', 'pagination'); ?>