<nav id="site-navigation" class="main-navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary-menu', // Replace with your menu location
        'menu_id' => 'primary-menu',
        'menu_class' => 'primary-menu',
        'container' => false, // Remove the <div> container
        'link_before' => '<div class="nav-link px-2 pb-3 text-uppercase fw-bold">',
        'link_after' => '</div>',
    ));
    ?>
</nav>
