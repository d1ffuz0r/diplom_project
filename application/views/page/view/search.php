<h1>Результат поиска</h1>
Вы искали: <form action="/shop/search/q" method="POST">
    <input type="text" name="search_q" value="<?php echo $query['search_q'] ?>">
    <input type="image" value="Найти" class="button_search" src="<?php echo URL::base();?>img/search.gif" onClick="this.form.searchtext.focus();">
</form>
<hr>
<table width="100%">
<? foreach($id as $desk):?>
<tr>
<h1><?php echo $desk->p_rusname ?></h1>
<h2>Описание: <?php echo $desk->p_desc ?></h2>
<h2 style="color:red;">Цена: <?php echo round($desk->p_price)?> руб</h2>
<h3 align="right"><a href="/view/product/<?php echo $desk->p_id ?>">просмотр</a><? if(Cookie::get('loged_in') == TRUE) { ?> | <a href="/shop/new_order/<?php echo $desk->p_id ?>">оформить заказ</a><? } ?></h3>
</tr>
<hr>
<? endforeach; ?>
</table>
<hr>
<p align="right" style="color: red;">цены с учётом ндс</p>
