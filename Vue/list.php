<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sessions</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php include_once './Vue/nav-bar.php'; ?>
    <h1>Liste des Sessions</h1>
    <table>
        <thead>
            <tr>
                <th>Nom de la Session</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Prix</th>
                <th>Actions</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once './Modele/Session.php';
            $sessionModel = new Session();
            $sessions = $sessionModel->getSessions();

            if (!empty($sessions)) {
                foreach ($sessions as $session) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($session->getNomId()) . "</td>";
                    echo "<td>" . htmlspecialchars($session->getDateSession()) . "</td>";
                    echo "<td>" . htmlspecialchars($session->getHeure()) . "</td>";
                    echo "<td>" . htmlspecialchars($session->getPrixSession()) . "</td>";
                    echo "<td><a href=\"?action=update&id=" . $session->getIdSession() . "\">Éditer</a></td>";
                    echo "<td><a href=\"?action=delete&id=" . $session->getIdSession() . "\">Supprimé</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucune session trouvée.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>