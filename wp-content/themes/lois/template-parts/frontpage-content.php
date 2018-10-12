<?php while (have_posts()) : the_post(); ?>
    <section id="welcome" class="frontpage-content">
        <div class="container">
            <div class="title col-sm-6 col-md-6">
                <h3 class="text-left <?php lois_animate('zoomIn'); ?>"><?php the_title(); ?></h3>
                <div class="frontpage-text <?php lois_animate('fadeInUp'); ?>"><h2><?php the_content(); ?></h2></div>
            </div>
        </div>
    </section>
<?php endwhile; ?>