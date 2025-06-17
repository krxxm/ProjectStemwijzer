<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Stemwijzer</title>
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
    <a href="" class="nav-link">over ons ></a>
    <a href="loginstart.php" class="nav-link">inloggen ></a>
    <a href="" class="nav-link">partijen ></a>
    <a href="" class="nav-link">? ></a>
</div>
<a href="loginstart.php" class="back-button">&larr; Terug</a> <!-- 👈 Terugknop hier -->
<div class="main">
    <form action="loginstart.php" method="post">
        <div class="input-group">
            <label for="email">E-mail/Telefoon:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
        </div>
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
    <p>(Naam van het bedrijf) © 2025. Alle rechten voorbehouden.</p>
    <div class="footer-links">
        <a href="">Privacy</a>
        <a href="">Colofon</a>
        <a href="">Contact</a>
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
