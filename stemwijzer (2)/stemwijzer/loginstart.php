<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Stemwijzer Login</title>
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
            transition: background-color 0.3s ease;
        }

        .logo {
            height: 50px;
            transition: filter 0.3s ease;
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
            transition: filter 0.3s ease;
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
            transition: background-color 0.3s ease;
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-family: inherit;
            transition: background-color 0.3s ease;
            white-space: nowrap;
        }

        .nav-link:hover {
            background-color: #626a94;
        }

        .main {
            font-size: 20px;
            text-align: center;
            margin: 75px;
        }

        .main button {
            background-color: var(--button-bg);
            border: 1px solid #444;
            color: var(--button-text-color);
            padding: 10px 25px;
            margin: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: inherit;
        }

        body.dark-mode .main button {
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
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: inherit;
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
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: inherit;
        }

        .button-link:hover {
            background-color: #626a94;
        }

        body.dark-mode .button-link {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
            border: 1px solid #666;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
            margin-top: 5px;
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
        }

        .footer-links a {
            text-decoration: none;
            color: var(--footer-text-color);
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .nav-bar {
                justify-content: center;
                gap: 10px;
            }

            .main {
                margin: 30px 15px;
                font-size: 18px;
            }

            .main p {
                font-size: 16px;
            }

            .main button, .button-link {
                width: 80%;
                max-width: 250px;
            }
        }

        @media (max-width: 480px) {
            .nav-bar {
                flex-direction: column;
                align-items: center;
            }

            .main {
                margin: 20px 10px;
                font-size: 16px;
            }

            .main p {
                font-size: 14px;
            }

            .main button, .button-link {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="topbar">
    <img src="darklightmode2.png" class="mode-switch" onclick="toggleMode()" alt="Toggle Mode">
    <a href="Homepage.php"><img src="logostemwijzer1.png" class="logo" alt="Logo"></a>
</div>

<div class="nav-bar">
    <a href="Reactiestemwijzer.php" class="nav-link">Reacties ></a>
    <a href="overons.php" class="nav-link">Over ons ></a>
    <a href="loginstart.php" class="nav-link">Inloggen ></a>
    <a href="infopartijen.php" class="nav-link">Partijen ></a>
    <a href="stellingstart.php" class="nav-link">Stemwijzer ></a>
</div>

<div class="main">
    <h2>Welkom bij de Stemwijzer</h2>
    <p style="max-width: 600px; margin: 0 auto 25px;">
        Om gebruik te maken van de stemwijzer, moet je ingelogd zijn met een account.
        Heb je nog geen account? Klik dan op <strong>'Account aanmaken'</strong> om je snel te registreren.
        Heb je al een account? Klik dan op <strong>'Login'</strong> om in te loggen en je voorkeuren te bekijken.
    </p>
    <div class="main">
        <form>
            <a href="signup.php" class="button-link">Account aanmaken</a>
            <a href="login.php" class="button-link">Inloggen</a>
        </form>
    </div>
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
</script>
</body>
</html>
