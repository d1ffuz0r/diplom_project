<h1>Новый заказ</h1>
<hr>
<h2>
        <form action="/shop/add_order/now" method="POST">
            <table>
                    <tr>
                        <td width="120">
                            <label>Товар(id):</label>
                        </td>
                        <td>
                            <input type="text" name="ord_id">
                        </td>
                        <td>
                            <input type="hidden" name="ord_username" value="<?=Cookie::get('username');?>">
                            <input type="hidden" name="ord_typebuy" value="nal">
                        </td>
                    </tr>
                <tr>
                    <td>
                        <label>Цена(с НДС):</label>
                    </td>
                    <td>                       
                        <input type="text" name="ord_price">р.
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Количество:</label>
                    </td>
                    <td>
                        <select name="ord_count">
                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
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
                        <label>Телефон:</label>
                    </td>
                    <td>
                        <input type="text" name="ord_telephone">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Провести">
                    </td>
                </tr>
            </table>
        </form>
</h2>
<p style="color: red; float: right;">Все поля обязательны к заполнению</p>