// with XHR connect to pieteradriaanse.com/pieterAPI.php

// get the data from the API and display it in the console

// create a new XMLHttpRequest object
let xhr = new XMLHttpRequest();

let rootSite = "https://pieter-adriaans.com/";

// open a new connection and set catergory to 0
xhr.open("GET", rootSite + "pieterAPI.php?category=0", true);

// send the request
xhr.send();

// check if the request is done

xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    // parse the data
    let data = JSON.parse(xhr.responseText);
    console.log(data);

    let container = document.createElement("div");
    container.className = "container";
    document.body.appendChild(container);

    // show 4 items from the data
    for (let i = 0; i < 4; i++) {
      // create div element
      let item = document.createElement("div");
      item.className = "item";
      container.appendChild(item);

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


// FADE up observer

function fadeUpCallback(eleToWatch) {
  // console.log(eleToWatch);
  eleToWatch.forEach((ele) => {
    // console.log(ele.isIntersecting);
    if(ele.isIntersecting){
      ele.target.classList.add('faded')
      fadeUpObserver.unobserve(ele.target)
    } 


  })
}

const fadeUpOptions = {
  treshold: .6,

}

const fadeUpObserver = new IntersectionObserver(fadeUpCallback, fadeUpOptions);

document.querySelectorAll('.fade-up').forEach((item) => {
  fadeUpObserver.observe(item);
})
