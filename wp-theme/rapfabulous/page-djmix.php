<?php
/**
 * Template Name: DJ Mix Weekends
 */
get_header('minimal', array('label' => 'DJ Mix'));

$ep55 = rf_get_episode_by_label('EP 55');
?>

<main class="max-w-[1040px] mx-auto px-5 md:px-10 py-14 md:py-20">

  <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">for mixshow djs</p>
  <h1 class="font-display text-[12vw] leading-[0.95] sm:text-6xl md:text-7xl">DJ Mix<br/>Weekends</h1>

  <p class="mt-6 md:mt-8 max-w-2xl text-base md:text-lg font-medium text-[#F4EFE7]/80">
    DJ Mix weekends are 2-hour mixes on the rapfabulous weekend radio show, highlighting Mixshow DJs across the country. The featured DJ creates the mix and co-hosts with Mic Fox &mdash; celebrating their skills and platforming their abilities.
  </p>

  <!-- ============ FEATURED MIX ============ -->
  <section class="mt-12 md:mt-16">
    <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">featured mix</p>
    <p class="font-display text-2xl md:text-3xl mb-5">DJ Mix Weekend &mdash; 1 Year Anniversary <span class="mono text-sm align-middle text-[#F4EFE7]/45">EP 55</span></p>
    <?php if ($ep55) : $feed = get_post_meta($ep55->ID, '_rf_mixcloud_feed', true); ?>
      <div id="featured-mix" class="card-surface rounded-2xl p-3 md:p-4">
        <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;feed=<?php echo esc_attr(rawurlencode($feed)); ?>" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="rounded-lg block"></iframe>
      </div>
    <?php else : ?>
      <div id="featured-mix" class="card-surface rounded-2xl p-3 md:p-4">
        <iframe width="100%" height="120" src="https://player-widget.mixcloud.com/widget/iframe/?hide_cover=1&amp;feed=%2Frapfabulous%2Fep55-dj-mix-weekend-rapfabulous-1-year-anniversary%2F" frameborder="0" allow="encrypted-media; fullscreen; autoplay; idle-detection; speaker-selection; web-share;" class="rounded-lg block"></iframe>
      </div>
    <?php endif; ?>
  </section>

  <!-- ============ FORMAT CLOCKS ============ -->
  <section class="mt-16 md:mt-24">
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">the format</p>
    <h2 class="font-display text-4xl md:text-5xl">Mixshow Clocks.</h2>
    <p class="mt-4 max-w-2xl text-sm md:text-base text-[#F4EFE7]/70">
      Each hour runs two mix segments split by a network commercial break. Hit these marks so your mix drops cleanly into breaks and back.
    </p>

    <!-- HOUR 1 -->
    <div class="mt-8 md:mt-10 card-surface rounded-2xl p-6 md:p-8 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
      <div class="flex items-baseline justify-between gap-4 mb-7">
        <p class="font-display text-2xl md:text-3xl">Hour 1</p>
        <p class="mono text-xs text-[#F4EFE7]/50">LEGAL ID :05 @ 00:00</p>
      </div>

      <div class="flex items-center gap-3 mb-3">
        <span class="seg-badge">1</span>
        <div><p class="font-bold leading-tight">Segment 1</p><p class="mono text-xs text-[#F4EFE7]/45">12:00 TRT</p></div>
      </div>
      <div class="cue-track">
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">00:00&ndash;01:00</span><span class="text-sm text-[#F4EFE7]/85">Start mix with a <strong>1-min instrumental</strong> for the show intro (talk break).</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">11:00&ndash;12:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1-min instrumental</strong> &mdash; talk break into commercials.</span></div>
      </div>

      <div class="break-row"><span class="break-label">Network commercials</span></div>

      <div class="flex items-center gap-3 mb-3">
        <span class="seg-badge">2</span>
        <div><p class="font-bold leading-tight">Segment 2</p><p class="mono text-xs text-[#F4EFE7]/45">32:00 TRT</p></div>
      </div>
      <div class="cue-track">
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">00:00&ndash;00:05</span><span class="text-sm text-[#F4EFE7]/85">Start mix.</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">12:00&ndash;13:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1-min instrumental</strong> &mdash; talk break between songs.</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">30:45&ndash;32:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1:15 instrumental</strong> &mdash; talk break into commercials.</span></div>
      </div>
    </div>

    <!-- HOUR 2 -->
    <div class="mt-6 card-surface rounded-2xl p-6 md:p-8 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1;">
      <div class="flex items-baseline justify-between gap-4 mb-7">
        <p class="font-display text-2xl md:text-3xl">Hour 2</p>
        <p class="mono text-xs text-[#F4EFE7]/50">LEGAL ID :05 @ 00:00</p>
      </div>

      <div class="flex items-center gap-3 mb-3">
        <span class="seg-badge">1</span>
        <div><p class="font-bold leading-tight">Segment 1</p><p class="mono text-xs text-[#F4EFE7]/45">12:00 TRT</p></div>
      </div>
      <div class="cue-track">
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">00:00&ndash;00:05</span><span class="text-sm text-[#F4EFE7]/85">Start mix <em class="text-[#F4EFE7]/55 not-italic">(no instrumental)</em>.</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">11:00&ndash;12:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1-min instrumental</strong> &mdash; talk break into commercials.</span></div>
      </div>

      <div class="break-row"><span class="break-label">Network commercials</span></div>

      <div class="flex items-center gap-3 mb-3">
        <span class="seg-badge">2</span>
        <div><p class="font-bold leading-tight">Segment 2</p><p class="mono text-xs text-[#F4EFE7]/45">32:00 TRT</p></div>
      </div>
      <div class="cue-track">
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">00:00&ndash;00:05</span><span class="text-sm text-[#F4EFE7]/85">Start mix <em class="text-[#F4EFE7]/55 not-italic">(no instrumental)</em>.</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">12:00&ndash;13:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1-min instrumental</strong> &mdash; talk break between songs.</span></div>
        <div class="cue-node"><span class="mono text-sm grad-text font-bold block mb-0.5">30:45&ndash;32:00</span><span class="text-sm text-[#F4EFE7]/85">Mix into a <strong>1:15 instrumental</strong> &mdash; talk break into commercials.</span></div>
      </div>
    </div>
  </section>

  <!-- ============ PROGRAMMING RULES ============ -->
  <section class="mt-16 md:mt-24">
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">the sound</p>
    <h2 class="font-display text-4xl md:text-5xl">Music programming.</h2>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-1">
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="rule-check w-5 h-5 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85">Start mix segments with a <strong>very familiar throwback track</strong>.</span>
      </div>
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="rule-check w-5 h-5 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85">If you mix something "deep from the crate," follow up with a familiar track.</span>
      </div>
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="rule-check w-5 h-5 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85">Song year range is <strong>1979 &ndash; 2013</strong>.</span>
      </div>
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="rule-check w-5 h-5 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85">You <strong>can</strong> mix 1&ndash;2 new songs per hour from a legendary artist (Nas, Clipse, Ghostface). No new artists released after 2013.</span>
      </div>
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="rule-check w-5 h-5 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85">You <strong>can</strong> use artist &amp; DJ name drops, sound effects, etc. during your mix.</span>
      </div>
      <div class="cue !grid-cols-[auto_1fr] !gap-3 items-start">
        <svg class="w-5 h-5 mt-0.5 text-[#F4EFE7]/60 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
        <span class="text-sm md:text-base text-[#F4EFE7]/85"><strong>No</strong> voice-overs or shout-outs.</span>
      </div>
    </div>
  </section>

  <!-- ============ STATIONS ============ -->
  <section class="mt-16 md:mt-24">
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">where it airs</p>
    <h2 class="font-display text-4xl md:text-5xl">Currently on.</h2>
    <div class="mt-8 flex flex-wrap gap-3">
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">94.7 The Block &middot; NYC</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">106.5 The Beat &middot; Richmond</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">102 JAM &middot; Orlando</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">102 JAMS &middot; San Francisco</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">107.3 WAMO &middot; Pittsburgh</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">96.3 R&amp;B &middot; St. Louis</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold">JUMP 97.1 &middot; Knoxville</span>
      <span class="rounded-full border border-white/12 bg-white/[.03] px-4 py-2 text-sm font-semibold text-[#F4EFE7]/55">97.1 QMG &middot; Greensboro <span class="grad-text">&middot; soon</span></span>
    </div>
  </section>

</main>

<?php get_footer('minimal'); ?>
