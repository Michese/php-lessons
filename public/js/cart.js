'use strict';
window.addEventListener('load', () => {
   const products = document.querySelectorAll(".cart__item > img");
   products.forEach(product => {
       product.addEventListener('click', () => {
        document.location.href = "/product/?id_goods=" + product.id;
       })
   })
});