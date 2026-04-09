  console.log("artwork.js loaded");

  let path = window.location.pathname;
console.log("Current path:", path);
// strip /artwork/ from the path to get the id
let artId = parseInt(path.replace("/artwork/", ""));

console.log("Extracted art ID:", artId);
  
  if (artId && !isNaN(artId)) {
    
    
  fetch(`https://pieter-adriaans.com/pieterAPI.php?id=${artId}`)
        .then(response => response.json())
        .then(data => {
          console.log(data);
          viewArtwork(data);
        });
    }
  
  let artworkImg = document.querySelector('.artworks__current__img');
  let artworkTitle = document.querySelector('.artwork__info h1');
  let artworkPrice = document.querySelector('.artwork__info h2');
  let artworkYearFnrCat = document.querySelector('.year-fnr-cat');
  let artworkDescription = document.querySelector('.description');
  let artworkDimensions = document.querySelector('.artwork-dimensions');
  let artworkType = document.querySelector('.artwork-type');
  let artworkFactsheet = document.querySelector('.artwork-factsheet');
  let artworkId = document.querySelector('#artwork_id');

  function updateMetaTag(selector, attr, value) {
    const el = document.querySelector(selector);
    if (el) {
      el.setAttribute(attr, value);
    }
  }

  function updateArtworkSEO(artwork) {
    const artworkUrl = `https://azorean-art.com/artwork.html?id=${artwork.id}`;
    const artworkImage = `https://pieter-adriaans.com/${artwork.filepath}`;
    const title = `${artwork.title} | Pieter Adriaans | Azorean Art`;
    const description = `${artwork.title}, an original ${artwork.art_type || 'artwork'} by Pieter Adriaans. ${artwork.year ? `Created in ${artwork.year}. ` : ''}${artwork.art_dimensions ? `Dimensions: ${artwork.art_dimensions}. ` : ''}View details and inquire directly through Azorean Art.`;

    document.title = title;

    updateMetaTag('meta[name="description"]', 'content', description);
    updateMetaTag('meta[property="og:title"]', 'content', title);
    updateMetaTag('meta[property="og:description"]', 'content', description);
    updateMetaTag('meta[property="og:image"]', 'content', artworkImage);
    updateMetaTag('meta[property="og:url"]', 'content', artworkUrl);
    updateMetaTag('meta[name="twitter:title"]', 'content', title);
    updateMetaTag('meta[name="twitter:description"]', 'content', description);
    updateMetaTag('meta[name="twitter:image"]', 'content', artworkImage);

    const canonical = document.querySelector('link[rel="canonical"]');
    if (canonical) {
      canonical.setAttribute('href', artworkUrl);
    }

    const artworkSchema = {
      "@context": "https://schema.org",
      "@type": "VisualArtwork",
      "name": artwork.title,
      "creator": {
        "@type": "Person",
        "name": "Pieter Adriaans",
        "url": "https://pieter-adriaans.com"
      },
      "image": artworkImage,
      "url": artworkUrl,
      "description": artwork.description || `${artwork.title} by Pieter Adriaans.`,
      "artform": artwork.art_type || "Artwork",
      "width": artwork.art_dimensions || "",
      "dateCreated": artwork.year ? String(artwork.year) : "",
      "genre": "Azorean Art",
      "inLanguage": "en",
      "isPartOf": {
        "@type": "WebSite",
        "name": "Azorean Art",
        "url": "https://azorean-art.com"
      }
    };

    const schemaEl = document.querySelector('#dynamic-artwork-schema');
    if (schemaEl) {
      schemaEl.textContent = JSON.stringify(artworkSchema, null, 2);
    }
  }

  function viewArtwork(data) {
    let artwork = data;

    artworkImg.innerHTML = `<img src="https://pieter-adriaans.com/${artwork.filepath}" data-src="https://pieter-adriaans.com/${artwork.filepath}" class="lozad placeholder" alt="${artwork.title} by Pieter Adriaans">`;
    artworkTitle.textContent = artwork.title;
    artworkPrice.textContent = `€ ${artwork.art_price},-`;
    artworkYearFnrCat.innerHTML = `${artwork.year} | ${artwork.fnr} | ${artwork.id}`;
    artworkDescription.textContent = artwork.description;
    artworkDimensions.textContent = `Dimensions: ${artwork.art_dimensions}`;
    artworkType.textContent = `${artwork.art_type}`;
    artworkId.value = `[${artwork.year} | ${artwork.fnr} | ${artwork.id}]`;

    if (artwork.factsheet_url) {
      artworkFactsheet.innerHTML = `<a href="https://pieter-adriaans.com/${artwork.factsheet_url}" target="_blank" rel="noopener noreferrer" title="Download factsheet for this artwork (PDF)"><i class="fas fa-file-pdf"></i>&nbsp;Download factsheet for this artwork (PDF)</a>`;
    } else {
      artworkFactsheet.innerHTML = '';
    }

    // updateArtworkSEO(artwork);

    const observer = lozad('.lozad', {
      loaded: function (el) {
        el.dataset.loaded = true;
      }
    });
    observer.observe();
  }
