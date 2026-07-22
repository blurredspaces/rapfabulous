<?php
/**
 * Template Name: CONVOS Takeover Info
 */
get_header('minimal', array('label' => 'CONVOS'));
$theme_uri = get_template_directory_uri();
?>

<main class="max-w-[1000px] mx-auto px-5 md:px-10 py-14 md:py-20">

  <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">for talent &amp; guests</p>
  <h1 class="font-display text-[11vw] leading-[0.95] sm:text-5xl md:text-6xl">rapfabulous<br/>CONVOS Takeover</h1>

  <!-- format breakdown -->
  <div class="mt-10 md:mt-12 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
    <div class="card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
      <p class="font-display text-xl md:text-2xl mb-3">rapfabulous radio</p>
      <p class="text-sm md:text-base text-[#F4EFE7]/75">rapfabulous radio is a 2-hour weekend hip-hop show where hip-hop celebrates the music, the culture, and the fans &mdash; airing nationally on major radio stations across the U.S., with more cities coming, reaching over 75K listeners every weekend. The artist or talent co-hosts the show with Mic Fox, discussing music they created and/or that influenced their lives and career.</p>
      <p class="mt-4 text-xs font-bold tracking-widest uppercase grad-text">min recording time: 20 min avg</p>
    </div>
    <div class="card-surface rounded-2xl p-6 md:p-7 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
      <p class="font-display text-xl md:text-2xl mb-3">rapfabulous CONVOS</p>
      <p class="text-sm md:text-base text-[#F4EFE7]/75">rapfabulous CONVOS is the extended conversation in a video interview format, allowing Mic Fox and the guest to dive deeper into their career timeline, accomplishments, influences, and upcoming projects.</p>
      <p class="mt-4 text-xs font-bold tracking-widest uppercase grad-text">min recording time: 60 min avg</p>
    </div>
  </div>

  <p class="mt-8 max-w-2xl text-sm md:text-base font-medium text-[#F4EFE7]/75">
    During a rapfabulous production, we record the video interview first, followed by the radio show recording, plus social content and photos.
  </p>

  <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
    <div class="rounded-2xl border border-white/10 p-6 md:p-7">
      <p class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/50 mb-2">min total talent time needed</p>
      <p class="font-display text-2xl md:text-3xl">1 hr 30 min</p>
      <p class="mt-1 text-xs text-[#F4EFE7]/50">to maximize both recordings</p>
    </div>
    <div class="rounded-2xl border border-white/10 p-6 md:p-7">
      <p class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/50 mb-2">recorded at</p>
      <p class="font-display text-lg md:text-xl leading-snug">MNN &mdash; Manhattan Neighborhood Network</p>
      <p class="mt-1 text-sm text-[#F4EFE7]/60">509 W 38th St, New York, NY 10018 &middot; or on location</p>
    </div>
  </div>

  <!-- featured video -->
  <p class="mt-12 md:mt-14 font-bold text-sm tracking-widest uppercase mb-4 grad-text">example episode</p>
  <div class="yt-embed tilt-card group relative rounded-2xl overflow-hidden shadow-glow border border-white/10 bg-black"
    data-yt="https://youtu.be/gHM1dLkz_ag?si=A8ihOIbI7nlkulVj"
    data-title="Buckshot CONVOS &mdash; Bucktown, Biggie &amp; 2Pac, KRS-One">
    <div class="aspect-video w-full overflow-hidden">
      <img src="<?php echo esc_url($theme_uri); ?>/assets/photos/buckshot-convos.jpg" alt="Buckshot CONVOS &mdash; Bucktown, Biggie &amp; 2Pac, KRS-One"
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

  <div class="mt-6 flex flex-wrap gap-3 md:gap-4">
    <a href="https://youtu.be/gHM1dLkz_ag?si=A8ihOIbI7nlkulVj" target="_blank" rel="noopener" class="btn btn-dark">watch on youtube</a>
    <a href="https://www.youtube.com/@rapfabulous/playlists" target="_blank" rel="noopener" class="btn btn-outline">see all episodes</a>
  </div>

  <!-- mixcloud radio takeover -->
  <div class="mt-14 md:mt-20">
    <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">radio takeover</p>
    <h2 class="font-display text-3xl md:text-4xl mb-6">listen to the episode.</h2>
    <div class="card-surface rounded-2xl p-3 md:p-4">
      <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;light=1&amp;feed=%2Frapfabulous%2Fep-65-buckshot-convos-takeover%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="rounded-lg"></iframe>
    </div>
  </div>

</main>

<?php get_footer('minimal'); ?>
