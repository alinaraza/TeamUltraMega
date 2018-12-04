<?php
session_start();
//receive values user submitted from form
$image = $_POST['fileToUpload'];
$food = $_POST['food'];
$chef = $_POST['chef'];
$chefID = $_POST['chefID'];
$desc = $_POST['desc'];

//perform database insert using form values;
$dbusername = "razaalin_alina";
$dbpassword = "iZKoDeSbtiPLYSGT";;
$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

$stmt = $pdo->prepare("INSERT INTO `food` (`foodID`, `foodName`, `description`, `chef`,`chefID`, `image`)
                      VALUES (NULL, '$food', '$desc', '$chef', '$chefID', '$image'); ");

$stmt->execute();

header("Location: ../");

?>
