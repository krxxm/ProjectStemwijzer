<?php
session_start();

$host = 'localhost';
$db = 'stemwijzer';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Databaseverbinding mislukt: " . $conn->connect_error);
}

if (isset($_GET['verwijder'])) {
    $id = intval($_GET['verwijder']);
    $conn->query("DELETE FROM reacties WHERE id = $id");
    header("Location: reactiestemwijzer.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $update_id = intval($_POST['update_id']);
    $nieuwe_titel = $conn->real_escape_string($_POST['nieuwe_titel']);
    $nieuwe_inhoud = $conn->real_escape_string($_POST['nieuwe_inhoud']);
    $voornaam = $_SESSION['voornaam'] ?? '';

    $controle_query = $conn->query("SELECT * FROM reacties WHERE id = $update_id AND username = '$voornaam'");
    if ($controle_query->num_rows === 1) {
        $conn->query("UPDATE reacties SET titel = '$nieuwe_titel', inhoud = '$nieuwe_inhoud' WHERE id = $update_id");
        header("Location: reactiestemwijzer.php");
        exit;
    } else {
        echo "<script>alert('Je mag alleen je eigen reactie bewerken.');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titel'], $_POST['inhoud']) && !isset($_POST['update_id'])) {
    if (isset($_SESSION['voornaam'])) {
        $titel = $conn->real_escape_string($_POST['titel']);
        $inhoud = $conn->real_escape_string($_POST['inhoud']);
        $voornaam = $conn->real_escape_string($_SESSION['voornaam']);
        if (!empty($titel) && !empty($inhoud)) {
            $conn->query("INSERT INTO reacties (titel, inhoud, username) VALUES ('$titel', '$inhoud', '$voornaam')");
            header("Location: reactiestemwijzer.php");
            exit;
        }
    } else {
        echo "<script>alert('Je moet ingelogd zijn om een reactie te plaatsen.');</script>";
    }
}

$result = $conn->query("SELECT * FROM reacties ORDER BY id DESC");
$bewerken_id = isset($_GET['bewerken']) ? intval($_GET['bewerken']) : null;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reacties Stemwijzer</title>
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

        body.dark-mode .reactie {
            color: black;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        .content {
            flex: 1 0 auto;
            padding: 20px;
        }

        footer {
            flex-shrink: 0;
            background-color: var(--footer-bg);
            padding: 10px;
            font-size: 12px;
            color: var(--footer-text-color);
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .topbar, .nav-bar, footer {
            transition: background-color 0.3s ease;
        }

        .topbar {
            background-color: var(--topbar-bg);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
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
            flex-shrink: 0;
        }

        body.dark-mode .mode-switch {
            filter: invert(1) brightness(1.2);
        }

        .nav-bar {
            background-color: var(--nav-bg);
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-link {
            background-color: #4a5278;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            white-space: nowrap;
        }

        .nav-link:hover {
            background-color: #626a94;
        }

        .main {
            max-width: 700px;
            margin: 0 auto;
            font-size: 20px;
            text-align: center;
        }

        .reactie {
            background: #f2f2f2;
            border-radius: 12px;
            padding: 15px;
            margin: 15px auto;
            max-width: 500px;
            text-align: left;
            box-shadow: 0 1px 5px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode .reactie {
            background: #333;
            color: white;
        }

        .form-container {
            max-width: 500px;
            margin: 40px auto 0;
            text-align: left;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border-radius: 8px;
            border: 1px solid #909bb1;
            font-size: 16px;
            box-sizing: border-box;
            resize: vertical;
        }

        .button-link, .main button {
            background-color: var(--button-bg);
            color: var(--button-text-color);
            padding: 10px 25px;
            border-radius: 8px;
            border: 1px solid #444;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode .button-link, body.dark-mode .main button {
            background-color: var(--button-bg-dark);
            color: var(--button-text-dark);
            border: 1px solid #666;
        }

        .delete-button {
            background-color: #d9534f;
            color: white;
            border: 0.5px solid #a94442;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 5px;
            transition: background-color 0.3s ease;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .social-media img {
            width: 20px;
            height: 20px;
        }

        .footer-links {
            margin-top: 6px;
        }

        .footer-links a {
            color: var(--footer-text-color);
            text-decoration: none;
            margin: 0 8px;
            font-size: 12px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .nav-bar {
                justify-content: center;
                gap: 10px;
            }

            .main {
                padding: 20px 15px;
                font-size: 18px;
            }

            .reactie {
                max-width: 100%;
                margin: 10px 10px;
            }

            .form-container {
                max-width: 100%;
                margin: 20px 10px 0;
            }
        }

        @media (max-width: 400px) {
            .mode-switch {
                height: 40px;
                width: 40px;
            }

            .logo {
                height: 40px;
            }

            .nav-link {
                padding: 6px 10px;
                font-size: 14px;
            }

            input[type="text"], textarea {
                font-size: 14px;
            }

            .button-link, .main button {
                padding: 8px 20px;
                font-size: 14px;
            }

            .delete-button {
                padding: 3px 8px;
                font-size: 11px;
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
  <a href="overons.php" class="nav-link">Over ons ></a>
  <a href="loginstart.php" class="nav-link">Inloggen ></a>
  <a href="infopartijen.php" class="nav-link">Partijen ></a>
  <a href="stellingstart.php" class="nav-link">stemwijzer ></a>
</div>

<div class="content">
    <div class="main">

        <h2>Reacties</h2>

 <?php while ($row = $result->fetch_assoc()): ?>
    <div class="reactie">
        <strong><?= htmlspecialchars($row['titel']) ?></strong><br><br>
        <?= nl2br(htmlspecialchars($row['inhoud'])) ?><br><br>
        <em>Geplaatst door: <?= htmlspecialchars($row['username'] ?? 'Onbekend') ?></em><br>

        <?php if (isset($_SESSION['voornaam']) && $_SESSION['voornaam'] === $row['username']): ?>
            <form method="get" onsubmit="return confirm('Weet je zeker dat je deze reactie wilt verwijderen?');" style="margin-top: 8px;">
                <input type="hidden" name="verwijder" value="<?= $row['id'] ?>">
                <button type="submit" class="delete-button">Verwijder</button>
            </form>

            <form method="post" style="margin-top: 8px;">
                <input type="hidden" name="update_id" value="<?= $row['id'] ?>">
                <input type="text" name="nieuwe_titel" value="<?= htmlspecialchars($row['titel']) ?>" required><br>
                <textarea name="nieuwe_inhoud" rows="4" required><?= htmlspecialchars($row['inhoud']) ?></textarea><br>
                <button type="submit" name="update" class="delete-button" style="background-color: #337ab7;">wijzigen</button>
            </form>
        <?php endif; ?>
    </div>
<?php endwhile; ?>


        <?php if (isset($_SESSION['voornaam'])): ?>
        <div class="form-container">
            <h3>Voeg een reactie toe</h3>
            <form method="post">
                <label for="titel">Titel:</label><br>
                <input type="text" name="titel" id="titel" required><br>

                <label for="inhoud">Inhoud:</label><br>
                <textarea name="inhoud" id="inhoud" rows="5" required></textarea><br>

                <button type="submit">Plaats reactie</button>
            </form>
        </div>
        <?php else: ?>
            <p style="color: red;">Je bent niet ingelogd. Reacties plaatsen is alleen mogelijk na inloggen.</p>
        <?php endif; ?>
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
