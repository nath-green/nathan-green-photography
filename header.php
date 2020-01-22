<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

  <meta name="description" content="<?php echo site_description(); ?>">

  <?php
    $manifest = json_decode(file_get_contents(__DIR__. '/manifest.json'), true);
    $cssFile = $manifest['main.css'];
  ?>

  <link rel="preload" as="style" href="<?php echo theme_url('/css/' . $cssFile); ?>">
  <link rel="stylesheet" href="<?php echo theme_url('/css/' . $cssFile); ?>">
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
  <link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

  <!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <meta name="viewport" content="width=device-width">

  <meta property="og:title" content="<?php echo page_title(); ?>">
  <?php if(is_article()): ?>
  <meta property="og:type" content="article">
  <?php else: ?>
  <meta property="og:type" content="website">
  <?php endif; ?>
  <meta property="og:url" content="<?php echo complete_url(); ?>">
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="800" />
  <?php if(is_article() && !article_custom_field('og:image')): ?>
  <meta property="og:image" content="<?php echo base_domain_url(article_custom_field('og_image')); ?>">
  <?php else: ?>
  <meta property="og:image" content="<?php echo base_domain_url() . theme_url('img/og_image.jpg'); ?>">
  <?php endif; ?>
  <meta property="og:site_name" content="<?php echo site_name(); ?>">
  <meta property="og:description" content="<?php echo page_description(); ?>">
</head>

<body class="<?php echo body_class(); ?>">
  <div class="flex flex-col mh-100vh">
    <header class="py-5">
      <div class="px-6 flex justify-between items-center">
        <a href="<?php echo base_url(); ?>" aria-label="Home"><img src="<?php echo theme_url('img/logo.svg'); ?>"
            class="" width="170px" alt=""></a>
            <a class="c-btn" href="<?php echo base_url(); ?>posts" title="Read photography articles written by Nathan Green">Read blog</a>
      </div>
    </header>