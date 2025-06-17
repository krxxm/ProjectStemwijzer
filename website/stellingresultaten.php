<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Stemwijzer - Resultaten</title>
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

    .mode-switch {
      width: 50px;
      height: 50px;
      cursor: pointer;
    }

    body.dark-mode .logo,
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

    .main {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
      min-height: 80vh;
    }

    .resultaten-box {
      background: white;
      border-radius: 10px;
      padding: 30px;
      max-width: 800px;
      width: 100%;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    body.dark-mode .resultaten-box {
      background: #2c2c2c;
      color: white;
    }

    .stelling-resultaat {
      margin-bottom: 20px;
      border-left: 5px solid #4a5278;
      padding-left: 15px;
    }

    .stelling-resultaat h3 {
      margin: 0 0 5px;
    }

    .stelling-resultaat p {
      margin: 0;
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
  </style>
</head>
<body>

<div class="topbar">
  <img src="darklightmode2.png" class="mode-switch" onclick="toggleMode()" alt="Toggle Mode">
  <a href=""><img src="logostemwijzer1.png" class="logo" alt="Logo"></a>
</div>

<div class="nav-bar">
  <a href="#" class="nav-link">Over ons ></a>
  <a href="#" class="nav-link">Inloggen ></a>
  <a href="#" class="nav-link">Partijen ></a>
  <a href="#" class="nav-link">? ></a>
</div>

<div class="main">
  <div class="resultaten-box">
    <h2>Jouw Antwoorden op de Stellingen</h2>
    <?php
      $stellingen = [
        "Onderwijs moet gratis zijn.",
        "De btw op groenten en fruit moet verdwijnen.",
        "Studenten moeten een basisbeurs krijgen.",
        "Meer geld naar defensie is nodig.",
        "Nederland moet uit de EU stappen.",
        "Vuurwerk moet verboden worden voor particulieren.",
        "Er moet een vleestaks komen.",
        "Asielzoekers moeten sneller mogen werken.",
        "De maximumsnelheid moet omlaag.",
        "Iedereen moet kunnen stemmen vanaf 16 jaar.",
        "Er moet meer geld naar klimaatbeleid.",
        "Zorgpremies moeten inkomensafhankelijk zijn.",
        "Er moet een boerensubsidie blijven.",
        "Verplichte vaccinaties bij pandemieën zijn goed.",
        "Belasting op vermogen moet omhoog.",
        "Kunst en cultuur moeten minder subsidie krijgen.",
        "Thuiswerken moet recht worden.",
        "Het koningshuis moet worden afgeschaft.",
        "Er moet meer geld naar openbaar vervoer.",
        "Studenten moeten hun OV-kaart langer mogen houden."
      ];

      for ($i = 0; $i < count($stellingen); $i++) {
        $nummer = $i + 1;
        $antwoord = isset($_GET["q$nummer"]) ? htmlspecialchars($_GET["q$nummer"]) : "Geen antwoord";
        echo "<div class='stelling-resultaat'>";
        echo "<h3>Stelling $nummer</h3>";
        echo "<p><strong>Stelling:</strong> {$stellingen[$i]}</p>";
        echo "<p><strong>Jouw antwoord:</strong> $antwoord</p>";
        echo "</div>";
      }
    ?>
  </div>
</div>

<footer>
  (Naam van het bedrijf) © 2025. Alle rechten voorbehouden.
</footer>

<script>
  function toggleMode() {
    document.body.classList.toggle("dark-mode");
  }
</script>

</body>
</html>
