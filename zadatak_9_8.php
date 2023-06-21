<?php

include_once './php/conn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <ul>
        <li><a href="index.php">Domaci 15</a></li>
        <li><a href="zadatak_9_8.php">Domaci 9 - Zadatak 8</a></li>
        <li><a href="zadatak_9_16.php">Domaci 9 - Zadatak 16</a></li>
        <li><a href="zadatak_9_24.php">Domaci 9 - Zadatak 24</a></li>
        <li><a href="zadatak_10_8.php">Domaci 10 - Zadatak 8</a></li>
        <li><a href="zadatak_10_1.php">Domaci 10 - Zadatak 1</a></li>
        <li><a href="zadatak_10_9.php">Domaci 10 - Zadatak 9</a></li>
    </ul>
    <table>
        <thead>
            <th>#</th>
            <th>Ime</th>
            <th>Ocena</th>
            <th>Predavanja</th>
            <th>Vezbe</th>
        </thead>

        <tbody>
            <?php
            $stmt = $pdo->query(
                "SELECT *
FROM predmet
WHERE espb = 5
   OR espb = 7
   OR espb = 9;"
            );

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['predmet_id'];
                $naziv_predmeta = $row['naziv'];
                $espb = $row['espb'];
                $br_cas_predavanja = $row['br_cas_predavanja'];
                $br_cas_vezbe = $row['br_cas_vezbe'];
            ?>
                <tr>
                    <td><?= $predmet_id ?></td>
                    <td><?= $naziv_predmeta ?></td>
                    <td><?= $espb ?></td>
                    <td><?= $br_cas_predavanja ?></td>
                    <td><?= $br_cas_vezbe ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>