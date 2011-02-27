<h1>Ваши заказы</h1>
<hr>
<h2>
<? foreach ($list as $l) : ?>
id:<?php echo $l->ord_id ?> | дата:<?php echo $l->ord_date ?> | товар:<a href="/view/product/<?php echo $l->ord_product ?>"><?php echo $l->ord_product ?></a> | статус:<? if($l->ord_status == 1 ) { echo 'в рассмотрении'; } else {echo '<a style="color:red;">отказано</a>';}?>
<hr>
<? endforeach; ?>
</h2>