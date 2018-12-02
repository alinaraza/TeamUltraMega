<?php
session_start();

$page_title = "Edit Food";
$page = "chef";
$id = $_GET['id'];

if($_SESSION['logged-in'] !== true){
	echo("You are not allowed to view this page");
	?><a href="login.html">Go to login</a><?php
}else{


	$dbusername = "razaalin_alina";
	$dbpassword = "iZKoDeSbtiPLYSGT";
	$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

	$stmt = $pdo->prepare("SELECT * FROM `food` WHERE `foodID` = $id");

	$stmt->execute();
  $row = $stmt->fetch();
?>

<?php include '../header.php' ?>

<section>
<!-- <form action="processes/update-chef.php" method="POST"> -->
<h2>Welcome To Your Profile</h2>
<?php echo($_SESSION['username']);?>
<?php echo($_SESSION['id']);?>
<!-- <fieldset>
	<label>Title:</label><input type='text' name='title' value="<?php echo($row['title']); ?>"/><br>
	<label>Paragraph:</label> <textarea rows="10" type='text' name='paragraph' ><?php echo($row['paragraph']); ?></textarea><br>
	<label>About:</label> <textarea rows="10" type='text' name='about' ><?php echo($row['about']); ?></textarea><br>
	<label>Featured Article Id:</label><input type='integer' name='fID' value="<?php echo($row['featuredArticleId']); ?>"/><br>
	<button type ="Submit" name="updatewelcome" value ="confirm changes">Confirm Changes</button>
</fieldset>
</form>
		<a href="/A1_AlinaRaza/articles">View Articles</a><br>
		<a href="contact-submissions.php">View Contact Submissions</a>
</div> -->
</section>

<h2>You are editing: <?php echo($row["foodName"]);?></h2>
<div class="editFood">
	<form id="editFood" action="processes/process-foodUpdate.php" method="post">
			Food: <input type="text" name="food" value="<?php echo($row["foodName"]);?>"/>
			<br>
			<br>
			Chef: <input disabled="true" type="text" name="chef" value="<?php echo($_SESSION['username']);?>"/>
			<br>
			<br>
			Description: <textarea name="desc" rows="8" cols="80" wrap="soft"><?php echo($row["description"]);?></textarea>
			<br>
			<br>
			<input type="submit" value="Submit"/>
			<input name="chefID" type="hidden" value="<?php echo($_SESSION['id']);?>">
      <input name="id" type="hidden" value="<?php echo($row["foodID"]); ?>">
	</form>
  <a href="index.php">Cancel</a>
</div>

<?php include '../footer.php' ?>

<?php } ?>
