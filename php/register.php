<?php
if (
    isset($_POST['fio']) and !empty($_POST['fio']) and
    isset($_POST['login']) and !empty($_POST['login']) and
    isset($_POST['email']) and !empty($_POST['email']) and
    isset($_POST['tel']) and !empty($_POST['tel']) and
    isset($_POST['password']) and !empty($_POST['password'])
) {
    require_once "../db/connection.php";
    $stmt = $conn->prepare("SELECT login FROM users WHERE login = ?");
    $stmt->execute([$_POST['login']]);
    $checkUser = $stmt->fetch();
    if (!$checkUser) {
        $conn->prepare("INSERT INTO users (fio, login, email, phone, password) VALUES (?, ?, ?, ?, ?)")->execute([$_POST['fio'], $_POST['login'], $_POST['email'], $_POST['tel'], $_POST['password']]);
        $Location = "../public/authPage.php?message=Регистрация прошла успешно! Можете войти!";
    } else {
        $Location = "../public/registerPage.php?message=Пользователь уже существует!";
    }
    header("Location: $Location");
    exit();
}
?>