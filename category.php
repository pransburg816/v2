<?php
/**
 * The template for displaying category archives
 *
 * @package YourThemeName
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
    <div class="container-left">
        <div class="row">
            <div class="col-md-12"> <!-- Added col-md-12 div -->
                <header class="page-header">
                    <?php
                    single_cat_title('<h3 class="page-title fw-lighter mt-5">', '</h3>');
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
                                <h4 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
            </div> <!-- Closing col-md-12 div -->
        </div> <!-- Closing row div -->
    </div>
</main>

<?php

get_footer(); // Include the footer template
