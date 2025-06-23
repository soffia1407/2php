<?php
require 'functions.php';

$results = [];
if (isset($_GET['search'])) {
    $results = searchContacts($_GET['query']);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Поиск контактов</title>
</head>
<body>
    <h1>Поиск контактов</h1>
    <form method="GET">
        <input type="text" name="query" placeholder="Введите имя или телефон" required>
        <button type="submit" name="search">Искать</button>
    </form>

    <?php if (!empty($results)): ?>
        <h2>Результаты поиска:</h2>
        <table>
            <tr>
                <th>Тип</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Адрес</th>
                <th>Email</th>
                <th>Директор</th>
            </tr>
            <?php foreach ($results as $contact): ?>
                <tr>
                    <td><?= isset($contact['director']) ? 'Юр. лицо' : 'Физ. лицо' ?></td>
                    <td><?= htmlspecialchars($contact['name']) ?></td>
                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                    <td><?= htmlspecialchars($contact['address']) ?></td>
                    <td><?= htmlspecialchars($contact['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($contact['director'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($_GET['search'])): ?>
        <p>Ничего не найдено.</p>
    <?php endif; ?>

    <a href="index.php">На главную</a>
</body>
</html>