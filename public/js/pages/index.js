import Carrousel from "../classes/Carrousel.js";

function init() {
  let carrouselConteneur = document.querySelector("[data-carrousel]");
  let tableauImages = [
    `${assetPath}img/carrousel.webp`,
    `${assetPath}img/carrousel-2eme.webp`,
  ];
  let carrousel = new Carrousel(carrouselConteneur, tableauImages);

  
}

init();
