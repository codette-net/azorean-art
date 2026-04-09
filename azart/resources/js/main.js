console.log("main js loaded");
// Play initial animations on page load
window.addEventListener("load", () => {
    setTimeout(() => {
        document.body.classList.remove("is-preload");
    }, 100);
});


// Navigation functionality - runs immediately
let mainNav = document.querySelector(".main-nav");
let navBtn = document.querySelector("#nav-btn");
let mainNavWrap = document.querySelector(".main-nav-wrapper");

function setNavTabIndex(isOpen) {
    // Get all focusable elements inside nav (links, buttons, inputs)
    const focusableElements = mainNav.querySelectorAll(
        'a, button, input, [tabindex]:not([tabindex="-1"])',
    );
    focusableElements.forEach((el) => {
        if (el === navBtn) return; // Nav button should always be focusable
        el.tabIndex = isOpen ? 0 : -1;
    });
}

function closeNav() {
    mainNav.classList.remove("active");
    setNavTabIndex(false);
    navBtn.focus(); // Return focus to the button
}

function openNav() {
    mainNav.classList.add("active");
    setNavTabIndex(true);
}

if (navBtn && mainNav) {
    // Initialize: nav is closed, so disable tab access to nav links
    setNavTabIndex(false);

    // Toggle nav on button click
    navBtn.addEventListener("click", function () {
        const isCurrentlyActive = mainNav.classList.contains("active");
        if (isCurrentlyActive) {
            closeNav();
        } else {
            openNav();
        }
    });

    // Close nav when clicking on a link inside the wrapper
    if (mainNavWrap) {
        mainNavWrap.addEventListener("click", function (e) {
            if (e.target.tagName === "A") {
                closeNav();
            }
        });
    }

    // Close nav on Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && mainNav.classList.contains("active")) {
            closeNav();
        }
    });
}


(function () {
    const STORAGE_KEY = "azorean_art_cookie_consent";
    const GA_ID = window.AZOREAN_ART_GA_ID;
    const banner = document.getElementById("cookie-banner");

    let gaLoaded = false;

    function loadGA() {
        if (gaLoaded) return;
        gaLoaded = true;

        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        window.gtag = gtag;

        gtag("consent", "default", {
            analytics_storage: "granted",
            ad_storage: "denied",
            ad_user_data: "denied",
            ad_personalization: "denied",
        });

        gtag("js", new Date());
        gtag("config", GA_ID, {
            anonymize_ip: true,
        });

        const script = document.createElement("script");
        script.async = true;
        script.src = "https://www.googletagmanager.com/gtag/js?id=" + GA_ID;
        document.head.appendChild(script);
    }

    function init() {
        const consent = localStorage.getItem(STORAGE_KEY);

        if (consent === "accepted") {
            loadGA();
            return;
        }

        if (!consent) {
            banner.hidden = false;
        }
    }

    document.getElementById("cookie-accept").onclick = () => {
        localStorage.setItem(STORAGE_KEY, "accepted");
        loadGA();
        banner.hidden = true;
    };

    document.getElementById("cookie-reject").onclick = () => {
        localStorage.setItem(STORAGE_KEY, "rejected");
        banner.hidden = true;
    };

    init();
})();


let faqItems = document.querySelectorAll(".faq-item");
if (faqItems) {
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
}

function openCookieSettings() {
    const banner = document.getElementById("cookie-banner");
    if (banner) {
        banner.hidden = false;
    }
}
