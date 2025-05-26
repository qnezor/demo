<form method="post" action="../php/auth.php">
    <?php if (!empty($_GET['message'])):?>
        <p><?=($_GET['message'])?></p>
    <?php endif;?>
    <label for="login">Логин</label>
    <input type="login" name="login" placeholder="ivan_ivanov" required>
    <label for="password">Пароль</label>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Войти</button>
    <a href="registerPage.php">Зарегистрироваться</a>
</form>