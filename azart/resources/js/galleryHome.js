  let gallerySvg = document.querySelector('.art-gallery-svg');
  gallerySvg.addEventListener('click', function () {
    document.querySelector('#art').scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
