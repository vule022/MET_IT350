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
    <h1>CRUD</h1>

    <h2>Angažovanje profesora i saradnika</h2>
    <table>
        <thead>
            <th>#</th>
            <th>Profesor</th>
            <th>Predmet</th>
        </thead>

        <tbody>
            <?php
            $stmt = $pdo->query("SELECT 
                    predmet.naziv, 
                    angazovanje.angazovanje_id, 
                    profesor.ime, 
                    profesor.profesor_id, 
                    profesor.prezime, 
                    profesor.zvanje FROM predmet 
                    JOIN angazovanje ON (angazovanje.predmet_id = predmet.predmet_id) 
                    JOIN profesor ON (profesor.profesor_id = angazovanje.profesor_id)
                    ORDER BY angazovanje_id ASC
                ");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $angazovanje_id = $row['angazovanje_id'];
                $naziv = $row['naziv'];
                $ime = $row['zvanje'] . ' ' . $row['ime'] . ' ' . $row['prezime'];
                $prof_id = $row['profesor_id'];
            ?>
                <tr>
                    <td><?= $angazovanje_id ?></td>
                    <td>
                        <form action="./php/update-engagement.php" method="post">
                            <select name="profesor_id" required>
                                <?php
                                $profStmt = $pdo->query("SELECT profesor_id, ime, prezime, zvanje FROM profesor");
                                while ($profRow = $profStmt->fetch(PDO::FETCH_ASSOC)) {
                                    $profesor_id = $profRow['profesor_id'];
                                    $profIme = $profRow['zvanje'] . ' ' . $profRow['ime'] . ' ' . $profRow['prezime'];

                                    if ($profesor_id == $prof_id) {
                                        echo "<option value='$profesor_id' selected>$profIme</option>";
                                    } else {
                                        echo "<option value='$profesor_id'>$profIme</option>";
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" name="angazovanje_id" value="<?= $angazovanje_id ?>" id="angazovanje_id">
                            <input type="submit" value="Izmeni">
                        </form>
                    </td>
                    <td><?= $naziv ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>

    <h2>Ažuriranje podataka o predmetima</h2>
    <form action="update-subject.php" method="POST">
        <label for="predmet_id">Predmet ID:</label>
        <input type="text" name="predmet_id" required>
        <label for="naziv">Naziv:</label>
        <input type="text" name="naziv" required>
        <label for="espb">ESPB:</label>
        <input type="text" name="espb" required>
        <label for="br_cas_predavanja">Broj časova predavanja:</label>
        <input type="text" name="br_cas_predavanja" required>
        <label for="br_cas_vezbe">Broj časova vežbi:</label>
        <input type="text" name="br_cas_vezbe" required>
        <input type="submit" value="Update">
    </form>

    <h2>Dodeljivanje predmeta za studente</h2>
    <form action="assign-subject.php" method="POST">
        <label for="indeks">Student:</label>
        <select name="predmet_id" required>
            <?php
            $stmt = $pdo->query("SELECT indeks, ime, prezime FROM student");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['indeks'];
                $ime = $row['ime'] . ' ' . $row['prezime'];
                echo "<option value='$predmet_id'>$ime</option>";
            }
            ?>
        </select>
        <label for="predmet_id">Predmet ID:</label>
        <select name="predmet_id" required>
            <?php
            $stmt = $pdo->query("SELECT predmet_id, naziv FROM predmet");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['predmet_id'];
                $naziv = $row['naziv'];
                echo "<option value='$predmet_id'>$naziv</option>";
            }
            ?>
        </select>
        <input type="submit" value="Assign">
    </form>

    <h2>Uklanjanje predmeta za studente</h2>
    <form action="remove-subject.php" method="POST">
        <label for="indeks">Student:</label>
        <select name="predmet_id" required>
            <?php
            $stmt = $pdo->query("SELECT indeks, ime, prezime FROM student");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['indeks'];
                $ime = $row['ime'] . ' ' . $row['prezime'];
                echo "<option value='$predmet_id'>$ime</option>";
            }
            ?>
        </select>

        <label for="predmet_id">Predmet ID:</label>
        <select name="predmet_id" required>
            <?php
            $stmt = $pdo->query("SELECT predmet_id, naziv FROM predmet");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $predmet_id = $row['predmet_id'];
                $naziv = $row['naziv'];
                echo "<option value='$predmet_id'>$naziv</option>";
            }
            ?>
        </select>
        <input type="submit" value="Ukloni">
    </form>
</body>

</html>