<?php
require 'db.php';

// Добавление физического лица
function addIndividual($name, $phone, $address, $email) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO individuals (name, phone, address, email) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $phone, $address, $email]);
}

// Добавление юридического лица
function addCompany($name, $phone, $address, $email, $director) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO companies (name, phone, address, email, director) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$name, $phone, $address, $email, $director]);
}

// Поиск контактов
function searchContacts($query) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM individuals WHERE name LIKE ? OR phone LIKE ?
                           UNION
                           SELECT id, name, phone, address, email, NULL as director FROM companies WHERE name LIKE ? OR phone LIKE ?");
    $search = "%$query%";
    $stmt->execute([$search, $search, $search, $search]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>