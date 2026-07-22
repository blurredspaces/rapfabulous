<!-- ============ FOOTER ============ -->
<footer class="relative bg-[#0A0A0A] border-t border-white/10">
  <div class="max-w-[1600px] mx-auto px-5 md:px-10 py-14 md:py-16">
    <div class="grid grid-cols-1 md:grid-cols-[1.3fr_1fr_1fr] gap-10 md:gap-8">
      <div>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/brand/wordmark-gradient.png" alt="rapfabulous" class="h-8 md:h-9 w-auto mb-4" />
        <p class="text-sm text-[#F4EFE7]/60 max-w-xs">Where hip-hop celebrates the music, the culture, and you. Hosted by Mic Fox.</p>
        <div class="flex items-center gap-4 mt-6">
          <a href="https://www.instagram.com/rapfabulous/" target="_blank" rel="noopener" aria-label="Instagram" class="text-[#F4EFE7]/50 hover:text-[#F4EFE7] transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
          </a>
          <a href="https://www.tiktok.com/@rapfabulous" target="_blank" rel="noopener" aria-label="TikTok" class="text-[#F4EFE7]/50 hover:text-[#F4EFE7] transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M16.5 2h-3v13.7c0 1.5-1.2 2.7-2.7 2.7a2.7 2.7 0 1 1 0-5.4c.3 0 .6 0 .9.1V9.9a5.9 5.9 0 0 0-.9-.1A6 6 0 1 0 16.5 15.9V8.3a8 8 0 0 0 4.5 1.4V6.4c-1.9 0-3.6-.9-4.5-2.4V2Z"/></svg>
          </a>
          <a href="https://www.youtube.com/@rapfabulous" target="_blank" rel="noopener" aria-label="YouTube" class="text-[#F4EFE7]/50 hover:text-[#F4EFE7] transition-colors">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-3.6-.5-5.3c-.3-1-1-1.7-2-2C18.7 4.2 12 4.2 12 4.2s-6.7 0-8.5.5c-1 .3-1.7 1-2 2C1 8.4 1 12 1 12s0 3.6.5 5.3c.3 1 1 1.7 2 2 1.8.5 8.5.5 8.5.5s6.7 0 8.5-.5c1-.3 1.7-1 2-2 .5-1.7.5-5.3.5-5.3ZM9.8 15.5V8.5l6.3 3.5-6.3 3.5Z"/></svg>
          </a>
          <a href="https://bsky.app/profile/rapfabulous.com" target="_blank" rel="noopener" aria-label="Bluesky" class="text-[#F4EFE7]/50 hover:text-[#F4EFE7] transition-colors">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 10.5C10.5 7.5 7 4.8 4.5 4c-1 0-1.5.5-1.5 1.5 0 1.2.3 6.3 1 8 .8 2 3 2.7 5 2.4-3 .4-5.6 1.6-2.2 5.4 3.8 4 5.2-.9 5.2-2.9 0 2 1.4 6.9 5.2 2.9 3.4-3.8.8-5-2.2-5.4 2 .3 4.2-.4 5-2.4.7-1.7 1-6.8 1-8 0-1-.5-1.5-1.5-1.5-2.5.8-6 3.5-7.5 6.5Z"/></svg>
          </a>
        </div>
      </div>

      <div>
        <p class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/50 mb-4">explore</p>
        <ul class="space-y-2.5 text-sm font-semibold">
          <li><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">Home</a></li>
          <li><a href="<?php echo esc_url(home_url('/#convos')); ?>" class="nav-link">Videos</a></li>
          <li><a href="<?php echo esc_url(home_url('/#live-radio')); ?>" class="nav-link">Live Radio</a></li>
          <li><a href="<?php echo esc_url(home_url('/shows/')); ?>" class="nav-link">Replay Radio</a></li>
          <li><a href="<?php echo esc_url(home_url('/story-list/')); ?>" class="nav-link">Stories</a></li>
          <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="nav-link">About</a></li>
        </ul>
      </div>

      <div>
        <p class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/50 mb-4">connect</p>
        <a href="mailto:connect@rapfabulous.com" class="nav-link text-sm font-semibold">connect@rapfabulous.com</a>
      </div>
    </div>

    <div class="mt-12 md:mt-16 pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between gap-2 text-xs text-[#F4EFE7]/40">
      <p>&copy; <?php echo esc_html(date('Y')); ?> <a href="https://blurredspaces.com/" target="_blank" rel="noopener" class="hover:text-[#F4EFE7]/70 transition-colors">BLURRED SPACES</a>. All rights reserved.</p>
      <p>rapfabulous&reg; &middot; Where hip-hop celebrates the music, the culture, and you.</p>
    </div>
  </div>
</footer>

