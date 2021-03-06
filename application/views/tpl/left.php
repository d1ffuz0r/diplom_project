<!--left panel-->
<div id="LeftPart">
    <div id="Menu">
        <div id="Menu_header">
            <div class="menu_header_left"><span class="menu_text">Категории</span> </div>
            <div class="menu_header_right"></div>
        </div>
        <div id="Menu_content">
            <? foreach ($category as $c) : ?>
            <a class="menu_item" href="/view/cat/<?php echo $c->c_name ?>"><span><?php echo $c->c_rusname ?></span></a><br/>
            <? endforeach; ?>
        </div>
    </div>
    <!--search-->
    <div id="Poll">
        <div id="Poll_header">
            <div class="menu_header_left"><span class="menu_text">Поиск</span></div>
            <div class="menu_header_right"></div>
        </div>
        <div id="Poll_content">
            <form action="/shop/search/q" method="POST">
		        <input name="search_q" alt="Найти" type="text" size="20" value="поиск по товарам..." onBlur="if(this.value=='') this.value='поиск по товарам...';" onFocus=" if(this.value=='поиск по товарам...') this.value=''; ">
            </form>
        </div>
    </div>
    <!--city-->
    <div id="Poll">
        <div id="Poll_header">
        <div class="menu_header_left"><span class="menu_text">Отделения</span></div>
        <div class="menu_header_right"></div>
        </div>
        <div id="Poll_content">
        <span class="poll_question">Выберите отделение</span><br/>
            <form action="/changecity" method="POST">
            <select name="region">
                <? foreach($regions as $r) :?>
		<option value="<?php echo $r->name ?>"><?php echo $r->rusname ?></option>
		<? endforeach; ?>
            <input type="submit" value="выбрать">
            </select>
            </form>
        </div>
    </div>
    <!--price-list-->
    <div id="Poll">
        <div id="Poll_header">
            <div class="menu_header_left"><span class="menu_text">Прайс-лист</span></div>
            <div class="menu_header_right"></div>
        </div>
        <div id="Poll_content">
            <a class="poll_unswer" href="/"><span>Скачать</span></a>
        </div>
    </div>
    <!--price-list-->
    <div id="Poll">
        <div id="Poll_header">
            <div class="menu_header_left"><span class="menu_text">Дополнительные cсылки</span></div>
            <div class="menu_header_right"></div>
        </div>
        <div id="Poll_content">
            <a class="poll_question" href="/admin"><span>Вход для администора</span></a><br>
            <a class="poll_question" href="/cashier"><span>Вход для кассира</span></a>
        </div>
    </div>
 </div>
<!--end left panel-->