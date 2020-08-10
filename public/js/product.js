'use strict';
window.addEventListener('load', () => {
    const form = document.querySelector("form");

    form.addEventListener('submit', event => {
        event.preventDefault();

        let id_goods = form.querySelector("input[name = 'id_goods']").value;
        let quantity = form.querySelector("input[name = 'quantity']").value;
        const params = "id_goods=" + id_goods + "&quantity=" + quantity;

        let request = new XMLHttpRequest();
        const url = '/cart/add/'
        request.open('post', url);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.addEventListener('readystatechange', () => {
            if (request.readyState === 4 && request.status === 200) {
                console.log();

                let response = JSON.parse(request.responseText)
                const answer = form.querySelector(".answer")
                if (response['result']) {
                    answer.innerText = "Товар успешно добавлен в корзину!";
                } else {
                    answer.innerText = "Что-то пошло не так!";
                }

            }
        })

        request.send(params)
    })


});