<?php

//perform a delete on a record
//receive id of record to delete.

$id = $_POST["id"];

//perform database delete using form values;
$dbusername = "razaalin_alina";
$dbpassword = "iZKoDeSbtiPLYSGT";
$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

$stmt = $pdo->prepare("DELETE FROM `food` WHERE `foodID` = $id");

$stmt->execute();

header("Location: ../");

?>
