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
            <th>Godina roka</th>
            <th>Oznaka</th>
            <th>predmet ID</th>
            <th>Najveca ocena</th>
            <th>Prosecna ocena</th>
        </thead>

        <tbody>
            <?php
            $stmt = $pdo->query(
                "SELECT
  godina_roka,
  oznaka_roka,
  predmet_id,
  MAX(ocena) AS najveca_ocena,
  AVG(ocena) AS prosecna_ocena
FROM
  overa
GROUP BY
  godina_roka,
  oznaka_roka,
  predmet_id;"
            );

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $godina_roka = $row['godina_roka'];
                $oznaka_roka = $row['oznaka_roka'];
                $predmet_id = $row['predmet_id'];
                $najveca_ocena = $row['najveca_ocena'];
                $prosecna_ocena = $row['prosecna_ocena'];
            ?>
                <tr>
                    <td><?= $godina_roka ?></td>
                    <td><?= $oznaka_roka ?></td>
                    <td><?= $predmet_id ?></td>
                    <td><?= $najveca_ocena ?></td>
                    <td><?= $prosecna_ocena ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>