<h1>Вход</h1>
<center>
<form action="<?php echo URL::base();?>auth/login" method="POST">
    <h2>Логин:</h2>
    <input type="text" name="login"><br/>
    <h2>Пароль:</h2>
    <input type="text" name="password"><br/><br/>
    <input type="submit" value="Войти">
</form>
</center>