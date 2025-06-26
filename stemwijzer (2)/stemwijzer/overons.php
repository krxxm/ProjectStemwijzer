<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemwijzer Login</title>
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
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-weight: 700;
            font-style: normal;
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
            transition: background-color 0.3s ease;
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
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
        }

        body.dark-mode .main button {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
            border: 1px solid #666;
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
        }

        .social-media img {
            width: 20px;
            height: 20px;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 75px;
            padding: 20px;
        }

        .block {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            min-height: 150px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 30px;
        }

        body.dark-mode .block {
            background-color: #333;
            color: white;
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
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 10px;
            }

            .main-grid {
                grid-template-columns: 1fr;
                margin: 20px;
                padding: 10px;
            }

            .block {
                font-size: 18px;
                padding: 15px;
            }

            .main button,
            .button-link {
                width: 100%;
                padding: 12px;
                font-size: 18px;
                margin: 8px 0;
            }

            footer {
                font-size: 10px;
                padding: 8px;
            }

            .social-media {
                flex-wrap: wrap;
                gap: 6px;
            }

            .social-media img {
                width: 18px;
                height: 18px;
            }

            .logo {
                height: 40px;
            }

            .mode-switch {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>

<div class="topbar">
    <img src="darklightmode2.png" 
         class="mode-switch" 
         alt="Switch Mode" 
         onclick="toggleMode()">

    <a href="Homepage.php" class="logo-button">
        <img src="logostemwijzer1.png" class="logo" alt="Logo">
    </a>
</div>

<div class="nav-bar">
    <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
    <a href="overons.php" class="nav-link">Over ons</a>
    <a href="loginstart.php" class="nav-link">Log in</a>
    <a href="infopartijen.php" class="nav-link">Partijen</a>
    <a href="stellingstart.php" class="nav-link">Stemwijzer</a>
</div>

  <main class="main-grid">
    <div class="block">Onze nummer 1 prioriteit is het helpen van mensen bij het vinden van een partij waar zij op kunnen stemmen. Wij bieden dan ook een stemwijzer waardoor het beslissen een stuk makkelijker wordt.</div>
    <div class="block">Maar uiteraard niet alleen het helpen met vinden van een partij voor u maar ook ervoor zorgen dat u weet waar u op stemt. dat is minstens zo belangrijk voor ons .</div>
    <div class="block">De StemWijzer begon in 1989 als een boekje waarin kiezers door middel van 60 citaten uit verkiezingsprogramma’s en een puntentabel zelf konden uitrekenen met welke partij ze de meeste overeenkomst hadden. Bij de Provinciale Statenverkiezingen van 1991 werd door Zuid-Holland de StemWijzer op een floppy uitgebracht.

Vanaf 2002 speelde het internet een steeds grotere rol bij de verkiezingen, wat de doorbraak voor de StemWijzer betekende. Op verkiezingsdag hadden 2 miljoen mensen de StemWijzer ingevuld.

In 2019 werd de StemWijzer ruim 1,6 miljoen keer geraadpleegd bij de verkiezing voor het Europees Parlement. Bij de Tweede Kamerverkiezing 2023 ruim 9,1 miljoen keer.</div>
    <div class="block">De StemWijzer begon in 1989 als een boekje waarin kiezers door middel van 60 citaten uit verkiezingsprogramma’s en een puntentabel zelf konden uitrekenen met welke partij ze de meeste overeenkomst hadden. Bij de Provinciale Statenverkiezingen van 1991 werd door Zuid-Holland de StemWijzer op een floppy uitgebracht.

Vanaf 2002 speelde het internet een steeds grotere rol bij de verkiezingen, wat de doorbraak voor de StemWijzer betekende. Op verkiezingsdag hadden 2 miljoen mensen de StemWijzer ingevuld.

In 2019 werd de StemWijzer ruim 1,6 miljoen keer geraadpleegd bij de verkiezing voor het Europees Parlement. Bij de Tweede Kamerverkiezing 2023 ruim 9,1 miljoen keer.</div>
</main>

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


