<footer class="border-t border-white/10 mt-10">
  <div class="max-w-[1040px] mx-auto px-5 md:px-10 py-8 flex flex-col sm:flex-row justify-between gap-2 text-xs text-[#F4EFE7]/40">
    <p>&copy; <?php echo esc_html(date('Y')); ?> <a href="https://blurredspaces.com/" target="_blank" rel="noopener" class="hover:text-[#F4EFE7]/70 transition-colors">BLURRED SPACES</a>. All rights reserved.</p>
    <a href="mailto:connect@rapfabulous.com" class="hover:text-[#F4EFE7]/70 transition-colors">connect@rapfabulous.com</a>
  </div>
</footer>

<script>
  const canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (canHover && !reduceMotion) {
    document.querySelectorAll('.tilt-card').forEach((card) => {
      card.addEventListener('mousemove', (e) => {
        const r = card.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = `perspective(700px) rotateX(${py * -5}deg) rotateY(${px * 5}deg)`;
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
  }
</script>

<?php wp_footer(); ?>
</body>
</html>
