<?php theme_include('header'); ?>

<article id="article-<?php echo article_id(); ?>" itemscope itemtype="http://schema.org/Article" class="flex-1">
  <link itemprop="mainEntityOfPage" href="<?php echo complete_url(); ?>" />
  <?php if (article_custom_field('hero')) { ?>
  <img src="<?php echo article_custom_field('hero'); ?>" alt="<?php echo article_custom_field('image_alt'); ?>" class="h-64 lg:h-45rem mb-8 w-full object-cover"
    itemprop="image" />
  <?php } ?>

  <div class="lg-container mt-8 mb-20">
    <header>
      <ul id="breadcrumblist" itemscope itemtype="http://schema.org/BreadcrumbList" class="flex flex-wrap mb-5 text-xs">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
            href="<?php echo base_url(); ?>posts" class="text-purple-600 underline mr-1"><span itemprop="name">Home</span></a><span class="mr-1 text-gray-700">></span>
          <meta itemprop="position" content="1" />
        </li>

        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
            href="<?php echo article_category_url(); ?>" class="text-purple-600 underline mr-1"><span
              itemprop="name"><?php echo article_category(); ?></span></a><span class="mr-1 text-gray-700">></span>
          <meta itemprop="position" content="2" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="text-gray-700"><span
            itemprop="name"><?php echo article_title(); ?></span>
          <meta itemprop="position" content="3" />
        </li>
      </ul>

      <h1 itemprop="name headline">
        <?php echo article_title(); ?>
      </h1>

    </header>

    <div class="flex items-center mb-5">
      <?php if (user_custom_field('avatar', '', article_author_id())) { ?>
      <span class="w-10 h-10 rounded-full mr-2">
        <img src="<?php echo user_custom_field('avatar', '', article_author_id()); ?>" alt=""
          class="w-full h-full object-cover rounded-full">
      </span>
      <?php } ?>

      <div>
        <p class="font-sans text-sm">
          <span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
            <span itemprop="name"><?php echo article_author('real_name'); ?></span></span> in <a
            href="<?php echo article_category_url(); ?>"
            class="text-purple-600 underline"><?php echo article_category(); ?></a>
        </p>

        <p class="font-sans text-xs">
          Posted <time itemprop="datePublished dateModified" content="<?php echo date(DATE_W3C, article_time()); ?>"
            datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
        </p>
      </div>
      </div>

    <hr class=" my-6 opacity-50" />

    <section itemprop="articleBody" class="article-html">
      <?php echo article_html(); ?>
    </section>

  </div>
</article>

<?php theme_include('footer'); ?>