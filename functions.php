<?php
/**
 * Functions and custom code for cold space
 *
 * @package cold space
 */

// Define constants for theme directory paths
define("YOUR_THEME_DIR", get_template_directory());
define("YOUR_THEME_URI", get_template_directory_uri());

// Enqueue styles and scripts
function custom_enqueue_styles()
{
    // Deregister the built-in version of jQuery from WordPress
    wp_deregister_script('jquery');
  
    // Register the CDN version of jQuery
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
  
    // Enqueue the CDN version of jQuery
    wp_enqueue_script('jquery');
    
    wp_enqueue_style(
        "inter-font-rsms",
        "https://rsms.me/inter/inter.css",
        [],
        null
    );
    wp_enqueue_style(
        "inter-font-google",
        "https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap",
        [],
        null
    );
    wp_enqueue_style(
        "bootstrap-css",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_script(
        "bootstrap-js",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js",
        ["jquery"],
        null,
        true
    );
    wp_enqueue_style(
        "theme-style",
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get("Version")
    );
    wp_enqueue_script(
        "custom-js",
        get_template_directory_uri() . "/assets/js/custom.js",
        ["jquery"],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');

// Register a custom navigation menu
function coldspace_register_menus()
{
    register_nav_menus([
        "primary-menu" => esc_html__("Primary Menu", "cold space"),
    ]);
}
add_action("init", "coldspace_register_menus");

// Enable support for post thumbnails (featured images)
add_theme_support("post-thumbnails");

// Add support for a custom logo (if desired)
add_theme_support("custom-logo", [
    "height" => 100,
    "width" => 100,
    "flex-width" => true,
    "flex-height" => true,
]);

// Define the maximum content width for embedded media and images
if (!isset($content_width)) {
    $content_width = 800; // Adjust this to match your theme's design
}

// Site Profile
function site_profile_post_type()
{
    $labels = [
        "name" => "Site Profile",
        "singular_name" => "Site Profile",
    ];

    $args = [
        "labels" => $labels,
        "public" => true,
        "menu_icon" => "dashicons-text",
        "supports" => ["title", "editor"],
    ];

    register_post_type("site_profile", $args);
}
add_action("init", "site_profile_post_type");

// Register a widget area (sidebar)
function coldspace_widgets_init()
{
    register_sidebar([
        "name" => esc_html__("Sidebar", "cold space"),
        "id" => "sidebar-1",
        "description" => esc_html__(
            "Add widgets here to appear in your sidebar.",
            "cold space"
        ),
        "before_widget" => '<section id="%1$s" class="widget %2$s">',
        "after_widget" => "</section>",
        "before_title" => '<h2 class="widget-title">',
        "after_title" => "</h2>",
    ]);
}
add_action("widgets_init", "coldspace_widgets_init");


// Header Carousel
function create_carousel_post_type() {
    register_post_type('carousel',
        array(
            'labels'      => array(
                'name'          => __('Carousel', 'textdomain'),
                'singular_name' => __('Carousel Item', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => false,
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_carousel_post_type');

// Header Carousel

function carousel_meta_box() {
    add_meta_box('carousel_meta', 'Carousel Details', 'carousel_meta_box_callback', 'carousel');
}

function carousel_meta_box_callback($post) {
    wp_nonce_field(basename(__FILE__), 'carousel_nonce');
    $stored_meta = get_post_meta($post->ID);
    ?>

    <p>
        <label for="site_url">Site URL:</label>
        <input type="url" name="site_url" value="<?php if (isset($stored_meta['site_url'])) echo $stored_meta['site_url'][0]; ?>">
    </p>
    <p>
        <label for="project_info_link">Project Info Link:</label>
        <input type="url" name="project_info_link" value="<?php if (isset($stored_meta['project_info_link'])) echo $stored_meta['project_info_link'][0]; ?>">
    </p>

    <?php
}

add_action('add_meta_boxes', 'carousel_meta_box');

function carousel_save_meta_box_data($post_id) {
    if (!isset($_POST['carousel_nonce'])) return;
    if (!wp_verify_nonce($_POST['carousel_nonce'], basename(__FILE__))) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['site_url'])) {
        update_post_meta($post_id, 'site_url', $_POST['site_url']);
    }
    if (isset($_POST['project_info_link'])) {
        update_post_meta($post_id, 'project_info_link', $_POST['project_info_link']);
    }
}

add_action('save_post', 'carousel_save_meta_box_data');



// Add a custom excerpt length
function coldspace_custom_excerpt_length($length)
{
    return 20; // Adjust the number of words you want in the excerpt
}
add_filter("excerpt_length", "coldspace_custom_excerpt_length");

// Customize the excerpt "read more" link
function coldspace_excerpt_more($more)
{
    return '... <a href="' .
        get_permalink() .
        '" class="read-more">' .
        esc_html__("Read More", "cold space") .
        "</a>";
}
add_filter("excerpt_more", "coldspace_excerpt_more");

function add_custom_id_to_menu_item($atts, $item, $args)
{
    if ("contact" == $item->title) {
        $atts["id"] = "showFormLink";
    }
    return $atts;
}
add_filter("nav_menu_link_attributes", "add_custom_id_to_menu_item", 10, 3);

/*** Renders the star container markup.*/
function render_star_container()
{
    ?>
        <div class="star-container">
            <div class="star" style="top: 30%; right: 35%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 18%; left: 40%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 35%; left: 46%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 45%; left: 55%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 50%; left: 65%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 58%; left: 75%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 64%; left: 83%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 85%; left: 80%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 83%;left: 75%;width: 3px;height: 3px;"></div>
            <div class="star" style="top: 79%; left: 82%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 5%; left: 10%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 10%; left: 8%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 7%; left: 85%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 12%; left: 88%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 30%; left: 35%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 18%; left: 40%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 35%; left: 46%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 45%; left: 55%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 50%; left: 65%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 58%; left: 75%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 64%; left: 83%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 85%; left: 80%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 83%; left: 75%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 78%;left: 76%;width: 1px;height: 1px;"></div>
            <div class="star" style="top: 79%; left: 82%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 5%; left: 10%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 10%; left: 8%; width: 2px; height: 2px;"></div>
            <div class="star" style="top: 7%; left: 85%; width: 1px; height: 1px;"></div>
            <div class="star" style="top: 12%; left: 88%; width: 1px; height: 1px;"></div>
        </div>
        <?php
}

/*** Hero Message */
function custom_text_customizer($wp_customize) {

    // Custom Text Section
    $wp_customize->add_section('custom_texts', array(
        'title'    => __('Hero Message', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // For up to 10 custom text entries
    for ($i = 1; $i <= 10; $i++) {

         // Search Page Hero Message
        $wp_customize->add_setting('search_page_hero_text', array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control('search_page_hero_text', array(
            'label'    => 'Search Page Hero Text',
            'section'  => 'custom_texts',
            'type'     => 'textarea',
            'settings' => 'search_page_hero_text',
        ));

        // Page selector for custom text
        $wp_customize->add_setting("custom_text_page_{$i}", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("custom_text_page_{$i}", array(
            'label'    => "Custom Text Entry {$i} Page",
            'section'  => 'custom_texts',
            'type'     => 'dropdown-pages',
            'settings' => "custom_text_page_{$i}",
        ));

        // Help Text
        $wp_customize->add_setting("help_text_{$i}", array(
            'default'   => 'I HELP',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("help_text_{$i}", array(
            'label'    => "Help Text Entry {$i}",
            'section'  => 'custom_texts',
            'type'     => 'text',
            'settings' => "help_text_{$i}",
        ));

        // Create Text
        $wp_customize->add_setting("create_text_{$i}", array(
            'default'   => 'CREATE STUFF THAT',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("create_text_{$i}", array(
            'label'    => "Create Text Entry {$i}",
            'section'  => 'custom_texts',
            'type'     => 'text',
            'settings' => "create_text_{$i}",
        ));

        // Inner Text
        $wp_customize->add_setting("inner_text_{$i}", array(
            'default'   => 'INSPIRES',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control("inner_text_{$i}", array(
            'label'    => "Inner Text Entry {$i}",
            'section'  => 'custom_texts',
            'type'     => 'text',
            'settings' => "inner_text_{$i}",
        ));

        // Background Image for Each Hero Message Entry
        $wp_customize->add_setting("hero_bg_image_{$i}", array(
            'default'       => '',
            'transport'     => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_bg_image_{$i}", array(
            'label'    => "Background Image for Entry {$i}",
            'section'  => 'custom_texts',
            'settings' => "hero_bg_image_{$i}",
        )));

        // Background Image Opacity for Each Hero Message Entry
        $wp_customize->add_setting("hero_bg_image_opacity_{$i}", array(
            'default'           => '0.5',
            'transport'         => 'refresh',
            'sanitize_callback' => 'floatval', // Ensure input is a floating number.
        ));

        $wp_customize->add_control("hero_bg_image_opacity_{$i}", array(
            'label'    => "Background Image Opacity for Entry {$i}",
            'section'  => 'custom_texts',
            'type'     => 'number',
            'input_attrs' => array(
                'min'   => '0',
                'max'   => '1',
                'step'  => '0.01',
                'style' => 'width: 60px;',
            ),
        ));
    }
}

add_action('customize_register', 'custom_text_customizer');

//Icons Font Awesome
function theme_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

class Bootstrap_Dropdown_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= $indent . '<li' . $class_names .'>';
        $attributes = ' href="' . esc_attr($item->url) . '"';
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

function custom_hero_image_css() {
    // Replace 'your_theme_textdomain' and 'hero_bg_image_1' with your actual text domain and setting ID.
    $image = get_theme_mod('hero_bg_image_1', '');

    if ($image) {
        ?>
            <style type="text/css">
                /* This will apply the styles to devices with a maximum width of 768px */
                
                @media (max-width: 768px) {
                    .your-hero-image-class {
                        height: 500px;
                        /* Adjust this value according to your needs */
                        background-image: url('<?php echo esc_url($image); ?>');
                        background-size: cover;
                        background-position: center;
                    }
                }
            </style>
            <?php
    }
}
add_action('wp_head', 'custom_hero_image_css');