let form =  document.querySelector('.contact-form');
let grecaptcha = document.querySelector('.g-recaptcha');
let responseWrapper = document.querySelector('.response-wrapper');
let responseMsg = document.querySelector('.response-msg');
let exitBtn = document.querySelector('#response-exit-btn');
let errorsMsg = document.querySelector('.errors-msg');
let whatNext = document.querySelector('.what-next');
whatNext.style.display = 'none';

let page = window.location.pathname.split('/').pop().split('.')[0];

console.log(page);

exitBtn.addEventListener('click', () => {
  responseWrapper.style.display = 'none';
  if(page == 'contact') {
    window.location.href = '/';
  } else {
    whatNext.classList.add('active');
  whatNext.scrollIntoView({behavior: 'smooth'});
  }
});

form.addEventListener('submit', async (event) => {
  console.log('submitting form');
  event.preventDefault();
  if(page === 'artwork') {
    whatNext.style.display = 'grid';
  }
  let formData = new FormData(event.target);
  try {
    const response = await fetch('contact.php', {
      method: 'POST',
      body: formData,
      page: page,
    });
    const result = await response.json();

    if (result && !result.errors) {
      console.log('success');
      console.log(result);
      responseWrapper.style.display = 'flex';
      if(page == 'contact') {
        responseMsg.innerHTML = result.success;
      }
      form.reset();
    } else if (result.errors) {
      
      console.log(result.errors);
      errorsMsg.textContent = '';

      Object.values(result.errors).forEach(error => {
        errorsMsg.textContent += error + '\n';
      });
      errorsMsg.classList.add('active');
      console.log(result.errors);
    } else {
      errorsMsg.textContent = 'An unexpected error occurred.';
      errorsMsg.classList.add('active');
      console.log(result);
    }
  } catch (err) {
    console.error(err);
    errorsMsg.textContent = 'An error occurred while submitting the form. Please try again.';
    errorsMsg.classList.add('active');
  }
});