<?php
/**
 * 404 error page.
 */
get_header();
$theme_uri = get_template_directory_uri();
?>

<section class="relative bg-[#0A0A0A] pt-32 md:pt-44 pb-20 md:pb-28 min-h-[70vh] flex items-center overflow-hidden">
  <div class="noise"></div>
  <div class="max-w-[900px] mx-auto px-5 md:px-10 relative text-center">

    <p class="font-bold text-sm tracking-widest uppercase mb-8 md:mb-10 grad-text">.404 &middot; dead air</p>

    <div class="mx-auto mb-8 md:mb-10 h-36 w-36 md:h-48 md:w-48 rounded-2xl overflow-hidden shadow-glow border border-white/10 grad-bg flex items-center justify-center">
      <video autoplay muted loop playsinline class="h-full w-full object-contain">
        <source src="<?php echo esc_url($theme_uri); ?>/assets/video/cassette-spin.mp4" type="video/mp4" />
      </video>
    </div>

    <h1 class="font-display text-[13vw] leading-[0.92] sm:text-6xl md:text-7xl">Lost?<br/>Back to the show.</h1>

    <p class="mt-6 max-w-md mx-auto text-sm md:text-base font-medium text-[#F4EFE7]/70">
      This page got remixed, moved, or never existed &mdash; the tape's still spinning, but not here.
    </p>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="mt-8 md:mt-10 inline-flex btn btn-solid shadow-glow-sm">back to home</a>

  </div>
</section>

<?php get_footer(); ?>
