<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Inscrits</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
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
    </style>
</head>

<body>
    <?php include_once './Vue/nav-bar.php'; ?>
    <h1>Liste des Congressistes Inscrits aux Sessions</h1>
    <?php if (!empty($inscritWithSessions)): ?>
        <table>
            <thead>
                <tr>

                    <th>Nom Congressiste</th>
                    <th>Nom Session</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscritWithSessions as $inscrit): ?>
                    <tr>

                        <td><?= htmlspecialchars($inscrit['nom_congressiste']) ?></td>
                        <td><?= htmlspecialchars($inscrit['nomId']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun congressiste n'est inscrit à une session.</p>
    <?php endif; ?>
</body>

</html>