<h1>Категории</h1>
<ul>
<?php foreach($category as $cat): ?>
    <li><h2><a href="/admin/view_category/<?php echo $cat->c_name ?>"><?php echo $cat->c_rusname ?></a>  <a href="/admin/edit_category/<?php echo $cat->c_id ?>">[edit]</a>|<a href="/admin/delete_category/<?php echo $cat->c_id ?>">[delete]</a></li>
<?php endforeach; ?>
</ul>
<hr>
<form action="/admin/add_category" method="POST">
    <label>name:</label><br/>
    <input type="text" name="name"> <br/>
    <label>rusname:</label><br/>
    <input type="text" name="rusname"><br/>
    <input type="submit" value="Добавить">
</form>