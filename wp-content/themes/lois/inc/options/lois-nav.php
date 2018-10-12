<?php
/*	lois: Post Navigation (Next Prev)
*/
function lois_post_navigation()
{ ?>
    <div class="post-navigation">
        <div class="post-previous"><?php previous_post_link('%link', '<span>' . esc_html__('Previous article', 'lois') . '</span> %title'); ?></div>
        <div class="post-next"><?php next_post_link('%link', '<span>' . esc_html__('Next article', 'lois') . '</span> %title'); ?></div>
    </div><!-- .post-navigation -->
    <div class="clearfix"></div>

    <?php
}

?>