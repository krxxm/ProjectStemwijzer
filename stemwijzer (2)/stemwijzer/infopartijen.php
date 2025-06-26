<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Stemwijzer Login</title>
    <link rel="stylesheet" href="mystyle.css" />
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

        @font-face {
            font-family: 'Inter';
            src: url('Fonts/Inter/static/Inter-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Quicksand';
            src: url('Fonts/Quicksand/static/Quicksand-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        * {
            font-family: 'Quicksand', -apple-system, BlinkMacSystemFont, sans-serif;
            font-weight: 400;
            font-style: normal;
            line-height: 1.5;
            box-sizing: border-box;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-weight: 700;
            font-style: normal;
            margin: 0 0 0.5em 0;
        }

        strong, b, .bold {
            font-weight: 700;
            font-style: normal;
        }

        em, i, .italic {
            font-style: normal;
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
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: var(--topbar-bg);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid #ccc;
        }

        .logo {
            height: 50px;
        }

        body.dark-mode .logo {
            filter: invert(1) brightness(1.2);
        }

        .mode-switch {
            background-color: transparent;
            cursor: pointer;
            height: 50px;
            width: 50px;
            border: none;
        }

        body.dark-mode .mode-switch {
            filter: invert(1) brightness(1.2);
        }

        .nav-bar {
            background-color: var(--nav-bg);
            padding: 10px 15px;
            display: flex;
            gap: 20px;
            justify-content: flex-end;
            flex-wrap: wrap;
            border-bottom: 1px solid #444;
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            white-space: nowrap;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #626a94;
        }

        .main {
            flex: 1 0 auto;
            font-size: 20px;
            text-align: center;
            margin: 75px auto 30px auto;
            max-width: 1200px;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .button-link {
            display: inline-block;
            background-color: var(--button-bg);
            color: var(--button-text-color);
            padding: 10px 25px;
            margin: 10px;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            border: 1px solid #444;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-link:hover {
            background-color: #626a94;
        }

        body.dark-mode .button-link {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
            border: 1px solid #666;
        }

        footer {
            background-color: var(--footer-bg);
            padding: 10px 20px;
            font-size: 12px;
            color: var(--footer-text-color);
            text-align: center;
            flex-shrink: 0;
            /* fixed bottom for large screens */
            position: fixed;
            bottom: 0;
            width: 100%;
            box-sizing: border-box;
            border-top: 1px solid #ccc;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-bottom: 5px;
            flex-wrap: wrap;
        }

        .social-media img {
            width: 20px;
            height: 20px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 5px;
        }

        .footer-links a {
            color: var(--footer-text-color);
            text-decoration: none;
            font-size: 12px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .partijen-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            justify-items: center;
            padding: 30px 0;
        }

        .partij {
            text-align: center;
        }

        .partij img {
            width: 160px;
            height: auto;
            border-radius: 12px;
            cursor: pointer;
            transition: transform 0.3s ease;
            max-width: 100%;
            object-fit: contain;
        }

        .partij img:hover {
            transform: scale(1.05);
        }

        .partij p {
            margin-top: 8px;
            font-weight: bold;
            word-wrap: break-word;
        }

        #modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        #modal-content {
            background: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            text-align: center;
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
        }

        #modal img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
        }

        #modal h2 {
            margin-top: 10px;
            font-size: 24px;
        }

        #modal-description {
            margin-top: 10px;
            font-size: 16px;
        }

        #modal .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 10px;
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

            .main {
                margin: 40px 10px 30px 10px;
                font-size: 18px;
                padding: 0 10px;
            }

            .button-link {
                font-size: 14px;
                padding: 8px 20px;
            }

            .partij img {
                width: 100%;
                max-width: 250px;
            }

            .partijen-container {
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
                padding: 15px;
                gap: 20px;
            }

            footer {
                font-size: 10px;
                padding: 15px 10px;
                position: static;
                border-top: none;
            }

            .social-media {
                gap: 10px;
                justify-content: center;
            }

            .footer-links {
                flex-direction: column;
                align-items: center;
                gap: 5px;
                font-size: 10px;
            }

            #modal-content {
                font-size: 14px;
                max-width: 95%;
                max-height: 85vh;
            }

            #modal h2 {
                font-size: 20px;
            }

            #modal-description {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<?php
$host = 'localhost';
$db   = 'stemwijzer';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<div class="topbar">
  <img src="darklightmode2.png" class="mode-switch" onclick="toggleMode()" alt="Toggle Mode" />
  <a href="Homepage.php"><img src="logostemwijzer1.png" class="logo" alt="Logo" /></a>
</div>

<div class="nav-bar">
  <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
  <a href="overons.php" class="nav-link">Over ons &gt;</a>
  <a href="loginstart.php" class="nav-link">Inloggen &gt;</a>
  <a href="infopartijen.php" class="nav-link">Partijen &gt;</a>
  <a href="stellingstart.php" class="nav-link">stemwijzer&gt;</a>
</div>

<div class="background-container">
    <main class="main">
        <div class="partijen-container">
            <?php
            $stmt = $pdo->query("SELECT id, name, description FROM party");
            while ($row = $stmt->fetch()) {
                $naam = htmlspecialchars($row['name']);
                $beschrijving = htmlspecialchars($row['description']);
                $bestandsnaam = $naam . ".png";
                echo '
                    <div class="partij">
                        <img src="images/' . $bestandsnaam . '" alt="' . $naam . '" onclick="openModal(\'' . $bestandsnaam . '\', \'' . addslashes($naam) . '\', \'' . addslashes($beschrijving) . '\')" />
                        <p>' . $naam . '</p>
                    </div>
                ';
            }
            ?>
        </div>
    </main>
</div>

<footer>
    <div class="social-media">
        <a href="#" target="_blank"><img src="facebook.png" alt="Facebook" /></a>
        <a href="#" target="_blank"><img src="instagram.png" alt="Instagram" /></a>
        <a href="#" target="_blank"><img src="x.avif" alt="X" /></a>
        <a href="#" target="_blank"><img src="whatsapp.webp" alt="WhatsApp" /></a>
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

    function openModal(foto, titel, beschrijving) {
        document.getElementById("modal-img").src = "images/" + foto;
        document.getElementById("modal-title").innerText = titel;
        document.getElementById("modal-description").innerText = beschrijving;
        document.getElementById("modal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }
</script>

<div id="modal">
    <div id="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <img id="modal-img" src="" alt="" />
        <h2 id="modal-title"></h2>
        <p id="modal-description">Hier kun je informatie toevoegen over deze partij.</p>
    </div>
</div>

</body>
</html>
