<form method="post" action="../php/request.php">
    <label for="date">Дата</label>
    <input name="date" type="date" required>
    <label for="time">Время</label>
    <input name="time" type="time" required>
    <label for="address">Адрес</label>
    <select name="address">
        <option value="Кузнецова, 3А">Кузнецова, 3А</option>
        <option value="Саратов, 14">Саратов, 14</option>
    </select>
    <button type="submit">Подать заявку</button>
</form>