@extends('layouts.app')

@yield('title', 'João Caggaro')

@section('content')
  <div class="main-wrapper">
    <main id="joao-cagarro">
      <header class="main-header">
        <h1 class="h1-logo">Azorean<span class="sr-only">Art</span><span>r</span><span>t</span></h1>
      </header>
       <div class="lang-switch">
            <a href="joao-cagarro.html" class="lang-link active" aria-label="Switch to English version" title="Switch to English version">EN</a>
            <span class="lang-separator">|</span>
            <a href="joao-cagarro-pt.html" class="lang-link" aria-label="Mudar para a versão em português" title="Mudar para a versão em português">PT</a>
          </div>
      <section class="hero-joao gradient-darkpurple-overlay">
        <header class="hero-content wrapper">
   
          <p class="eyebrow">Illustrated Adventure from the Azores</p>
          <h1 class="product-title">João Cagarro and the Secret of Santa Bárbara</h1>
          <p class="product-subtitle">
            A mystery-filled graphic novel set on São Jorge, where island history, hidden caves,
            lost documents and the Atlantic Ocean come together in one unforgettable Azorean story.
          </p>
          <div class="hero-actions">
            <a href="#about-book" class="button primary">Discover the Story</a>
            <a href="#contact" class="button secondary">Ask About Availability</a>
          </div>
        </header>

        <img src="{{ asset('photos/JC & M Walking the trails-xl.png') }}" srcset="{{ asset('photos/JC & M Walking the trails-xl.png') }} 1200w,
                  {{ asset('photos/JC & M Walking the trails-lg.png') }} 800w,
                  {{ asset('photos/JC & M Walking the trails-md.png') }} 400w"
          sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
          alt="João Cagarro and Maria walking the trails of São Jorge in the Azores, artwork by Pieter Adriaans"
          class="lozad" data-loaded="false">
      </section>

      <section id="about-book" class="section wrapper">
        <header class="section-heading">
          <p class="eyebrow">About the Book</p>
          <h2>An Azorean adventure of mystery, history and discovery</h2>
        </header>

        <div class="rj-box content-grid">
          <div class="content-main">
            <p>
              <strong>João Cagarro and the Secret of Santa Bárbara</strong> follows João, a slightly clumsy but
              adventurous shearwater, and his friend Maria on the island of São Jorge in the Azores.
            </p>

            <p>
              When a mysterious stranger nearly dies during a dangerous night dive, João and Maria uncover a trail of
              clues: a lost wallet, ancient documents and a hidden map. Their investigation leads them to a secret cave
              beneath the church of Santa Bárbara, and to a centuries-old mystery involving Flemish settlers,
              shipwrecks and hidden treasures.
            </p>

            <p>
              As they dive into the depths of the ocean and the past, they realize they are not alone. Someone else is
              after the secret... and will stop at nothing to get it.
            </p>

            <p>
              Set against the dramatic landscapes of São Jorge, this illustrated story blends Azorean atmosphere,
              adventure and historical imagination into a unique cultural book for readers, visitors and island lovers.
            </p>
          </div>

          <aside class="content-side content-grid">
            <div class="info-card">
              <ul class="info-list alt">
                <h3>Book Details</h3>
                <li><strong>Format:</strong> Softcover</li>
                <li><strong>Length:</strong> 42 pages</li>
                <li><strong>Size:</strong> A4</li>
                <li><strong>Setting:</strong> São Jorge, Azores</li>
                <li><strong>Languages:</strong> English / Portuguese</li>
              </ul>
              
            </div>
            <div class="info-price">
                <p><strong>Price:</strong> <span>€14,-</span></p>
                <small class="info-note">*excluding shipping costs, <a href="#contact">contact us</a> for more
                  information.</small>
              </div>
          </aside>
          <div class="book-cover">
            <img src="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }}" srcset="{{ asset('photos/Joao-Cagarro-Cover-xl.jpg') }} 1200w,
                      {{ asset('photos/Joao-Cagarro-Cover-lg.jpg') }} 800w,
                      {{ asset('photos/Joao-Cagarro-Cover-md.jpg') }} 400w"
              sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 1200px"
              alt="Cover of João Cagarro and the Secret of Santa Bárbara, an illustrated book by Pieter Adriaans set in the Azores"
              class="lozad" data-loaded="false">
          </div>
        </div>
      </section>

      <section class="section wrapper">
        <header class="section-heading">
          <p class="eyebrow">Why It’s Special</p>
          <h2>A story rooted in the Azores</h2>
        </header>

        <div class="feature-grid">
          <article class="feature-card">
            <h3>Set on São Jorge</h3>
            <p>
              From Velas to Santa Bárbara and the coastal landscapes of the island, the story is deeply connected to
              real places in the Azores.
            </p>
          </article>

          <article class="feature-card">
            <h3>History meets fiction</h3>
            <p>
              The book draws inspiration from island history, old sea routes, Flemish connections and legends hidden in
              the Atlantic past.
            </p>
          </article>

          <article class="feature-card">
            <h3>Art by Pieter Adriaans</h3>
            <p>
              Created within the wider world of Azorean Art, this project combines visual storytelling, local identity
              and a strong sense of place.
            </p>
          </article>
        </div>
      </section>

      <section class="section wrapper">
        <header class="section-heading">
          <p class="eyebrow">Perfect For</p>
          <h2>Readers, visitors and the Azorean diaspora</h2>
        </header>

        <div class="audience-grid">
          <div class="audience-card">
            <h3>Visitors to the Azores</h3>
            <p>
              A meaningful illustrated keepsake from São Jorge — something between a graphic novel, a cultural souvenir
              and an art object.
            </p>
          </div>
          <div class="audience-card">
            <h3>Azorean families abroad</h3>
            <p>
              A story of place, memory and island identity for Azoreans and descendants living in the United States,
              Canada and beyond.
            </p>
          </div>
          <div class="audience-card">
            <h3>Lovers of island history</h3>
            <p>
              Ideal for readers drawn to the Atlantic, folklore, discovery, hidden caves and historical mystery.
            </p>
          </div>
        </div>
      </section>
      <div class="bg-img-divider joao-bg">
        <header class="cta-box">
          <p class="eyebrow">Azorean Art</p>
          <h2>Interested in João Cagarro?</h2>
          <p>
            Contact us for availability, stock, partnerships or sales information. You can also explore more of Pieter
            Adriaans’ work through the Azorean Art collection.
          </p>
          <div class="hero-actions">

            <a href="index.html#art" class="button primary">View More Art</a>
          </div>
        </header>
      </div>

      <section class="section wrapper cta-section">

        <section class="contact-page gradient-darkpurple-overlay" id="contact">
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
                <textarea name="message" id="message"
                  rows="4">I would like to reserve a copy of Joao Cagarro, the English version.</textarea>
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


@endsection