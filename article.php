<?php theme_include('header'); ?>

<?php if (article_custom_field('hero')) { ?>
<img src="<?php echo article_custom_field('hero'); ?>" alt="" class="h-64 mb-10 w-full object-cover" itemprop="image" />
<?php } ?>

<article id="article-<?php echo article_id(); ?>" class="container flex-1" itemscope
  itemtype="http://schema.org/Article">
  <header>
    <h1 itemprop="name" class="text-2xl mb-3 font-semibold font-title leading-tight">
      <?php echo article_title(); ?>
    </h1>

    <ul id="breadcrumblist" itemscope itemtype="http://schema.org/BreadcrumbList" class="flex mb-3 text-sm">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
      href="<?php echo base_url(); ?>" class="text-purple-600 underline mr-2"><span itemprop="name">Blog Home</span></a>
      &rarr;
        <meta itemprop="position" content="1" />
      </li>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
      href="<?php echo article_category_url(); ?>" class="text-purple-600 underline mx-2"><span itemprop="name"><?php echo article_category(); ?></span></a>
        <meta itemprop="position" content="2" /></li>
        &rarr;
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="ml-2"><span itemprop="name"><?php echo article_title(); ?></span>
        <meta itemprop="position" content="3" />
      </li>
    </ul>
  </header>

  <section class="flex">
    <?php if (user_custom_field('avatar')) { ?>
    <span class="w-10 h-10 rounded-full mr-2">
      <img src="<?php echo user_custom_field('avatar', '', article_author_id('')); ?>" alt=""
        class="w-full h-full object-cover rounded-full">
    </span>
    <?php } ?>

    <div>
      <p class="text-gray-700 text-sm">
        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
          <span itemprop="name"><?php echo article_author('real_name'); ?></span></span> in <a
          href="<?php echo article_category_url(); ?>"
          class="text-purple-600 underline"><?php echo article_category(); ?></a>
      </p>

      <p class="text-gray-700 text-xs">
        Posted <time itemprop="datePublished" content="<?php echo date(DATE_W3C, article_time()); ?>"
          datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
      </p>
    </div>
  </section>

  <hr class=" my-6 opacity-50" />

  <section itemprop="articleBody" class="font-serif text-lg article-html">
    <?php echo article_html(); ?>
  </section>

  <?php if (article_adjacent_url('prev') || (article_adjacent_url('next'))) { ?>
  <footer class="flex justify-between items-center mt-16">
    <?php if (article_adjacent_url('prev')) { ?>
    <a href="<?php article_adjacent_url('prev'); ?>" class='flex items-center text-purple-600 underline'>&larr;
      Previous</a>
    <?php } ?>
    <?php if (article_adjacent_url('next')) { ?>
    <a href="<?php article_adjacent_url('next'); ?>" class='flex items-center text-purple-600 underline'>Next &rarr;</a>
    <?php } ?>
  </footer>
  <?php } ?>

</article>

<?php theme_include('footer'); ?>