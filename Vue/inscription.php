<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Congressistes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
        }

        label {
            font-weight: bold;
        }

        select,
        button {
            padding: 10px;
            font-size: 16px;
        }

        button {
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
    <h1>Gestion des Congressistes et Sessions</h1>

    <!-- Tableau des Congressistes -->
    <?php
    if (!empty($congressistes)) {
        echo "<h2>Liste des Congressistes</h2>";
        echo "<table>";
        echo "<tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>";
        foreach ($congressistes as $congressiste) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($congressiste['id']) . "</td>";
            echo "<td>" . htmlspecialchars($congressiste['nom_congressiste']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucun congressiste trouvé.</p>";
    }
    ?>

    <!-- Formulaire pour inscrire un congressiste à une session -->
    <div class="form-container">
        <h2>Inscrire un Congressiste à une Session</h2>
        <form method="post" action="">
            <label for="congressiste">Choisir un Congressiste :</label>
            <select name="congressiste_id" id="congressiste" required>
                <option value="" disabled>-- Sélectionner un congressiste --</option>
                <?php
                foreach ($congressistes as $congressiste) {
                    echo "<option value='" . htmlspecialchars($congressiste['id']) . "'>" . htmlspecialchars($congressiste['nom_congressiste']) . "</option>";
                }
                ?>
            </select>

            <label for="session">Choisir une Session :</label>
            <select name="session_id" id="session" required>
                <option value="" disabled>-- Sélectionner une session --</option>
                <?php
                if (!empty($sessions)) {
                    foreach ($sessions as $session) {
                        echo "<option value='" . htmlspecialchars($session->getIdSession()) . "'>" . htmlspecialchars($session->getNomId()) . "</option>";
                    }
                } else {
                    echo "<option value=''>Aucune session disponible</option>";
                }
                ?>
            </select>

            <button type="submit">Inscrire</button>
        </form>
    </div>
</body>

</html>