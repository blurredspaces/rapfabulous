<?php
/**
 * Homepage. CONVOS videos come from the `convos_video` post type (ordered
 * by Page Attributes → Order; the first is the large featured card). If no
 * CONVOS Video posts have been added yet, falls back to the three launch
 * videos bundled with the theme so the page never looks broken out of the box.
 */
get_header();

$theme_uri = get_template_directory_uri();

$convos_query = new WP_Query(array(
    'post_type'      => 'convos_video',
    'posts_per_page' => 3,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
$convos_posts = $convos_query->posts;
?>

<!-- ============ HERO ============ -->
<section id="top" class="relative pt-16 md:pt-20">

  <!-- photo block -->
  <div id="hero-photo-block" class="relative w-full h-[62vh] md:h-[78vh] min-h-[420px] overflow-hidden">
    <video id="hero-video" muted loop playsinline preload="none" poster="<?php echo esc_url($theme_uri); ?>/assets/photos/mic-fox.jpg"
      class="video-treat absolute inset-0 w-full h-full object-cover" style="object-position: 50% 30%;">
      <source src="<?php echo esc_url($theme_uri); ?>/assets/video/convos-teaser.mp4" type="video/mp4" />
    </video>
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-black/40"></div>
    <div class="absolute inset-0" style="background:linear-gradient(100deg, rgba(204,51,0,.5), rgba(102,0,204,.5)); mix-blend-mode:color;"></div>
    <div class="noise"></div>
    <div id="hero-spotlight" class="absolute inset-0 opacity-0 pointer-events-none transition-opacity duration-700"></div>

    <!-- watch badge -->
    <a href="https://youtu.be/gHM1dLkz_ag?si=A8ihOIbI7nlkulVj" target="_blank" rel="noopener"
      class="hero-in-fade group absolute right-8 md:right-16 top-[38%] md:top-1/2 -translate-y-1/2 h-24 w-24 md:h-32 md:w-32 rounded-full grad-bg shadow-glow flex items-center justify-center" style="animation-delay:.3s">
      <svg class="badge-spin absolute inset-0 h-full w-full" viewBox="0 0 100 100">
        <path id="circlePath" fill="none" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0" />
        <text font-size="9.3" font-weight="700" letter-spacing="1.5" fill="#F4EFE7">
          <textPath href="#circlePath">WATCH LATEST &bull; WATCH LATEST &bull; </textPath>
        </text>
      </svg>
      <svg class="relative h-6 w-6 md:h-7 md:w-7 text-[#F4EFE7] translate-x-[1px] group-hover:scale-110 transition-transform" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7Z"/></svg>
    </a>

    <!-- bottom info bar -->
    <div class="absolute inset-x-0 bottom-0 grad-bg">
      <div class="noise"></div>
      <div class="max-w-[1600px] mx-auto px-5 md:px-10 py-6 md:py-8 grid grid-cols-1 md:grid-cols-[1.6fr_1fr] gap-4 md:gap-8 text-[#F4EFE7]">
        <div class="hero-in text-base md:text-lg font-semibold leading-snug max-w-2xl" style="animation-delay:.45s">
          Where hip-hop celebrates the music, the culture, and you. A 2-hour weekend, nationally syndicated radio show plus the deep interview series CONVOS, featuring hip-hop architects. Available on YouTube, Spotify, or wherever you get your podcast.
        </div>
        <div class="hero-in text-xs text-[#F4EFE7]/55 md:text-right self-center" style="animation-delay:.6s">
          honest, timeline-driven CONVOS: origins, process, legacy, what's next.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ LATEST CONVOS / YOUTUBE ============ -->
<section id="convos" class="relative grad-bg text-[#0A0A0A] overflow-hidden">
  <div class="noise"></div>
  <div id="convos-glow" class="absolute -inset-1 opacity-0 transition-opacity duration-700 pointer-events-none" aria-hidden="true">
    <div id="convos-glow-inner" class="absolute h-[520px] w-[520px] rounded-full transition-transform duration-300 ease-out" style="background: radial-gradient(circle, rgba(244,239,231,.28), transparent 70%); mix-blend-mode: overlay; transform: translate(-9999px,-9999px);"></div>
  </div>
  <div class="max-w-[1600px] mx-auto px-5 md:px-10 py-16 md:py-24 grid grid-cols-1 lg:grid-cols-[1.1fr_1.4fr] gap-10 md:gap-14 items-start">

    <div>
      <p class="font-bold text-sm tracking-widest uppercase mb-4 md:mb-6">watch the conversations</p>
      <h2 class="font-display text-[13vw] leading-[0.9] lg:text-[4.2vw]">
        latest <span class="text-[#F4EFE7]">CONVOS</span><br/>premiere.
      </h2>
      <div class="mt-6 md:mt-8 space-y-4 max-w-md text-sm md:text-base font-medium text-black/80">
        <p>Every new CONVOS features a super emcee, label exec, or hip-hop architect sitting down with Mic Fox.</p>
        <p>Each episode dives into origins, creative process, legacy, and what's next, face to face with hip-hop's most influential artists, producers, and culture shapers.</p>
      </div>
    </div>

    <div>
      <?php if (!empty($convos_posts)) : ?>
        <?php rf_render_convos_video_card($convos_posts[0], true); ?>

        <?php if (count($convos_posts) > 1) : ?>
        <div class="mt-4 md:mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-5">
          <?php foreach (array_slice($convos_posts, 1) as $video_post) : ?>
            <?php rf_render_convos_video_card($video_post, false); ?>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      <?php else : ?>
        <!-- Fallback launch videos — replace by adding CONVOS Video posts in wp-admin -->
        <div class="yt-embed tilt-card group relative rounded-2xl overflow-hidden shadow-glow border border-black/10 bg-black"
          data-yt="https://youtu.be/gHM1dLkz_ag?si=A8ihOIbI7nlkulVj"
          data-title="Buckshot CONVOS: Bucktown, Biggie &amp; 2Pac, KRS-One">
          <div class="aspect-video w-full overflow-hidden">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/photos/buckshot-convos.jpg" alt="Buckshot CONVOS: Bucktown, Biggie &amp; 2Pac, KRS-One"
              class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" />
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/10"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <span class="h-16 w-16 md:h-20 md:w-20 rounded-full play-glass shadow-glow flex items-center justify-center transition-transform duration-350 ease-out group-hover:scale-110">
              <svg class="h-6 w-6 md:h-7 md:w-7 text-[#F4EFE7] translate-x-[1px]" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7Z"/></svg>
            </span>
          </div>
          <p class="absolute left-5 bottom-4 md:left-6 md:bottom-5 font-display text-[#F4EFE7] text-sm md:text-base tracking-tight">Buckshot CONVOS &middot; now streaming</p>
        </div>

        <div class="mt-4 md:mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-5">
          <div class="yt-embed tilt-card rounded-2xl overflow-hidden shadow-glow border border-black/10"
            data-yt="https://youtu.be/PaGbynlcKLg"
            data-title="Just Blaze CONVOS: Jay Z &amp; Mobb Deep"
            data-poster="<?php echo esc_url($theme_uri); ?>/assets/photos/just-blaze-convos.jpg"></div>

          <div class="yt-embed tilt-card rounded-2xl overflow-hidden shadow-glow border border-black/10"
            data-yt="https://youtu.be/RYGPwv2_EXA"
            data-title="Awesome 2 CONVOS: Big Daddy Kane &amp; EPMD"
            data-poster="<?php echo esc_url($theme_uri); ?>/assets/photos/awesome2-convos.jpg"></div>
        </div>
      <?php endif; ?>

      <div class="mt-6 flex flex-wrap gap-3 md:gap-4">
        <a href="https://www.youtube.com/@rapfabulous/playlists" target="_blank" rel="noopener" class="btn btn-outline !border-black/30 !text-black hover:!bg-black/5">see all episodes</a>
      </div>
    </div>
  </div>
</section>

<!-- ============ BRAND DIVIDER ============ -->
<section id="brand-divider" class="relative bg-[#0A0A0A] py-14 md:py-20">
  <h1 class="px-3 md:px-6 select-none m-0">
    <img src="<?php echo esc_url($theme_uri); ?>/assets/brand/wordmark-gradient.png" alt="rapfabulous: hip-hop interview series hosted by Mic Fox"
      class="hero-wordmark w-full h-auto max-w-4xl mx-auto block" style="filter: drop-shadow(0 10px 40px rgba(102,0,204,.25));" />
  </h1>
</section>

<!-- ============ LIVE RADIO ============ -->
<section id="live-radio" class="relative bg-[#0A0A0A] py-16 md:py-24">
  <div class="max-w-[1600px] mx-auto px-5 md:px-10">

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mb-10 md:mb-14">
      <div>
        <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">on the air</p>
        <h2 class="font-display text-[12vw] md:text-[4vw] leading-[0.92]">listen live.</h2>
      </div>
      <div class="flex items-end gap-4 md:gap-5 shrink-0">
        <p class="font-display text-6xl md:text-7xl grad-text leading-none">8</p>
        <p class="max-w-[11rem] text-xs md:text-sm text-[#F4EFE7]/70 font-medium pb-1">markets nationwide, 2 hours every weekend, and counting.</p>
      </div>
    </div>

    <!-- live now banner -->
    <div id="live-now-banner" class="hidden mb-8 md:mb-10 rounded-2xl grad-bg p-5 md:p-6 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5 shadow-glow">
      <span class="relative flex h-3 w-3 shrink-0">
        <span class="pulse-dot absolute inline-flex h-full w-full rounded-full bg-black"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-black"></span>
      </span>
      <p class="font-display text-[#0A0A0A] text-base md:text-lg leading-tight" id="live-now-text">LIVE NOW</p>
      <a href="#stream-apps" id="live-now-link" class="btn btn-dark sm:ml-auto !py-2 !px-4 text-xs">tune in</a>
    </div>

    <!-- schedule grid (rendered by footer.php's shared script) -->
    <div id="schedule-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5"></div>

    <!-- streaming apps -->
    <div id="stream-apps" class="mt-12 md:mt-16 flex flex-col md:flex-row md:items-center gap-6 md:gap-10 border-t border-white/10 pt-10 scroll-mt-24">
      <p class="text-sm font-bold tracking-widest uppercase text-[#F4EFE7]/60 shrink-0">also streaming on</p>
      <div class="flex flex-wrap items-center gap-3">
        <a href="https://www.iheart.com/" target="_blank" rel="noopener" class="btn btn-outline">iHeartRadio</a>
        <a href="https://tunein.com/" target="_blank" rel="noopener" class="btn btn-outline">TuneIn</a>
        <a href="https://www.apple.com/apple-tv-app/" target="_blank" rel="noopener" class="btn btn-outline">Apple TV</a>
        <a href="https://open.spotify.com/show/7l9Wg0S3K77rOPGTqvmEMg?si=aab55c509c6445ad" target="_blank" rel="noopener" class="btn btn-outline">Spotify</a>
      </div>
    </div>
  </div>
</section>

<script>
  // ---- defer hero video fetch until after critical content has loaded ----
  window.addEventListener('load', () => {
    const heroVideo = document.getElementById('hero-video');
    if (heroVideo) {
      heroVideo.setAttribute('preload', 'auto');
      heroVideo.load();
      heroVideo.play().catch(() => {});
    }
  });

  // ---- cursor micro-interactions on the hero (mouse users only, respects reduced-motion) ----
  const rfCanHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const rfReduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (rfCanHover && !rfReduceMotion) {
    const photoBlock = document.getElementById('hero-photo-block');
    const spotlight = document.getElementById('hero-spotlight');
    const wordmark = document.querySelector('.hero-wordmark');

    photoBlock.addEventListener('mousemove', (e) => {
      const r = photoBlock.getBoundingClientRect();
      spotlight.style.setProperty('--x', `${((e.clientX - r.left) / r.width) * 100}%`);
      spotlight.style.setProperty('--y', `${((e.clientY - r.top) / r.height) * 100}%`);
      spotlight.style.opacity = '1';
    });
    photoBlock.addEventListener('mouseleave', () => { spotlight.style.opacity = '0'; });

    const brandDivider = document.getElementById('brand-divider');
    brandDivider.addEventListener('mousemove', (e) => {
      const r = brandDivider.getBoundingClientRect();
      const relX = (e.clientX - r.left) / r.width - 0.5;
      const relY = (e.clientY - r.top) / r.height - 0.5;
      wordmark.style.transform = `translate(${relX * -14}px, ${relY * -8}px)`;
    });
    brandDivider.addEventListener('mouseleave', () => { wordmark.style.transform = ''; });

    const convosSection = document.getElementById('convos');
    const convosGlow = document.getElementById('convos-glow');
    const convosGlowInner = document.getElementById('convos-glow-inner');
    if (convosSection && convosGlow && convosGlowInner) {
      convosSection.addEventListener('mousemove', (e) => {
        const r = convosSection.getBoundingClientRect();
        const x = e.clientX - r.left;
        const y = e.clientY - r.top;
        convosGlowInner.style.transform = `translate(${x}px, ${y}px) translate(-50%, -50%)`;
        convosGlow.style.opacity = '1';
      });
      convosSection.addEventListener('mouseleave', () => { convosGlow.style.opacity = '0'; });
    }
  }
</script>

<?php get_footer(); ?>
