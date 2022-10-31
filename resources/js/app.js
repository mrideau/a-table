import './bootstrap';
require('materialize-css')

// Init Materialize
M.AutoInit();

const header = document.querySelector('header');
const ontop = document.querySelector('.ontop');
const headerTopOffset = header.offsetTop;

ontop.addEventListener('click', () => {
    window.scrollTo(0, 0);
});

window.onscroll = () => {
    if (window.scrollY > headerTopOffset) {
        ontop.classList.add('active');
    } else {
        ontop.classList.remove('active');
    }
};

