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
            <th>Prezime</th>
            <th>Tip studiranja</th>
        </thead>

        <tbody>
            <?php
            $stmt = $pdo->query(
                "SELECT indeks, ime, prezime, tip_studiranja FROM student WHERE indeks > 1001;"
            );

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $indeks = $row['indeks'];
                $ime = $row['ime'];
                $prezime = $row['prezime'];
                $tip_studiranja = $row['tip_studiranja'];
            ?>
                <tr>
                    <td><?= $indeks ?></td>
                    <td><?= $ime ?></td>
                    <td><?= $prezime ?></td>
                    <td><?= $tip_studiranja ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>