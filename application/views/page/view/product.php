<table width="100%">
<? foreach($id as $desk): ?>
<tr height="152">
<h1><?php echo $desk->p_rusname ?></h1>
<h2>Описание: <?php echo $desk->p_desc ?></h2><img src="<?php echo URL::base();?>img/prev/<?php echo $desk->p_category ?>/<?php echo $desk->p_id ?>.png" alt="" />
<h2 style="color:red;">Цена: <?php echo round($desk->p_ndsprice)?> руб | <?php echo round($desk->p_kursprice,2);?> $</h2><h2 align="right"><? if(Cookie::get('loged_in') == TRUE) { ?><a href="/shop/new_order/<?php echo $desk->p_id ?>">оформить заказ</a><? } ?></h2>
</tr>
<? endforeach; ?>
</table>