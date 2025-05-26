<?php
if (isset($_GET['id']) and !empty($_GET['id'])) {
    require_once "../db/connection.php";
    $stmt = $conn -> prepare("UPDATE requests SET status = ?, reject = ? WHERE id = ?");
    $stmt -> execute([$_POST['changeStatus'], $_POST['rejectStatus'], $_GET['id']]);
    header("Location: ../index.php");
    exit();
}
?>