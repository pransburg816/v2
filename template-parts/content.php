<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="fw-lighter"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
            <span class="posted-on">Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
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
