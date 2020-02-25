<?php theme_include('header'); ?>

<div class="sm-container flex-1 mt-5">
  <h1>Ready to enquire?</h1>
  <p class="mb-8">Use the contact form below to get in touch</p>

  
  <form method="post" action="<?php echo current_url(); ?>">
    
    <label for="#name">Your name <span aria-hidden>*</span></label>
    <input id="contact-name" name="contact-name" type="text" placeholder="Your name" class="mb-4" required />
    
    <label for="#email">Email address <span aria-hidden>*</span></label>
    <input id="contact-email" name="contact-email" type="text" placeholder="Email address" class="mb-4" required />
    
    <label for="#enquiry">Your enquiry <span aria-hidden>*</span></label>
    <textarea id="contact-enquiry" name="contact-enquiry" placeholder="Your enquiry" class="mb-4" rows="5" required></textarea>
    
    <div class="my-4"><?php echo Notify::read(); ?></div>
    <input class="c-btn c-btn--primary inline-block mb-12 w-auto" type="submit" value="Send enquiry" />

  </form>

</div>

<?php theme_include('footer'); ?>