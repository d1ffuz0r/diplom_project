<h1>Результат поиска</h1>
Вы искали: <form action="/shop/search/q" method="POST"><input type="text" name="search_q" value="<?=$query['search_q'] ?>"><input type="submit" value="Искать"></form>
<hr>
<table width="100%">
<? foreach($id as $desk){?>
<tr>
<h1><?=$desk->p_rusname ?></h1>
<h2>Описание: <?=$desk->p_desc ?></h2><img src="<?=Kohana::$base_url;?>img/<?=$desk->p_category ?>/<?=$desk->p_name ?>.png" alt="" />
<h2 style="color:red;">Цена: <?=round($desk->p_price)?> руб</h2>
<h3 align="right"><a href="/view/product/<?=$desk->p_id ?>">просмотр</a><? if(Cookie::get('loged_in') == TRUE) { ?> | <a href="/shop/new_order/<?=$desk->p_id ?>">оформить заказ</a><? } ?></h3>
</tr>
<hr>
<? } ?>
</table>
<hr>
<p align="right" style="color: red;">цены с учётом ндс</p>
