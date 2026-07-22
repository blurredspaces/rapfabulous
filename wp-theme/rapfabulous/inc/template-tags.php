<?php
defined('ABSPATH') || exit;

/**
 * Radio market schedule. Small and changes rarely, so it stays a hardcoded
 * PHP array (single source of truth) rather than a custom post type —
 * echoed into footer.php as JSON for the on-air/off-air JS to consume.
 */
function rf_markets() {
    return array(
        array('city' => 'New York, NY',      'station' => '94.7 The Block', 'day' => 'Sun', 'start' => 17, 'end' => 19, 'tz' => 'America/New_York',    'stream' => 'https://www.audacy.com/stations/947theblocknyc'),
        array('city' => 'Richmond, VA',      'station' => '106.5 The Beat', 'day' => 'Sun', 'start' => 10, 'end' => 12, 'tz' => 'America/New_York',    'stream' => 'https://www.audacy.com/stations/1065thebeat'),
        array('city' => 'Orlando, FL',       'station' => '102 JAM',        'day' => 'Sun', 'start' => 20, 'end' => 22, 'tz' => 'America/New_York',    'stream' => 'https://www.audacy.com/stations/102jamzorlando'),
        array('city' => 'San Francisco, CA', 'station' => '102 JAMS',       'day' => 'Sun', 'start' => 20, 'end' => 22, 'tz' => 'America/Los_Angeles', 'stream' => 'https://www.audacy.com/stations/102jamssf'),
        array('city' => 'Pittsburgh, PA',    'station' => '107.3 WAMO',     'day' => 'Sat', 'start' => 19, 'end' => 21, 'tz' => 'America/New_York',    'stream' => 'https://www.audacy.com/wamo1073'),
        array('city' => 'St. Louis, MO',     'station' => '96.3 R&B',       'day' => 'Sat', 'start' => 22, 'end' => 24, 'tz' => 'America/Chicago',     'stream' => 'https://www.audacy.com/stations/963rnb'),
        array('city' => 'Knoxville, TN',     'station' => 'JUMP 97.1',      'day' => 'Sun', 'start' => 10, 'end' => 12, 'tz' => 'America/New_York',    'stream' => 'https://www.jumpradio.com/knoxville/player/'),
        array('city' => 'Greensboro, NC',    'station' => '97.1 QMG',       'comingSoon' => true),
    );
}

/**
 * Parse an 11-char YouTube video ID out of any share/watch/shorts URL.
 * Mirrors the regex in assets/js/yt-embed.js — used server-side only as a
 * thumbnail fallback when a CONVOS Video post has no Featured Image set.
 */
function rf_youtube_id($url) {
    if (!$url) return null;
    if (preg_match('/^[A-Za-z0-9_-]{11}$/', $url)) return $url;
    if (preg_match('#(?:youtu\.be/|youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/|v/))([A-Za-z0-9_-]{11})#', $url, $m)) {
        return $m[1];
    }
    return null;
}

/**
 * Render one Replay Radio Mixcloud card for a show_episode post.
 * Shared by page-shows.php (loops every episode) and page-demo.php
 * (pulls two specific episodes by label) so the markup lives in one place.
 */
function rf_render_mix_frame($post) {
    $post = get_post($post);
    if (!$post) return;
    $episode_number = get_post_meta($post->ID, '_rf_episode_number', true);
    $feed  = get_post_meta($post->ID, '_rf_mixcloud_feed', true);
    $light = get_post_meta($post->ID, '_rf_mixcloud_light', true);
    if (!$feed) return;

    $src = 'https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1' . ($light ? '&light=1' : '') . '&feed=' . rawurlencode($feed);
    ?>
    <div class="tilt-card card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
      <div class="flex flex-wrap items-baseline justify-between gap-2 mb-4">
        <p class="font-display text-xl md:text-2xl"><?php echo esc_html(get_the_title($post)); ?></p>
        <?php if ($episode_number) : ?>
        <span class="text-xs font-bold tracking-widest uppercase grad-text shrink-0"><?php echo esc_html($episode_number); ?></span>
        <?php endif; ?>
      </div>
      <div class="mix-frame">
        <iframe width="100%" height="120" src="<?php echo esc_url($src); ?>" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="block"></iframe>
      </div>
    </div>
    <?php
}

/**
 * Look up a Replay Episode post by its label (e.g. "EP 55"), used by
 * page-demo.php to pull the DJ Mix Weekend / Just Blaze episodes without
 * duplicating their markup or embed codes.
 */
function rf_get_episode_by_label($label) {
    $q = new WP_Query(array(
        'post_type'      => 'show_episode',
        'posts_per_page' => 1,
        'meta_key'       => '_rf_episode_number',
        'meta_value'     => $label,
    ));
    return $q->have_posts() ? $q->posts[0] : null;
}

/**
 * Render one CONVOS video card for the homepage. The featured card (first
 * by Order) gets the large manual layout with its own caption; the rest
 * render as bare .yt-embed divs so yt-embed.js auto-builds the poster +
 * play-button facade.
 */
function rf_render_convos_video_card($post, $featured = false) {
    $post = get_post($post);
    if (!$post) return;

    $youtube_url = get_post_meta($post->ID, '_rf_youtube_url', true);
    $title = get_the_title($post);
    $poster = get_the_post_thumbnail_url($post, 'large');
    if (!$poster) {
        $id = rf_youtube_id($youtube_url);
        if ($id) $poster = 'https://i.ytimg.com/vi/' . $id . '/hqdefault.jpg';
    }

    if ($featured) :
        ?>
        <div class="yt-embed tilt-card group relative rounded-2xl overflow-hidden shadow-glow border border-black/10 bg-black"
          data-yt="<?php echo esc_url($youtube_url); ?>"
          data-title="<?php echo esc_attr($title); ?>">
          <div class="aspect-video w-full overflow-hidden">
            <img src="<?php echo esc_url($poster); ?>" alt="<?php echo esc_attr($title); ?>"
              class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" />
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/10"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <span class="h-16 w-16 md:h-20 md:w-20 rounded-full play-glass shadow-glow flex items-center justify-center transition-transform duration-350 ease-out group-hover:scale-110">
              <svg class="h-6 w-6 md:h-7 md:w-7 text-[#F4EFE7] translate-x-[1px]" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7Z"/></svg>
            </span>
          </div>
          <p class="absolute left-5 bottom-4 md:left-6 md:bottom-5 font-display text-[#F4EFE7] text-sm md:text-base tracking-tight"><?php echo esc_html($title); ?> &middot; now streaming</p>
        </div>
        <?php
    else :
        ?>
        <div class="yt-embed tilt-card rounded-2xl overflow-hidden shadow-glow border border-black/10"
          data-yt="<?php echo esc_url($youtube_url); ?>"
          data-title="<?php echo esc_attr($title); ?>"
          data-poster="<?php echo esc_url($poster); ?>"></div>
        <?php
    endif;
}
