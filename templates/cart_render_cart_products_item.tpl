<div class="cart__item">
    <img src="{{SRC_SMALL_GOODS}}" data-id="{{ID_GOODS}}">
    <h2>Название: {{NAME_GOODS}}</h2>
    <!--<p class="product_content">Описание: DESCRIPTION_GOODS}}</p> -->
    <p class="product_content">Цена: {{PRICE_GOODS}}</p>
    <p class="product_content">Количество: {{QUANTITY}}</p>
    <p class="product_content">Сумма: {{SUMM}}</p>
    <input type="hidden" name="id_cart" value="{{ID_CART}}">
    <div class="cart__delete">
        <div class="cart__status__circle {{COLOR_STATUS}}" data-id="{{ID_STATUS}}" title="{{NAME_STATUS}}"></div>
        <input type="number" name="quantity" placeholder="Количество">
        <input type="button" value="Товар пришел" class="menu__link bought" {{BOUGHT}}>
        <input type="button" value="Удалить из корзины" class="menu__link delete">
        <p class="product_content answer"></p>
    </div>

</div>