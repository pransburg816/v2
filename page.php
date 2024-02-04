<?php
/**
 * The template for displaying individual pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cold Space
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
    <div class="stars">
        <div class="star bright-star star-cluster-upper-right" style="top: 10%; right: 5%"></div>
    </div>
    <?php render_star_container(); ?>
    <div class="container-left">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Page Content Display -->
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="fw-lighter"><?php the_title(); ?></h1>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); // Include the footer template
?>
