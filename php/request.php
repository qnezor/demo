<?php
if (
    isset($_POST['date']) and !empty($_POST['date']) and
    isset($_POST['time']) and !empty($_POST['time']) and
    isset($_POST['address']) and !empty($_POST['address'])
) {
    session_start();
    require_once "../db/connection.php";
    $conn -> prepare("INSERT INTO requests (login, date, time, address) VALUES (?, ?, ?, ?)") -> execute([$_SESSION['login'], $_POST['date'], $_POST['time'], $_POST['address']]);
    header("Location: ../index.php");
}
?>