@extends('layouts.app')


@yield('title', 'Artwork')

@section('content')
  <div class="response-wrapper">
    <div class="response">
      <h2>Thank you for your contacting us!</h2>
      <p class="response-msg">We will get back to you asap</p>
      <button class="button primary" id="response-exit-btn" title="go back to page">close</button>
    </div>
  </div>
  <div class="main-wrapper">
    <main>
      <header class="main-header">
        <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
      </header>
      <section class="artworks gradient-darkpurple-overlay">
        <div class="artworks-gallery">
          <div class="artworks__current">
            <div class="artworks__current__img"></div>
          </div>
          <div class="artworks__controls">
          </div>
        </div>
        <article class="artwork__info">
          <header>
            <h1></h1>
            <h2></h2>
            <div class="artwork__details">
              <p class="year-fnr-cat"></p>
              <p class="artwork-type"></p>
              <p class="artwork-dimensions"></p>
              <p class="artwork-factsheet">Download factsheet for this artwork (PDF)</p>
            </div>

          </header>
          <p class="description"></p>
        </article>
        <div class="artworks__buttons" style="display: none;">
          <button id="like-save" class="button accent icon circle i-like"></button>
          <p>like & save this artwork for later!</p>
        </div>
        <div class="view-form">
          <h2>
            Interested in purchasing this artwork?
          </h2>
          <p>
            This site is not an online store but rather a way for us to connect.
            Please fill out the form below, providing at least your name and email so that I can respond to your
            inquiry.
            Once I receive your message, I will contact you to discuss the details of the artwork, including shipment
            and payment arrangements.
            These details will vary depending on the size, nature of the piece, and its destination.
          </p>
          <p>
            We value your privacy. Apart from the legally required information necessary for financial transactions, we
            do not store any client data on our servers.
            You can find more details in our <a href="index.html#faq">Frequently Asked Questions</a> section.
          </p>
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

              <input type="hidden" name="artwork_id" id="artwork_id" value="">


              <div class="field">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="4"
                  placeholder="I would like some more information about an artwork "></textarea>
              </div>
              <div class="field half last-field">
                <p class="errors-msg">
                </p>
                <div class="g-recaptcha" data-sitekey="6LfUEvQpAAAAABZlIBzegXpvRMnnVGGwtCKaUMZ2"></div>
                <div class="field">
                  <ul class="actions">
                    <li><input type="submit" value="Send Message" class="button primary" /></li>
                    <li><input type="reset" value="Clear" class="clear-form" /></li>
                  </ul>
                </div>
              </div>
              <div class="field half personal-details">
                <p><strong><span>Adriaans & Van Kerchove, Lda.</strong></span></p>
                <p><strong>Email:</strong><span><a
                      href="mailto:pieter@pieter-adriaans.com">pieter@pieter-adriaans.com</a></span></p>
                <p><strong>Address:</strong><span> Caminho de Açougue 1, 9800-429 </span></p>
                <p><strong>City/country:</strong><span> Urzelina, São Jorge, Açores</span></p>
                <p><strong>Phone (NL) :</strong><span> +31 654234459 </span></p>
                <p><strong>Phone (P) &nbsp;&nbsp;:</strong><span> +351 964 643 610 </span></p>
                <hr>
                <p><strong>IBAN:</strong><span> PT50 0045.8061.40337554888.85 </span></p>
                <p><strong>Nif (BTW/VAT):</strong><span> 516357417</span></p>
                <p><strong>NIB:</strong><span> 0045.8061.40337554888.85</span></p>
                <p><strong>CAE:</strong><span> 56101, 47784, 93293, 58110 </span></p>
              </div>
            </div>


          </form>
        </div>
        <div class="what-next">
          <h2>Thank you for your interest in my artwork. </h2>
          <p>
            Buying an original work of art is unlike any other transaction.
            Each piece has passed through my hands and is associated with personal memories and emotions.
            It is a part of my life, frozen in time, and it would be a pleasure to share it with you.
          </p>
          <a href="index.html" class="button primary">Go to gallery</a>
        </div>
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
            <li><a href="https://pieter-adriaans.com" aria-label="Go to Pieter Adriaans website" target="_blank"
                rel="noopener noreferrer">Pieter-Adriaans.com</a></li>
            <li><a href="http://www.artrestaurantmanezinho.com" aria-label="Go to Art Restaurant Manezinho website"
                target="_blank" rel="noopener noreferrer">Art Restaurant Manezinho</a></li>
            <li><a href="https://azoreanartcenter.com" aria-label="Go to Azorean Art Center website" target="_blank"
                rel="noopener noreferrer">Azorean Art Center</a></li>
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
            <a href="https://www.facebook.com/pieter.adriaans" aria-label="Facebook Pieter Adriaans" target="_blank"><i
                class="fab fa-facebook-f"></i></a>
            <!-- youtube.com/pieter.adriaans -->
            <a href="https://www.youtube.com/@pieter_adriaans" aria-label="Youtube Pieter Adriaans" target="_blank"><i
                class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Pieter Adriaans. All rights reserved.</p>
        <p>Publicity photographs on this website are by <a href="https://www.facebook.com/jorge.blayergois"
            target="_blank" rel="noopener noreferrer">Jorge Blayer Gois</a>.</p>
      </div>
    </footer>
  </div>
  
@endsection

@vite(['resources/js/artwork.js'])

