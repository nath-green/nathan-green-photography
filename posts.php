<?php theme_include('header'); ?>


  <div class="sm-container my-12">
    <?php if (site_meta('blog_heading') && site_meta('blog_description') && !getCategoryInfo() && has_posts()) { ?>
    <header>
      <h1><?php echo site_meta('blog_heading');?></h1>
      <p><?php echo site_meta('blog_description');?></p>
    </header>
    <?php } ?>

    <?php if (getCategoryInfo() && has_posts()) {
      $category = getCategoryInfo();	
      ?>
    <header>
      <h1 class="text-xl font-semibold font-title leading-tight mb-3"><?php echo $category->title ?></h2>
      <p class="text-md leading-tight text-gray-700 font-serif"><?php echo $category->description ?></p>
    </header>
    <?php } ?>
  </div>

  <div class="bg-gray-200 border pt-12 pb-6">
    <div class="lg-container">
      <div class="md:flex md:flex-wrap md:-mx-3" itemscope itemtype="http://schema.org/ItemList">
        <?php if (has_posts()): ?>
        <?php $i=1; while(posts()): ?>
        <div class="md:w-1/2 mb-6 md:px-3" itemprop="itemListElement" itemscope
          itemtype="http://schema.org/ListItem">
          <meta itemprop="url" content="<?php echo article_url(); ?>" />
          <meta itemprop="position" content="<?php echo $i; ?>" />
          <article class="c-card" itemscope itemtype="http://schema.org/Article">
            <img src="<?php echo article_custom_field('hero'); ?>" alt="<?php echo article_custom_field('image_alt'); ?>" class="h-56 w-full object-cover"
              itemprop="image">
            <div class="p-6 flex flex-col flex-1">

              <header>
                <h2 class="mb-3" itemprop="name headline"><?php echo article_title(); ?></h2>
              </header>

              <div class="flex items-center mb-3">
                <span class="w-10 h-10 rounded-full mr-2">
                  <img src="<?php echo user_custom_field('avatar', '', article_author_id()); ?>" alt="<?php echo article_author('real_name'); ?>"
                    class="w-full h-full object-cover rounded-full">
                </span>

                <div>
                  <p class="font-sans text-sm">
                    <span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
                      <span itemprop="name"><?php echo article_author('real_name'); ?></span></span> in <a
                      href="<?php echo article_category_url(); ?>"
                      class="text-purple-600 underline"><?php echo article_category(); ?></a>
                  </p>

                  <p class="font-sans text-xs">
                    Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"
                      itemprop="datePublished dateModified"
                      content="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
                  </p>
                </div>
              </div>

              <p class="mb-4 flex-1" itemprop="description">
                <?php echo article_description(); ?>
              </p>

              <a href="<?php echo article_url(); ?>"
                class="c-btn c-btn--primary"
                itemprop="url mainEntityOfPage" title="Read the full article on the blog">Read article</a>
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

<?php theme_include('footer'); ?>