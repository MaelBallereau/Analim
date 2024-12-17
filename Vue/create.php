<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Nouvelle Session</title>
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
    <h1>Créer une Nouvelle Session</h1>

    <form action="" method="POST">
        <label for="nomId">Nom de la session:</label>
        <input type="text" id="nomId" name="nomId" required>

        <label for="date_session">Date:</label>
        <input type="date" id="date_session" name="date_session" required>

        <label for="heure">Heure:</label>
        <input type="time" id="heure" name="heure" required>

        <label for="prix_session">Prix:</label>
        <input type="number" id="prix_session" name="prix_session" required>

        <button class="btn" name='submit' type="submit" onclick="showMessage()">Créer la Session</button>

        <?php
        if (isset($_POST['submit'])) {
            $nomId = $_POST['nomId'];
            $date_session = $_POST['date_session'];
            $heure = $_POST['heure'];
            $prix = $_POST['prix_session'];


            $session = new Session();
            $session->setNomId($nomId);
            $session->setDateSession($date_session);
            $session->setHeure($heure);
            $session->setPrixSession($prix);
            $session->createSession($session);
            header("location: ./");
        }
        ?>
    </form>

</body>

</html>