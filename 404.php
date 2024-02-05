<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Cold Space
 */

get_header();
?>

<style>

    .hero-message {
        display: none;
    }
    .navigation-arrows {
        display: none;
    }

</style>

<main id="primary" class="site-main">
     <div class="stars">
        <div class="star bright-star star-cluster-upper-right" style="top: 10%; right: 5%"></div>
    </div>
    <?php render_star_container(); ?>
    <div class="container-left mt-5">
        <div class="row">
            <div class="col-md-12">
                <header class="page-header">
                    <h1 class="page-title fw-lighter">That page cannot be found</h1>
                </header>
                <div class="page-content">
                    <p class="fw-lighter">It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
                    <?php get_search_form(); // Display the search form ?>
                    <div class="widget mt-3">
                        <h3 class="widget-title fw-lighter">Recent Posts</h3>
                        <ul class="fw-lighter">
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
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
