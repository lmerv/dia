<?php
/*
* on enqueue le style et les script si besoin
*/

function ananke_all() {
  wp_enqueue_style('ananke-css', get_template_directory_uri() . '/style.css', array(), '', 'all');
  // wp_enqueue_script('ananke-nav-js', get_template_directory_uri() . '/js-ananke/main-nav.min.js', array(), '', 'true' );

  //  on mets les scripts seulement si nécessaire
  // if (is_front_page()) {
  //   wp_enqueue_script('ananke-menu-js', get_template_directory_uri() . '/js-ananke/main.min.js', array(), '', 'true' );
  // }

  if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'ananke_all', 999);
