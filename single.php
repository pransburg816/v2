<?php
/**
 * The template for displaying single blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourThemeName
 */

get_header(); // Include the header template
?>

<main id="primary" class="site-main">
	<div class="radial-gradient"></div>
	 <div class="stars">
        <div class="star bright-star star-cluster-upper-right" style="top: 10%; right: 5%"></div>
    </div>
    <?php render_star_container(); ?>
    <div class="container-left">
		<div class="radial-gradient"></div>
        <div class="row">
            <div class="col-md-8">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
							
                            <h2 class="fw-lighter sticky p-0"><?php the_title(); ?></h2>
                            <div class="entry-meta">
                                <span class="posted-on">Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
                            </div>
                        </header>
                        <div class="entry-content">
							<p class="fw-lighter"><?php the_content(); ?></p>
                        </div>
                        <footer class="entry-footer">
                            <?php
                            if (has_category()) :
                                echo '<div class="cat-links">Categories: ' . get_the_category_list(', ') . '</div>';
                            endif;

                            if (has_tag()) :
                                echo '<div class="tags-links">Tags: ' . get_the_tag_list('', ', ') . '</div>';
                            endif;
                            ?>
                        </footer>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar();?>
            </div> 
        </div>
    </div
<?php
get_footer(); 