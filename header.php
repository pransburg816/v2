<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta name="description" content="Kansas City Based Freelance Web developer | Phillip T. Ransburg">
    <meta name="keywords" content="Front-end Developer, SEO, Digital Marketing, Freelance, WordPress Themes, Bootstrap, Tailwind, Google Tag Manager, Google Analytics, SEO, Kansas City, Missouri">
    <title><?php wp_title("|", true, "right"); ?></title>
    <link rel="preconnect" href="https://rsms.me/">
    <?php wp_head(); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4Q6GNF45M5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-4Q6GNF45M5');
    </script>
</head>

<body class="main-bg-blue" <?php body_class(); ?>>
    <div class="radial-gradient"></div>
    <div id="content" class="site-content">
        <div class="col-12 col-lg-4 fixed-column">
            <div class="container mb-4">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>

            <div class="site-badge <?php if (!is_front_page()) echo 'hide-on-mobile'; ?>">
                <?php
                $args = ["post_type" => "site_profile", "posts_per_page" => 1, 
                "orderby" => "date",
                "order" => "DESC",
                ];
                $site_profile_posts = new WP_Query($args);
                if ($site_profile_posts->have_posts()) {
                    echo '
                    <div class="site-profile">';
                    while ($site_profile_posts->have_posts()) {
                        $site_profile_posts->the_post();
                        echo '<h3 class="fs-6 mt-0">' . apply_filters("the_content", get_the_content()) . "</h3>";
                    }
                    echo "
                    </div>";
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>

        <div class="right-column">
            <div class="radial-gradient"></div>
                <div class="col-12 col-lg-8 offset-lg-4">
                    <header id="header" class="site-header">
                          <nav class="navbar navbar-expand-lg navbar-light">
                          <div class="container m-0 p-0">
                            <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="main-menu list-unstyled navbar-nav ml-auto">
                                 <?php wp_nav_menu([
                                    "theme_location" => "primary-menu",
                                    "container" => "",
                                    "items_wrap" => '%3$s',
                                    "link_before" => '<div class="nav-link nav-adjust text-uppercase">',
                                    "link_after" => "</div>",
                                ]); ?>
                                  <li class="<?php if (is_page('Featured')) echo ' active'; ?>">
                                        <a id="menuButton" class="nav-link text-uppercase" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >Featured</a>
                                      </li>
                                    
                                      <li class="<?php if (is_page('Contact me')) echo ' active'; ?>">
                                        <a id="menuButtonContact" class="nav-link text-uppercase" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOneContact" aria-expanded="true" aria-controls="collapseOne">Contact me</a>
                                      </li>
                              </ul>
                            </div>
                          </div>
                        </nav>
                    <div class="container-fluid highlight p-0">
                           <?php
                        if (is_front_page() && is_home()) {
                            $current_page_id = 0;
                        } elseif (is_front_page()) {
                            $current_page_id = get_option("page_on_front");
                        } else {
                            $current_page_id = get_queried_object_id();
                        }

                        $found_match = false;
                        for ($i = 1;$i <= 10;$i++) {
                            if (get_theme_mod("custom_text_page_{$i}") == $current_page_id) {
                                $found_match = true;
                                $help_text = get_theme_mod("help_text_{$i}", "");
                                $create_text = get_theme_mod("create_text_{$i}", "");
                                $inner_text = get_theme_mod("inner_text_{$i}", "");
                                $bg_image = get_theme_mod("hero_bg_image_{$i}", "");
                                $bg_opacity = get_theme_mod("hero_bg_image_opacity_{$i}", "0.7");
                                if (!empty($bg_image)) {
                                    echo '<div class="hero-message" style="background-image: url(' . esc_url($bg_image) . "); opacity: " . esc_attr($bg_opacity) . ';">';

                                } else {
                                    echo '<div class="hero-message">';
                                }
                                echo '<div class="row">';
                                echo '<div class="col-md-6 iamCol w-100">';
                                echo "<p>" . esc_html($help_text) . "</p>";
                                echo "<p>" . esc_html($create_text) . '<span class="fs-1">...</span></p>';
                                echo "</div>";
                                echo '<div class="col-md-6 mt-0 slideCol w-100">';
                                echo '<div class="inner">';
                                echo "<p>" . esc_html($inner_text) . "</p>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>"; 
                                echo "</div>";
                            
                                ?>
                        <div class="col-1 mx-auto mb-3 pb-3 arrow-container">
                            <?php 
                                if (!is_page("custom-audio-creations-project") && !is_page("dub-empire-project")): ?>
                             <div class="navigation-arrows">
                                <button id="desktopLeftArrow" class="navigation-arrow carousel-control-prev-icon"></button>
                                <button id="desktopRightArrow" class="navigation-arrow carousel-control-next-icon"></button>
                            </div>
                                <?php
                                endif; ?>
                        </div>
                            <?php break;
                            }
                        }
                        if (!$found_match) { ?>
                            <div class="row">
                                <div class="col-md-6 iamCol w-100">
                                    <p>Checkout</p>
                                    <p>My latest<span class="fs-1">...</span></p>
                                </div>
                                <div class="col-md-6 slideCol w-100">
                                    <div class="inner">
                                        <p>Blogs</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                   <?php
                        $current_slug = get_post_field("post_name", get_post());
                        $excluded_slugs = ["featured", "contact-me"];
                    ?>
        <div id="slideOutMenu">

             <button class="mt-2 px-2 fw-lighter float-end" id="closeButton"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>
                    </button>

            <div class="container p-0">
                 

                <div class="mt-5">
                    <blockquote><h3 class="fw-lighter">Featured</h3></blockquote>
                </div>
                <div class="col-md-12 mt-2">
                    <?php
                    if (!in_array($current_slug, $excluded_slugs)): ?>
                        <div id="carouselHome" class="carousel slide highlight highlight-text p-3">
                            <h4 class="fw-lighter pt-1 mt-2">Recent Projects</h4>
                            <ol class="carousel-indicators">
                                <?php
                                    $carousel_query = new WP_Query(["post_type" => "carousel"]);
                                    $carousel_count = $carousel_query->post_count;
                                    for ($i = 0; $i < $carousel_count; $i++) {
                                        $active_class = $i == 0 ? 'class="active"' : ""; 
                                        echo "<li data-bs-target='#carouselHome' data-bs-slide-to='{$i}' {$active_class}></li>";
                                    }
                                ?>
                            </ol>
                            
                            <div class="carousel-inner">
                                <?php if ($carousel_query->have_posts()): 
                                    while ($carousel_query->have_posts()): 
                                        $carousel_query->the_post(); 
                                        $active_class = $carousel_query->current_post == 0 ? "active" : ""; 
                                        $site_url = get_post_meta(get_the_ID(), "site_url", true);
                                        $project_info_link = get_post_meta(get_the_ID(), "project_info_link", true);
                                ?>
                                <div class="carousel-item <?php echo $active_class; ?>">
                                    <div class="row p-4 mt-2" itemscope itemtype="https://schema.org/WebPage">
                                        <div class="col-md-6">
                                            <figure>
                                                <img decoding="async" src="<?php the_post_thumbnail_url(); ?>" width="100%" height="100%" class="card-img-top shadow-lg shadow-lg p-1 mb-4 bg-body rounded" alt="<?php the_title(); ?>">
                                            </figure>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h5 class="fw-lighter text-uppercase"><?php the_title(); ?></h5>
                                            <a class="fs-6 text-decoration-none" href="<?php echo esc_url($site_url); ?>" itemprop="url">View Site</a>
                                            <a class="px-3 fs-6 text-decoration-none" href="<?php echo esc_url($project_info_link); ?>" itemprop="relatedLink">Project Info</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div> 
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 highlight highlight-text p-3">
                      <h4 class=" fw-lighter sticky pt-1 mt-2">Featured Blog</h4>
                    <div class="row">
                      <?php
                        $latest_post_query = new WP_Query([
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        if ($latest_post_query->have_posts()) :
                            while ($latest_post_query->have_posts()) :
                                $latest_post_query->the_post(); ?>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>"></a>
                                    <?php endif; ?>
                                    <h5 class="fw-lighter mt-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <p class="fw-lighter"><?php the_excerpt(); ?></p>
                            <?php endwhile;
                        else : ?>
                            <p>No blog posts found.</p>
                        <?php endif;

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
         <button id="menuButton2" class="gear-icon" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
              </svg>
          </button>
        </div> 
                   
        <div id="slideOutMenu2">
             <button class="mt-2 px-2 fw-lighter float-end" id="closeButton2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>
                    </button>
                <div class="container">
                    <div class="row p-0 mt-5">
                        <div class="mb-5">
                            <blockquote><h3 class="fw-lighter">Site Settings</h3></blockquote>
                        </div>
                        <h5 class="fw-lighter p-3 mb-3">Page Highlights</h5>
                        <div id="highlightLinks" class="col-lg-6 p-3 mb-1 text-center">
                            <div class="text fw-bold text-center">Highlight Links</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                            </svg>
                        </div>
                         <div id="highlightText" class="col-lg-6 p-3 mb-1 text-center">
                            <div class="text fw-bold text-center">Highlight Bold Text</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row p-0 justify-content-center">
                        <div class="w-50 p-3 highlight highlight-text mb-1 text-center">
                            <button id="resetButton" tabindex="0" aria-label="Reset font size, line height, highlight links, bold text, letter spacing, and brightness">
                                Reset Highligts
                            </button>
                        </div>
                    </div>
                    <h5 class="fw-lighter mb-3 mt-4 p-3">Font Adjustment</h5>
                    <div class="row p-0">
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center">Adjust Font</div>
                            <div class="font-adjuster">
                                <button class="font-adjuster__plus-button" tabindex="0" aria-label="Increase font size">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                                  <span class="font-size-indicator">100%</span>
                                 <button class="font-adjuster__minus-button" tabindex="0" aria-label="Decrease font size">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                    </svg>
                                </button>
                             </div>
                        </div>
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center">Line Height</div>
                            <div class="font-adjuster">
                                <button class="line-height-adjuster__plus-button" tabindex="0" aria-label="Increase line height">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                              </button>
                              <span class="line-height-indicator">100%</span>
                              <button class="line-height-adjuster__minus-button" tabindex="0" aria-label="Decrease line height">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                </svg>
                              </button>
                            </div>
                        </div>
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center">Letter Spacing</div>
                            <div class="font-adjuster">
                              <button class="letter-spacing-adjuster__plus-button" tabindex="0" aria-label="Increase letter spacing">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                              </button>
                              <span class="letter-spacing-indicator">100%</span>
                              <button class="letter-spacing-adjuster__minus-button" tabindex="0" aria-label="Decrease letter spacing">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                </svg>
                              </button>
                            </div>
                        </div>
                   </div>

                    <div class="row p-0 justify-content-center">
                        <div class="w-50 highlight highlight-text p-3 mb-1 text-center">
                            <button class="reset-button" tabindex="0" aria-label="Reset font size and line height">
                                Reset Font Settings
                            </button>
                        </div>
                    </div>

                    <div class="row p-0">
                        <div class="col-lg-12 p-3 mb-1 text-center">
                             <div class="text fw-bold">Adjust Page Brightness</div>
                            <div id="brightnessText" class="text p-3">100%</div>
                            <input type="range" min="0" max="2" step="0.1" value="1" id="brightnessSlider" class="slider" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

                <div id="slideOutMenuContact">
                     <button class="mt-2 px-2 fw-lighter float-end close-menu" id="closeButtonContact"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>
                    </button>

                        <div class="container">
                            <div class="mb-5 mt-5">
                                <blockquote><h3 class="fw-lighter">Contact</h3></blockquote>
                            </div>
                        <form action="https://forms.un-static.com/forms/09a70418d12f3d9d9c5160babd119264e88ab8c2" method="POST" autocomplete="on">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="contact-form">
                                        <p class="fw-lighter fs-4 text-white">Feel free to reach out! Let's build something together.</p>
                                        <div class="mb-3 position-relative highlight highlight-text p-0">
                                            <label for="name" class="fw-lighter p-2">Your Name:</label>
                                            <input type="text" class="form-control bg-transparent nav-contact-form text-white fw-lighter" id="name" name="name" autocomplete="on" required>
                                        </div>
                                        <div class="mb-3 position-relative highlight highlight-text p-0">
                                            <label for="name" class="fw-lighter p-2">Email:</label>
                                            <input type="email" class="form-control bg-transparent nav-contact-form text-white fw-lighter fw-6" id="email" name="email" autocomplete="on" required>
                                        </div>
                                        <div class="mb-3 position-relative highlight highlight-text p-0">
                                            <label for="name" class="fw-lighter p-2">Message:</label>
                                            <textarea class="form-control bg-transparent nav-contact-form text-white fw-lighter" id="message" name="message" rows="5" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="form-control-submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div> 
        </div>
    </header>







