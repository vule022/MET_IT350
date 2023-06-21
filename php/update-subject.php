<?php
include_once './conn.php';

$predmet_id = $_POST['predmet_id'];
$naziv = $_POST['naziv'];
$espb = $_POST['espb'];
$br_cas_predavanja = $_POST['br_cas_predavanja'];
$br_cas_vezbe = $_POST['br_cas_vezbe'];

$stmt = $pdo->prepare("SELECT * FROM predmet WHERE predmet_id = :predmet_id");
$stmt->bindParam(':predmet_id', $predmet_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $stmt = $pdo->prepare("UPDATE predmet SET naziv = :naziv, espb = :espb, br_cas_predavanja = :br_cas_predavanja, br_cas_vezbe = :br_cas_vezbe WHERE predmet_id = :predmet_id");
} else {
    $stmt = $pdo->prepare("INSERT INTO predmet (predmet_id, naziv, espb, br_cas_predavanja, br_cas_vezbe) VALUES (:predmet_id, :naziv, :espb, :br_cas_predavanja, :br_cas_vezbe)");
}

$stmt->bindParam(':predmet_id', $predmet_id);
$stmt->bindParam(':naziv', $naziv);
$stmt->bindParam(':espb', $espb);
$stmt->bindParam(':br_cas_predavanja', $br_cas_predavanja);
$stmt->bindParam(':br_cas_vezbe', $br_cas_vezbe);
$stmt->execute();

header("Location: ../index.php");
exit();
