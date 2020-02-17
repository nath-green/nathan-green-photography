<?php theme_include('header'); ?>

<div class="lg-container px-0 mb-10 lg:mt-10">
  <img class="object-cover w-full" src="<?php echo theme_url('img/louis-02-lg.jpg'); ?>" alt="Baby boy smiling held by Dad" />
</div>

<div class="sm-container mb-12">
  <h1>In home baby photoshoots</h1>
  <p class="mb-3">Every baby is different and this makes for such a range of photographic opportunities. Whether your baby enjoys tummy time, reading a book or standing in their cot - it can all be captured beautifully. As the weeks pass by, a true personality starts to emerge with their likes and dislikes.</p>
  <p>The best thing about a baby shoot is they lead the way, I would never force a baby to sit in a certain position or play with a toy just for a photo. I let them (and you) take the lead with what they enjoy doing the most. Infectious giggles from Dad singing Humpty Dumpty? Don&apos;t let me get in the way, I&apos;ll be in the background as much as possible.</p>
</div>

<div class="lg-container px-0 mb-12">
  <img class="object-cover w-full" src="<?php echo theme_url('img/jamie-02-lg.jpg'); ?>" alt="Baby boy being read to by Mum" />
</div>

<div class="sm-container mb-12">
  <h2>What age should my baby be?</h2>
  <p class="mb-3">The best thing is there is no age which is best for photography. Every stage of a babies life is special and different, often just days between learning something new!</p>
  <p class="mb-6">Every stage and development can and should be remembered, although some are definitely easier to photograph than others!</p>

  <a class="c-btn c-btn--primary inline-block mb-12" href="http://m.me/nathangreenphotography" title="Get in contact with Nathan Green">Ready to enquire?</a>
</div>

<div class="sm-container mb-6">
  <h2>Latest baby photoshoot blog posts</h2>
  <p>To see the full list of baby photoshoots head over to the category page for <a href="<?php echo base_url(); ?>category/baby-photoshoots" class="text-purple-600 underline">baby photoshoots</a>.</p>
</div>

<div class="bg-gray-200 border pt-12 pb-6">
  <div class="lg-container">
    <div class="md:flex md:flex-wrap md:-mx-3" itemscope itemtype="http://schema.org/ItemList">
    <?php
      $i = 1;
      while(rwar_latest_posts(6, 'baby-photoshoots')):
    ?>
        <div class="md:w-1/2 md:px-3 mb-6" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <meta itemprop="url" content="<?php echo article_url(); ?>" />
          <meta itemprop="position" content="<?php echo $i; ?>" />
          <article class="c-card" itemtype="http://schema.org/Article">
            <img class="h-56 w-full object-cover" src="<?php echo article_custom_field('hero'); ?>"
              alt="<?php echo article_custom_field('image_alt'); ?>" itemprop="image" />
            <div class="px-6 py-6 flex flex-col flex-1">
              <header>
                <h2 class="mb-3" itemprop="name headline"><?php echo article_title(); ?></h2>
              </header>
              <div class="flex items-center mb-3">
                <span class="w-10 h-10 rounded-full mr-2">
                  <img src="<?php echo user_custom_field('avatar', '', '1'); ?>"
                    alt="Nathan Green" class="w-full h-full object-cover rounded-full">
                </span>

                <div>
                  <p class="font-sans text-sm">
                    <span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
                      <span itemprop="name">Nathan Green</span></span> in <a
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
              <p class="mb-4 flex-1" itemprop="description"><?php echo article_description(); ?></p>
              <a class="c-btn c-btn--primary block" href="<?php echo article_url(); ?>"
                title="Read the full article on the blog" itemprop="url mainEntityOfPage">Read article</a>
            </div>
          </article>
        </div>
      <?php $i++; endwhile; ?>
    </div>
    </div>
  </div>

<?php theme_include('footer'); ?>