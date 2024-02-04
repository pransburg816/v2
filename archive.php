<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cold Space
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
    <div class="container-left">
        <div class="row">
            <div class="col-md-8">
                <header class="page-header">
                    <?php
                    the_archive_title('<h3 class="page-title fw-lighter mt-5">', '</h3>');
                    the_archive_description('<div class="taxonomy-description">', '</div>');
                    ?>
                </header>

                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content fw-lighter">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                    <?php
                endwhile;

                the_posts_pagination();
                ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); // Include the sidebar template ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer(); // Include the footer template
