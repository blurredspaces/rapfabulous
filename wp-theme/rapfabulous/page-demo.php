<?php
/**
 * Template Name: Affiliate Demo
 */
get_header('minimal', array('label' => 'Affiliate Demo'));
$theme_uri = get_template_directory_uri();

$ep55 = rf_get_episode_by_label('EP 55');
$ep30 = rf_get_episode_by_label('EP 30');
?>

<main class="max-w-[1000px] mx-auto px-5 md:px-10 py-14 md:py-20">

  <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">for radio affiliates</p>
  <h1 class="font-display text-[11vw] leading-[0.95] sm:text-5xl md:text-6xl">rapfabulous<br/>Radio Demo</h1>

  <p class="mt-6 max-w-2xl text-sm md:text-base font-medium text-[#F4EFE7]/75">
    "Where Hip Hop Celebrates The Music, The Culture, and You" is a nationally syndicated 2-hour weekend hip-hop radio show and video interview series dedicated to celebrating our hip-hop artists and music from the late 1980s to 2010s. Hosted by Mic Fox and guest.
  </p>

  <!-- host photo -->
  <div class="mt-10 md:mt-12 max-w-xl rounded-2xl overflow-hidden shadow-glow border border-white/10">
    <img src="<?php echo esc_url($theme_uri); ?>/assets/photos/mic-fox-about.jpg" alt="Mic Fox, host of rapfabulous"
      class="w-full h-full object-cover grayscale contrast-110" />
  </div>

  <!-- audio demo player -->
  <div class="mt-6 md:mt-8 max-w-xl">
    <div class="card-surface rounded-2xl overflow-hidden border border-white/10 shadow-glow">
      <div class="grad-bg p-6 md:p-7">
        <div class="flex items-center justify-between gap-4">
          <div class="flex items-center gap-4 min-w-0">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/brand/r-mark-gradient.png" alt="" class="h-11 w-11 md:h-13 md:w-13 rounded-full bg-white/95 p-2 shrink-0" />
            <div class="min-w-0">
              <p class="text-xs font-bold tracking-widest uppercase text-white/70">rapfabulous</p>
              <p class="font-display text-xl md:text-2xl text-white truncate">Radio Demo</p>
            </div>
          </div>
          <button id="demo-play" type="button" aria-label="Play demo" class="h-14 w-14 md:h-16 md:w-16 rounded-full bg-white/95 flex items-center justify-center shrink-0">
            <svg id="demo-play-icon" class="h-6 w-6 md:h-7 md:w-7 text-[#0A0A0A] translate-x-[2px]" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7Z"/></svg>
            <svg id="demo-pause-icon" class="hidden h-6 w-6 md:h-7 md:w-7 text-[#0A0A0A]" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5h4v14H7zM13 5h4v14h-4z"/></svg>
          </button>
        </div>
      </div>
      <div class="p-5 md:p-6">
        <div id="demo-progress-track" class="relative h-1.5 rounded-full bg-white/10 cursor-pointer">
          <div id="demo-progress-fill" class="absolute inset-y-0 left-0 rounded-full grad-bg" style="width:0%"></div>
          <div id="demo-progress-handle" class="absolute top-1/2 h-3.5 w-3.5 rounded-full bg-[#F4EFE7] shadow -translate-y-1/2 -translate-x-1/2" style="left:0%"></div>
        </div>
        <div class="mt-3 flex items-center justify-between text-xs font-semibold text-[#F4EFE7]/50">
          <span id="demo-current-time">0:00</span>
          <span id="demo-duration">0:00</span>
        </div>
      </div>
    </div>
    <audio id="demo-audio" preload="metadata" src="<?php echo esc_url($theme_uri); ?>/assets/audio/rapfabulous-demo.mp3"></audio>
  </div>

  <!-- past radio episodes -->
  <div class="mt-6 md:mt-8 max-w-xl grid grid-cols-1 gap-5">
    <?php if ($ep55) : rf_render_mix_frame($ep55); else : ?>
      <div class="card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
        <div class="flex flex-wrap items-baseline justify-between gap-2 mb-4">
          <p class="font-display text-xl md:text-2xl">DJ Mix Weekend &mdash; 1 Year Anniversary</p>
          <span class="text-xs font-bold tracking-widest uppercase grad-text shrink-0">EP 55</span>
        </div>
        <div class="mix-frame">
          <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;light=1&amp;feed=%2Frapfabulous%2Fep55-dj-mix-weekend-rapfabulous-1-year-anniversary%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="block"></iframe>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($ep30) : rf_render_mix_frame($ep30); else : ?>
      <div class="card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
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

  <!-- reach snapshot -->
  <div class="mt-10 md:mt-12">
    <p class="font-bold text-sm tracking-widest uppercase mb-6 grad-text">reach snapshot</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8">
      <div>
        <p class="font-display text-4xl md:text-5xl grad-text leading-none">142M+</p>
        <p class="mt-2 text-sm text-[#F4EFE7]/70">population reach across 8 markets, including 3 Top-15 DMAs</p>
      </div>
      <div>
        <p class="font-display text-4xl md:text-5xl grad-text leading-none">26,086</p>
        <p class="mt-2 text-sm text-[#F4EFE7]/70">weekly AQH</p>
      </div>
      <div>
        <p class="font-display text-4xl md:text-5xl grad-text leading-none">50,900</p>
        <p class="mt-2 text-sm text-[#F4EFE7]/70">weekly cume</p>
      </div>
    </div>
    <p class="mt-6 text-sm text-[#F4EFE7]/60">
      New York &middot; San Francisco &middot; Orlando &middot; St. Louis &middot; Pittsburgh &middot; New Orleans &middot; Richmond &middot; Knoxville
    </p>
    <p class="mt-2 text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/40">average market coverage: 24%</p>
  </div>

  <!-- where it airs -->
  <div class="mt-10 md:mt-12">
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">where it airs</p>
    <h2 class="font-display text-2xl md:text-3xl mb-6">Currently on.</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4">
      <?php foreach (rf_markets() as $m) : ?>
        <div class="relative rounded-xl bg-white h-20 md:h-24 flex items-center justify-center p-3 md:p-4<?php echo !empty($m['comingSoon']) ? ' opacity-55' : ''; ?>">
          <?php if (!empty($m['logo'])) : ?>
            <img src="<?php echo esc_url($theme_uri); ?>/assets/brand/<?php echo esc_attr($m['logo']); ?>" alt="<?php echo esc_attr($m['station'] . ' — ' . $m['city']); ?>" class="max-h-full max-w-full w-auto h-auto object-contain" />
          <?php else : ?>
            <p class="text-center text-[#0A0A0A] text-xs font-bold leading-tight"><?php echo esc_html($m['station']); ?></p>
          <?php endif; ?>
          <?php if (!empty($m['comingSoon'])) : ?>
            <span class="absolute -top-2 -right-2 text-[9px] font-bold tracking-wide grad-bg text-[#0A0A0A] px-2 py-0.5 rounded-full shadow">soon</span>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- affiliate interest form -->
  <div class="mt-10 md:mt-12">
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">get in touch</p>
    <h2 class="font-display text-2xl md:text-3xl mb-6">Interested in carrying rapfabulous?</h2>
    <div class="rounded-2xl overflow-hidden">
      <iframe class="clickup-embed clickup-dynamic-height" src="https://forms.clickup.com/10570513/f/a2jrh-5173/LQSFDXGUTR7BJFGW4L" onwheel="" width="100%" height="100%" style="background: transparent; border: none; min-height: 900px; display: block;"></iframe>
    </div>
  </div>
  <script async src="https://app-cdn.clickup.com/assets/js/forms-embed/v1.js"></script>

  <!-- resources -->
  <div class="mt-10 md:mt-12 flex flex-wrap gap-3 md:gap-4">
    <a href="<?php echo esc_url($theme_uri); ?>/assets/docs/rapfabulous-the-brand-deck.pdf" target="_blank" rel="noopener" class="btn btn-solid">presentation deck</a>
    <a href="<?php echo esc_url(home_url('/shows/')); ?>" class="btn btn-outline">previous full radio shows</a>
    <a href="<?php echo esc_url($theme_uri); ?>/assets/docs/press-release-09-2025.pdf" target="_blank" rel="noopener" class="btn btn-outline">download press release</a>
    <a href="<?php echo esc_url($theme_uri); ?>/assets/docs/mic-bios-rapfabulous.pdf" target="_blank" rel="noopener" class="btn btn-outline">download bio</a>
  </div>

