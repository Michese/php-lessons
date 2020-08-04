<form method="post"">
    <img src="{{SRC_GOODS}}">
    <h2>Название: {{NAME_GOODS}}</h2>
    <p class="product_content">Описание: {{DESCRIPTION_GOODS}}</p>
    <p class="product_content">Цена: {{PRICE_GOODS}}</p>
    <input type="hidden" name="id_goods" value="{{ID_GOODS}}">
    <input type="number" name="quantity" placeholder="Количество">
    <input type="submit" value="В корзину">
</form>

