<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lois
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if (1 === $comments_number) {
                /* translators: %s: post title */
                printf( wp_kses( _x('One thought on &ldquo;%s&rdquo;', 'comments title', 'lois'), get_the_title()) , allowed_tags() );
            } else {
                printf(
                wp_kses(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'lois'
                    ) , allowed_tags() ),
                    wp_kses( number_format_i18n($comments_number) , allowed_tags() ),
                    get_the_title()
                );
            }
            ?>
        </h4>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'lois'); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link(esc_html_e('Older Comments', 'lois')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html_e('Newer Comments', 'lois')); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>
        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 80,

            ));
            ?>
        </ul><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'lois'); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link(esc_html_e('Older Comments', 'lois')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html_e('Newer Comments', 'lois')); ?></div>
                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (comments_open()) : ?>
        <?php
        $fields = array(
            'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_html( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__('Name', "lois") . '*" /></p>',
            'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_html( $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__('E-mail', "lois") . '*" /></p>',
            'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_html($commenter['comment_author_url'], "lois") . '" size="30" placeholder="' . esc_attr__('Website', "lois") . '" /></p>'
        );
        $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields), 'comment_field' => '<p class="comment-form-comment"> <textarea  placeholder="' . esc_attr__('Comment', "lois") . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>');

        comment_form($defaults); ?>
    <?php endif; ?>
</div><!-- #comments -->
