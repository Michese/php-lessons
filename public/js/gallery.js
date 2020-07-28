'use strict';
window.addEventListener('load', () => {
   const products = document.querySelectorAll(".product__item");
   products.forEach(product => {
       product.addEventListener('click', () => {
        document.location.href = "/image/?id_gallery=" + product.id;
       })
   })
});