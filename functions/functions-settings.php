<?php

/**
 * Theme-settings and general functions that normally don't need much editing
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       heptalytics_1.0.0
 *
 *
 */


/*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 loag og-tags
    2.3 preload fonts
    2.4 allow svg uploads
    2.5 reset inline image dimensions (for css-scaling of images)
    2.6 reset image-processing
    2.7 hide core-updates for non-admins
    2.8 disable backend-theme-editor
    2.9 load textdomain (based on locale)
    2.10 manage excerpt length
==================================================================================*/



/*==================================================================================
  1.0 THEME SETTINGS
==================================================================================*/


/* 1.1 ENQUEUE SCRIPTS/STYLES
/––––––––––––––––---––––––––*/
// enqueues  sctipts and styles (optional typekit embed)
// » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function heptalytics_enqueue()
{
  // fontawesome cdn
  wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

  // jQuery (from wp core)
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.6.0');
  wp_enqueue_script('jquery');
  // styles
  wp_enqueue_style('normalize', get_template_directory_uri() . '/inc/assets/css/normalize.css', false, null);
  wp_enqueue_style('animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", false, null);
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/inc/assets/css/owl.carousel.min.css', false, null);
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/inc/assets/css/owl.theme.default.min.css', false, null);
  wp_enqueue_style('heptalytics_/styles', get_template_directory_uri() . '/assets/styles/style.min.css', false, null);
  // Typekit
  global $typekit_id;
  if ($typekit_id) :
    wp_enqueue_style('typekit/styles', 'https://use.typekit.net/' . $typekit_id . '.css', false, null);
  endif;
  // Internet Explorer HTML5 support
  wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
  wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');
  // scripts
  wp_register_script('heptalytics_/scripts', get_template_directory_uri() . '/assets/scripts/all.min.js', false, array('jquery'), true);
  wp_enqueue_script('heptalytics_/scripts');
  // load bootstrap js
  wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
  wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
  //wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
  //wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true);
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/inc/assets/js/owl.carousel.min.js', array(), '', true);
  wp_enqueue_script('owl-carousel-a11y', get_template_directory_uri() . '/inc/assets/js/owlcarousel-a11y.js', array(), '', true);
}
function theme_gsap_script()
{
  // The core GSAP library
  wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true);
  // Observer - with gsap.js passed as a dependency
  wp_enqueue_script('gsap-obs', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/Observer.min.js', array('gsap-js'), false, true);
  // ScrollTrigger - with gsap.js passed as a dependency
  wp_enqueue_script('gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), false, true);
  // ScrollToPlugin - with gsap.js passed as a dependency
  wp_enqueue_script('gsap-stp', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js', array('gsap-js'), false, true);
}

add_action('wp_enqueue_scripts', 'theme_gsap_script');

add_action('wp_enqueue_scripts', 'heptalytics_enqueue');

// Admin Style
function my_custom_admin_stylesheet()
{
  wp_enqueue_style('custom-admin', get_stylesheet_directory_uri() . '/assets/styles/admin/admin.min.css');
}

//This loads the function above on the login page
add_action('admin_enqueue_scripts', 'my_custom_admin_stylesheet');

// Login Style
function my_custom_login_stylesheet()
{
  wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/styles/admin/login.min.css');
}

add_filter('the_content', 'my_lazyload_content_images');
add_filter('widget_text', 'my_lazyload_content_images');
add_filter('wp_get_attachment_image_attributes', 'my_lazyload_attachments', 10, 2);

// Replace the image attributes in Post/Page Content
function my_lazyload_content_images($content)
{
  // Ensure the content is a string
  if (!is_string($content)) {
    return $content;
  }

  // Regular expression to match images without the "skip-lazy" class
  $pattern = '/(<img[^>]*?)(?<!skip-lazy)(?<!data-)src=/Ui';

  // Replace "src" with "data-src" for images without the "skip-lazy" class
  $content = preg_replace($pattern, '$1data-src=', $content);

  // Replace "srcset" with "data-srcset" for images without the "skip-lazy" class
  $pattern = '/(<img[^>]*?)(?<!skip-lazy)(?<!data-)srcset=/Ui';
  $content = preg_replace($pattern, '$1data-srcset=', $content);

  return $content;
}

// Replace the image attributes in Post Listing, Related Posts, etc.
function my_lazyload_attachments($atts, $attachment)
{
  $atts['data-src'] = $atts['src'];
  unset($atts['src']);

  if (isset($atts['srcset'])) {
    $atts['data-srcset'] = $atts['srcset'];
    unset($atts['srcset']);
  }

  return $atts;
}

//This loads the function above on the login page
add_action('login_enqueue_scripts', 'my_custom_login_stylesheet');
// function register_navwalker(){
// 	require_once get_template_directory() . '/bootstrap-navwalker.php';
// }
// add_action( 'after_setup_theme', 'register_navwalker' );
/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
  require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
/* 1.2 THEME SUPPORT
/––––––––––––––––––––––––*/
function heptalytics_theme_support()
{

  // Enable plugins to manage the document title
  // => http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Add Theme Support for Menus
  // => http://codex.wordpress.org/Navigation_Menus
  add_theme_support('menus');

  // Add HTML5 markup for search forms, comment forms, comment lists, gallery, and caption
  // => https://codex.wordpress.org/Theme_Markup
  add_theme_support('html5');

  // Add Theme Support for Post thumbnails
  // => http://codex.wordpress.org/Post_Thumbnails
  // => http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // => http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'heptalytics_theme_support');


/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/


/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function heptalytics_wphead_cleanup()
{
  // remove the generator meta tag
  remove_action('wp_head', 'wp_generator');
  // remove wlwmanifest link
  remove_action('wp_head', 'wlwmanifest_link');
  // remove RSD API connection
  remove_action('wp_head', 'rsd_link');
  // remove wp shortlink support
  remove_action('wp_head', 'wp_shortlink_wp_head');
  // remove next/previous links (this is not affecting blog-posts)
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  // remove generator name from RSS
  add_filter('the_generator', '__return_false');
  add_filter('show_admin_bar', '__return_false');
  // disable emoji support
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  // disable automatic feeds
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
  // remove rest API link
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  // remove oEmbed link
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'heptalytics_wphead_cleanup');


/* 2.2 LOAG OG-TAGS
/––––––––––––––––––––––––*/
// loads open graph tags » http://ogp.me/
// use 'heptalytics_load_ogtags(true)' to also display the og:image tag
function heptalytics_ogtags()
{
  echo '
  <meta property="og:title" content="' . get_bloginfo('name') . ' - ' . get_the_title() . '">
  <meta property="og:type" content="website">
  <meta property="og:url" content="' . get_bloginfo('url') . '">
  <meta property="og:site_name" content="' . get_bloginfo('name') . '">
  <meta property="og:description" content="' . get_bloginfo('description') . '">';
  global $ogimg;
  if ($ogimg[0][1]) :
    echo '
    <meta property="og:image" content="' . get_bloginfo('template_url') . $ogimg[1][1] . '">
    <meta property="og:image:secure_url" content="' . get_bloginfo('template_url') . $ogimg[1][1] . '">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="' . $ogimg[2][1] . '">
    <meta property="og:image:height" content="' . $ogimg[3][1] . '">
    <meta property="og:image:alt" content=' . $ogimg[4][1] . '">';
  endif;
}

/* 2.3 PRELOAD FONTS
/––––––––––––––––––––––––*/
// preloads fonts that are hosted locally into the page header
// add your desired fonts and font-types into $font_names and $font_formats
function heptalytics_preload_fonts()
{
  // font_names and font_formats are defined in 'functions-setup.php'
  global $preload_fonts;
  if ($preload_fonts) {
    global $font_names;
    global $font_formats;
    // define font folder
    $font_folder = '/assets/fonts/';
    // loop through fonts
    foreach ($font_names as $font_name) {
      // loop through font-formats
      foreach ($font_formats as $font_format) {
        $path = get_bloginfo('template_url') . $font_folder . $font_name . '.' . $font_format;
        echo '<link rel="preload" href="' . $path . '" as="font" type="font/' . $font_format . '" crossorigin="anonymous">' . "\r\n";
      }
    }
  }
}


/* 2.4 ALLOW SVG UPLOADS
/–––––––––––––––––––––––*/
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/* 2.5 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions($html, $post_id, $post_image_id)
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.6 RESET IMAGE-PROCESSING
/––––––––––––––––––––––––*/
add_filter('jpeg_quality', function ($arg) {
  return 100;
});
add_filter('wp_editor_set_quality', function ($arg) {
  return 100;
});


/* 2.7 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update()
{
  if (!current_user_can('update_core')) {
    remove_action('admin_notices', 'update_nag', 3);
  }
}
add_action('admin_head', 'onlyadmin_update', 1);


/* 2.8 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
/* function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1); */


/* 2.9 LOAD TEXTDOMAIN (BASED ON LOCALE)
/––––––––––––––––––––––––––––––––––––––*/
load_theme_textdomain('_s', get_template_directory() . '/languages');

/* 2.10 MANAGE EXCERPT LENGTH
/––––––––––––––––––––––––––––––––––––––*/
function wp_trim_all_excerpt($text)
{
  global $post;
  if ('' == $text) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    // remove br tags
    $text = str_replace('/<br/>', '', $text);
  }
  $text = strip_shortcodes($text);
  $text = strip_tags($text);
  $excerpt_length = apply_filters('excerpt_length', 10);
  $excerpt_more = apply_filters('excerpt_more', ' ... ');
  $words = explode(' ', $text, $excerpt_length + 1);
  if (count($words) > $excerpt_length) {
    array_pop($words);
    $text = implode(' ', $words);
    $text = $text . $excerpt_more;
  } else {
    $text = implode(' ', $words);
  }
  return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');

function load_more_posts_callback()
{
  $page = $_POST['page'];
  $posts_per_page = $_POST['posts_per_page'];
  $offset = 1 + (($page - 1) * $posts_per_page); // Calculate the offset

  $args = array(
    'posts_per_page' => $posts_per_page,
    'offset' => $offset,
    'order' => 'DESC',
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post();
      $categories = get_the_category();
?>
      <div class="blog__item">
        <a href="<?php the_permalink() ?>" class="blog__item__image">
          <?php the_post_thumbnail('medium'); ?>
        </a>
        <div class="blog__item__content">
          <div class="blog__item__author">
            <span><?php the_author(); ?></span>
            <span><?php echo get_the_date(); ?></span>
          </div>
          <a href="<?php the_permalink() ?>">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt() ?></p>
          </a>
          <?php if (!empty($categories)) : ?>
            <div class="d-flex gap-2">
              <?php foreach ($categories as $category) : ?>
                <a class="badge rounded-pill bg-light text-dark" href="<?php echo site_url();  ?>/category/<?php echo $category->slug; ?>">
                  <?php echo $category->name; ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
<?php
    endwhile;
    wp_reset_postdata();
  else :
    // No more posts found
    echo '';
  endif;

  die(); // Always die in AJAX callbacks
}

add_action('wp_ajax_load_more_posts', 'load_more_posts_callback'); // For logged in users
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback'); // For not logged in users
