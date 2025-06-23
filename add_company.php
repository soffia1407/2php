<?php
require 'functions.php';

if (isset($_POST['add_company'])) {
    if (addCompany($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['director'])) {
        echo "<p class='success'>Юридическое лицо успешно добавлено!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Добавить юр. лицо</title>
</head>
<body>
    <h1>Добавить юридическое лицо</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Название компании" required>
        <input type="text" name="phone" placeholder="Телефон" required>
        <textarea name="address" placeholder="Адрес" required></textarea>
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="director" placeholder="ФИО директора" required>
        <button type="submit" name="add_company">Добавить</button>
    </form>
    <a href="index.php">На главную</a>
</body>
</html>