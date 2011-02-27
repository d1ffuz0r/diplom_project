<h1>Ваши покупки</h1>
<hr>
<h2>
<? foreach ($list as $l) : ?>
id:<?php echo $l->ord_id?> | дата:<?php echo $l->ord_date ?> | товар:<a href="/view/product/<?php echo $l->ord_product ?>"><?php echo $l->ord_product ?></a> | статус: <? if($l->ord_status == 3 ) echo 'принято';?>
<hr>
<? endforeach;?>
</h2>