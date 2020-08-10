'use strict';

window.addEventListener('load', () => {
    const cartItems = document.querySelectorAll('.cart__item');
    cartItems.forEach( cartItem => {

        const image = cartItem.querySelector("img");
        image.addEventListener('click', () => {
            document.location.href = "/product/?id_goods=" + image.dataset.id;
        })

        const acceptButton = cartItem.querySelector('.accept');
        acceptButton.addEventListener('click',() => {
            const request = new XMLHttpRequest;
            const url = "/admin/accept/";

            const id_cart = cartItem.querySelector("input[name='id_cart']").value;
            const params = "id_cart=" + id_cart;

            request.open('post', url);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.addEventListener("readystatechange", () => {
                if(request.status === 200 && request.readyState === 4) {
                    let response = JSON.parse(request.responseText);
                    const cartStatus = cartItem.querySelector(".cart__status__circle");
                    cartStatus.className = "cart__status__circle";
                    cartStatus.classList.add(response["color_new_status"]);
                    cartStatus.title = response["name_new_status"];
                }
            })

            request.send(params);
        })

        const cancelButton = cartItem.querySelector('.cancel');
        cancelButton.addEventListener('click',() => {
            const request = new XMLHttpRequest;
            const url = "/admin/cancel/";

            const id_cart = cartItem.querySelector("input[name='id_cart']").value;
            const params = "id_cart=" + id_cart;

            request.open('post', url);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.addEventListener("readystatechange", () => {
                if(request.status === 200 && request.readyState === 4) {

                    let response = JSON.parse(request.responseText);
                    const cartStatus = cartItem.querySelector(".cart__status__circle");
                    cartStatus.className = "cart__status__circle";
                    cartStatus.classList.add(response["color_new_status"]);
                    cartStatus.title = response["name_new_status"];
                }
            })

            request.send(params);
        })
    })
})