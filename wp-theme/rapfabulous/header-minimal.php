<!doctype html>
<html lang="en" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/brand/favicon.png" sizes="32x32" />
<link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/brand/apple-touch-icon.png" />
<?php wp_head(); ?>
</head>
<body <?php body_class('overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>

<header class="border-b border-white/[.06] sticky top-0 z-50 bg-[#0A0A0A]/85 backdrop-blur-md">
  <div class="max-w-[1040px] mx-auto px-5 md:px-10 h-16 md:h-20 flex items-center justify-between">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2.5" aria-label="rapfabulous home">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/brand/r-mark-gradient.png" alt="" class="h-7 md:h-8 w-auto" />
      <span class="font-display text-lg md:text-xl tracking-tight">rapfabulous<sup class="text-[9px] align-super">&reg;</sup></span>
    </a>
    <div class="flex items-center gap-4 md:gap-5">
      <span class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/40"><?php echo esc_html($args['label'] ?? ''); ?></span>
      <button id="menu-toggle" type="button" class="relative h-9 w-9 shrink-0 flex flex-col items-center justify-center gap-[5px]" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="menu-bar block h-[1.5px] w-6 bg-[#F4EFE7] transition-transform duration-300"></span>
        <span class="menu-bar block h-[1.5px] w-6 bg-[#F4EFE7] transition-opacity duration-300"></span>
        <span class="menu-bar block h-[1.5px] w-6 bg-[#F4EFE7] transition-transform duration-300"></span>
      </button>
    </div>
  </div>
</header>

<!-- ============ MOBILE MENU ============ -->
<div id="mobile-menu" class="fixed inset-0 z-40 bg-[#0A0A0A] pointer-events-none opacity-0 transition-opacity duration-300" aria-hidden="true">
  <div class="noise"></div>
  <nav class="relative h-full flex flex-col justify-center gap-6 px-8" aria-label="Mobile">
    <a href="<?php echo esc_url(home_url('/')); ?>" data-menu-link class="font-display text-4xl">.home</a>
    <a href="<?php echo esc_url(home_url('/#convos')); ?>" data-menu-link class="font-display text-4xl">.videos</a>
    <a href="<?php echo esc_url(home_url('/#live-radio')); ?>" data-menu-link class="font-display text-4xl">.live radio</a>
    <a href="<?php echo esc_url(home_url('/shows/')); ?>" data-menu-link class="font-display text-4xl">.replay radio</a>
    <a href="<?php echo esc_url(home_url('/story-list/')); ?>" data-menu-link class="font-display text-4xl">.stories</a>
    <a href="<?php echo esc_url(home_url('/about/')); ?>" data-menu-link class="font-display text-4xl">.about</a>

    <div class="flex items-center gap-5 mt-6">
      <a href="https://www.instagram.com/rapfabulous/" target="_blank" rel="noopener" aria-label="Instagram" class="text-[#F4EFE7]/60 hover:text-[#F4EFE7] transition-colors">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg>
      </a>
      <a href="https://www.tiktok.com/@rapfabulous" target="_blank" rel="noopener" aria-label="TikTok" class="text-[#F4EFE7]/60 hover:text-[#F4EFE7] transition-colors">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M16.5 2h-3v13.7c0 1.5-1.2 2.7-2.7 2.7a2.7 2.7 0 1 1 0-5.4c.3 0 .6 0 .9.1V9.9a5.9 5.9 0 0 0-.9-.1A6 6 0 1 0 16.5 15.9V8.3a8 8 0 0 0 4.5 1.4V6.4c-1.9 0-3.6-.9-4.5-2.4V2Z"/></svg>
      </a>
      <a href="https://www.youtube.com/@rapfabulous" target="_blank" rel="noopener" aria-label="YouTube" class="text-[#F4EFE7]/60 hover:text-[#F4EFE7] transition-colors">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-3.6-.5-5.3c-.3-1-1-1.7-2-2C18.7 4.2 12 4.2 12 4.2s-6.7 0-8.5.5c-1 .3-1.7 1-2 2C1 8.4 1 12 1 12s0 3.6.5 5.3c.3 1 1 1.7 2 2 1.8.5 8.5.5 8.5.5s6.7 0 8.5-.5c1-.3 1.7-1 2-2 .5-1.7.5-5.3.5-5.3ZM9.8 15.5V8.5l6.3 3.5-6.3 3.5Z"/></svg>
      </a>
    </div>
  </nav>
</div>
