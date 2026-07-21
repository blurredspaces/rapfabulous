/*
  rapfabulous — inline YouTube player (lite facade)
  --------------------------------------------------
  Plays YouTube videos INSIDE the page from any share-link format.
  No YouTube JS loads until the visitor clicks (fast page loads).

  Usage:
    <div class="yt-embed"
         data-yt="https://youtu.be/gHM1dLkz_ag?si=abc"
         data-title="Buckshot CONVOS"
         data-poster="assets/photos/buckshot-convos.jpg"></div>

  - data-yt      (required) any YouTube share/watch/shorts/live/embed URL, or a bare 11-char ID
  - data-title   (optional) accessible label + iframe title
  - data-poster  (optional) custom thumbnail; defaults to the YouTube auto-thumbnail

  If the .yt-embed already contains its own markup (custom poster/overlay),
  the script leaves it in place and just wires click-to-play.
*/
(function () {
  function youTubeId(input) {
    if (!input) return null;
    var url = String(input).trim();
    // bare id
    if (/^[A-Za-z0-9_-]{11}$/.test(url)) return url;
    var m = url.match(
      /(?:youtu\.be\/|youtube(?:-nocookie)?\.com\/(?:watch\?(?:.*&)?v=|embed\/|shorts\/|live\/|v\/))([A-Za-z0-9_-]{11})/
    );
    return m ? m[1] : null;
  }

  function startSeconds(url) {
    // support ?t=90 or ?t=1m30s or &start=90
    var m = String(url).match(/[?&](?:t|start)=([0-9hms]+)/);
    if (!m) return 0;
    var v = m[1];
    if (/^\d+$/.test(v)) return parseInt(v, 10);
    var h = (v.match(/(\d+)h/) || [])[1] || 0;
    var mi = (v.match(/(\d+)m/) || [])[1] || 0;
    var s = (v.match(/(\d+)s/) || [])[1] || 0;
    return +h * 3600 + +mi * 60 + +s;
  }

  function playIcon() {
    return (
      '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">' +
      '<path d="M8 5v14l11-7Z"/></svg>'
    );
  }

  function buildFacade(el, id) {
    var title = el.getAttribute('data-title') || 'Play video';
    var poster =
      el.getAttribute('data-poster') ||
      'https://i.ytimg.com/vi/' + id + '/maxresdefault.jpg';

    var img = document.createElement('img');
    img.className = 'yt-poster';
    img.loading = 'lazy';
    img.alt = '';
    img.src = poster;
    // maxresdefault doesn't exist for every video — fall back to hqdefault
    img.addEventListener('error', function () {
      img.src = 'https://i.ytimg.com/vi/' + id + '/hqdefault.jpg';
    });

    var scrim = document.createElement('div');
    scrim.className = 'yt-scrim';

    var btn = document.createElement('button');
    btn.className = 'yt-play';
    btn.type = 'button';
    btn.setAttribute('aria-label', title);
    btn.innerHTML = playIcon();

    el.appendChild(img);
    el.appendChild(scrim);
    el.appendChild(btn);
  }

  function play(el, id) {
    var title = el.getAttribute('data-title') || 'YouTube video player';
    var start = startSeconds(el.getAttribute('data-yt'));
    var src =
      'https://www.youtube-nocookie.com/embed/' +
      id +
      '?autoplay=1&rel=0&modestbranding=1&playsinline=1' +
      (start ? '&start=' + start : '');

    var iframe = document.createElement('iframe');
    iframe.src = src;
    iframe.title = title;
    iframe.setAttribute(
      'allow',
      'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
    );
    iframe.setAttribute('allowfullscreen', '');

    el.innerHTML = '';
    el.appendChild(iframe);
    el.classList.add('yt-playing');
  }

  function init(root) {
    var nodes = (root || document).querySelectorAll('.yt-embed[data-yt]');
    Array.prototype.forEach.call(nodes, function (el) {
      if (el.dataset.ytReady) return;
      var id = youTubeId(el.getAttribute('data-yt'));
      if (!id) {
        el.innerHTML = '<div class="yt-error">Invalid YouTube link</div>';
        return;
      }
      el.dataset.ytReady = '1';

      // Only build a facade if the author didn't provide their own markup.
      if (el.children.length === 0) buildFacade(el, id);

      el.setAttribute('role', 'button');
      el.setAttribute('tabindex', '0');

      el.addEventListener('click', function () {
        play(el, id);
      });
      el.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          play(el, id);
        }
      });
    });
  }

  // expose for dynamically added embeds (e.g. after AJAX)
  window.rfYouTube = { init: init, id: youTubeId };

  if (document.readyState !== 'loading') init();
  else document.addEventListener('DOMContentLoaded', function () { init(); });
})();
