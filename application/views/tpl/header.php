<!--header panel-->
<div id="Head">
    <div id="Head_left">
        <div id="Leaf_top"></div>
        <div id="Leaf_bottom">
        <? if(Cookie::get('loged_in') == FALSE) {?>
        <a class="registration" href="/reg">РЕГИСТРАЦИЯ</a><a class="log-in" href="/login">ВХОД</a>
        <? } else {?>
        <a class="registration" href="/view/user/<?php echo Cookie::get('username');?>">Привет <?php echo Cookie::get('username');?></a><a class="log-in" href="/auth/logout">Выход</a>
        <? } ?>
        </div>
    </div>
    <div id="Head_right">
        <div id="Logo">
            <div id="Name"><span class="blue"><?php echo Kohana::config('site.title');?></span></div>
            <div id="Informations"></div>
        </div>
        <div id="Top_menu">
            <a class="kart" href="/kart"><span>ПОКУПКИ</span></a>
            <a class="orders" href="/orders"><span>ЗАКАЗЫ</span></a>
            <a class="contact" href="/contact"><span>КОНТАКТЫ</span></a>
            <a class="help" href="/help"><span>ПОМОШЬ</span></a>
            <a class="home" href="/"><span>ГЛАВНАЯ</span></a>
        </div>
    </div>
</div>
<!--end header panel-->
