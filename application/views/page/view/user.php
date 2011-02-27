<h1>Просмотр пользователя</h1>
<hr>
<h1>
<? foreach ($desk as $user) : ?>
Логин: <?php  echo $user->u_name ?><br/>
E-mail: <?php echo $user->u_email ?><br/>
О себе: <?php echo $user->u_data ?><br/>
Всего покупок: <?php echo $user->u_allprice ;?><br/>
Ранг: <?  if($user->u_rang ==1 )     { echo 'администратор'; }
	  elseif($user->u_rang ==2 ) { echo 'продавец';}
	  elseif($user->u_rang ==3 ) { echo'пользователь';}?><br/>
<? endforeach; ?>
</h1>