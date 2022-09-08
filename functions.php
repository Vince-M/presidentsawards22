<?php

function pres_files() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&family=League+Spartan:wght@300;400;700&display=swap');
  wp_enqueue_style('pres_main_styles', get_theme_file_uri('main.css'));
  wp_enqueue_style('pres_styles', get_theme_file_uri('style.css'));
  wp_enqueue_script( 'pres_js', get_stylesheet_directory_uri() . '/dist/script.js', NULL, '1.0', false);
}

add_action('wp_enqueue_scripts', 'pres_files');


function defer_parsing_of_js( $url ) {
  if ( is_user_logged_in() ) return $url; //don't break WP Admin
  if ( FALSE === strpos( $url, '.js' ) ) return $url;
  if ( strpos( $url, 'jquery.js' ) ) return $url;
  return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

function pres_features() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( "wp-block-styles" );
  add_theme_support( "responsive-embeds" );

  add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'pres_features' );