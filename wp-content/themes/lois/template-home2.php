<?php
/**
 * Template Name: Home2
 */
?>
<?php if (is_front_page()) {
    get_header('header');
} else {
    get_header('others');
} ?>
    <div class="home-carousel">
        <?php get_template_part('template-parts/slider');
        ?>
    </div>
<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');
if (!empty($lois_frontpage_order) && is_array($lois_frontpage_order)) {
    foreach ($lois_frontpage_order as $frontpage_section) {
        switch ($frontpage_section) {
            case 'frontpage_section_order_featured_links_images':
                get_template_part('template-parts/frontpage', 'featured-links-aboutarea');
                break;
            case 'frontpage_section_order_featured_links_services':
                get_template_part('template-parts/frontpage', 'featured-links-blogservice');
                break;
            case 'frontpage_section_order_featured_links_icons':
                get_template_part('template-parts/frontpage', 'featured-links-team');
                break;
            case 'frontpage_section_order_featured_links_counters':
                get_template_part('template-parts/frontpage', 'featured-links-counters');
                break;
             case 'frontpage_section_order_featured_links_portfolios':
                get_template_part('template-parts/frontpage', 'featured-links-portfolios2');
                break;
            case 'frontpage_section_order_recent_posts':
                get_template_part('template-parts/frontpage', 'recent-post2');
                break;
            case 'frontpage_section_order_featured_links_contactform':
                get_template_part('template-parts/frontpage', 'featured-links-contactform2');
                break;
        }
    }
}
?>
<?php get_footer(); ?>