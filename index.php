<?php
session_start();
require_once "db/connection.php";
?>

<body>
    <?php if (empty($_SESSION['role']) and empty($_SESSION['email'])):?>
        <p>Пожалуйста, войдите в аккаунт или зарегистрируйтесь</p>
        <a href="public/authPage.php">Войти</a>
        <a href="public/registerPage.php">Зарегистрироваться</a>
    <?php elseif ($_SESSION['role'] == "user"):?>
        <a href="public/addRequest.php">Подать заявку</a>
        <a href="php/logout.php">Выйти</a>
        <hr>
        <p>Список ваших заявок</p>
        <hr></hr>
        <?php include "include/requestList.php" ?>
    <?php elseif ($_SESSION['role'] == "admin"):?>
        <a href="php/logout.php">Выйти</a>
        <hr>
        <p>Список всех заявок</p>
        <hr></hr>
        <?php include "include/requestList.php" ?>
    <?php endif; ?>
</body>