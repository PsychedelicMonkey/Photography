import './bootstrap';

const collapse = document.getElementById('navbar-collapse');
const navbarLinks = document.querySelector('.navbar-links');

collapse.addEventListener('click', (e) => {
  navbarLinks.classList.toggle('show');
});
