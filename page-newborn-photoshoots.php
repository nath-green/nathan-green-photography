<?php theme_include('header'); ?>

<div class="lg-container px-0 mb-10 lg:mt-10">
  <img class="object-cover w-full" src="<?php echo theme_url('img/ted-dufton-05-lg.jpg'); ?>"
    alt="Nathan Green holding son Samuel" />
</div>

<div class="sm-container">
  <h1>In home newborn photoshoots</h1>
  <p class="mb-10">Having a baby is an experience you can't put into words, it is something you have to go through to understand. A newborn stays a "newborn" for the first 28 days, apparently. So the window of opportunity is small to capture those details and intimate moments. An in home photoshoot gives you one less thing to worry about when things are already hard enough, let the photographer come to you.</p>

  <h2>Newborn photography style</h2>
  <p class="mb-3">The style of photography I have is very natural. I don't use props, wraps or baskets for the baby to sit in. I like to use things around your home to bring the photos to life and give you a real reminder of your newborn at this time.</p>
  <p class="mb-10">The baby is obviously the center of attention but getting Mum, Dad and Grandparents in the photos are very important. It shows emotion and connection to your baby in a way that a studio can't reproduce. I generally don't ask people to look at the camera but often capture the moments nice and close, often just showing a hint of Mum or Dads presence.</p>

  <h2>When should I book?</h2>
  <p class="mb-10">Already given birth or have a baby on the way? With newborn babies, unfortunately they don't keep their little-ness for very long. It is a good idea to contact me as soon as you know you want to photograph your baby so I can reserve a date around your due date and capture all their cuteness why they are still a newborn.</p>
</div>

<div class="lg-container px-0 mb-10">
  <img class="object-cover w-full" src="<?php echo theme_url('img/ted-dufton-06-lg.jpg'); ?>"
    alt="Nathan Green holding son Samuel" />
</div>

<div class="sm-container mb-6">
  <h2>Latest newborn photoshoot blog posts</h2>
  <p>To see the full list of newborn photoshoots head over to the category page for <a href="<?php echo base_url(); ?>category/newborn-photoshoots" class="text-purple-600 underline">newborn photoshoots</a>.</p>
</div>

<div class="bg-gray-200 border pt-12 pb-6">
  <div class="lg-container">
    <div class="md:flex md:flex-wrap md:-mx-3" itemscope itemtype="http://schema.org/ItemList">
    <?php
        $i = 1;
        $posts = rwar_latest_posts(4, 'newborn-photoshoots');
        foreach($posts as $post): ?>
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
                    <img src="<?php echo user_custom_field('avatar', '', $post->author); ?>"
                      alt="<?php user_real_name($post->author); ?>" class="w-full h-full object-cover rounded-full">
                  </span>

                  <div>
                    <p class="font-sans text-sm">
                      <span itemprop="author publisher" itemscope itemtype="http://schema.org/Person">
                        <span itemprop="name"><?php user_real_name($post->author); ?></span></span> in <a
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
      <?php $i++; endforeach; ?>
    </div>
    </div>
  </div>

<?php theme_include('footer'); ?>