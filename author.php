<?php
/**
 * The template for displaying author archives
 *
 * @package YourThemeName
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
    <div class="container-left">
        <?php
        if (have_posts()) :
            the_post();
            ?>
            <header class="page-header">
                <h1 class="page-title author fw-lighter"><?php the_author(); ?></h1>
                <?php
                // Display the author's bio if available
                if (get_the_author_meta('description')) {
                    echo '<div class="author-bio">' . get_the_author_meta('description') . '</div>';
                }
                ?>
            </header>

            <?php
            // Rewind the loop to display author's posts
            rewind_posts();

            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;

            the_posts_pagination();

        else :
            ?>
            <p><?php esc_html_e('No posts found by this author.', 'yourthemename'); ?></p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php
get_sidebar(); // Include the sidebar template
get_footer(); // Include the footer template