</main>

<script>
  (function(){
    const audio = document.getElementById('demo-audio');
    const playBtn = document.getElementById('demo-play');
    const playIcon = document.getElementById('demo-play-icon');
    const pauseIcon = document.getElementById('demo-pause-icon');
    const track = document.getElementById('demo-progress-track');
    const fill = document.getElementById('demo-progress-fill');
    const handle = document.getElementById('demo-progress-handle');
    const curEl = document.getElementById('demo-current-time');
    const durEl = document.getElementById('demo-duration');

    function fmt(s){
      if (!isFinite(s) || s < 0) return '0:00';
      const m = Math.floor(s / 60);
      const sec = Math.floor(s % 60);
      return m + ':' + String(sec).padStart(2, '0');
    }

    playBtn.addEventListener('click', () => {
      if (audio.paused) audio.play(); else audio.pause();
    });
    audio.addEventListener('play', () => {
      playIcon.classList.add('hidden');
      pauseIcon.classList.remove('hidden');
    });
    audio.addEventListener('pause', () => {
      playIcon.classList.remove('hidden');
      pauseIcon.classList.add('hidden');
    });
    audio.addEventListener('ended', () => {
      playIcon.classList.remove('hidden');
      pauseIcon.classList.add('hidden');
    });
    audio.addEventListener('loadedmetadata', () => {
      durEl.textContent = fmt(audio.duration);
    });
    audio.addEventListener('timeupdate', () => {
      const pct = audio.duration ? (audio.currentTime / audio.duration) * 100 : 0;
      fill.style.width = pct + '%';
      handle.style.left = pct + '%';
      curEl.textContent = fmt(audio.currentTime);
    });

    function seek(e){
      const r = track.getBoundingClientRect();
      const clientX = e.touches ? e.touches[0].clientX : e.clientX;
      const pct = Math.min(1, Math.max(0, (clientX - r.left) / r.width));
      if (audio.duration) audio.currentTime = pct * audio.duration;
    }
    track.addEventListener('click', seek);
  })();
</script>

<?php get_footer('minimal'); ?>
