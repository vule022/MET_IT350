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
        </thead>

        <tbody>
            <?php
            $stmt = $pdo->query(
                "SELECT
  p.predmet_id,
  p.naziv AS naziv_predmeta,
  AVG(o.ocena) AS prosecna_ocena
FROM
  predmet p
JOIN
  overa o ON p.predmet_id = o.predmet_id
WHERE
  o.ocena >= 6
GROUP BY
  p.predmet_id, p.naziv;"
            );

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['predmet_id'];
                $naziv_predmeta = $row['naziv_predmeta'];
                $prosecna_ocena = $row['prosecna_ocena'];
            ?>
                <tr>
                    <td><?= $predmet_id ?></td>
                    <td><?= $naziv_predmeta ?></td>
                    <td><?= $prosecna_ocena ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>