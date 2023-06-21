<?php
include_once './conn.php';

$indeks = $_POST['indeks'];
$predmet_id = $_POST['predmet_id'];
$oznaka_roka = $_POST['oznaka_roka'];
$godina_roka = $_POST['godina_roka'];
$datum_overa = $_POST['datum_overa'];
$ocena = $_POST['ocena'];

$stmt = $pdo->prepare("SELECT * FROM overa WHERE indeks = :indeks AND predmet_id = :predmet_id");
$stmt->bindParam(':indeks', $indeks);
$stmt->bindParam(':predmet_id', $predmet_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $stmt = $pdo->prepare("DELETE FROM overa WHERE indeks = :indeks AND predmet_id = :predmet_id");
    $stmt->bindParam(':indeks', $indeks);
    $stmt->bindParam(':predmet_id', $predmet_id);
    $stmt->execute();
} else {
    $stmt = $pdo->prepare("INSERT INTO overa (indeks, predmet_id, ocena, oznaka_roka, godina_roka, datum_overa) VALUES (:indeks, :predmet_id, :ocena, :oznaka_roka, :godina_roka, :datum_overa)");
    $stmt->bindParam(':indeks', $indeks);
    $stmt->bindParam(':predmet_id', $predmet_id);
    $stmt->bindParam(':godina_roka', $godina_roka);
    $stmt->bindParam(':oznaka_roka', $oznaka_roka);
    $stmt->bindParam(':datum_overa', $datum_overa);
    $stmt->bindParam(':ocena', $ocena);
    $stmt->execute();
}

header("Location: ../index.php");
exit();
