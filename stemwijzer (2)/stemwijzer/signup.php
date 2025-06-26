<?php
session_start();
require 'db_connect.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voornaam = trim($_POST['voornaam'] ?? '');
    $achternaam = trim($_POST['achternaam'] ?? '');
    $wachtwoord = $_POST['wachtwoord'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $telefoon = trim($_POST['telefoon'] ?? '');
    $adres = trim($_POST['adres'] ?? '');
    $postcode = trim($_POST['postcode'] ?? '');

    if (!$voornaam || !$achternaam || !$wachtwoord || !$email) {
        $error = "Vul minimaal voornaam, achternaam, wachtwoord en e-mail in.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ongeldig e-mailadres.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR telefoon = ?");
        $stmt->execute([$email, $telefoon]);
        if ($stmt->fetch()) {
            $error = "E-mail of telefoonnummer is al geregistreerd.";
        } else {
            $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (voornaam, achternaam, email, telefoon, adres, postcode, wachtwoord) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $result = $stmt->execute([$voornaam, $achternaam, $email, $telefoon, $adres, $postcode, $hash]);

            if ($result) {
                $success = "Account succesvol aangemaakt! Je kunt nu <a href='login.php'>inloggen</a>.";
            } else {
                $error = "Er is iets misgegaan, probeer het opnieuw.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Account Aanmaken - Stemwijzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: rgb(228, 228, 228);
            --text-color: #000;
            --nav-bg: #2f314d;
            --footer-bg: #909bb1;
            --footer-text-color: black;
            --topbar-bg: #fff;
            --button-bg: #909bb1;
            --button-text-color: white;
            --button-bg-dark: #444c6e;
            --button-text-dark: #eee;
        }
        body.dark-mode {
            --bg-color: #1e1e1e;
            --text-color: #fff;
            --nav-bg: #2d2f40;
            --footer-bg: #2d2f40;
            --footer-text-color: #fff;
            --topbar-bg: #222;
        }
        body {
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .topbar {
            background-color: var(--topbar-bg);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            height: 50px;
        }
        body.dark-mode .logo {
            filter: invert(1) brightness(1.2);
        }
        .mode-switch {
            padding: 6px 14px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            height: 50px;
            width: 50px;
        }
        body.dark-mode .mode-switch {
            filter: invert(1) brightness(1.2);
        }
        .nav-bar {
            background-color: var(--nav-bg);
            padding: 15px;
            display: flex;
            gap: 20px;
            justify-content: right;
            flex-wrap: wrap;
        }
        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
        }
        .nav-link:hover {
            background-color: #626a94;
        }
        .main {
            font-size: 20px;
            text-align: center;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
        }
        form label {
            width: 100%;
            max-width: 400px;
            text-align: left;
        }
        .form-row {
            display: flex;
            gap: 10px;
            justify-content: center;
            width: 100%;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"] {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #aaa;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }
        .form-row input {
            width: 48%;
        }
        button {
            background-color: var(--button-bg);
            border: 1px solid #444;
            color: var(--button-text-color);
            padding: 5px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Quicksand', sans-serif;
        }
        body.dark-mode button {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
        }
        footer {
            background-color: var(--footer-bg);
            padding: 10px;
            font-size: 12px;
            color: var(--footer-text-color);
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .footer-links a {
            color: blue;
            margin: 0 10px;
            text-decoration: none;
        }
        body.dark-mode .footer-links a {
            color: #a8cdfa;
        }
        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
            margin-top: 5px;
        }
        .social-media img {
            width: 20px;
            height: 20px;
        }
        .back-button {
            display: inline-block;
            margin: 20px;
            background-color: var(--button-bg);
            color: var(--button-text-color);
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #727c99;
        }
        body.dark-mode .back-button {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
        }
        .popup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            z-index: 9999;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            animation: fadeIn 0.4s ease-out;
        }
        .popup-success {
            background-color: #4CAF50;
            color: white;
        }
        .popup-error {
            background-color: #f44336;
            color: white;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, -20px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
            .form-row input {
                width: 100%;
            }
            .nav-bar {
                justify-content: center;
            }
            .back-button {
                display: block;
                margin: 20px auto;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="topbar">
    <img src="darklightmode2.png" class="mode-switch" alt="Switch Mode" onclick="toggleMode()">
    <a href="" class="logo-button">
        <img src="logostemwijzer1.png" class="logo" alt="Logo">
    </a>
</div>

<div class="nav-bar">
    <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
    <a href="" class="nav-link">Over ons &gt;</a>
    <a href="loginstart.php" class="nav-link">Inloggen &gt;</a>
    <a href="" class="nav-link">Partijen &gt;</a>
    <a href="stellingstart.php" class="nav-link">Stemwijzer &gt;</a>
</div>

<a href="loginstart.php" class="back-button">&larr; Terug</a>

<?php if ($error): ?>
    <div class="popup popup-error" id="popup"><?= htmlspecialchars($error) ?></div>
<?php elseif ($success): ?>
    <div class="popup popup-success" id="popup"><?= $success ?></div>
<?php endif; ?>

<div class="main">
    <h2>Account Aanmaken</h2>

    <form method="post" action="signup.php" novalidate>
        <div class="form-row">
            <input type="text" name="voornaam" placeholder="Voornaam" required value="<?= htmlspecialchars($_POST['voornaam'] ?? '') ?>">
            <input type="text" name="achternaam" placeholder="Achternaam" required value="<?= htmlspecialchars($_POST['achternaam'] ?? '') ?>">
        </div>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
        <input type="email" name="email" placeholder="E-mail" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <input type="tel" name="telefoon" placeholder="Telefoon" value="<?= htmlspecialchars($_POST['telefoon'] ?? '') ?>">
        <input type="text" name="adres" placeholder="Adres" value="<?= htmlspecialchars($_POST['adres'] ?? '') ?>">
        <input type="text" name="postcode" placeholder="Postcode" value="<?= htmlspecialchars($_POST['postcode'] ?? '') ?>">
        <button type="submit">Aanmaken</button>
    </form>
</div>

<footer>
    <div class="social-media">
        <a href=""><img src="facebook.png" alt="Facebook"></a>
        <a href=""><img src="instagram.png" alt="Instagram"></a>
        <a href=""><img src="x.avif" alt="X / Twitter"></a>
        <a href=""><img src="whatsapp.webp" alt="WhatsApp"></a>
        <span style="margin-left: 8px;">Social media's</span>
    </div>
    <p>Stemwijzer Neutraal kieslab © 2025. Alle rechten voorbehouden.</p>
    <div class="footer-links">
        <a href="https://home.stemwijzer.nl/privacy/">Privacy</a>
        <a href="https://home.stemwijzer.nl/colofon/">Colofon</a>
        <a>Contact: info@stemwijzer.nl</a>
    </div>
</footer>

<script>
    function toggleMode() {
        document.body.classList.toggle('dark-mode');
        const btn = document.querySelector('.mode-switch');
        btn.alt = document.body.classList.contains('dark-mode') ? "Light Mode" : "Dark Mode";
    }
    window.addEventListener('load', () => {
        const popup = document.getElementById('popup');
        if (popup) {
            setTimeout(() => {
                popup.style.display = 'none';
            }, 4000);
        }
    });
</script>

</body>
</html>
