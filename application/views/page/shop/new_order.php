<h1>Новый заказ</h1>
<hr>
<h2>
        <form action="/shop/add_order/now" method="POST">
            <table>
                <? foreach ($product as $p) { ?>
                    <tr>
                        <td width="120">
                            <label>Товар:</label>
                        </td>
                        <td>
                            <?=$p->p_rusname ?>
                        </td>
                        <td>
                            <input type="hidden" name="ord_username" value="<?=Cookie::get('username');?>">
                            <input type="hidden" name="ord_id" value="<?=$p->p_id ?>">
                        </td>
                    </tr>
                <tr>
                    <td>
                        <label>Описание:</label>
                    </td>
                    <td>
                        <?=$p->p_desc ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Цена(с НДС):</label>
                    </td>
                    <td>
                        <?=round($p->p_ndsprice) ?> р.
                        <input type="hidden" name="ord_price" value="<?=round($p->p_ndsprice) ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Количество:</label>
                    </td>
                    <td>
                        <select name="ord_count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Имя:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_realname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Фамилия:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_family">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Отчество:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_ot4estvo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>e-mail:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Телефон:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_telephone">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Страна:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_country">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Регион:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_region">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Город(etc.):</label>
                    </td>
                    <td>
                        <input type="hidden" name="ord_city" value="<?=Cookie::get('city')?>">
                        <?=Cookie::get('r_city')?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Индекс:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_postindex">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Вид оплаты:</label>
                    </td>
                    <td>
                        <select name="ord_typebuy">
                            <option value="wmz">WebMoney</option>
                            <option value="nal">Наличными</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Заказать">
                    </td>
                </tr>
            </table>
             <? } ?>
        </form>
</h2>
<p style="color: red; float: right;">Все поля обязательны к заполнению</p>