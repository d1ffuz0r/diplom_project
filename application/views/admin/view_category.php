<center><?php echo $pagination ?></center>
<hr>
<table width="100%">
<? foreach($id as $desk): ?>
<tr>
<h1><?php echo $desk->p_rusname ?></h1>
<h3 align="right"><a href="/admin/edit_product/<?php echo $desk->p_id ?>">[edit]</a> | <a href="/admin/delete_product/<?php echo $desk->p_id ?>">[delete]</a></h3>
</tr>
<hr>
<? endforeach; ?>
</table>
<center><?php echo $pagination ?></center>
<hr>
<form action="/admin/add_product" method="post">
    <label>Назвение:</label><br/>
    <input type="text" name="rusname"><br/>
    <label>Описание:</label><br/>
    <input type="text" name="desc"><br/>
    <label>Цена:</label><br/>
    <input type="text" name="price"><br/>
    <label>Категория:</label><br/>
    <select name="category">
    <?php foreach($categories as $category): ?>
        <option value="<?php echo $category->c_name ?>"><?php echo $category->c_rusname ?></option>
    <?php endforeach; ?>
    </select><br/>
    <input type="submit" value="Добавить">
</form>
