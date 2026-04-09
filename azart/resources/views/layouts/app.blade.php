<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="assets/css/gallery.css"> -->
  <!-- SEO Meta Tags -->
  <meta name="description"
    content="Explore the unique artworks of Pieter Adriaans, inspired by the isolated island of São Jorge in the Azores. Purchase limited edition art directly from the artist.">
  <meta name="keywords"
    content="Azorean art, Pieter Adriaans, São Jorge, Azores, art gallery, buy art, Portuguese art, unique art, limited edition">
  <meta name="author" content="Pieter Adriaans">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta name="rating" content="general">
  <meta name="revisit-after" content="7 days">

  <!-- Open Graph Meta Tags for social media sharing -->
  <meta property="og:title" content="Azorean Art by Pieter Adriaans">
  <meta property="og:description"
    content="Discover unique artworks by Pieter Adriaans, inspired by the breathtaking landscapes of São Jorge in the Azores. Purchase limited pieces directly from the artist.">
  <meta property="og:image" content="https://azorean-art.com/assets/img/Pieter_Adriaans_painting_in_garden-xl.jpg">
  <meta property="og:image:alt" content="Artist Pieter Adriaans painting in a garden on São Jorge, Azores. Photo by Jorge Blayer Gois.">
  <meta property="og:url" content="https://azorean-art.com">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Azorean Art">

  <!-- Other Meta Tags -->
  <meta name="theme-color" content="#10203c;">
  <meta name="msapplication-TileColor" content="#10203c;">
  <!-- <meta name="msapplication-TileImage" content="https://azorean-art.com/assets/img/icons/icon-144x144.png"> -->

  <!-- Canonical link to avoid duplicate content -->
  <link rel="canonical" href="https://azorean-art.com/">

  <!-- Favicon -->
  <link rel="icon" href="https://azorean-art.com/assets/img/icons/favicon.ico" type="image/x-icon">
  <!-- icon 16 16 and 32 32 -->
  <link rel="icon" href="https://azorean-art.com/assets/img/icons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="icon" href="https://azorean-art.com/assets/img/icons/favicon-32x32.png" sizes="32x32" type="image/png">
  <title>
  @yield('title' , 'Azorean Art - Unique artworks by Pieter Adriaans inspired by the Azores')
  </title>
  
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CJ5XWV2ST5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CJ5XWV2ST5');
</script>
  <!-- Google Analytics will only be loaded after consent -->
<script>
  window.AZOREAN_ART_GA_ID = 'G-CJ5XWV2ST5';
</script>
</head>

<body class="is-preload">

  <nav class="main-nav" aria-label="Main navigation" data-visible="true">


    <div class="main-nav-wrapper">
      <a href="index.html" class="nav-logo" aria-label="Go to homepage">Azorean<span
          class="sr-only">Art</span><span>r</span><span>t</span></a>
      <ul>
        <li><a href="index.html" aria-label="Go to homepage">Home</a></li>

        <li><a href="#art" aria-label="View art gallery">Art</a></li>
        <li><a href="joao-cagarro.html" aria-label="View João Cagarro's work">João Cagarro</a></li>

        <li><a href="#faq" aria-label="View frequently asked questions">FAQ</a></li>
        <li><a href="contact.html" aria-label="Contact the artist">Contact</a></li>
      </ul>
      <div class="nav-socials">
        <a href="https://www.facebook.com/pieter.adriaans" class="nav-social" target="_blank" aria-label="Follow on Facebook"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
          </svg></a>
        <a href="https://www.youtube.com/@pieter_adriaans" class="nav-social" target="_blank" aria-label="Follow on YouTube"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
            <path d="M10 9l5 3l-5 3z" />
          </svg></a>
      </div>
    </div>

    <div class="nav-top">
      <button id="nav-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 6h16" />
          <path d="M7 12h13" />
          <path d="M10 18h10" />
        </svg></button>
    </div>
  </nav>
  @yield('content')
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
  <div id="cookie-banner" class="cookie-banner" hidden>
  <div class="cookie-banner__inner">
    <div class="cookie-banner__content">
      <h2>Cookies & Analytics</h2>
      <p>
        We use analytics cookies to understand how visitors use this website and to improve the experience.
        You can accept or reject analytics tracking.
      </p>
    </div>

    <div class="cookie-banner__actions">
      <button type="button" class="button accent" id="cookie-accept">Accept analytics</button>
      <button type="button" class="button accent" id="cookie-reject">Reject</button>
    </div>
  </div>
</div>
</body>

<script>
(function () {
  const STORAGE_KEY = 'azorean_art_cookie_consent';
  const GA_ID = window.AZOREAN_ART_GA_ID;
  const banner = document.getElementById('cookie-banner');

  let gaLoaded = false;

  function loadGA() {
    if (gaLoaded) return;
    gaLoaded = true;

    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    window.gtag = gtag;

    gtag('consent', 'default', {
      analytics_storage: 'granted',
      ad_storage: 'denied',
      ad_user_data: 'denied',
      ad_personalization: 'denied'
    });

    gtag('js', new Date());
    gtag('config', GA_ID, {
      anonymize_ip: true
    });

    const script = document.createElement('script');
    script.async = true;
    script.src = 'https://www.googletagmanager.com/gtag/js?id=' + GA_ID;
    document.head.appendChild(script);
  }

  function init() {
    const consent = localStorage.getItem(STORAGE_KEY);

    if (consent === 'accepted') {
      loadGA();
      return;
    }

    if (!consent) {
      banner.hidden = false;
    }
  }

  document.getElementById('cookie-accept').onclick = () => {
    localStorage.setItem(STORAGE_KEY, 'accepted');
    loadGA();
    banner.hidden = true;
  };

  document.getElementById('cookie-reject').onclick = () => {
    localStorage.setItem(STORAGE_KEY, 'rejected');
    banner.hidden = true;
  };

  init();
})();
</script>

<script>
  let gallerySvg = document.querySelector('.art-gallery-svg');
  gallerySvg.addEventListener('click', function () {
    document.querySelector('#art').scrollIntoView({ behavior: 'smooth', block: 'start' });
  });


  let mainNav = document.querySelector('.main-nav');
  let navBtn = document.querySelector('#nav-btn');
  let mainNavWrap = document.querySelector('.main-nav-wrapper');
  navBtn.addEventListener('click', function () {
    console.log('clicked');
    mainNav.classList.toggle('active');
    // if link is clicked, remove active class from mainNav
    mainNavWrap.addEventListener('click', function () {
      mainNav.classList.remove('active');
    });


  });




  //observer.observe(main);
  //  scrollDown.addEventListener('click', () => {
  //  main.scrollIntoView({ behavior: 'smooth', });
  // });



</script>


<!-- <script src="gallery.js"></script> -->


</html>