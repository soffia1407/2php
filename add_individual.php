<?php
require 'functions.php';

if (isset($_POST['add_individual'])) {
    if (addIndividual($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email'])) {
        echo "<p class='success'>Физическое лицо успешно добавлено!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Добавить физ. лицо</title>
</head>
<body>
    <h1>Добавить физическое лицо</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="ФИО" required>
        <input type="text" name="phone" placeholder="Телефон" required>
        <textarea name="address" placeholder="Адрес" required></textarea>
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="add_individual">Добавить</button>
    </form>
    <a href="index.php">На главную</a>
</body>
</html>