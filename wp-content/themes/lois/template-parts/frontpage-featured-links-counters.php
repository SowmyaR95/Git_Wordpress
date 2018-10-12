<?php
$lois_frontpage_order = lois_get_option('lois_frontpage_order');

if (in_array('frontpage_section_order_featured_links_counters', $lois_frontpage_order)) {
    ?>
    <?php
    $lois_frontpage_featured_link_counters_section_id = lois_get_option('lois_frontpage_featured_link_counters_section_id');
    $lois_frontpage_featured_link_counters_background_color = lois_get_option('lois_frontpage_featured_link_counters_background_color');
    $lois_frontpage_featured_link_counters_padding_top = lois_get_option('lois_frontpage_featured_link_counters_padding_top');
    $lois_frontpage_featured_link_counters_padding_bottom = lois_get_option('lois_frontpage_featured_link_counters_padding_bottom');
    $lois_frontpage_featured_link_counters_heading = lois_get_option('lois_frontpage_featured_link_counters_heading');
    $lois_frontpage_featured_link_counters_text = lois_get_option('lois_frontpage_featured_link_counters_text');
    $lois_frontpage_featured_link_counters = lois_get_option('lois_frontpage_featured_link_counters');
    ?>
    <section
            id="<?php echo esc_html($lois_frontpage_featured_link_counters_section_id); ?>" <?php if ($lois_frontpage_featured_link_counters_background_color != '') { ?> style="background-color:<?php echo esc_html($lois_frontpage_featured_link_counters_background_color); ?>;padding:<?php echo esc_html($lois_frontpage_featured_link_counters_padding_top); ?>px 0 <?php echo esc_html($lois_frontpage_featured_link_counters_padding_bottom); ?>px 0;" <?php } ?>
            class="frontpage-featured-link-counters">
        <div class="meet-my-team team-v1 team_style">
            <div class="container">
                <div class="featured-container">
                    <?php
                    $n = count($lois_frontpage_featured_link_counters);
                    if ($n > 0 && $lois_frontpage_featured_link_counters) {
                        if ($n % 4 == 0) {
                            $class = 'col-md-3';
                            $num = 4;
                        } else {
                            $class = 'col-md-4';
                            $num = 3;
                        }
                        ?>
                        <?php
                        $i = 0;
                        foreach ($lois_frontpage_featured_link_counters as $item) {
                            $name = $item['lois_frontpage_featured_link_counters_name'];
                            $value = $item['lois_frontpage_featured_link_counters_value'];
                            ?>
                            <?php if ($i % $num == 0) { ?><div class="row"><?php } ?>
                            <div class="padding-bottom">
                                <div class="counter-bc">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="single-box-style iconCount">
                                            <div class="box-icon">
                                                <span class="count"><?php echo esc_html($value); ?></span>
                                            </div>
                                            <div class="box-content">
                                                <h3><a href=""><?php echo esc_html($name); ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (($i + 1) % $num == 0) { ?></div><?php } ?>
                            <?php $i++;
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

<?php } ?>