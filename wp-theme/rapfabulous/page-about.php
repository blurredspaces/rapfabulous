<?php
/**
 * Template Name: About
 */
get_header();
$theme_uri = get_template_directory_uri();
?>

<!-- ============ ABOUT ============ -->
<section class="relative bg-[#0A0A0A] pt-28 md:pt-40 pb-20 md:pb-28">
  <div class="max-w-[1400px] mx-auto px-5 md:px-10">
    <p class="font-bold text-sm tracking-widest uppercase mb-8 md:mb-10 grad-text">.about</p>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">

      <!-- photo with logo overlay -->
      <div class="tilt-card relative rounded-2xl overflow-hidden shadow-glow aspect-square">
        <img src="<?php echo esc_url($theme_uri); ?>/assets/photos/mic-fox-about.jpg" alt="Mic Fox, founder and host of rapfabulous, standing in front of a graffiti wall"
          class="w-full h-full object-cover grayscale contrast-110" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/0 to-transparent"></div>
        <img src="<?php echo esc_url($theme_uri); ?>/assets/brand/wordmark-gradient.png" alt="rapfabulous"
          class="absolute left-6 bottom-6 md:left-8 md:bottom-8 w-[52%] max-w-[280px] h-auto" />
      </div>

      <!-- copy, verbatim -->
      <div>
        <p class="font-display text-[7.5vw] sm:text-4xl md:text-[2.5vw] lg:text-[2.15vw] leading-[1.18] tracking-tight">
          I created <span class="grad-text">rapfabulous</span>&reg; to celebrate our architects, the artists, the producers, the DJs, those of us who worked behind the scenes, the fans, the dancers, graffiti artists and more. I've lived an entire career from the culture of this thing called hip hop.
        </p>
        <p class="mt-8 text-sm font-bold tracking-widest uppercase text-[#F4EFE7]/50">Mic Fox, Founder &amp; Host</p>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
