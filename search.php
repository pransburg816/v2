<?php
/**
 * The template for displaying search results
 *
 * @package YourThemeName
 */

get_header(); // Include the header template
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
    <div class="container-left">


    <div class="container-fluid mt-5" style="padding-left: 0">
      <div class="row mb-5"><div class="col-md-6 iamCol w-100"><p></p><p><span class="fs-1">   
        <!-- Display the hero text for the search results page -->
        <p><?php echo esc_html(get_theme_mod('search_page_hero_text', 'Default text if none is set')); ?></p></span></p></div>

    </div>



     
        <div class="row">
            <div class="col-md-8">
                <header class="page-header">
                    <h1 class="fw-lighter">Search Results for: <?php echo esc_html(get_search_query()); ?></h1>
                </header>

                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        ?>
                        <hr />
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h4 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </header>
                            <div class="entry-content fw-lighter">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>

                        <?php
                    endwhile;
                else :
                    ?>
                    <p><?php esc_html_e('No results found. Try another search.', 'yourthemename'); ?></p>
                <?php
                endif;
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
