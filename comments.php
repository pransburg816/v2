<?php
/**
 * The template for displaying comments
 *
 * @package YourThemeName
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title fw-lighter">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                echo esc_html__('One Comment', 'yourthemename');
            } else {
                echo esc_html($comments_number) . esc_html__(' Comments', 'yourthemename');
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'yourthemename')); ?></div>
                <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'yourthemename')); ?></div>
            </nav>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'yourthemename'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
