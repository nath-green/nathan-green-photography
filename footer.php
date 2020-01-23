						<footer class="py-8 bg-gray-700 shadow text-white">
						  <div class="lg-container">

						    <?php if (site_meta('facebook_url')) { ?>
						    <div class="mb-2">
						      <a href="<?php echo site_meta('facebook_url'); ?>" class="flex items-center text-sm" title="See Nathan Green Photography Facebook profile">
									<img src="<?php echo theme_url('img/facebook.svg'); ?>" alt="Facebook logo" width="30px"
            aria-hidden class="mr-2" /> Facebook
						      </a>
						    </div>
						    <?php } ?>

						    <?php if (site_meta('instagram_url')) { ?>
						    <div class="mb-2">
						      <a href="<?php echo site_meta('instagram_url'); ?>" class="flex items-center text-sm" title="See Nathan Green Photography Instagram profile">
									<img src="<?php echo theme_url('img/instagram.svg'); ?>" alt="Instagram logo" width="30px"
            aria-hidden class="mr-2" /> Instagram
						      </a>
						    </div>
								<?php } ?>

								<div class="mb-8">
								<a class="flex items-center text-sm mb-2" href="mailto:%68%65%6c%6c%6f%40%6e%61%74%68%67%72%65%65%6e%2e%63%6f%2e%75%6b" title="Email me"> <img class="mr-2" src="<?php echo theme_url('img/mail.svg'); ?>" alt="Mail icon" width="30px" aria-hidden="aria-hidden" />&#104;&#101;&#108;&#108;&#111;&#64;&#110;&#97;&#116;&#104;&#103;&#114;&#101;&#101;&#110;&#46;&#99;&#111;&#46;&#117;&#107;</a>
						    </div>
								

						    <p class="text-xs text-white font-sans">&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All rights reserved.</p>
						  </div>
						</footer>
						</div>

						<script>
							WebFontConfig = {
								google: {
									families: ['Adamina|Roboto|Lora&display=swap']
								}
							};
							(function() {
								var wf = document.createElement('script');
								wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
								wf.type = 'text/javascript';
								wf.async = 'true';
								var s = document.getElementsByTagName('script')[0];
								s.parentNode.insertBefore(wf, s);
							})();
						</script>
						</body>

						</html>