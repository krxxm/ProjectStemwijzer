<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title>Stemwijzer Start</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            padding: 15px 20px;
            display: flex;
            gap: 20px;
            justify-content: flex-end;
            flex-wrap: wrap;
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
            text-align: center;
            margin: 100px auto;
            max-width: 600px;
            padding: 0 15px;
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
            padding: 10px 20px;
            font-size: 12px;
            color: var(--footer-text-color);
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-sizing: border-box;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-bottom: 5px;
            flex-wrap: wrap;
        }

        .social-media img {
            width: 20px;
            height: 20px;
        }

        .footer-links {
            margin-top: 5px;
        }

        .footer-links a {
            color: blue;
            margin: 0 10px;
            text-decoration: none;
            white-space: nowrap;
            display: inline-block;
        }

        body.dark-mode .footer-links a {
            color: #a8cdfa;
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .nav-bar {
                justify-content: center;
                gap: 12px;
            }

            .main {
                margin: 60px auto;
            }

            .main p {
                font-size: 18px;
            }

            .button-link {
                padding: 10px 24px;
                font-size: 16px;
            }

            footer {
                font-size: 11px;
                padding: 10px 15px;
            }

            .footer-links a {
                margin: 0 6px;
            }

            .social-media {
                gap: 6px;
            }
        }

        @media (max-width: 480px) {
            .nav-bar {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .nav-link {
                width: 90%;
                text-align: center;
                white-space: normal;
            }

            .topbar {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .mode-switch, .logo {
                margin-bottom: 0;
            }

            .main p {
                font-size: 16px;
            }

            .button-link {
                padding: 10px 20px;
                font-size: 14px;
            }

            footer {
                font-size: 10px;
                padding: 8px 10px;
            }

            .footer-links a {
                display: block;
                margin: 4px 0;
            }

            .social-media {
                justify-content: center;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<div class="topbar">
  <img src="darklightmode2.png" class="mode-switch" onclick="toggleMode()" alt="Toggle Mode" />
  <a href="Homepage.php"><img src="logostemwijzer1.png" class="logo" alt="Logo" /></a>
</div>

<div class="nav-bar">
  <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
  <a href="overons.php" class="nav-link">Over ons ></a>
  <a href="loginstart.php" class="nav-link">Inloggen ></a>
  <a href="infopartijen.php" class="nav-link">Partijen ></a>
  <a href="stellingstart.php" class="nav-link">Stemwijzer ></a>
</div>

<div class="main">
    <p>Welkom bij de stemwijzer. Klik op de knop hieronder om te starten met jouw stemadvies.</p>
    <a href="stellingvragen.php" class="button-link">Start Stemwijzer</a>
</div>

<footer>
    <div class="social-media">
        <a href="#" target="_blank"><img src="facebook.png" alt="Facebook" /></a>
        <a href="#" target="_blank"><img src="instagram.png" alt="Instagram" /></a>
        <a href="#" target="_blank"><img src="x.avif" alt="X / Twitter" /></a>
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
</script>

</body>
</html>
