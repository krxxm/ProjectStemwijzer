<?php
$host = 'localhost';         // Of 127.0.0.1
$db   = 'stemwijzer';        // Vervang dit door de naam van jouw database
$user = 'root';              // Standaard bij XAMPP/WAMP/MAMP
$pass = '';                  // Leeg laten als je geen wachtwoord hebt ingesteld
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Foutmeldingen tonen
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Resultaten als associatieve array
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Voor echte prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
