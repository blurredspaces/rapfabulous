<?php
defined('ABSPATH') || exit;

/* ==========================================================================
   Replay Episode — episode label + Mixcloud feed path
   ========================================================================== */
function rf_add_episode_meta_box() {
    add_meta_box('rf_episode_details', 'Episode Details', 'rf_render_episode_meta_box', 'show_episode', 'normal', 'high');
}
add_action('add_meta_boxes', 'rf_add_episode_meta_box');

function rf_render_episode_meta_box($post) {
    wp_nonce_field('rf_save_episode_meta', 'rf_episode_meta_nonce');
    $episode_number = get_post_meta($post->ID, '_rf_episode_number', true);
    $feed  = get_post_meta($post->ID, '_rf_mixcloud_feed', true);
    $light = get_post_meta($post->ID, '_rf_mixcloud_light', true);
    ?>
    <p>
      <label for="rf_episode_number"><strong>Episode label</strong> — shown next to the title, e.g. "EP 65"</label><br>
      <input type="text" id="rf_episode_number" name="rf_episode_number" value="<?php echo esc_attr($episode_number); ?>" class="widefat">
    </p>
    <p>
      <label for="rf_mixcloud_feed"><strong>Mixcloud feed path</strong> — from the embed code's <code>feed=</code> param, e.g. <code>/rapfabulous/ep-65-buckshot-convos-takeover/</code></label><br>
      <input type="text" id="rf_mixcloud_feed" name="rf_mixcloud_feed" value="<?php echo esc_attr($feed); ?>" class="widefat" placeholder="/rapfabulous/episode-slug/">
    </p>
    <p>
      <label><input type="checkbox" name="rf_mixcloud_light" value="1" <?php checked($light, '1'); ?>> Use Mixcloud's light widget theme</label>
    </p>
    <p class="description">The <strong>Order</strong> field (Page Attributes box, right sidebar) controls where this episode appears on the Replay Radio page — lower numbers first. To feature an episode on the Affiliate Demo page, its Episode label must be exactly <code>EP 55</code> or <code>EP 30</code>.</p>
    <?php
}

function rf_save_episode_meta($post_id) {
    if (!isset($_POST['rf_episode_meta_nonce']) || !wp_verify_nonce($_POST['rf_episode_meta_nonce'], 'rf_save_episode_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['rf_episode_number'])) {
        update_post_meta($post_id, '_rf_episode_number', sanitize_text_field(wp_unslash($_POST['rf_episode_number'])));
    }
    if (isset($_POST['rf_mixcloud_feed'])) {
        update_post_meta($post_id, '_rf_mixcloud_feed', sanitize_text_field(wp_unslash($_POST['rf_mixcloud_feed'])));
    }
    update_post_meta($post_id, '_rf_mixcloud_light', isset($_POST['rf_mixcloud_light']) ? '1' : '');
}
add_action('save_post_show_episode', 'rf_save_episode_meta');

/* ==========================================================================
   CONVOS Video — YouTube URL
   ========================================================================== */
function rf_add_video_meta_box() {
    add_meta_box('rf_video_details', 'Video Details', 'rf_render_video_meta_box', 'convos_video', 'normal', 'high');
}
add_action('add_meta_boxes', 'rf_add_video_meta_box');

function rf_render_video_meta_box($post) {
    wp_nonce_field('rf_save_video_meta', 'rf_video_meta_nonce');
    $url = get_post_meta($post->ID, '_rf_youtube_url', true);
    ?>
    <p>
      <label for="rf_youtube_url"><strong>YouTube URL</strong> — any share/watch link format</label><br>
      <input type="url" id="rf_youtube_url" name="rf_youtube_url" value="<?php echo esc_attr($url); ?>" class="widefat" placeholder="https://youtu.be/...">
    </p>
    <p class="description">Set a <strong>Featured Image</strong> for this video's thumbnail (falls back to the YouTube auto-thumbnail if left blank). The <strong>Order</strong> field controls placement on the homepage — the lowest number becomes the large featured video, the rest fill the row beneath it.</p>
    <?php
}

function rf_save_video_meta($post_id) {
    if (!isset($_POST['rf_video_meta_nonce']) || !wp_verify_nonce($_POST['rf_video_meta_nonce'], 'rf_save_video_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['rf_youtube_url'])) {
        update_post_meta($post_id, '_rf_youtube_url', esc_url_raw(wp_unslash($_POST['rf_youtube_url'])));
    }
}
add_action('save_post_convos_video', 'rf_save_video_meta');
