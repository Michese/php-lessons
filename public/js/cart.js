'use strict';
window.addEventListener('load', () => {
    const cartItems = document.querySelectorAll(".cart__item");

    cartItems.forEach(cartItem => {

        const image = cartItem.querySelector("img");
        image.addEventListener('click', () => {
            document.location.href = "/product/?id_goods=" + image.dataset.id;
        })

        const deleteButton = cartItem.querySelector(".delete");
        deleteButton.addEventListener('click', () => {

            let id_cart = cartItem.querySelector("input[name = 'id_cart']").value;
            let quantity = cartItem.querySelector("input[name = 'quantity']").value;
            const params = "id_cart=" + id_cart + "&quantity=" + quantity;

            let request = new XMLHttpRequest();
            const url = '/cart/remove/';
            request.open('post', url);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // request.responseType = "json";

            request.addEventListener('readystatechange', () => {
                if (request.readyState === 4 && request.status === 200) {

                    let response = JSON.parse(request.responseText)
                    const answer = cartItem.querySelector(".answer")
                    if (response['result']) {
                        answer.innerText = "Товар успешно удален из корзины!";
                    } else {
                        answer.innerText = "Что-то пошло не так!";
                    }

                }
            })

            request.send(params)
        })

        const boughtButton = cartItem.querySelector(".bought");
        boughtButton.addEventListener('click', () => {

            let id_cart = cartItem.querySelector("input[name = 'id_cart']").value;
            const params = "id_cart=" + id_cart;

            let request = new XMLHttpRequest();
            const url = '/cart/bought/';
            request.open('post', url);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            request.addEventListener('readystatechange', () => {
                if (request.readyState === 4 && request.status === 200) {

                    let response = JSON.parse(request.responseText)

                    const answer = cartItem.querySelector(".answer");
                    if (response['result']) {
                        boughtButton.disabled = true;
                        const cartStatus = cartItem.querySelector(".cart__status__circle");
                        cartStatus.className = "cart__status__circle";
                        cartStatus.classList.add(response["color_new_status"]);
                        cartStatus.title = response["name_new_status"];
                        cartStatus.dataset.id = response["id_new_status"];
                        answer.innerText = "Покупка подтверждена!";
                    } else {
                        answer.innerText = "Что-то пошло не так!";
                    }

                }
            })

            request.send(params)
        })
    })

});