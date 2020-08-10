<div class="cart__item">
    <img src="{{SRC_SMALL_GOODS}}" data-id="{{ID_GOODS}}">
    <div class="name__goods">
        <h2>Название: {{NAME_GOODS}}</h2>
        <p class="product_content">Пользователь: {{NAME_USER}}</p>
        <p class="product_content">Дата: {{DATE_CART}}</p>
    </div>
    <p class="product_content">Цена: {{PRICE_GOODS}}</p>
    <p class="product_content">Количество: {{QUANTITY}}</p>
    <p class="product_content">Сумма: {{SUMM}}</p>
    <input type="hidden" name="id_cart" value="{{ID_CART}}">
    <div class="cart__delete">
        <div class="cart__status__circle {{COLOR_STATUS}}" title="{{NAME_STATUS}}"></div>
        <input type="button" value="Подтвердить" class="menu__link accept">
        <input type="button" value="Отменить" class="menu__link cancel">
        <p class="product_content answer"></p>
    </div>
</div>