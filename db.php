<?php
$host = 'localhost';  // Оставляем как есть
$db = 'mvc';          // Ваше имя базы данных
$user = 'root';       // Ваш пользователь
$pass = '';           // Пустой пароль (как в вашем конфиге)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Для корректной работы с русскими символами:
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>