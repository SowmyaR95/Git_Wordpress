<?php

/***** Register Widgets *****/

function lois_register_sidebar_posts_widgets()
{
    register_widget('lois_sidebar_posts_widget');
}

add_action('widgets_init', 'lois_register_sidebar_posts_widgets');


class lois_sidebar_posts_widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'sidebar_post', 'description' => __('Posts with featured image', 'lois'));
        parent::__construct('lois-lois-sidebar-posts', __('Sidebar Posts with images', 'lois'), $widget_ops);
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $category = isset($instance['category']) ? $instance['category'] : '';
        $tags = empty($instance['tags']) ? '' : $instance['tags'];
        $postcount = empty($instance['postcount']) ? '5' : $instance['postcount'];
        $offset = empty($instance['offset']) ? '' : $instance['offset'];
        $sticky = isset($instance['sticky']) ? $instance['sticky'] : 0;
        $random = isset($instance['random']) ? $instance['random'] : 0;
        if ($category) {
            $cat_url = esc_url(get_category_link($category));
            $before_title = $before_title . '<a href="' . esc_url($cat_url) . '" class="widget-title-link widget_title">';
            $after_title = '</a>' . $after_title;
        }
        echo ( ! empty( $before_widget ) ) ? wp_kses( $before_widget , allowed_tags() ) : ''; // echo $before_widget;
        if (!empty($title)) {
            echo ( ! empty( $before_title ) ) ? wp_kses( $before_title , allowed_tags() ) : '';
            echo ( ! empty( $title ) ) ? wp_kses( $title , allowed_tags() ) : '';
            // echo ( ! empty( $after_title ) ) ? wp_kses( $after_title , allowed_tags() ) : '';
            // echo $before_title . $title . $after_title;
        } ?>
        <?php
        $args = array('posts_per_page' => esc_html($postcount), 'offset' => esc_html($offset), 'cat' => esc_html($category), 'tag' => esc_html($tags), 'ignore_sticky_posts' => esc_html($sticky));
        if ($random == 1) $args['orderby'] = 'rand';
        $counter = 1;
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):

            $count = 0;
            $widget_posts = '';
            while ($the_query->have_posts()) : $the_query->the_post();

                $post_id = get_the_ID();

                $img_src = '';
                if (has_post_thumbnail($post_id)) {
                    $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'thumbnail');
                    $img_src = $post_image[0];
                }


                $post_categories = wp_get_post_categories($post_id);
                $cat_html = '';
                if (!empty($post_categories)) {
                    foreach ($post_categories as $post_category) {
                        $cat = get_category($post_category);


                        $cat_html .= '<li class="cat"><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . $cat->name . '</a></li>';
                    }
                }

                $post_image = '';
                if (strlen($img_src) > 3) {
                    $post_image = '<img src="' . esc_html($img_src) . '" alt="' . get_the_title() . '" />';
                }
                $widget_posts .= '
		<div class="lois_sidebar_widget clearfix">
			<a href="' . esc_url(get_permalink()) . '"><div class="col-sm-4 col-xs-12 lois_sidebar_post_image">
				' . $post_image . '
			</div></a>
			<div class="lois_sidebar_post_title col-sm-8 col-xs-12 ">
				<a href="' . esc_url(get_permalink()) . '" class="p_title">' . get_the_title() . '</a>

				<ul class="lois_widget">
					<li class="date">' . get_the_date() . '</li>

				</ul>									

			</div><!-- lois_sidebar_post_title -->
		</div><!-- lois_sidebar_widget -->
		';


            endwhile;
            wp_reset_postdata();
            ?>
            <div class="lois_sidebar_posts">
                <?php echo ( ! empty( $widget_posts ) ) ? wp_kses( $widget_posts , allowed_tags() ) : ''; // echo $widget_posts; ?>
            </div><!-- .lois_sidebar_posts -->
        <?php endif; ?>
        <?php
        echo ( ! empty( $after_widget ) ) ? wp_kses( $after_widget , allowed_tags() ) : '';//echo $after_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category'] = absint($new_instance['category']);
        $instance['postcount'] = absint($new_instance['postcount']);
        $instance['offset'] = absint($new_instance['offset']);
        $instance['tags'] = sanitize_text_field($new_instance['tags']);
        $instance['sticky'] = $new_instance['sticky'] ? strip_tags($new_instance['sticky']) : '';
        $instance['random'] = isset($new_instance['random']) ? strip_tags($new_instance['random']) : '';
        return $instance;
    }

    function form($instance)
    {
        $defaults = array('title' => '', 'category' => '', 'tags' => '', 'sticky' => 0, 'offset' => 0, 'random' => 0,);
        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo esc_html($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'lois'); ?></label>
            <input class="widefat" type="text" value="<?php echo esc_html($instance['title']); ?>"
                   name="<?php echo esc_html($this->get_field_name('title')); ?>"
                   id="<?php echo esc_html($this->get_field_id('title')); ?>"/>
        </p>
        <p>
            <input id="<?php echo esc_html($this->get_field_id('random')); ?>"
                   name="<?php echo esc_html($this->get_field_name('random')); ?>" type="checkbox"
                   value="1" <?php checked('1', $instance['random']); ?>/>
            <label for="<?php echo esc_html($this->get_field_id('random')); ?>"><?php esc_html_e('Random Posts', 'lois'); ?></label>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('category')); ?>"><?php esc_html_e('Select a Category:', 'lois'); ?></label>
            <select id="<?php echo esc_html($this->get_field_id('category')); ?>" class="widefat"
                    name="<?php echo esc_html($this->get_field_name('category')); ?>">
                <option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>><?php esc_html_e('All', 'lois'); ?></option>
                <?php
                $categories = get_categories(array('type' => 'post'));
                foreach ($categories as $cat) {
                    echo '<option value="' . wp_kses( $cat->cat_ID , allowed_tags() ) . '"';
                    if ($cat->cat_ID == $instance['category']) {
                        echo ' selected="selected"';
                    }
                    echo '>' . wp_kses( $cat->cat_name , allowed_tags() ) . ' (' . wp_kses( $cat->category_count , allowed_tags() ) . ')';
                    echo '</option>';
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id('tags')); ?>"><?php esc_html_e('Filter Posts by Tags (e.g. lifestyle):', 'lois'); ?></label>
            <input class="widefat" type="text" value="<?php echo esc_html($instance['tags']); ?>"
                   name="<?php echo esc_html($this->get_field_name('tags')); ?>"
                   id="<?php echo esc_html($this->get_field_id('tags')); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_html($this->get_field_id('offset')); ?>"><?php esc_html_e('Skip:', 'lois'); ?></label>
            <input type="text" size="2" value="<?php echo esc_html($instance['offset']); ?>"
                   name="<?php echo esc_html($this->get_field_name('offset')); ?>"
                   id="<?php echo esc_html($this->get_field_id('offset')); ?>"/> <?php esc_html_e('Posts', 'lois'); ?>
        </p>
        <p>
            <input id="<?php echo esc_html($this->get_field_id('sticky')); ?>"
                   name="<?php echo esc_html($this->get_field_name('sticky')); ?>" type="checkbox"
                   value="1" <?php checked('1', $instance['sticky']); ?>/>
            <label for="<?php echo esc_html($this->get_field_id('sticky')); ?>"><?php esc_html_e('Ignore Sticky Posts', 'lois'); ?></label>
        </p>
        <?php
    }
}