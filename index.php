<?php
/**
 * The main template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cold Space
 */

get_header(); ?>

<style>
ul {
    padding-left: 0
}
</style>

<main id="primary" class="site-main">
    <div class="stars">
        <div class="star bright-star star-cluster-upper-right" style="top: 10%; right: 5%"></div>
    </div>
    <?php render_star_container(); ?>
    <div class="container-left">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php if (have_posts()):
                        while (have_posts()):
                            the_post(); ?>
                            <div class="col-md-6">
                                <article class="highlight-text p-xl-5 p-0 mb-3 highlight" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <header class="entry-header">
                                                <h4 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            </header>
                                            <div class="entry-content">
                                                <p class="fs-6 fw-lighter"><?php the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php
                        endwhile;
                        // Pagination
                        the_posts_pagination([
                            "prev_text" => __("Previous Page", "cold space"),
                            "next_text" => __("Next Page", "cold space"),
                        ]);
                    else:
                         ?>
                        <p><?php esc_html_e(
                            "Sorry, the post you're looking for has been lost in space.",
                            "cold space"
                        ); ?></p>
                    <?php
                    endif; ?>
                </div>
            </div>
             <!-- <div class="col-md-2">
                <div>
                    <?php get_sidebar(); ?>
                </div>
            </div> -->
        </div>
    </div>
</main>
<?php get_footer();
