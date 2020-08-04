<form method="post" class="cart__item">
    <img src="{{SRC_SMALL_GOODS}}" id="{{ID_GOODS}}">
    <h2>Название: {{NAME_GOODS}}</h2>
    <!--<p class="product_content">Описание: DESCRIPTION_GOODS}}</p> -->
    <p class="product_content">Цена: {{PRICE_GOODS}}</p>
    <p class="product_content">Количество: {{QUANTITY}}</p>
    <p class="product_content">Сумма: {{SUMM}}</p>
    <input type="hidden" name="id_goods" value="{{ID_GOODS}}">
    <div class="cart__delete">
        <input type="number" name="quantity" placeholder="Количество">
        <input type="submit" value="Удалить из корзины" class="menu__link">
    </div>

</form>