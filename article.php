<?php theme_include('header'); ?>

<?php if (article_custom_field('hero')) { ?>
  <img src="<?php echo article_custom_field('hero'); ?>" alt="" class="h-64 mb-10 w-full object-cover">
<?php } ?>

<section id="article-<?php echo article_id(); ?>" class="container flex-1">
  <h1 class="text-2xl mb-3 font-semibold font-title leading-tight">
    <?php echo article_title(); ?>
  </h1>

  <div class="flex">
    <?php if (user_custom_field('avatar')) { ?>
      <span class="w-10 h-10 rounded-full mr-2">
        <img src="<?php echo user_custom_field('avatar', '', article_author_id('')); ?>" alt=""
          class="w-full h-full object-cover rounded-full">
      </span>
    <?php } ?>

    <div>
      <p class="text-gray-700 text-sm">
        <?php echo article_author('real_name'); ?> in <a href="<?php echo article_category_url(); ?>"
          class="text-purple-600 underline"><?php echo article_category(); ?></a>
      </p>

      <p class="text-gray-700 text-xs">
        Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time>
      </p>
    </div>
  </div>

  <hr class=" my-6 opacity-50" />

  <article class="font-serif text-lg article-html">
    <?php echo article_html(); ?>
  </article>

  <?php if (article_adjacent_url('prev') || (article_adjacent_url('next'))) { ?>
  <div class="flex justify-between items-center mt-16">
    <?php if (article_adjacent_url('prev')) { ?>
    <a href="<?php article_adjacent_url('prev'); ?>" class='flex items-center text-purple-600 underline'>&larr;
      Previous</a>
    <?php } ?>
    <?php if (article_adjacent_url('next')) { ?>
    <a href="<?php article_adjacent_url('next'); ?>" class='flex items-center text-purple-600 underline'>Next &rarr;</a>
    <?php } ?>
  </div>
  <?php } ?>

</section>

<?php theme_include('footer'); ?>