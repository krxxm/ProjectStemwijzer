<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            flex-wrap: wrap;
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
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-family: inherit;
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
            flex-wrap: wrap;
        }

        .social-media img {
            width: 20px;
            height: 20px;
        }

        .image-layout {
            padding: 40px 20px;
            background-color: #f5f5f5;
            text-align: center;
        }

        .main-image img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 40px;
            border: 2px solid #ccc;
        }

        .thumbnail-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 200px;
        }

        .thumbnail img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 2px solid #ccc;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .thumbnail img:hover {
            transform: scale(1.05);
        }

        .thumbnail p {
            margin-top: 10px;
            font-size: 16px;
            text-decoration: underline;
        }

        .image-info {
            background-color: #e0e0e0;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            color: #333;
            text-align: left;
        }

        body.dark-mode .image-info {
            background-color: #2c2c2c;
            color: #eee;
        }

        @media (max-width: 768px) {
            .topbar, .nav-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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
                margin: 30px 20px;
                font-size: 18px;
            }

            .main button,
            .button-link {
                width: 100%;
                box-sizing: border-box;
            }

            .thumbnail-row {
                flex-direction: column;
                align-items: center;
            }

            .thumbnail {
                width: 90%;
            }

            .thumbnail img {
                height: auto;
            }

            .main-image img {
                max-height: 200px;
            }

            .image-info {
                padding: 15px;
                margin: 10px;
                font-size: 14px;
            }

            footer {
                font-size: 10px;
                padding: 8px;
                position: static;
            }

            .social-media {
                flex-wrap: wrap;
                gap: 10px;
            }

            .social-media img {
                width: 24px;
                height: 24px;
            }

            .footer-links {
                display: flex;
                flex-direction: column;
                gap: 5px;
                align-items: center;
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
        <img src="logostemwijzer1.png" class="logo" alt="Logo" />
    </a>
</div>

<div class="nav-bar">
    <a href="Reactiestemwijzer.php" class="nav-link">Reacties ></a>
    <a href="overons.php" class="nav-link">Over ons ></a>
    <a href="loginstart.php" class="nav-link">Log in ></a>
    <a href="infopartijen.php" class="nav-link">Partijen ></a>
    <a href="stellingstart.php" class="nav-link">Stemwijzer ></a>
</div>

<main class="image-layout">
  <div class="main-image">
    <img id="mainImage" src="Mainphoto.svg" alt="Grote afbeelding" />
    <div class="image-info">
      <h2>Wat kunt u bij ons doen hoor ik u denken?</h2>
      <p>
        Hieronder kunt u kiezen uit opties die wij bieden om u te helpen bij het beslissen over welke partij u wilt kiezen.
        Klik op de afbeeldingen om door te gaan naar de gekozen pagina.
      </p>
    </div>
  </div>
  <div class="thumbnail-row">
    <div class="thumbnail">
      <a href="loginstart.php">
        <img src="thumb1.jpg" alt="Afbeelding 1" />
      </a>
      <h3>Een account aanmaken</h3>
    </div>
    <div class="thumbnail">
      <a href="stellingstart.php">
        <img src="thumb2.png" alt="Afbeelding 2" />
      </a>
      <h3>De stemwijzer invullen</h3>
    </div>
    <div class="thumbnail">
      <a href="infopartijen.php">
        <img src="thumb3.jpg" alt="Afbeelding 3" />
      </a>
      <h3>Huidige partijen bekijken</h3>
    </div>
  </div>
</main>

<footer>
    <div class="social-media">
        <a href="#" target="_blank">
            <img src="facebook.png" alt="Facebook" />
        </a>
        <a href="#" target="_blank">
            <img src="instagram.png" alt="Instagram" />
        </a>
        <a href="#" target="_blank">
            <img src="x.avif" alt="X / Twitter" />
        </a>
        <a href="#" target="_blank">
            <img src="whatsapp.webp" alt="WhatsApp" />
        </a>
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
