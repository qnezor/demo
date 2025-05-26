<form method="post" action="../php/register.php">
    <?php if (!empty($_GET['message'])): ?>
        <p><?= ($_GET['message']) ?></p>
    <?php endif; ?>
    <label for="fio">ФИО</label>
    <input type="text" name="fio" placeholder="Иванов Иван Иванович" required>
    <label for="login">Логин</label>
    <input type="text" name="login" placeholder="ivan_ivanov" required>
    <label for="email">Почта</label>
    <input type="email" name="email" placeholder="example@example.ru" required>
    <label for="tel">Телефон</label>
    <input type="tel" name="tel" placeholder="+79000000000" required>
    <label for="password">Пароль</label>
    <input type="password" name="password" placeholder="Пароль" required min="6">
    <button type="submit">Зарегистрироваться</button>
    <a href="authPage.php">Войти</a>
</form>