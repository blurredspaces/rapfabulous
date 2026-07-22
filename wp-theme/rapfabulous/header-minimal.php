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

<header class="border-b border-white/[.06] sticky top-0 z-40 bg-[#0A0A0A]/85 backdrop-blur-md">
  <div class="max-w-[1040px] mx-auto px-5 md:px-10 h-16 md:h-20 flex items-center justify-between">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2.5" aria-label="rapfabulous home">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/brand/r-mark-gradient.png" alt="" class="h-7 md:h-8 w-auto" />
      <span class="font-display text-lg md:text-xl tracking-tight">rapfabulous<sup class="text-[9px] align-super">&reg;</sup></span>
    </a>
    <span class="text-xs font-bold tracking-widest uppercase text-[#F4EFE7]/40"><?php echo esc_html($args['label'] ?? ''); ?></span>
  </div>
</header>
