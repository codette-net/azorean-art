console.log('main js loaded');

// Navigation functionality - runs immediately
let mainNav = document.querySelector('.main-nav');
let navBtn = document.querySelector('#nav-btn');
let mainNavWrap = document.querySelector('.main-nav-wrapper');

function setNavTabIndex(isOpen) {
  // Get all focusable elements inside nav (links, buttons, inputs)
  const focusableElements = mainNav.querySelectorAll(
    'a, button, input, [tabindex]:not([tabindex="-1"])'
  );
  focusableElements.forEach(el => {
    if (el === navBtn) return; // Nav button should always be focusable
    el.tabIndex = isOpen ? 0 : -1;
  });
}

function closeNav() {
  mainNav.classList.remove('active');
  setNavTabIndex(false);
  navBtn.focus(); // Return focus to the button
}

function openNav() {
  mainNav.classList.add('active');
  setNavTabIndex(true);
}

if (navBtn && mainNav) {
  // Initialize: nav is closed, so disable tab access to nav links
  setNavTabIndex(false);
  
  // Toggle nav on button click
  navBtn.addEventListener('click', function () {
    const isCurrentlyActive = mainNav.classList.contains('active');
    if (isCurrentlyActive) {
      closeNav();
    } else {
      openNav();
    }
  });

  // Close nav when clicking on a link inside the wrapper
  if (mainNavWrap) {
    mainNavWrap.addEventListener('click', function (e) {
      if (e.target.tagName === 'A') {
        closeNav();
      }
    });
  }
  
  // Close nav on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mainNav.classList.contains('active')) {
      closeNav();
    }
  });
}

// load lozad module
import lozad from 'lozad';
// check lozad is loaded
console.log('lozad loaded:', typeof lozad !== 'undefined');
// cookies and GA 

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


  // Function to scroll to the element specified by the hash
function scrollToHash() {
    let hash = window.location.hash;
    if (hash) {
        console.log("hier :" + hash);
        let element = document.querySelector(hash);
        if (element) {
            element.scrollIntoView({ behavior: "smooth" });
        }
    }
}

// Play initial animations on page load
window.addEventListener("load", () => {
    setTimeout(() => {
        document.body.classList.remove("is-preload");
    }, 100);

    getCategories();

    const observer = lozad(".lozad", {
        loaded: function (el) {
            el.dataset.loaded = true;
        },
    });
    observer.observe();
    scrollToHash();
});
const artworksSection = document.querySelector(".artworks-gallery");
const artworkContainer = artworksSection.querySelector(".artworks__list");
const nextBtn = artworksSection.querySelector("#artworks__next");
const prevBtn = artworksSection.querySelector("#artworks__prev");

document.addEventListener("DOMContentLoaded", function () {
    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1,
    };

    function loadGallery(entries, observer) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                fetchArtworks(0).then(() => {
                    // After loading the gallery, scroll to the hash if it exists
                    scrollToHash();
                });
                observer.unobserve(entry.target);
            }
        });
    }

    const observer = new IntersectionObserver(loadGallery, observerOptions);
    observer.observe(artworksSection);
});

let selectCategories = document.querySelector("#selectCategory");

selectCategories.addEventListener("change", function () {
    let categoryId = selectCategories.value;
    if (categoryId !== "" && categoryId !== 0) {
        fetchArtworks(categoryId);
    }
});

const currentImgContainer = artworksSection.querySelector(
    ".artworks__current__img",
);
let viewInfo = artworksSection.querySelector("#view-info");
viewInfo.addEventListener("click", function () {
    let artworkId = viewInfo.getAttribute("data-current-id");
    let url = "artwork.html?id=" + artworkId;

    if (window.gtag) {
        gtag("event", "generate_lead", {
            event_category: "artwork",
            event_label: "buy_interest",
            value: artworkId,
        });
    }
    window.location.href = url;
});

function getCategories() {
    console.log("getting categories");
    fetch("https://pieter-adriaans.com/pieterAPI.php?categories=1")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach((category) => {
                let option = document.createElement("option");
                option.value = category.id;
                option.text = category.title;
                selectCategories.appendChild(option);
            });
        });
}

let artworkIndex = 0;
let artworks = [];

window.addEventListener("resize", checkThumbnailPosition);

