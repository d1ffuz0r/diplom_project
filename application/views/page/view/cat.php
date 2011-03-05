<center><?php echo $pagination ?></center>
<hr>
<table width="100%">
<? foreach($id as $desk): ?>
<tr>
<h1><?php echo $desk->p_rusname ?></h1>
<h2>Описание: <?php echo $desk->p_desc ?></h2>
<h2 align="right" style="color:red;">Цена: <?php echo round($desk->p_ndsprice)?> руб | <?php echo round($desk->p_kursprice,2);?> $</h2>
<h3 align="right"><a href="/view/product/<?php echo $desk->p_id ?>">просмотр</a><? if(Cookie::get('loged_in') == TRUE) { ?> | <a href="/shop/new_order/<?php echo $desk->p_id ?>">оформить заказ</a><? } ?></h3>
</tr>
<hr>
<? endforeach; ?>
</table>
<center><?php echo $pagination ?></center>
<hr>
<p align="right" style="color: red;">цены с учётом ндс</p>
