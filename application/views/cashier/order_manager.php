<h1>Менеджер заказов</h1>
<hr>
<h2>
<? foreach ($list as $l) : ?>
id:<?php echo $l->ord_id ?> | дата:<?php echo $l->ord_date ?> | товар:<a href="/view/product/<?php echo $l->ord_product ?>"><?php echo $l->ord_product ?></a> сумма: <?php echo $l->ord_price?> р. | статус:<? if($l->ord_status == 1 ) { echo 'в рассмотрении'; } else {echo '<a style="color:red;">отказано</a>';}?><br>
О заказщике:<br>
Имя:<?php      echo $l->ord_realname ?><br>
Фамилия:<?php  echo $l->ord_family ?><br>
Отчество:<?php echo $l->ord_ot4estvo ?><br>
Телефон:<?php  echo $l->ord_telephone ?><br>
e-mail:<?php   echo $l->ord_email ?><br>
Страна:<?php   echo $l->ord_country ?><br>
Регион:<?php   echo $l->ord_region ?><br>
Город:<?php    echo $l->ord_city ?><br>
Индекс:<?php   echo $l->ord_postindex ?><br>
<p align="right"><a href="/shop/order_y/<?php echo $l->ord_id ?>">принять</a> | <a href="/shop/order_n/<?php echo $l->ord_id ?>">отказать</a></p>
<hr>
<? endforeach; ?>
</h2>