<?php

//confirm delete record
$id = $_GET['id'];

//show record to delete
$dbusername = "razaalin_alina";
$dbpassword = "iZKoDeSbtiPLYSGT";
$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM `food` WHERE `foodID` = $id");

$stmt->execute();
$row = $stmt->fetch();
?>
<h1>Are you sure you want to delete this post?</h1>
<p>Food: <?php echo($row["foodName"]);?> </p>
<p>Description: <?php echo($row["description"]);?> </p>


<?php //interface for confirm or cancel ?>
<form action="processes/process-deleteFood.php" method="POST">
  <input name="id" type="hidden" value="<?php echo($row["foodID"]); ?>">
	<input type="submit" value="Confirm"/>
</form>
