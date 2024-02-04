<aside id="secondary" class="widget-area">
    <div class="widget">
        <h3 class="fw-lighter">Search</h3>
        <?php get_search_form(); ?>
    </div>

    <div class="widget">
        <h3 class="fw-lighter">Categories</h3>
        <ul>
            <?php
            wp_list_categories(array(
                'title_li' => '',
            ));
            ?>
        </ul>
    </div>

    <div class="widget">
        <h3 class="fw-lighter">Recent Posts</h3>
        <ul>
            <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 5,
            ));

            while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
</aside>
