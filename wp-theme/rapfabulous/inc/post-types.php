<?php
defined('ABSPATH') || exit;

/**
 * Replay Episodes — feeds the Replay Radio page and the two Mixcloud
 * embeds on the Affiliate Demo page. Not public: these exist only to be
 * looped over by page templates, not to generate their own front-end URLs.
 */
function rf_register_show_episode() {
    register_post_type('show_episode', array(
        'labels' => array(
            'name'               => 'Replay Episodes',
            'singular_name'      => 'Replay Episode',
            'add_new_item'       => 'Add New Episode',
            'edit_item'          => 'Edit Episode',
            'all_items'          => 'Replay Episodes',
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-format-audio',
        'supports'     => array('title', 'page-attributes'),
    ));
}
add_action('init', 'rf_register_show_episode');

/**
 * CONVOS Videos — feeds the homepage CONVOS section. First by menu_order
 * is the large featured card; the rest fill the two-column grid below it.
 */
function rf_register_convos_video() {
    register_post_type('convos_video', array(
        'labels' => array(
            'name'               => 'CONVOS Videos',
            'singular_name'      => 'CONVOS Video',
            'add_new_item'       => 'Add New Video',
            'edit_item'          => 'Edit Video',
            'all_items'          => 'CONVOS Videos',
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-video-alt3',
        'supports'     => array('title', 'thumbnail', 'page-attributes'),
    ));
}
add_action('init', 'rf_register_convos_video');
