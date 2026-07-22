<?php
/**
 * Single post ("Stories" / CONVOS write-ups). Ported from the post-template
 * mockup built during the static-site phase — that file's `WP:` comments
 * map directly to the calls used here (the_title, the_excerpt,
 * the_post_thumbnail, the_content, etc).
 */
get_header();

while (have_posts()) : the_post();
    $author_name = get_the_author();
    $name_parts  = preg_split('/\s+/', trim($author_name));
    $initials    = strtoupper(substr($name_parts[0], 0, 1) . (isset($name_parts[1]) ? substr($name_parts[1], 0, 1) : ''));
    $word_count  = str_word_count(wp_strip_all_tags(get_the_content()));
    $read_mins   = max(1, (int) ceil($word_count / 200));
    $categories  = get_the_category();
?>

<!-- ============ ARTICLE ============ -->
<article <?php post_class(''); ?>>

  <header class="max-w-[760px] mx-auto px-5 md:px-8 pt-32 md:pt-40 pb-8 md:pb-10">
    <?php if (!empty($categories)) : ?>
    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="inline-block font-bold text-xs tracking-widest uppercase grad-text mb-5"><?php echo esc_html($categories[0]->name); ?></a>
    <?php endif; ?>

    <h1 class="font-display text-4xl md:text-6xl"><?php the_title(); ?></h1>

    <?php if (has_excerpt()) : ?>
    <p class="mt-6 text-lg md:text-xl text-[#F4EFE7]/65 leading-relaxed"><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php endif; ?>

    <div class="mt-8 flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-[#F4EFE7]/55 border-t border-white/10 pt-6">
      <div class="flex items-center gap-2.5">
        <span class="h-9 w-9 rounded-full grad-bg flex items-center justify-center font-display text-xs text-[#F4EFE7]"><?php echo esc_html($initials); ?></span>
        <span class="font-semibold text-[#F4EFE7]/85"><?php echo esc_html($author_name); ?></span>
      </div>
      <span class="text-[#F4EFE7]/25">&middot;</span>
      <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
      <span class="text-[#F4EFE7]/25">&middot;</span>
      <span><?php echo esc_html($read_mins); ?> min read</span>
    </div>
  </header>

  <?php if (has_post_thumbnail()) : ?>
  <figure class="max-w-[1100px] mx-auto px-5 md:px-8">
    <div class="relative rounded-2xl overflow-hidden shadow-glow">
      <?php the_post_thumbnail('full', array('class' => 'w-full h-auto')); ?>
      <div class="noise"></div>
    </div>
    <?php $caption = get_the_post_thumbnail_caption(); if ($caption) : ?>
    <figcaption class="text-xs text-[#F4EFE7]/45 mt-3 text-center px-4"><?php echo esc_html($caption); ?></figcaption>
    <?php endif; ?>
  </figure>
  <?php endif; ?>

  <div class="prose max-w-[680px] mx-auto px-5 md:px-8 py-12 md:py-16">
    <?php the_content(); ?>
  </div>

  <?php $author_bio = get_the_author_meta('description'); if ($author_bio) : ?>
  <aside class="max-w-[680px] mx-auto px-5 md:px-8 pb-4">
    <div class="rounded-2xl border border-white/10 p-6 md:p-7 flex gap-5 items-start">
      <span class="h-14 w-14 rounded-full grad-bg flex items-center justify-center font-display text-lg text-[#F4EFE7] shrink-0"><?php echo esc_html($initials); ?></span>
      <div>
        <p class="font-bold text-lg"><?php echo esc_html($author_name); ?></p>
        <p class="text-sm text-[#F4EFE7]/65 mt-1"><?php echo esc_html($author_bio); ?></p>
      </div>
    </div>
  </aside>
  <?php endif; ?>

</article>

<!-- ============ RELATED ============ -->
<?php
$related_args = array(
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'date',
    'order'          => 'DESC',
);
if (!empty($categories)) {
    $related_args['category__in'] = wp_list_pluck($categories, 'term_id');
}
$related = new WP_Query($related_args);
if ($related->have_posts()) :
?>
<section class="max-w-[1100px] mx-auto px-5 md:px-8 py-14 md:py-20 border-t border-white/10 mt-8">
  <div class="flex items-end justify-between gap-4 mb-8">
    <h2 class="font-display text-3xl md:text-4xl">More Stories.</h2>
    <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="nav-link text-sm shrink-0">all stories &rarr;</a>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    <?php while ($related->have_posts()) : $related->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="group block rounded-2xl overflow-hidden border border-white/10 bg-[#141414] hover:bg-[#1C1C1C] transition-colors">
      <div class="aspect-video overflow-hidden bg-black">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover grayscale contrast-125 brightness-90 group-hover:scale-105 transition-transform duration-500')); ?>
        <?php endif; ?>
      </div>
      <div class="p-5">
        <?php $rel_cats = get_the_category(); if (!empty($rel_cats)) : ?>
        <p class="font-bold text-[10px] tracking-widest uppercase grad-text mb-2"><?php echo esc_html($rel_cats[0]->name); ?></p>
        <?php endif; ?>
        <p class="font-display text-lg leading-tight"><?php the_title(); ?></p>
        <p class="text-xs text-[#F4EFE7]/45 mt-2"><?php echo esc_html(get_the_date()); ?></p>
      </div>
    </a>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
