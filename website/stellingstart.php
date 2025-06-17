<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Stemwijzer Start</title>
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
            font-family: Arial, sans-serif;
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
        }

        .nav-link:hover {
            background-color: #626a94;
        }

        .main {
            text-align: center;
            margin: 100px auto;
            max-width: 600px;
        }

        .main p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .button-link {
            display: inline-block;
            background-color: var(--button-bg);
            color: var(--button-text-color);
            padding: 12px 30px;
            border-radius: 10px;
            font-size: 18px;
            text-decoration: none;
            border: 1px solid #444;
            transition: background-color 0.3s ease, color 0.3s ease;
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
            padding: 10px;
            font-size: 12px;
            color: var(--footer-text-color);
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
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

        .footer-links a {
            color: blue;
            margin: 0 10px;
            text-decoration: none;
        }

        body.dark-mode .footer-links a {
            color: #a8cdfa;
        }
    </style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
    <img src="darklightmode2.png" class="mode-switch" alt="Switch Mode" onclick="toggleMode()">
    <a href="" class="logo-button">
        <img src="logostemwijzer1.png" class="logo" alt="Logo">
    </a>
</div>

<!-- Navbar -->
<div class="nav-bar">
    <a href="#" class="nav-link">over ons ></a>
    <a href="loginstart.php" class="nav-link">inloggen ></a>
    <a href="#" class="nav-link">partijen ></a>
    <a href="#" class="nav-link">? ></a>
</div>

<!-- Hoofdinhoud -->
<div class="main">
    <p>Welkom bij de stemwijzer. Klik op de knop hieronder om te starten met jouw stemadvies.</p>
    <a href="stellingvragen.php" class="button-link">Start Stemwijzer</a>
</div>

<!-- Footer -->
<footer>
    <div class="social-media">
        <a href="#"><img src="facebook.png" alt="Facebook"></a>
        <a href="#"><img src="instagram.png" alt="Instagram"></a>
        <a href="#"><img src="x.avif" alt="X / Twitter"></a>
        <a href="#"><img src="whatsapp.webp" alt="WhatsApp"></a>
        <span style="margin-left: 8px;">Social media's</span>
    </div>
    <p>(Naam van het bedrijf) © 2025. Alle rechten voorbehouden.</p>
    <div class="footer-links">
        <a href="#">Privacy</a>
        <a href="#">Colofon</a>
        <a href="#">Contact</a>
    </div>
</footer>

<!-- Script voor light/dark mode -->
<script>
    function toggleMode() {
        document.body.classList.toggle('dark-mode');
        const btn = document.querySelector('.mode-switch');
        btn.alt = document.body.classList.contains('dark-mode') ? "Light Mode" : "Dark Mode";
    }
</script>

</body>
</html>
