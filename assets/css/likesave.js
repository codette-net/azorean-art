  // like and save to localstorage
  let likeSave = document.getElementById('like-save');
  let artwork = JSON.parse(localStorage.getItem('artwork'));
  let liked = false;
  if (artwork) {
    likeSave.classList.add('liked');
    liked = true;
  }
  likeSave.addEventListener('click', () => {
    if (liked) {
      localStorage.removeItem('artwork');
      likeSave.classList.remove('liked');
      liked = false;
    } else {
      localStorage.setItem('artwork', JSON.stringify(artwork));
      likeSave.classList.add('liked');
      liked = true;
    }
  });
  
  // get user data when page is openend , store ip , location and time in localstorage
   let userData = JSON.parse(localStorage.getItem('userData'));
  if (!userData) {
      // get user info array from getUserInfo.php 
      fetch('getUserInfo.php?ip=1')
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.text();  // use text() instead of json() to see the exact output
      })
      .then(dataUser => {
          console.log(dataUser);
          localStorage.setItem('userData', dataUser);
      })
      .catch(error => {
          console.error('There has been a problem with your fetch operation:', error);
      });
  } else {
      console.log('user data already present');
      // get the data from the localstorage
      console.log(userData);
      
  }