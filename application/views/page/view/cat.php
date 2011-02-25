<center><?=$pagination?></center>
<hr>
<table width="100%">
<? foreach($id as $desk){?>
<tr>
<h1><?=$desk->p_rusname ?></h1>
<h2>Описание: <?=$desk->p_desc ?></h2><img src="<?=Kohana::$base_url;?>img/<?=$desk->p_category ?>/<?=$desk->p_name ?>.png" alt="" />
<h2 style="color:red;">Цена: <?=round($desk->p_ndsprice)?> руб | <?=round($desk->p_kursprice,2);?> $</h2>
<h3 align="right"><a href="/view/product/<?=$desk->p_id ?>">просмотр</a><? if(Cookie::get('loged_in') == TRUE) { ?> | <a href="/shop/new_order/<?=$desk->p_id ?>">оформить заказ</a><? } ?></h3>
</tr>
<hr>
<? } ?>
</table>
<center><?=$pagination?></center>
<hr>
<p align="right" style="color: red;">цены с учётом ндс</p>
