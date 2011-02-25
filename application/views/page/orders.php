<h1>Ваши заказы</h1>
<hr>
<h2>
<? foreach ($list as $l) { ?>
id:<?=$l->ord_id ?> | дата:<?=$l->ord_date ?> | товар:<a href="/view/product/<?=$l->ord_product ?>"><?=$l->ord_product ?></a> | статус:<? if($l->ord_status == 1 ) { echo 'в рассмотрении'; } else {echo '<a style="color:red;">отказано</a>';}?>
<hr>
<? }?>
</h2>