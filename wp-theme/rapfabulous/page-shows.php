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
<section id="shows-hero" class="relative pt-32 md:pt-44 pb-14 md:pb-20 grad-bg overflow-hidden">
  <div class="noise"></div>
  <div id="shows-hero-glow" class="absolute -inset-1 opacity-0 transition-opacity duration-700 pointer-events-none" aria-hidden="true">
    <div id="shows-hero-glow-inner" class="absolute h-[520px] w-[520px] rounded-full transition-transform duration-300 ease-out" style="background: radial-gradient(circle, rgba(244,239,231,.28), transparent 70%); mix-blend-mode: overlay; transform: translate(-9999px,-9999px);"></div>
  </div>
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

<script>
  // ---- cursor glow on the hero gradient (mouse users only, respects reduced-motion) ----
  (function(){
    const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!canHover || reduceMotion) return;

    const hero = document.getElementById('shows-hero');
    const glow = document.getElementById('shows-hero-glow');
    const glowInner = document.getElementById('shows-hero-glow-inner');
    if (!hero || !glow || !glowInner) return;

    hero.addEventListener('mousemove', (e) => {
      const r = hero.getBoundingClientRect();
      const x = e.clientX - r.left;
      const y = e.clientY - r.top;
      glowInner.style.transform = `translate(${x}px, ${y}px) translate(-50%, -50%)`;
      glow.style.opacity = '1';
    });
    hero.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
  })();
</script>

<?php get_footer(); ?>
