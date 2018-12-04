<?php
session_start();

$page_title = "Delete Food";
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
<h2>You are Deleting: <?php echo($row["foodName"]);?></h2>
<div class="deleteFood">
	<p>Food: <?php echo($row["foodName"]);?> </p>
	<p>Description: <?php echo($row["description"]);?> </p>


	<?php //interface for confirm or cancel ?>
	<form action="processes/process-deleteFood.php" method="POST">
	  <input name="id" type="hidden" value="<?php echo($row["foodID"]); ?>">
		<button type="submit" name="button">Confirm</button>
	</form>
  <a href="index.php">Cancel</a>
</div>
</section>

<?php include '../footer.php' ?>

<?php } ?>
