

<?php $__env->startSection('content'); ?>
 <div class="main-wrapper">
    <section class="hero gradient-darkpurple-overlay">
      
      
      <img src="<?php echo e(asset('img/Pieter_Adriaans_painting_in_garden-xl.jpg')); ?>" class="hero-image"
        sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, (max-width: 992px) 992px, 1200px" data-srcset="
        <?php echo e(asset('img/Pieter_Adriaans_painting_in_garden-xl.jpg')); ?> 1200w,
        <?php echo e(asset('img/Pieter_Adriaans_painting_in_garden-large.jpg')); ?> 992w,
      <?php echo e(asset('img/Pieter_Adriaans_painting_in_garden-medium.jpg')); ?> 768w,
      <?php echo e(asset('img/Pieter_Adriaans_painting_in_garden-small.jpg')); ?> 480w
    " alt="Artist Pieter Adriaans painting in his garden on São Jorge, Azores. Photo by Jorge Blayer Gois.">



      <img src="assets/svg/Adriaans_white.svg" alt="Adriaans signature" class="signature">
      <img src="assets/svg/Art_Gallery.svg" alt="Azorean Art gallery" class="art-gallery-svg">

      <a href="#art" class="eye-icon" title="View the art gallery">
        <img src="assets/svg/eye.svg" alt="View gallery">
      </a>
    </section>
    <main class="gradient-darkpurple-overlay">


      <section class="artworks" id="art">
        <header>
          <select name="gallery" id="selectCategory" class="select-dark">
            <option value="0">Select a category to view</option>

          </select>
        </header>
        <div class="artworks-gallery">
          <div class="artworks__current">
            <div class="artworks__current__img"></div>
          </div>
          <div class="artworks__controls">
            <div class="artworks__buttons">
              <button id="artworks__prev" class="button icon circle i-arrow-left accent"> </button>
              <button id="artworks__next" class="button icon circle i-arrow-right accent"> </button>
            </div>
            <div class="artworks__buttons">
              <!-- <button id="view-info" class="button accent icon circle i-info" ></button> -->
              <button id="view-info" class="button primary" data-current-id=0>Buy this artwork</button>
              <!-- <button id="like-save" class="button accent icon circle i-like"></button> -->
            </div>
          </div>
          <div class="artworks__thumbnails">
            <div class="artworks__list"></div>
          </div>
        </div>
      </section>

      <div class="bg-img-divider bg-img-15"></div>

      <section class="joao-feature-section" id="joao-cagarro-home">
        <article class="article-grid">
          <header>
            <p class="eyebrow">Featured Illustrated Story</p>
            <h2>João Cagarro and the Secret of Santa Bárbara</h2>
          </header>

          <p>
            Discover an original illustrated adventure set on the island of São Jorge in the Azores.
            <strong>João Cagarro and the Secret of Santa Bárbara</strong> follows João, a slightly clumsy but
            adventurous
            shearwater, and his friend Maria as they uncover a mystery involving hidden caves, ancient documents,
            Flemish settlers, shipwrecks and long-buried secrets.
          </p>

          <img src="./assets/img/photos/Cagarro Logo 2025-xl.png" srcset="
        ./assets/img/photos/Cagarro Logo 2025-xl.png 1200w,
        ./assets/img/photos/Cagarro Logo 2025-lg.png 800w,
        ./assets/img/photos/Cagarro Logo 2025-md.png 400w
      " sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
            alt="João Cagarro and Maria walking the trails of São Jorge in the Azores, artwork by Pieter Adriaans">

          <p>
            Set against the dramatic landscapes of São Jorge, the story blends Azorean atmosphere, adventure and
            historical
            imagination into a unique cultural book for readers, visitors and island lovers.
          </p>

          <p>
            This softcover illustrated story is part of the wider creative world of Pieter Adriaans and Azorean Art,
            connecting visual storytelling with the landscapes, legends and identity of the Azores.
          </p>

          <p>
            <a href="joao-cagarro.html" class="button primary">Discover João Cagarro</a>
          </p>
        </article>
      </section>


      <div class="bg-img-divider bg-img-1"></div>
      <section class="faq-section" id="faq">
        <header>
          <p>
          <h2>Frequently Asked Questions </h2>
          Here we provide answers to common inquiries about purchasing and shipping Pieter Adriaans' artwork, as well
          as details about payment, delivery, and more. If you have any questions that aren't covered here or need
          further assistance, please don't hesitate to reach out to us through our <a href="contact.html"
            title="Contact us!">contact page</a> or via <a href="mailto:info@azorean-art.com"
            title="E-mail us!">e-mail</a>. We're
          here to help!
          </p>
        </header>

        <div class="faq-items" role="list">
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-1">
              <p>
                How can I buy art from Pieter Adriaans?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-1" aria-hidden="true">
              The only way to buy a work from Pieter Adriaans is to visit his studio on the isolated island of São
              Jorge in the Azores or via this website. No other channels or galleries can offer his work for sale.
              This is not an online shop, but a way to contact Pieter or one of his assistants. Pieter’s works are
              unique objects intricately related to his personal life, and only a very limited selection is for sale.
              Pieter regards selling a painting, a drawing, or another work of art as a transaction between
              individuals. If you like a work, get in touch with us via email. We will contact you to confirm your
              order and all shipping details
            </div>
          </div>
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-2">
              <p>
                How can I pay for a selected
                artwork?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-2" aria-hidden="true">
              You can pay for the artwork using PayPal or credit card. You can also pay by bank transfer. If you have
              any
              questions about payment, please contact us.
            </div>
          </div>
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-3">
              <p>Is the payment secure?</p>
            </button>
            <div class="faq-answer" id="faq-answer-3" aria-hidden="true">
              Yes, we take fraud seriously and only accept payments that are 3D secured. To ensure your credit card is
              not used fraudulently, we may ask you to confirm your identity.
            </div>
          </div>
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-4">
              <p>Do you ship worldwide?</p>
            </button>
            <div class="faq-answer" id="faq-answer-4" aria-hidden="true">
              Yes, the artwork you love can be delivered anywhere in the world with very few exceptions. If you have
              any questions regarding the destination, please contact us.
            </div>
          </div>
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-5">
              <p>How much does the shipping
                cost?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-5" aria-hidden="true">
              We offer free shipping for most artworks. Some artworks will incur additional shipping charges,
              depending on the size, weight of the artwork, and the destination country. You are welcome to contact us
              regarding shipping costs to your specific region.
            </div>
          </div>
          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-6">
              <p>
                Where is your gallery
                located?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-6" aria-hidden="true">
              Studio “De Kaasfabriek,” Santo António, São Jorge, Açores, Portugal
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-7">
              <p>
                How do I know that I will
                receive the artwork I have paid for?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-7" aria-hidden="true">
              All artworks are shipped with reliable companies and can be easily tracked online. You will receive a
              tracking number as soon as the artwork is shipped.
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-8">
              <p>
                how long will it take for my artwork to arrive?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-8" aria-hidden="true">
              The artwork will be delivered to you within 2-3 weeks, depending on your location.
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-9">
              <p>
                Do I have to pay import taxes for my art?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-9" aria-hidden="true">
              We are unable to predict whether your local customs will charge you for buying and importing the artwork
              into your country and what these charges will be. Although artworks sold in Europe are not charged with
              import duties, VAT might still be applicable depending on the value of the artwork you are buying and
              importing. Please check with your local customs authorities to find out whether there are any import
              duties and/or VAT applied to art and what the rates are.
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-10">
              <p>
                What happens if the artwork arrives damaged?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-10" aria-hidden="true">
              Since the work is unique, it cannot be replaced. We package all our artworks very carefully, but
              accidents may happen. If the artwork arrives damaged, we will kindly ask you to return it to us. We will
              check if it can be restored.
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-11">
              <p>
                What if I don't like the artwork I bought?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-11" aria-hidden="true">
              You will be reimbursed if you ship the piece back to us safely and without any damages.

            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-12">
              <p>
                Can I buy your artworks on other platforms?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-12" aria-hidden="true">
              No
            </div>
          </div>

          <div class="faq-item" role="listitem">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-13">
              <p>
                Can I commission an artwork?
              </p>
            </button>
            <div class="faq-answer" id="faq-answer-13" aria-hidden="true">
              Most of the work Pieter does is based on commissions. Whether he takes a commission is a personal
              decision based on interactions with the client. At the moment, there is a waiting list of about 2 years.
            </div>
          </div>



        </div>
      </section>
      <div class="bg-img-divider bg-img-2"></div>
      <section>
        <article class="article-grid">
          <header>
            <h2>About AzoreanArt and Pieter Adriaans</h2>
          </header>
          <p>


            Welcome to AzoreanArt, the online home of Pieter Adriaans, a distinguished artist whose work is deeply
            intertwined with his personal life and the breathtaking landscapes of São Jorge in the Azores. Pieter's
            creations are unique, with each piece reflecting his profound connection to the isolated island he calls
            home.
          </p>
          <img src=".assets/img/photos/pieter_039-xl.jpg" srcset="./assets/img/photos/pieter_039-xl.jpg 1200w" srcset=""
            sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, (max-width: 992px) 992px, 1200px" data-srcset="
      ./assets/img/photos/pieter_039-xl.jpg 1200w,
      ./assets/img/photos/pieter_039-large.jpg 992w,
      ./assets/img/photos/pieter_039-medium.jpg 768w,
      ./assets/img/photos/pieter_039-small.jpg 480w
      " alt="Artist Pieter Adriaans painting outside on São Jorge, Azores. Photo by Jorge Blayer Gois.">
          <p>
            Pieter Adriaans values the personal nature of art transactions, viewing them as intimate exchanges between
            individuals. As such, his artworks are not available through any galleries or other channels. The only way
            to acquire a piece of Pieter's art is by visiting his studio, "De Kaasfabriek," in Santo António, São
            Jorge, or by reaching out to us via this website. We facilitate a direct connection between you and Pieter
            or one of his assistants, ensuring a personalized and meaningful experience.

          </p>
          <p>
            Explore our site to discover the limited selection of Pieter's artworks available for purchase and learn
            more about his creative journey. Should you find a piece that resonates with you, don't hesitate to
            contact us to discuss your interest.

          </p>
        </article>
      </section>
      <div class="bg-img-divider bg-img-3"></div>



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
            <li><a href="#faq">FAQ</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="#art">Gallery</a></li>
            <li>
              <a href="#" onclick="openCookieSettings(); return false;">Cookie settings</a>
            </li>
          </ul>
        </div>
        <div class="footer-section links">
          <h4>More about us</h4>
          <ul>
            <li><a href="https://pieter-adriaans.com" target="_blank" rel="noopener noreferrer">Pieter-Adriaans.com</a>
            </li>
            <li><a href="http://www.artrestaurantmanezinho.com" target="_blank" rel="noopener noreferrer">Art Restaurant
                Manezinho</a></li>
            <li><a href="https://azoreanartcenter.com" target="_blank" rel="noopener noreferrer">Azorean Art Center</a>
            </li>
          
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
            <a href="https://www.facebook.com/pieter.adriaans" aria-label="Facebook Pieter Adriaans" target="_blank"
              rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
            <!-- youtube.com/pieter.adriaans -->
            <a href="https://www.youtube.com/@pieter_adriaans" aria-label="Youtube Pieter Adriaans" target="_blank"
              rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Pieter Adriaans. All rights reserved.</p>
        <p>Publicity photographs on this website are by <a href="https://www.facebook.com/jorge.blayergois" target="_blank" rel="noopener noreferrer">Jorge Blayer Gois</a>.</p>
      </div>
    </footer>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\AzoreanArt\azart\resources\views/home.blade.php ENDPATH**/ ?>