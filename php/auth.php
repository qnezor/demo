<?php
if (
    isset($_POST['login']) and !empty($_POST['login']) and
    isset($_POST['password']) and !empty($_POST['password'])
) {
    require_once "../db/connection.php";
    $stmt = $conn->prepare("SELECT login, password, role FROM users WHERE login = ? and password = ?");
    $stmt->execute([$_POST['login'], $_POST['password']]);
    $checkUser = $stmt->fetch();
    if (!$checkUser) {
        $Location = "../public/authPage.php?message=Неправильный логин или пароль!";
    } else {
        session_start();
        $_SESSION['login'] = $checkUser['login'];
        $_SESSION['role'] = $checkUser['role']; 
        $Location = "../index.php";
    }
    header("Location: $Location");
    exit();
}
?>