function fetchArtworks(categoryId) {
    return new Promise((resolve, reject) => {
        console.log("Fetching artworks...");
        fetch(
            `https://pieter-adriaans.com/pieterAPI.php?category=${categoryId}`,
        )
            .then((response) => response.json())
            .then((data) => {
                artworkContainer.innerHTML = "";
                artworks = data;
                if (data) {
                    data.forEach((artwork, index) => {
                        const artworkHtml = createArtworkHTML(artwork, index);
                        artworkContainer.innerHTML += artworkHtml;
                    });
                }

                // Initialize lozad and start observing
                const observer = lozad(".lozad", {
                    loaded: function (el) {
                        el.classList.add("fade");
                        console.log("loaded");
                    },
                });
                observer.observe();
                showCurrentArtwork(0);
                resolve(); // Resolve the promise when done
            })
            .catch((error) => {
                console.error("Error fetching artworks:", error);
                reject(error); // Reject the promise in case of an error
            });
    });
}

function createArtworkHTML(artwork, index) {
    return `
    <div class="artwork" data-index="${index}" data-price="${artwork.art_price}">
      <img class="lozad placeholder" src="https://pieter-adriaans.com/${artwork.thumbnail}" data-src="https://pieter-adriaans.com/${artwork.filepath}" alt="${artwork.title}" />
    </div>
  `;
}

function showCurrentArtwork(index) {
    const artwork = artworks[index];
    viewInfo.setAttribute("data-current-id", artwork.id);
    let catNo = artwork.id + "-" + artwork.year + "-" + artwork.fnr;
    currentImgContainer.innerHTML = `<img src="https://pieter-adriaans.com/${artwork.thumbnail}" data-src="https://pieter-adriaans.com/${artwork.filepath}" alt="${artwork.title}" data-price="${artwork.art_price}" data-factsheet="${artwork.factsheet_url}" data-catalog-id="${catNo}" class="lozad">`;
    lozad(".lozad", {
        loaded: function (el) {
            el.classList.add("fade");
            console.log("loaded");
        },
    }).observe();
    artworkIndex = index;
    updateButtonStatus();
    highlightCurrentThumbnail();
    scrollToThumbnail();
}

function updateButtonStatus() {
    prevBtn.disabled = artworkIndex === 0;
    nextBtn.disabled = artworkIndex === artworks.length - 1;
}

nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    event.stopPropagation();

    if (artworkIndex < artworks.length - 1) {
        showCurrentArtwork(artworkIndex + 1);
    }
});

prevBtn.addEventListener("click", (event) => {
    event.preventDefault();
    event.stopPropagation();

    if (artworkIndex > 0) {
        showCurrentArtwork(artworkIndex - 1);
    }
});

artworkContainer.addEventListener("click", (event) => {
    event.preventDefault();
    const artworkElement = event.target.closest(".artwork");
    if (artworkElement) {
        const index = parseInt(artworkElement.getAttribute("data-index"));
        showCurrentArtwork(index);
    }
});

function highlightCurrentThumbnail() {
    const thumbnails = artworkContainer.querySelectorAll(".artwork");
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.classList.toggle("active", index === artworkIndex);
    });
}

function scrollToThumbnail() {
    const currentThumbnail = artworkContainer.querySelector(
        `.artwork[data-index="${artworkIndex}"]`,
    );
    if (currentThumbnail) {
        currentThumbnail.scrollIntoView({
            behavior: "smooth",
            block: "nearest",
            inline: "center",
        });
    }
}

function checkThumbnailPosition() {
    const thumbnails = document.querySelector(".artworks__thumbnails");
    if (window.innerWidth <= 768) {
        //thumbnails.style.flexDirection = "column";
    } else {
        //thumbnails.style.flexDirection = "row";
    }
}

let faqItems = document.querySelectorAll(".faq-item");
faqItems.forEach(function (item) {
    const button = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");
    button.addEventListener("click", function () {
        item.classList.toggle("active");
        const expanded =
            button.getAttribute("aria-expanded") === "true" || false;
        button.setAttribute("aria-expanded", !expanded);
        answer.setAttribute("aria-hidden", expanded);
        if (item.classList.contains("active")) {
            answer.style.height = answer.scrollHeight + "px";
        } else {
            answer.style.height = 0;
        }
    });
});

function openCookieSettings() {
    const banner = document.getElementById("cookie-banner");
    if (banner) {
        banner.hidden = false;
    }
}
