<?php
include_once './conn.php';

$angazovanje_id = $_POST['angazovanje_id'];
$profesor_id = $_POST['profesor_id'];

$stmt = $pdo->prepare("UPDATE angazovanje SET profesor_id = :profesor_id WHERE angazovanje_id = :angazovanje_id");
$stmt->bindParam(':profesor_id', $profesor_id);
$stmt->bindParam(':angazovanje_id', $angazovanje_id);
$stmt->execute();

header("Location: ../index.php");
exit();
