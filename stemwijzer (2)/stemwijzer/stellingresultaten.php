<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Stemwijzer - Resultaten</title>
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

    .mode-switch {
      width: 50px;
      height: 50px;
      cursor: pointer;
      flex-shrink: 0;
    }

    body.dark-mode .logo,
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

    .nav-link:hover,
    .nav-link:focus {
      background-color: #626ba7;
    }

    .main {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
      min-height: 80vh;
      box-sizing: border-box;
    }

    .resultaten-box {
      background: white;
      border-radius: 10px;
      padding: 30px;
      max-width: 800px;
      width: 100%;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      box-sizing: border-box;
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
      box-sizing: border-box;
    }

    @media (max-width: 900px) {
      .main {
        padding: 20px 15px;
      }
      .resultaten-box {
        padding: 20px;
        max-width: 100%;
      }
    }

    @media (max-width: 600px) {
      .topbar {
        flex-direction: column;
        gap: 10px;
        align-items: center;
        padding: 10px 15px;
      }

      .nav-bar {
        justify-content: center;
        gap: 10px;
        padding: 10px 15px;
      }

      .nav-link {
        padding: 6px 12px;
        font-size: 14px;
      }

      .mode-switch {
        width: 40px;
        height: 40px;
      }

      .logo {
        height: 40px;
      }
    }

    @media (max-height: 500px) {
      footer {
        position: relative;
      }
      .main {
        min-height: auto;
        padding-bottom: 60px; 
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
  <a href="Reactiestemwijzer.php" class="nav-link">Reacties &gt;</a>
  <a href="overons.php" class="nav-link">Over ons &gt;</a>
  <a href="loginstart.php" class="nav-link">Inloggen &gt;</a>
  <a href="infopartijen.php" class="nav-link">Partijen &gt;</a>
  <a href="stellingstart.php" class="nav-link">Stemwijzer &gt;</a>
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

  
      $score = 0;

      for ($i = 0; $i < count($stellingen); $i++) {
        $nummer = $i + 1;
        $antwoord = isset($_GET["q$nummer"]) ? htmlspecialchars($_GET["q$nummer"]) : "Geen antwoord";

     
        if ($antwoord === "Eens") {
          $score++;
        } elseif ($antwoord === "Oneens") {
          $score--;
          if ($score < 0) {
            $score = 0; 
          }
        }

    
        echo "<div class='stelling-resultaat'>";
        echo "<h3>Stelling $nummer</h3>";
        echo "<p><strong>Stelling:</strong> {$stellingen[$i]}</p>";
        echo "<p><strong>Jouw antwoord:</strong> $antwoord</p>";
        echo "</div>";
      }


      $partij = "Onbekend";

      if ($score == 16) {
        $partij = "BBB";
      } elseif ($score == 17) {
        $partij = "BIJ1";
      } elseif ($score == 18) {
        $partij = "CDA";
      } elseif ($score == 19) {
        $partij = "ChristenUnie";
      } elseif ($score == 20) {
        $partij = "D66";
      } elseif ($score < 16) {
     
        $partijenLijst = ["DENK", "GroenLinks", "JA21", "PvdD", "PvdA", "PVV", "SGP", "SP", "VoltNL", "VVD"];
        $index = $score % count($partijenLijst);
        $partij = $partijenLijst[$index];
      }

      echo "<h3>Jouw geadviseerde partij is: <span style='color: #4a5278;'>$partij</span></h3>";
      echo "<p><strong>Totaal behaalde score: </strong> $score</p>";
    ?>
  </div>
</div>

<footer>
  Stemwijzer Neutraal kieslab © 2025. Alle rechten voorbehouden.
</footer>

<script>
  function toggleMode() {
    document.body.classList.toggle("dark-mode");
  }
</script>

</body>
</html>
