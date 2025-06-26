<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR telefoon = ?");
    $stmt->execute([$email, $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['voornaam'] = $user['voornaam'];
        $_SESSION['toon_popup'] = true;

        header("Location: login.php");
        exit();
    } else {
        $login_error = "Ongeldige e-mail/telefoon of wachtwoord.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Stemwijzer</title>
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
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-family: inherit;
        }

        .nav-link:hover {
            background-color: #626a94;
        }

        .main {
            font-size: 20px;
            text-align: center;
            margin: 80px auto 10px;
            max-width: 600px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        label {
            font-size: 18px;
            display: block;
            margin-bottom: 4px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            max-width: 400px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #aaa;
            width: 100%;
            box-sizing: border-box;
            font-family: inherit;
        }

        button {
            margin-top: 10px;
            background-color: var(--button-bg);
            border: 1px solid #444;
            color: var(--button-text-color);
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-family: inherit;
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
            font-family: inherit;
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
            font-family: inherit;
        }
         @media (max-width: 768px) {
            .topbar, .nav-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
         }
            .nav-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                padding: 10px 15px;
                justify-content: center;
            }

            .nav-link {
                width: 100%;
                text-align: center;
                white-space: normal;
            }
    </style>
</head>
<body>

<div class="topbar">
  <img src="darklightmode2.png" class="mode-switch" onclick="toggleMode()" alt="Toggle Mode">
  <a href="Homepage.php"><img src="logostemwijzer1.png" class="logo" alt="Logo"></a>
</div>

<div class="nav-bar">
  <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
  <a href="overons.php" class="nav-link">Over ons ></a>
  <a href="loginstart.php" class="nav-link">Inloggen ></a>
  <a href="infopartijen.php" class="nav-link">Partijen ></a>
  <a href="stellingstart.php" class="nav-link">stemwijzer></a>
</div>

<a href="loginstart.php" class="back-button">&larr; Terug</a>

<div class="main">
    <?php if (isset($login_error)) echo "<p style='color:red;'>$login_error</p>"; ?>
    <form action="login.php" method="post">
        <div class="input-group">
            <label for="email">E-mail/Telefoon:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Inloggen</button>
    </form>
</div>

<footer>
    <div class="social-media">
        <a href="#" target="_blank"><img src="facebook.png" alt="Facebook"></a>
        <a href="#" target="_blank"><img src="instagram.png" alt="Instagram"></a>
        <a href="#" target="_blank"><img src="x.avif" alt="X / Twitter"></a>
        <a href="#" target="_blank"><img src="whatsapp.webp" alt="WhatsApp"></a>
        <span style="margin-left: 8px;">Social media's</span>
    </div>
    <p>(Stemwijzer Neutraal kieslab) © 2025. Alle rechten voorbehouden.</p>
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

    <?php if (isset($_SESSION['toon_popup']) && $_SESSION['toon_popup'] === true): ?>
    (function() {
        var welkomNaam = <?php echo json_encode($_SESSION['voornaam']); ?>;
        var welkomTekst = 'Welkom ' + welkomNaam + '! Wil je doorgaan naar de stemwijzer?';
        var doorgaan = confirm(welkomTekst);
        if (doorgaan) {
            window.location.href = 'Homepage.php';
        } else {

        }
    })();
    <?php unset($_SESSION['toon_popup']); endif; ?>
</script>

</body>
</html>
