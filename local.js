// with XHR connect to pieteradriaanse.com/pieterAPI.php

// get the data from the API and display it in the console

// create a new XMLHttpRequest object
let xhr = new XMLHttpRequest();

let rootSite = "https://pieter-adriaans.com/";

let homeGallery = document.getElementById("home-gallery");

// open a new connection and set catergory to 0
// xhr.open("GET", "mediaResponseExample.json", true);
xhr.open('GET', rootSite + 'pieterAPI.php?category=0', true);


// send the request
xhr.send();

// check if the request is done

xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    // parse the data
    let data = JSON.parse(xhr.responseText);
    // let data = xhr.responseText;
    console.log(data);

    // show 4 items from the data
    for (let i = 0; i < 8; i++) {
      // create div element
      let item = document.createElement("div");
      item.className = "item";
      homeGallery.appendChild(item);

      // create img element
      let img = document.createElement("img");
      img.src = rootSite + data[i].filepath;
      item.appendChild(img);

      // create h2 element
      let h2 = document.createElement("h2");
      h2.innerHTML = data[i].title;
      item.appendChild(h2);

      // create p element
      let p = document.createElement("p");
      p.innerHTML = data[i].description;
      item.appendChild(p);
    }
  }
};
