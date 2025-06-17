<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Stemwijzer - Stellingen</title>
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
      align-items: center;
      min-height: 80vh;
    }

    .stelling-box {
      background: white;
      border-radius: 10px;
      padding: 30px;
      max-width: 600px;
      width: 90%;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .stelling-box h2 {
      margin-top: 0;
    }

    body.dark-mode .stelling-box {
      background: #2c2c2c;
      color: white;
    }

    .stelling-box label {
      display: block;
      margin: 10px 0;
      cursor: pointer;
    }

    .nav-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }

    .nav-buttons button {
      padding: 10px 20px;
      background-color: var(--button-bg);
      color: var(--button-text-color);
      border: 1px solid #444;
      border-radius: 6px;
      cursor: pointer;
    }

    body.dark-mode .nav-buttons button {
      background-color: var(--button-bg-dark);
      color: var(--button-text-dark);
    }

    .nav-buttons button:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .resultaat-button {
      display: none;
      position: fixed;
      bottom: 60px;
      left: 50%;
      transform: translateX(-50%);
      padding: 15px 30px;
      font-size: 16px;
      background-color: green;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      z-index: 1000;
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
  <div class="stelling-box">
    <h2 id="stelling-titel">Stelling 1</h2>
    <p id="stelling-tekst">(Stellingtekst hier)</p>

    <form id="stelling-form">
      <label><input type="radio" name="keuze" value="Eens" onchange="antwoordGekozen()"> Eens</label>
      <label><input type="radio" name="keuze" value="Oneens" onchange="antwoordGekozen()"> Oneens</label>
      <label><input type="radio" name="keuze" value="Geen mening" onchange="antwoordGekozen()"> Geen mening</label>
    </form>

    <div class="nav-buttons">
      <button onclick="vorigeVraag()" id="terugBtn">← Terug</button>
      <button onclick="volgendeVraag()" id="volgendeBtn" disabled>Volgende →</button>
    </div>
  </div>
</div>


<footer>
  (Naam van het bedrijf) © 2025. Alle rechten voorbehouden.
</footer>

<script>
  const stellingen = [
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

  let huidigeVraag = 0;
  const antwoorden = Array(stellingen.length).fill(null);

  const titel = document.getElementById("stelling-titel");
  const tekst = document.getElementById("stelling-tekst");
  const form = document.getElementById("stelling-form");
  const terugBtn = document.getElementById("terugBtn");
  const volgendeBtn = document.getElementById("volgendeBtn");
  const resultaatBtn = document.getElementById("resultaatBtn");

  function toonVraag() {
    titel.textContent = "Stelling " + (huidigeVraag + 1);
    tekst.textContent = stellingen[huidigeVraag];

    const geselecteerd = antwoorden[huidigeVraag];
    [...form.elements].forEach(el => {
      el.checked = (el.value === geselecteerd);
    });

    terugBtn.disabled = huidigeVraag === 0;
    volgendeBtn.disabled = !geselecteerd;
  }

  function antwoordGekozen() {
    const geselecteerd = form.elements["keuze"].value;
    antwoorden[huidigeVraag] = geselecteerd;
    volgendeBtn.disabled = false;

    if (huidigeVraag === stellingen.length - 1) {
      resultaatBtn.style.display = "block";
    }
  }

function volgendeVraag() {
    if (huidigeVraag < stellingen.length - 1) {
        huidigeVraag++;
        toonVraag();
    } else {
        const bevestiging = confirm("Je hebt alle 20 stellingen beantwoord. Wil je nu je resultaten bekijken?");
        if (bevestiging) {
            const query = antwoorden.map((a, i) => `q${i + 1}=${encodeURIComponent(a || "")}`).join("&");
            window.location.href = `stellingresultaten.php?${query}`;
        }
    }
}


  function vorigeVraag() {
    if (huidigeVraag > 0) {
      huidigeVraag--;
      toonVraag();
      resultaatBtn.style.display = huidigeVraag === stellingen.length - 1 && antwoorden[huidigeVraag] ? "block" : "none";
    }
  }

  function toonResultaten() {
    const query = antwoorden.map((a, i) => `q${i + 1}=${encodeURIComponent(a || "")}`).join("&");
    window.location.href = `stellingresultaten.php?${query}`;
  }

  function toggleMode() {
    document.body.classList.toggle("dark-mode");
  }

  // Init
  toonVraag();
</script>

</body>
</html>
