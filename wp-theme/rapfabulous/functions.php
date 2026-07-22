<?php
defined('ABSPATH') || exit;

define('RF_THEME_VERSION', '1.0.0');

require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/template-tags.php';

/**
 * Theme setup.
 */
function rf_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'script', 'style'));
}
add_action('after_setup_theme', 'rf_setup');

/**
 * Assets. Tailwind CDN + Google Fonts + the theme's own stylesheet/scripts,
 * matching the static build this theme was ported from.
 */
function rf_enqueue_assets() {
    wp_enqueue_script('rf-tailwind', 'https://cdn.tailwindcss.com', array(), null, array('in_footer' => false));
    wp_enqueue_style('rf-fonts', 'https://fonts.googleapis.com/css2?family=Archivo+Black&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@600;700&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;1,9..144,400&display=swap', array(), null);
    wp_enqueue_style('rf-style', get_stylesheet_uri(), array(), RF_THEME_VERSION);
    wp_enqueue_style('rf-yt-embed', get_template_directory_uri() . '/assets/css/yt-embed.css', array(), RF_THEME_VERSION);
    wp_enqueue_script('rf-yt-embed', get_template_directory_uri() . '/assets/js/yt-embed.js', array(), RF_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'rf_enqueue_assets');

/**
 * noindex hidden b2b pages (Affiliate Demo, CONVOS Takeover info, DJ Mix Weekends)
 * the same way the static build did with <meta name="robots" content="noindex, nofollow">.
 */
function rf_maybe_noindex() {
    if (!is_page_template(array('page-demo.php', 'page-convos.php', 'page-djmix.php'))) return;
    echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
}
add_action('wp_head', 'rf_maybe_noindex', 1);
