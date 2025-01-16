import Carrousel from "{{asset}}/js/classes/Carrousel.js";

function init() {
  let carrouselConteneur = document.querySelector("[data-carrousel]");
  let tableauImages = ["img/carrousel.webp", "img/carrousel-2eme.webp"];
  let carrousel = new Carrousel(carrouselConteneur, tableauImages);
}

init();
