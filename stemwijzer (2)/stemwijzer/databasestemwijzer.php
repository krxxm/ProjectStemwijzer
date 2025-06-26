<?php
$host = 'localhost';        // meestal localhost
$db   = 'stemwijzer';       // de naam van je database
$user = 'root';             // jouw database-gebruikersnaam (vaak 'root' bij XAMPP)
$pass = '';                 // wachtwoord (bij XAMPP meestal leeg)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // gooi foutmeldingen
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // fetch als associatieve array
    PDO::ATTR_EMULATE_PREPARES   => false,                  // echte prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
?>
