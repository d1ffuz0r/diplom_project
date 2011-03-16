<table width="100%"><tr height="100%">
<h2>
<form action="/admin/update_product" method="POST">
<? foreach($id as $desk): ?>
<input type="hidden" name="id" value="<?php echo $desk->p_id ?>">
<label>Название:</label><br/>
<input type="text" name="rusname" size="50" value="<?php echo $desk->p_rusname ?>"><br/>
<label>Описание:</label><br/>
<textarea name="desc" cols="50" rows="5"><?php echo $desk->p_desc ?></textarea><br/>
<label>Цена:</label><br/>
<input type="text" name="price" value="<?php echo round($desk->p_price)?>"><br/>
<img src="<?php echo URL::base();?>img/prev/<?php echo $desk->p_category ?>/<?php echo $desk->p_id ?>.png" alt="" /><br/>
<input type="submit" value="Изменить">
<? endforeach; ?>
</form>
</tr></table>