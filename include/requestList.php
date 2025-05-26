<?php
require_once "db/connection.php";
if ($_SESSION['role'] == "user") {
    $stmt = $conn->prepare("SELECT  id, login, date, time, address, status, reject FROM requests WHERE login = ? ORDER BY id DESC");
    $stmt->execute([$_SESSION['login']]);
} elseif ($_SESSION['role'] == "admin") {
    $stmt = $conn->prepare("SELECT id, login, date, time, address, status, reject FROM requests ORDER BY id DESC");
    $stmt->execute();
}
$allRequests = $stmt->fetchAll();
?>

<body>
    <?php if (empty($allRequests)): ?>
        <p>Заявки отсутсвуют</p>
    <?php else: ?>
        <?php foreach ($allRequests as $Request): ?>
            <p>Номер заявки: <?= ($Request['id']) ?></p>
            <?php if ($_SESSION['role'] == "admin"): ?>
                <p>Автор заявки: <?= ($Request['login']) ?></p>
            <?php endif; ?>
            <p>Дата: <?= ($Request['date']) ?></p>
            <p>Время: <?= ($Request['time']) ?></p>
            <p>Адрес сервиса: <?= ($Request['address']) ?></p>
            <p>Текущий статус заявки: <?= ($Request['status']) ?></p>
            <?php if ($_SESSION['role'] == "admin"): ?>
                <?php if ($Request['status'] == "На рассмотрении"): ?>
                    <form action="php/changeStatus.php?id=<?=($Request['id'])?>" method="POST">
                        <label for="changeStatus">Изменить статус</label>
                        <select name="changeStatus" class="selectStatus">
                            <option value="Одобрено">Одобрено</option>
                            <option value="Отказано">Отказано</option>
                        </select>
                        <input class="rejectStatus" name="rejectStatus" type="text" name="reject" value="Причина отказа" style="display: none;">
                        <button type="submit">Поменять статус</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($Request['status'] == "Отказано"): ?>
                <p>Причина отказа: <?= ($Request['reject']) ?></p>
            <?php endif; ?>
            <hr>
            </hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

<script src="js/script.js"></script>