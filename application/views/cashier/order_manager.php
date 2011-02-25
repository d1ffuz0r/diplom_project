<h1>Менеджер заказов</h1>
<hr>
<h2>
<? foreach ($list as $l) { ?>
id:<?=$l->ord_id ?> | дата:<?=$l->ord_date ?> | товар:<a href="/view/product/<?=$l->ord_product ?>"><?=$l->ord_product ?></a> сумма: <?=$l->ord_price?> р. | статус:<? if($l->ord_status == 1 ) { echo 'в рассмотрении'; } else {echo '<a style="color:red;">отказано</a>';}?><br>
О заказщике:<br>
Имя:<?=$l->ord_realname ?><br>
Фамилия:<?=$l->ord_family ?><br>
Отчество:<?=$l->ord_ot4estvo ?><br>
Телефон:<?=$l->ord_telephone ?><br>
e-mail:<?=$l->ord_email ?><br>
Страна:<?=$l->ord_country ?><br>
Регион:<?=$l->ord_region ?><br>
Город:<?=$l->ord_city ?><br>
Индекс:<?=$l->ord_postindex ?><br>
<p align="right"><a href="/shop/order_y/<?=$l->ord_id ?>">принять</a> | <a href="/shop/order_n/<?=$l->ord_id ?>">отказать</a></p>
<hr>
<? }?>
</h2>