<script>
  // ---- mobile menu ----
  (function(){
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    if (!toggle || !menu) return;
    function setOpen(open){
      toggle.setAttribute('aria-expanded', String(open));
      menu.setAttribute('data-open', String(open));
      menu.setAttribute('aria-hidden', String(!open));
      document.body.style.overflow = open ? 'hidden' : '';
    }
    toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
    menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', e => { if (e.key === 'Escape') setOpen(false); });
  })();

  // ---- gentle 3D tilt on cards (mouse users only, respects reduced-motion) ----
  const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (canHover && !reduceMotion) {
    document.querySelectorAll('.tilt-card').forEach((card) => {
      card.addEventListener('mousemove', (e) => {
        const r = card.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = `perspective(900px) rotateX(${py * -3}deg) rotateY(${px * 3}deg)`;
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
  }

  // ---- schedule data + on-air detection (drives the header listen-live
  //      button on every page, and the homepage schedule grid when present) ----
  const MARKETS = <?php echo wp_json_encode(rf_markets()); ?>;

  function getLocal(tz){
    const parts = new Intl.DateTimeFormat('en-US', { timeZone: tz, weekday: 'short', hour: 'numeric', hour12: false }).formatToParts(new Date());
    const weekday = parts.find(p => p.type === 'weekday').value;
    let hour = parseInt(parts.find(p => p.type === 'hour').value, 10);
    if (hour === 24) hour = 0;
    return { weekday, hour };
  }

  function renderSchedule(grid){
    grid.innerHTML = MARKETS.map((m, i) => {
      const period = h => { const hr = h % 24; const ampm = hr >= 12 ? 'p' : 'a'; const disp = hr % 12 === 0 ? 12 : hr % 12; return disp + ampm; };
      const tzLabel = m.tz === "America/New_York" ? "ET" : m.tz === "America/Chicago" ? "CT" : "PT";

      if (m.comingSoon) {
        return `
        <div class="card-reveal tilt-card card-surface rounded-2xl p-6 transition-colors duration-300 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1; transition-delay:${i * 70}ms" data-city="${m.city}">
          <div class="flex items-start justify-between gap-3">
            <div>
              <p class="font-display text-lg leading-tight">${m.city}</p>
              <p class="text-sm text-[#F4EFE7]/60 mt-1">${m.station}</p>
            </div>
            <span class="shrink-0 text-[10px] font-bold tracking-wide bg-white/10 text-[#F4EFE7]/70 px-2.5 py-1 rounded-full">SOON</span>
          </div>
          <div class="mt-5 flex items-center justify-between">
            <p class="text-sm font-semibold text-[#F4EFE7]/85">Coming Soon</p>
            <span class="text-xs font-bold text-[#F4EFE7]/30">stay tuned</span>
          </div>
        </div>`;
      }

      return `
      <div class="card-reveal tilt-card card-surface rounded-2xl p-6 transition-colors duration-300 border-l-2" style="border-image: linear-gradient(180deg, var(--red), var(--purple)) 1; transition-delay:${i * 70}ms" data-city="${m.city}">
        <div class="flex items-start justify-between gap-3">
          <div>
            <p class="font-display text-lg leading-tight">${m.city}</p>
            <p class="text-sm text-[#F4EFE7]/60 mt-1">${m.station}</p>
          </div>
          <span class="live-pill hidden shrink-0 text-[10px] font-bold tracking-wide grad-bg text-[#0A0A0A] px-2.5 py-1 rounded-full">LIVE</span>
        </div>
        <div class="mt-5 flex items-center justify-between">
          <p class="text-sm font-semibold text-[#F4EFE7]/85">${m.day} &middot; ${period(m.start)}&ndash;${period(m.end)} ${tzLabel}</p>
          <a href="${m.stream}" target="_blank" rel="noopener" class="text-xs font-bold grad-text hover:opacity-70 transition-opacity">tune in &rarr;</a>
        </div>
      </div>`;
    }).join('');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          grid.querySelectorAll('.card-reveal').forEach(card => card.classList.add('in'));
          observer.disconnect();
        }
      });
    }, { threshold: 0.15 });
    observer.observe(grid);
  }

  function checkLive(){
    let liveMarket = null;
    MARKETS.forEach(m => {
      if (m.comingSoon) { m._live = false; return; }
      const { weekday, hour } = getLocal(m.tz);
      const isLive = weekday === m.day && hour >= m.start && hour < m.end;
      m._live = isLive;
      if (isLive) liveMarket = m;
    });

    document.querySelectorAll('#schedule-grid [data-city]').forEach(card => {
      const m = MARKETS.find(x => x.city === card.dataset.city);
      const pill = card.querySelector('.live-pill');
      if (pill) pill.classList.toggle('hidden', !m._live);
    });

    const banner = document.getElementById('live-now-banner');
    if (banner) {
      if (liveMarket) {
        document.getElementById('live-now-text').textContent = `rapfabulous is live now on ${liveMarket.station}, ${liveMarket.city}`;
        const link = document.getElementById('live-now-link');
        link.href = liveMarket.stream;
        link.target = '_blank';
        link.rel = 'noopener';
        banner.classList.remove('hidden');
      } else {
        banner.classList.add('hidden');
      }
    }

    const liveBtn = document.getElementById('listen-live-btn');
    if (liveBtn) {
      const liveLabel = document.getElementById('listen-live-label');
      const livePing = document.getElementById('listen-live-ping');
      const liveDot = document.getElementById('listen-live-dot');
      if (liveMarket) {
        liveBtn.classList.remove('is-off-air');
        liveBtn.href = liveMarket.stream;
        liveBtn.target = '_blank';
        liveBtn.rel = 'noopener';
        liveLabel.textContent = `live on ${liveMarket.station}`;
        livePing.classList.remove('hidden');
        liveDot.classList.remove('bg-[#6b6b6b]');
        liveDot.classList.add('bg-red-600');
      } else {
        liveBtn.classList.add('is-off-air');
        liveBtn.removeAttribute('target');
        liveBtn.removeAttribute('rel');
        liveBtn.href = '<?php echo esc_url(home_url('/#live-radio')); ?>';
        liveLabel.textContent = 'off air';
        livePing.classList.add('hidden');
        liveDot.classList.remove('bg-red-600');
        liveDot.classList.add('bg-[#6b6b6b]');
      }
    }
  }

  const scheduleGrid = document.getElementById('schedule-grid');
  if (scheduleGrid) renderSchedule(scheduleGrid);
  checkLive();
  setInterval(checkLive, 60000);
</script>

<?php wp_footer(); ?>
</body>
</html>
