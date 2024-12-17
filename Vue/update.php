<?php
include_once './Modele/Session.php';

$sessionModel = new Session();
$sessionToUpdate = null;

// Vérification si une session est demandée pour édition via un paramètre GET
if (isset($_GET['id'])) {
    $sessions = $sessionModel->getSessions();
    foreach ($sessions as $session) {
        if ($session->getIdSession() == $_GET['id']) {
            $sessionToUpdate = $session;
            break;
        }
    }
}


if (isset($_POST['submit'])) {
    $id_session = $_POST['id_session'];
    $nomId = $_POST['nomId'];
    $date_session = $_POST['date_session'];
    $heure = $_POST['heure'];
    $prix_session = $_POST['prix_session'];

    $sessionToUpdate = new Session($id_session, $nomId, $date_session, $heure, $prix_session);

    // Mise à jour de la session dans la base de données
    $sessionModel->updateSession($sessionToUpdate);
    header('location: ./');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à Jour de la Session</title>
    <style>
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include_once './Vue/nav-bar.php'; ?>
    <h1>Mise à Jour de la Session</h1>

    <?php if ($sessionToUpdate): ?>
        <form action="" method="POST">
            <input type="hidden" name="id_session" value="<?= htmlspecialchars($sessionToUpdate->getIdSession()) ?>">

            <label for="nomId">Nom de la session:</label>
            <input type="text" id="nomId" name="nomId" value="<?= htmlspecialchars($sessionToUpdate->getNomId()) ?>" required>

            <label for="date_session">Date:</label>
            <input type="date" id="date_session" name="date_session" value="<?= htmlspecialchars($sessionToUpdate->getDateSession()) ?>" required>

            <label for="heure">Heure:</label>
            <input type="time" id="heure" name="heure" value="<?= htmlspecialchars($sessionToUpdate->getHeure()) ?>" required>

            <label for="prix_session">Prix:</label>
            <input type="number" id="prix_session" name="prix_session" value="<?= htmlspecialchars($sessionToUpdate->getPrixSession()) ?>" required>

            <button name="submit" type="submit">Mettre à jour la session</button>
        </form>
    <?php else: ?>
        <p>Session introuvable ou aucun ID fourni.</p>
    <?php endif; ?>
</body>

</html>