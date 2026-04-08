

<?php echo $__env->yieldContent('title', 'Contact us'); ?>

<?php $__env->startSection('content'); ?>
 <div class="main-wrappper">
      <main>
        <header class="main-header">
          <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
        </header>
        <section class="contact-page gradient-darkpurple-overlay">
          <header>
            <h1>Contact</h1>
            <p>Interested in buying an artwork or do you have any questions? <br>
              Fill in the form below and we will get back to you as soon as possible.</p>
          </header>
          <form class="contact-form" action="" method="post" enctype="multipart/form-data">

            <div class="fields">
              <div class="field half">
                <label for="name">Name <span class="form-required">* required</span></label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                  title="First name must contain only characters!" required>

              </div>
              <div class="field half">
                <label for="name">Lastname <span class="form-required">* required</span></label>

                <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                  title="Last name must contain only characters!" required>
              </div>

              <div class="field half">
                <label for="email">Email <span class="form-required">* required</span></label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                  title="Please enter a valid email address!" required>

              </div>
              <!-- accept phone number with numbers , () and - only -->
              <div class="field half">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="" placeholder="Enter your phone number"
                  title="Please enter a valid phone number!">
              </div>
              <!-- address  -->
              <div class="field half">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your address (street,number)">
              </div>
              <!-- city -->
              <div class="field half">
                <label for="city">City (and state)</label>
                <input type="text" name="city" id="city" placeholder="Enter your city/state">
              </div>
              <!-- postal code-->
              <div class="field half">
                <label for="postal_code">ZIP / Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" placeholder="Enter your postal code">
              </div>
              <!-- country -->
              <div class="field half">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" placeholder="Enter your country">
              </div>
              <!-- prefered contact method -->
              <div class="field half">
                <label for="contact_method">Prefered contact method</label>
                <select name="contact_method" id="contact">
                  <option value="mail">E-Mail</option>
                  <option value="phone">Phone</option>
                </select>
              </div>

              <div class="field">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="4"
                  placeholder="I would like some more information about an artwork "></textarea>
              </div>
              <div class="field last-field">
                <p class="errors-msg"></p>
                <div class="g-recaptcha" data-sitekey="6LfUEvQpAAAAABZlIBzegXpvRMnnVGGwtCKaUMZ2"></div>

                <div class="field">
                  <ul class="actions">
                    <li><input type="submit" value="Send Message" class="button primary" /></li>
                    <li><input type="reset" value="Clear" class="clear-form" /></li>
                  </ul>
                </div>
              </div>
          </form>
        </section>
      </main>
      <footer class="footer">
        <div class="footer-content">
          <!-- <div class="footer-section about">
            <h4>About Us</h4>
            <p>
              Pieter Adriaans is an artist whose works are deeply personal and unique. Discover more about his creative journey and art by exploring this website or visiting his studio in São Jorge, Azores.
            </p>
          </div> -->
          <div class="footer-section links">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="index.html#faq">FAQ</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="index.html#art">Gallery</a></li>
            </ul>
          </div>
          <div class="footer-section links">
            <h4>More about us</h4>
            <ul>
              <li><a href="https://pieter-adriaans.com">Pieter-Adriaans.com</a></li>
              <li><a href="http://www.artrestaurantmanezinho.com">Art Restaurant Manezinho</a></li>
              <li><a href="https://azoreanartcenter.com">Azorean Art Center</a></li>
            </ul>
          </div>
          <div class="footer-section contact">
            <h4>Contact Us</h4>
            <p><strong>Adriaans & Van Kerchove, Lda.</strong></p>
            <p>Email: <a href="mailto:pieter@pieter-adriaans.com">pieter@pieter-adriaans.com</a></p>
            <p>Address: Caminho de Açougue 1, 9800-429 Urzelina, São Jorge, Açores</p>
            <p>Phone: +31 654234459 </p>
            <p> +351 964 643 610 </p>

            <div class="social-media">
              <a href="https://www.facebook.com/pieter.adriaans" aria-label="Facebook Pieter Adriaans"
                target="_blank"><i class="fab fa-facebook-f"></i></a>
              <!-- youtube.com/pieter.adriaans -->
              <a href="https://www.youtube.com/@pieter_adriaans" aria-label="Youtube Pieter Adriaans" target="_blank"><i
                  class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Pieter Adriaans. All rights reserved.</p>
        </div>
      </footer>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\AzoreanArt\azart\resources\views/contact.blade.php ENDPATH**/ ?>