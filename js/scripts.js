const header = document.getElementById('encabezado');
const btnMenu = document.getElementById('iconos');
const menuCat = document.querySelector('nav.categorias');
const menuSoc = document.querySelector('nav.redes-sociales');
const categorias = document.querySelectorAll('nav.categorias ul li');
const redes = document.querySelectorAll('nav.redes-sociales ul li');
/* eventListeners */

eventListeners();

function eventListeners() {
  document.addEventListener('scroll', barraHeader);
  btnMenu.addEventListener('click', menuResponsivo);
}

let contador = 0;

function menuResponsivo() {
  contador++;
  if (contador == 1) {
    btnMenu.className = 'fas fa-times';
    btnMenu.classList.remove('fas.fa-bars');
    menuCat.style.opacity = 0.9;
    menuCat.style.marginTop = '21rem';
    menuSoc.style.opacity = 0.9;

  } else {
    btnMenu.className = 'fas fa-bars';
    btnMenu.classList.remove('fas.fa-times');
    menuCat.style.opacity = 0;
    menuCat.style.marginTop = '-50rem';
    menuSoc.style.opacity = 0;
    contador = 0;
  }

}

function barraHeader() {
  let scroll = window.scrollY;

  if (scroll >= 300) {

    header.classList.add('deslizar');

    categorias.forEach(categoria => {
       categoria.classList.add('scrolling');
    });

    redes.forEach(red => {
      red.classList.add('scroll');
    });

  } else {

    header.classList.remove('deslizar');

    categorias.forEach(categoria => {
       categoria.classList.remove('scrolling');
    });

    redes.forEach(red => {
      red.classList.remove('scroll');
    });

  }
}
