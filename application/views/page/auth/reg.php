<h1>Регистрация</h1>
<center>
    <form action="<?php echo URL::base();?>auth/register" method="POST">
    <h2>Логин:</h2>
    <input type="text" name="login"><br/>
    <h2>Пароль:</h2>
    <input type="text" name="password">
    <h2>E-mail:</h2>
    <input type="text" name="email"><br/><br/>
    <input type="submit" value="Зарегистрировать">
</form>
</center>