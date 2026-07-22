<?php
/**
 * Template Name: Replay Radio
 */
get_header();

$episodes_query = new WP_Query(array(
    'post_type'      => 'show_episode',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
?>

<!-- ============ HERO ============ -->
<section class="relative pt-32 md:pt-44 pb-14 md:pb-20 grad-bg overflow-hidden">
  <div class="noise"></div>
  <div class="max-w-[1100px] mx-auto px-5 md:px-10 relative">
    <p class="font-bold text-sm tracking-widest uppercase mb-4 text-[#0A0A0A]/70">.replay radio</p>
    <h1 class="font-display text-[13vw] leading-[0.92] sm:text-6xl md:text-7xl text-[#0A0A0A]">Replay Radio.</h1>
    <p class="mt-6 max-w-xl text-base md:text-lg font-medium text-[#0A0A0A]/75">
      Replay previous rapfabulous weekend radio episodes you may have missed &mdash; the full weekend broadcast, on demand.
    </p>
  </div>
</section>

<!-- ============ EPISODES ============ -->
<section class="relative bg-[#0A0A0A] py-14 md:py-20">
  <div class="max-w-[1100px] mx-auto px-5 md:px-10">
    <div class="grid grid-cols-1 gap-5">

      <?php if ($episodes_query->have_posts()) : ?>
        <?php while ($episodes_query->have_posts()) : $episodes_query->the_post(); ?>
          <?php rf_render_mix_frame(get_the_ID()); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <!-- Fallback launch episodes — replace by adding Replay Episode posts in wp-admin -->
        <div class="tilt-card card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
          <div class="flex flex-wrap items-baseline justify-between gap-2 mb-4">
            <p class="font-display text-xl md:text-2xl">Buckshot CONVOS Takeover</p>
            <span class="text-xs font-bold tracking-widest uppercase grad-text shrink-0">EP 65</span>
          </div>
          <div class="mix-frame">
            <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;feed=%2Frapfabulous%2Fep-65-buckshot-convos-takeover%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="block"></iframe>
          </div>
        </div>

        <div class="tilt-card card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
          <div class="flex flex-wrap items-baseline justify-between gap-2 mb-4">
            <p class="font-display text-xl md:text-2xl">DJ Mix Weekend &mdash; 1 Year Anniversary</p>
            <span class="text-xs font-bold tracking-widest uppercase grad-text shrink-0">EP 55</span>
          </div>
          <div class="mix-frame">
            <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;light=1&amp;feed=%2Frapfabulous%2Fep55-dj-mix-weekend-rapfabulous-1-year-anniversary%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="block"></iframe>
          </div>
        </div>

        <div class="tilt-card card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
          <div class="flex flex-wrap items-baseline justify-between gap-2 mb-4">
            <p class="font-display text-xl md:text-2xl">Just Blaze Takeover</p>
            <span class="text-xs font-bold tracking-widest uppercase grad-text shrink-0">EP 30</span>
          </div>
          <div class="mix-frame">
            <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;light=1&amp;feed=%2Frapfabulous%2Fep-30-just-blaze-takeover%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="block"></iframe>
          </div>
        </div>
      <?php endif; ?>

    </div>

    <div class="mt-10 flex flex-wrap gap-3 md:gap-4">
      <a href="https://www.mixcloud.com/rapfabulous/" target="_blank" rel="noopener" class="btn btn-outline">more on mixcloud</a>
      <a href="<?php echo esc_url(home_url('/#live-radio')); ?>" class="btn btn-outline">see live schedule</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
