<?php theme_include('header'); ?>

<section class="flex-1 mt-10">

  <div class="sm-container mb-12">
    <?php if (site_meta('heading') && !getCategoryInfo() && has_posts()) { ?>
    <header>
      <h1 class="text-xl font-semibold font-title leading-tight mb-3"><?php echo site_meta('heading'); ?></h1>
      <p class="text-md leading-tight text-gray-700 font-serif"><?php echo site_meta('description'); ?></p>
    </header>
    <?php } ?>

    <?php if (getCategoryInfo() && has_posts()) {
      $category = getCategoryInfo();	
      ?>
    <header>
      <h1 class="text-xl font-semibold font-title leading-tight mb-3"><?php echo $category->title ?></h2>
      <p class="leading-tight font-title"><?php echo $category->description ?></p>
    </header>
    <?php } ?>
  </div>

  <div class="bg-gray-100">
    <div class="lg-container py-12">
      <div class="md:flex md:flex-wrap md:-mx-3" itemscope itemtype="http://schema.org/ItemList">
        <?php if (has_posts()): ?>
        <?php $i=1; while(posts()): ?>
        <div class="md:w-1/2 mb-6 md:px-3 xl:w-1/3" itemprop="itemListElement" itemscope
          itemtype="http://schema.org/ListItem">
          <meta itemprop="url" content="<?php echo article_url(); ?>" />
          <meta itemprop="position" content="<?php echo $i; ?>" />
          <article class="rounded bg-white shadow overflow-hidden h-full flex flex-col" itemscope
            itemtype="http://schema.org/Article">
            <img src="<?php echo article_custom_field('hero'); ?>" alt="" class="h-40 w-full object-cover"
              itemprop="image">
            <div class="p-6 flex flex-col flex-1">

              <header>
                <a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>" itemprop="url">
                  <h2 class="text-xl mb-3 font-semibold font-title leading-tight" itemprop="name headline">
                    <?php echo article_title(); ?></h2>
                </a>
              </header>

              <div class="flex items-center mb-3">
                <span class="w-10 h-10 rounded-full mr-2">
                  <img src="<?php echo user_custom_field('avatar', '', article_author_id()); ?>" alt=""
                    class="w-full h-full object-cover rounded-full">
                </span>

                <div>
                  <p class="text-gray-700 text-sm">
                    <span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
                      <span itemprop="name"><?php echo article_author('real_name'); ?></span></span> in <a
                      href="<?php echo article_category_url(); ?>"
                      class="text-purple-600 underline"><?php echo article_category(); ?></a>
                  </p>

                  <p class="text-gray-700 text-xs">
                    Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"
                      itemprop="datePublished dateModified"
                      content="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
                  </p>
                </div>
              </div>

              <p class="mb-4 leading-tight text-md text-gray-700 font-serif flex-1" itemprop="description">
                <?php echo article_description(); ?>
              </p>

              <a href="<?php echo article_url(); ?>"
                class="text-center p-3 block rounded bg-purple-600 font-semibold text-white uppercase text-sm tracking-widest font-sans"
                itemprop="url mainEntityOfPage">Read
                blog post</a>
            </div>
          </article>
        </div>
        <?php $i++; ?>
        <?php endwhile; ?>
      </div>


      <?php if (has_pagination()): ?>
      <nav class="flex justify-between">
        <div class="flex items-center text-purple-600 underline">
          <?php echo posts_prev(); ?>
        </div>
        <div class="flex items-center text-purple-600 underline">
          <?php echo posts_next(); ?>
        </div>
      </nav>
      <?php endif; ?>

      <?php else: ?>
      <div class="w-full">
        <h1 class="text-xl font-semibold font-title leading-tight mb-8 md:text-center">No blog posts have been written
          just yet, check back soon.</h1>
        <img src="<?php echo theme_url('img/no-posts.svg'); ?>" class="m-auto w-4/5 sm:w-1/5 md:w-1/3" alt="">
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php theme_include('footer'); ?>