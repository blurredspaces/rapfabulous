<?php
/**
 * Fallback template — blog archive / search results / 404.
 * Stories get their full layout from single.php; this is just the listing grid.
 */
get_header();
?>

<main class="max-w-[1200px] mx-auto px-5 md:px-10 pt-32 md:pt-40 pb-16 md:pb-24">

  <?php if (is_search()) : ?>
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">search results</p>
    <h1 class="font-display text-4xl md:text-5xl mb-10">"<?php echo esc_html(get_search_query()); ?>"</h1>
  <?php else : ?>
    <p class="font-bold text-sm tracking-widest uppercase mb-3 grad-text">.stories</p>
    <h1 class="font-display text-4xl md:text-5xl mb-10">From rapfabulous.</h1>
  <?php endif; ?>

  <?php if (have_posts()) : ?>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="group block rounded-2xl overflow-hidden border border-white/10 bg-[#141414] hover:bg-[#1C1C1C] transition-colors">
      <div class="aspect-video overflow-hidden bg-black">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover grayscale contrast-125 brightness-90 group-hover:scale-105 transition-transform duration-500')); ?>
        <?php endif; ?>
      </div>
      <div class="p-5">
        <?php $cats = get_the_category(); if (!empty($cats)) : ?>
        <p class="font-bold text-[10px] tracking-widest uppercase grad-text mb-2"><?php echo esc_html($cats[0]->name); ?></p>
        <?php endif; ?>
        <p class="font-display text-lg leading-tight"><?php the_title(); ?></p>
        <p class="text-xs text-[#F4EFE7]/45 mt-2"><?php echo esc_html(get_the_date()); ?></p>
      </div>
    </a>
    <?php endwhile; ?>
  </div>

  <div class="mt-12">
    <?php the_posts_pagination(array(
        'prev_text' => '&larr; newer',
        'next_text' => 'older &rarr;',
        'class'     => 'flex gap-3 text-sm font-semibold',
    )); ?>
  </div>
  <?php else : ?>
  <p class="text-[#F4EFE7]/60">Nothing here yet.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
