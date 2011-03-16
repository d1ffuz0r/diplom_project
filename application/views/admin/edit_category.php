<?php foreach($category as $cat): ?>
<form action="/admin/update_category" method="POST">
    <input type="hidden" value="<?php echo $cat->c_id ?>">
    <label>name:</label><br/>
    <input type="text" name="name" value="<?php echo $cat->c_name ?>"><br/>
    <label>rusname:</label><br/>
    <input type="text" name="rusname" value="<?php echo $cat->c_rusname ?>"><br/>
    <label>parametrs:</label><br/>
    <input type="text" name="param" value="<?php echo $cat->c_param ?>"><br/>
    <label>etc:</label><br/>
    <input type="text" name="etc" value="<?php echo $cat->c_etc ?>"><br/>
    <input type="submit" value="Обновить">
</form>
<?php endforeach; ?>