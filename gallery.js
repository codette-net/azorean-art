
console.log("artworkgallery.js loaded");


const artworksSection = document.querySelector(".artworks");
const artworkContainer = artworksSection.querySelector(".artworks__list");
const nextBtn = artworksSection.querySelector("#artworks__next");
const prevBtn = artworksSection.querySelector("#artworks__prev");
// const artworks = artworkContainer.querySelectorAll(".artwork");

window.addEventListener("DOMContentLoaded", () => {
  fetchartworks();
});

let artworksWidth, artworkWidth, limit;
let artworkIndex = 0;
const gridGap = 25;
// let limit = getLimit();

window.addEventListener("resize", () => {
  limit = getLimit();
});

function fetchartworks() {
  console.log("Fetching artworks...");
  fetch("https://pieter-adriaans.com/pieterAPI.php?category=0")
    .then((response) => response.json())
    .then((data) => {
      // Clear existing artworks
      artworkContainer.innerHTML = "";
      // Append fetched artworks
      data.forEach((artwork) => {
        const artworkHtml = createartworkHTML(artwork);
        artworkContainer.innerHTML += artworkHtml;
      });

      // Update artworks after they are loaded
      artworks = artworkContainer.querySelectorAll(".artwork");
      limit = getLimit(); // Update the limit
      checkLimitForBtnStatus(); // Check button status

      // Initialize lozad and start observing
      const observer = lozad('.lozad', {
        loaded: function (el) {
          el.classList.add('fade');
        }
      });
      observer.observe();
    })
    .catch((error) => {
      console.error("Error fetching artworks:", error);
    });
}

function createartworkHTML(artwork) {
  
  // console.log(artwork.price_dollar.toFixed(2));
  let priceAsNumber = (price_dollar = parseFloat(artwork.art_price));
  return `
      <div class="artwork">
          <i class="icon-favourite" onclick="likeSave()">
              <span class="dynamic-tooltip">Save</span>
          </i>
            <div class="artwork__img">
              <img class="lozad placeholder" src="https://pieter-adriaans.com/${
                artwork.thumbnail}" data-src="https://pieter-adriaans.com/${artwork.filepath}" alt="${artwork.title}" /><a href="https://pieter-adriaans.com/${artwork.filepath}" class="unit__item__link" target="_blank"><button>zoom</button></a>
          </div>
          <div class="artwork__profile">
          <h4 class="artwork__price">&euro;${priceAsNumber
            .toFixed(2)
            .replace(/\d(?=(\d{3})+\.)/g, "$&,")}</h4>
              <div class="wrap-icon-info">
                <p>
                  ${artwork.art_type}
                </p>
                  ${artwork.art_dimensions}
              </div>
              <h4 class="artwork__title">${artwork.title}</h4>
              <div class="artwork__location">
                  nog iets
              </div>
          </div>
      </div>
  `;
}

checkLimitForBtnStatus();
nextBtn.addEventListener("click", moveToNextSlide);
prevBtn.addEventListener("click", moveToPrevSlide);

function moveToNextSlide() {
  if (!isContinue({ direction: true })) return;
  artworkIndex++;
  artworkContainer.style.transform = `translateX(${
    -artworkWidth * artworkIndex
  }px)`;
  artworkContainer.style.transition = ".7s";
}

function moveToPrevSlide() {
  if (!isContinue({ direction: false })) return;
  artworkIndex--;
  artworkContainer.style.transform = `translateX(${
    -artworkWidth * artworkIndex
  }px)`;
  artworkContainer.style.transition = ".7s";
}

const isContinue = (args) => {
  if (args.direction) {
    if (artworkIndex < limit) {
      checkartworkFinish(args.direction, nextBtn, prevBtn);
      return true;
    } else {
      updateBtnStatus(nextBtn, true);
      updateBtnStatusByLimit(prevBtn);
      return false;
    }
  } else {
    if (artworkIndex > 0) {
      checkartworkFinish(args.direction, prevBtn, nextBtn);
      return true;
    } else {
      updateBtnStatus(prevBtn, true);
      updateBtnStatusByLimit(nextBtn);
      return false;
    }
  }
};

function getElementsWidth() {
  return [
    artworkContainer.clientWidth,
    artworks[artworkIndex].clientWidth + gridGap,
  ];
}

function getLimit() {
  [artworksWidth, artworkWidth] = getElementsWidth();
  let artworkCountPerWrap = artworksWidth / artworkWidth;
  return Math.round(artworks.length - artworkCountPerWrap);
}

function checkLimitForBtnStatus() {
  if (limit == 0) {
    // nextBtn.classList.add('disable');
    nextBtn.setAttribute("disabled", true);
  }
}

function updateBtnStatus(btn, status) {
  if (status) {
    // btn.classList.add('disable')
    btn.setAttribute("disabled", true);
  } else {
    // btn.classList.remove('disable')
    btn.removeAttribute("disabled");
  }
}

function checkartworkFinish(direction, btn1, btn2) {
  const status = direction ? artworkIndex + 1 < limit : artworkIndex - 1 > 0;
  if (status) {
    updateBtnStatus(btn1, false);
  } else {
    updateBtnStatus(btn1, true);
  }
  updateBtnStatus(btn2, false);
}

function updateBtnStatusByLimit(btn) {
  if (limit != 0) {
    updateBtnStatus(btn, false);
  }
}


// Gallery
const modal = document.querySelector(".modal");
const modalInner = modal.querySelector(".inner");
const modalImg = modalInner.querySelector("img");

const gallery = document.querySelector(".artworks");

// Image load event
modalImg.addEventListener("load", function () {
  setTimeout(() => {
    if (modal.classList.contains("visible")) {
      modal.classList.add("loaded");
    }
  }, 275);
});

gallery.addEventListener("click", function (event) {
  console.log(event.target);

  const imgTarget = event.target.parentElement;
  // const getImgFull = imgTarget.parentElement
  console.log(imgTarget);

  if (imgTarget.tagName === "A") {
    // Prevent default.
    event.preventDefault();
    event.stopPropagation();
    console.log("is anchor");
    const href = imgTarget.getAttribute("href");

    // Not an image? Bail.
    // if (!href.match(/\.(jpg|gif|png|mp4)$/)) return;

    // Locked? Bail.
    if (modal._locked) return;

    // Lock.
    modal._locked = true;

    // Set src.
    modalImg.src = href;

    // Set visible.
    modal.classList.add("visible");

    // Focus.
    modal.focus();

    // Delay.
    setTimeout(() => {
      // Unlock.
      modal._locked = false;
    }, 600);

    ["click", "keypress"].forEach((eventType) => {
      modal.addEventListener(eventType, function (event) {
        // Locked? Bail.
        console.log(eventType == "keypress" ? event.key : "nopeeee");
        // if (modal._locked || !modal.classList.contains("visible")) return;
        if (event.which == 27 || eventType == "click") {
          // Stop propagation.
          event.stopPropagation();

          // Lock.
          modal._locked = true;

          // Clear visible, loaded.
          modal.classList.remove("loaded");

          // Delay.
          setTimeout(() => {
            modal.classList.remove("visible");

            setTimeout(() => {
              // Clear src.
              modalImg.src = "";

              // Unlock.
              modal._locked = false;

              // Focus.
              document.body.focus();
            }, 475);
          }, 125);
        }
      });
    });
  }
});

["mouseup", "mousedown", "mousemove"].forEach((eventType) => {
  modal.addEventListener(eventType, function (event) {
    // Stop propagation.
    event.stopPropagation();
    // if (modal.classList.contains("visible")) {
    //   modal.click()

    // }
  });
});
