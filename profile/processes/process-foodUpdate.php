<?php
session_start();
$id = $_POST['id'];
$food = $_POST['food'];
$desc = $_POST['desc'];

/*execute update*/
$dbusername = "razaalin_alina";
$dbpassword = "iZKoDeSbtiPLYSGT";
$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

$stmt = $pdo->prepare("UPDATE `food`
    SET `foodName` = '$food', `description` = '$desc'
    WHERE `food`.`foodID` = $id;");

$stmt->execute();

header("Location: ../");
?>
