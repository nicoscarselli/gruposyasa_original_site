document.addEventListener('DOMContentLoaded', () => {
  "use strict";


/* Preloader */
const preloader = document.querySelector('#preloader');
if (preloader) {
  window.addEventListener('load', () => {
    preloader.remove();
  });
}

/* Animation on scroll function and init */
function aos_init() {
  AOS.init({
    easing: 'ease-in-out-sine'
  });
}

/* Scroll top button */
const scrollTop = document.querySelector('.scroll-top');
if (scrollTop) {
  const togglescrollTop = function() {
    window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
  }
  window.addEventListener('load', togglescrollTop);
  document.addEventListener('scroll', togglescrollTop);
  scrollTop.addEventListener('click', window.scrollTo({
    top: 0,
    behavior: 'smooth'
  }));
}
/* Scroll top button */


function no_conection_error() {
  swal({
      title: 'Error',
      icon: 'error',
      text: 'Parece que no hay conexión a internet'
  });
}
window.addEventListener('load', () => {
  aos_init();
});

});