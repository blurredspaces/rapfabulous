<?php
/**
 * Template Name: Story List
 *
 * Lists every post categorized CONVOS, News, Music, or Press Release,
 * newest first, with client-side filter pills. Assumes those four
 * WordPress Categories exist (Posts → Categories) — posts are matched by
 * category slug, so "Press Release" must slugify to press-release, etc.,
 * which is WordPress's default behavior when you name the category that.
 */
get_header();

$story_categories = array(
    array('label' => 'CONVOS',        'slug' => 'convos'),
    array('label' => 'News',          'slug' => 'news'),
    array('label' => 'Music',         'slug' => 'music'),
    array('label' => 'Press Release', 'slug' => 'press-release'),
);
$story_slugs = wp_list_pluck($story_categories, 'slug');

$stories_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'category_name'  => implode(',', $story_slugs), // comma = OR across these categories
    'orderby'        => 'date',
    'order'          => 'DESC',
));
?>

<!-- ============ HEADER ============ -->
<section class="relative bg-[#0A0A0A] pt-28 md:pt-40 pb-10 md:pb-14">
  <div class="max-w-[1400px] mx-auto px-5 md:px-10">
    <p class="font-bold text-sm tracking-widest uppercase mb-4 grad-text">.story list</p>
    <h1 class="font-display text-[11vw] leading-[0.95] sm:text-5xl md:text-6xl">All Stories.</h1>
    <p class="mt-6 max-w-2xl text-sm md:text-base font-medium text-[#F4EFE7]/75">
      CONVOS interviews, editorial, music features, and press &mdash; everything rapfabulous has published, in one place.
    </p>

    <!-- filter pills -->
    <div class="mt-8 md:mt-10 flex flex-wrap gap-2.5" id="story-filters">
      <button type="button" class="story-filter-btn is-active" data-filter="all">All</button>
      <?php foreach ($story_categories as $cat) : ?>
        <button type="button" class="story-filter-btn" data-filter="<?php echo esc_attr($cat['slug']); ?>"><?php echo esc_html($cat['label']); ?></button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ GRID ============ -->
<section class="relative bg-[#0A0A0A] pb-16 md:pb-24">
  <div class="max-w-[1400px] mx-auto px-5 md:px-10">
    <?php if ($stories_query->have_posts()) : ?>
    <div id="story-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php while ($stories_query->have_posts()) : $stories_query->the_post();
        $post_cats      = get_the_category();
        $post_cat_slugs = wp_list_pluck($post_cats, 'slug');
        $relevant_slugs = array_intersect($post_cat_slugs, $story_slugs);
      ?>
      <a href="<?php the_permalink(); ?>"
        class="story-card tilt-card group block rounded-2xl overflow-hidden border border-white/10 bg-[#141414] hover:bg-[#1C1C1C] transition-colors"
        data-categories="<?php echo esc_attr(implode(' ', $relevant_slugs)); ?>">
        <div class="aspect-video overflow-hidden bg-black">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover grayscale contrast-125 brightness-90 group-hover:scale-105 transition-transform duration-500')); ?>
          <?php endif; ?>
        </div>
        <div class="p-5">
          <?php if (!empty($post_cats)) : ?>
          <p class="font-bold text-[10px] tracking-widest uppercase grad-text mb-2"><?php echo esc_html($post_cats[0]->name); ?></p>
          <?php endif; ?>
          <p class="font-display text-lg leading-tight"><?php the_title(); ?></p>
          <p class="text-xs text-[#F4EFE7]/45 mt-2"><?php echo esc_html(get_the_date()); ?></p>
        </div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <p id="story-empty" class="hidden text-[#F4EFE7]/60 mt-4">Nothing tagged this way yet.</p>
    <?php else : ?>
    <p class="text-[#F4EFE7]/60">No stories published yet. Tag a post with CONVOS, Editorial, Music, or Press Release to see it here.</p>
    <?php endif; ?>
  </div>
</section>

<script>
  (function(){
    const buttons = document.querySelectorAll('.story-filter-btn');
    const cards = document.querySelectorAll('.story-card');
    const empty = document.getElementById('story-empty');
    if (!buttons.length || !cards.length) return;

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');
        const filter = btn.dataset.filter;
        let visibleCount = 0;
        cards.forEach(card => {
          const cats = card.dataset.categories.split(' ');
          const show = filter === 'all' || cats.includes(filter);
          card.style.display = show ? '' : 'none';
          if (show) visibleCount++;
        });
        if (empty) empty.classList.toggle('hidden', visibleCount > 0);
      });
    });
  })();
</script>

<?php get_footer(); ?>
