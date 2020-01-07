						<footer class="py-8 bg-gray-700 shadow mt-10 text-white">
								<div class="container">
									<?php if (site_meta('website_url')) { ?>
										<div class="mb-2">
											<a href="<?php echo site_meta('website_url'); ?>" class="flex items-center text-sm underline"><ion-icon name="ios-camera" size="large" class="mr-2"></ion-icon> Visit <?php echo site_name(); ?></a>
										</div>
									<?php } ?>
									<?php if (site_meta('faq_url')) { ?>
										<div class="mb-2">
											<a href="<?php echo site_meta('faq_url'); ?>" class="flex items-center text-sm"><ion-icon name="ios-help-circle" size="large" class="mr-2"></ion-icon> Read frequently asked questions</a>
										</div>
									<?php } ?>

									<hr class="my-5 opacity-25" />

									<?php if (site_meta('facebook_url')) { ?>
										<div class="mb-2">
											<a href="<?php echo site_meta('facebook_url'); ?>" class="flex items-center text-sm"><ion-icon name="logo-facebook" size="large" class="mr-2"></ion-icon> Facebook</a>
										</div>
									<?php } ?>

									<?php if (site_meta('instagram_url')) { ?>									
										<div class="mb-10">
											<a href="<?php echo site_meta('instagram_url'); ?>" class="flex items-center text-sm"><ion-icon name="logo-instagram" size="large" class="mr-2"></ion-icon> Instagram</a>
										</div>
									<?php } ?>


									<p class="text-xs">&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All rights reserved.</p>
								</div>
						</footer>
				</div>
				
				<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>
