<?php

// on reset
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// enqueue style & script & others things
function ananke_all() {
  wp_enqueue_style('ananke', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
  wp_enqueue_script('ananke-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0');

  if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'ananke_all', 999);

// On rajoute le js pour le date picker dans l'admin
function ananke_admin_scripts() {
  wp_enqueue_script( 'jquery-ui-datepicker' );
}
add_action('admin_enqueue_scripts', 'ananke_admin_scripts');

// On supprime type='text/javascript'
add_action(
  'after_setup_theme',
  function() {
      add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);

// post-thumbnail
add_theme_support( 'post-thumbnails' );
// gutenberg blocks
add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );

// Post Formats 
add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'aside', 'image', 'link' ) );

// On les renomme
// function rename_post_formats($translation, $text, $context, $domain) {
//   $names = array(
//       'Standard'  => 'Test',
//       'video' => 'hello',
//   );
//   if ($context == 'Post format' && in_array($text, array_keys($names)) ) {
//       $translation = str_replace(array_keys($names), array_values($names), $text);
//   }
//   return $translation;
// }
// add_filter('gettext_with_context', 'rename_post_formats', 10, 4);

//add post-formats to post_type 'my_custom_post_type'
add_post_type_support( 'my_custom_post_type', 'post-formats' );

// widgets
function aside_widgets_init() {

  register_sidebar( array(
  'name' => 'aside',
    'id' => 'aside-widget-area',
    'before_widget' => '<div class="widget %1$s %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ) );
  
  register_sidebar( array(
    'name' => 'aside-blog',
    'id' => 'blog-widget-area',
    'before_widget' => '<div class="widget %1$s %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ) );

  register_sidebar( array(
    'name' => 'aside-widget-regate',
    'id' => 'area-widget-regate',
    'before_widget' => '<div class="widget widget--regate">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  ) );

  }
  add_action( 'widgets_init', 'aside_widgets_init' );

// On rajoute figure sur img et figcaption
function html5_insert_image($html, $id, $caption, $title, $align, $url) {
  $html5 = "<figure id='post-$id media-$id' class='align-$align'>";
  $html5 .= "<img src='$url' alt='$title' />";
  if ($caption) {
    $html5 .= "<figcaption>$caption</figcaption>";
  }
  $html5 .= "</figure>";
  return $html5;
}
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

// MENUS
register_nav_menus( array(
  'menu-default'  => 'Menu par défaut',
) );
// On rajoute un walker
include_once 'inc/walker.nav.menu.php';

// on ajoute un custom post appellé régate
include_once 'inc/custom-post-regate.php';

// On ajoute des meta-box pour les régates
include_once 'inc/metabox-regates/regates-events.php';

// On ajoute un breadcrumb sur pages
include_once 'inc/breadcrumb.php';

// On ajoute une recherche sur la première image d'un article pour le blog
include_once 'inc/first-image-post.php';

// // reset des trucs
//include_once 'inc/functions-config.php';

// //  on utilise des shortcodes pour agréger des articles
// include_once 'inc/posts-shortcode.php';

// // On register des register_nav_menus
// include_once 'inc/register-menus.php';

// // on ajoute la taxonomie de base (catégories / étiquettes) aux images de la librairie
// include_once 'inc/img-taxonomy.php';
