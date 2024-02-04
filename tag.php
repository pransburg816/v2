<?php
/**
 * The template for displaying tag archives
 *
 * @package YourThemeName
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
    <div class="container-left">
        <header class="page-header">
            <?php
            single_tag_title('<h2 class="page-title fw-lighter mt-5">Tag: ', '</h2>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <hr />
                    <header class="entry-header">
                        <h3 class="entry-title fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-content fw-lighter">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_pagination();

        else :
            ?>
            <p><?php esc_html_e('No posts found.', 'yourthemename'); ?></p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php
get_sidebar(); // Include the sidebar template
get_footer(); // Include the footer template
