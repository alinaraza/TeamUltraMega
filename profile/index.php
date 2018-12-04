<?php
session_start();

$page_title = "Settings";
$page = "chef";
$id = $_SESSION['id'];

if($_SESSION['logged-in'] !== true){
	echo("You are not allowed to view this page");
	?><a href="login.html">Go to login</a><?php
}else{


	$dbusername = "razaalin_alina";
	$dbpassword = "iZKoDeSbtiPLYSGT";
	$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

	$stmt = $pdo->prepare("SELECT * FROM `chefs` WHERE `userID` = $id");
	$stmt2 = $pdo->prepare("SELECT `chefs`.`userID`,`food`.`foodName`,`food`.`description`,`food`.`image`,`food`.`foodID`
	FROM `chefs` INNER JOIN `food` ON `chefs`.`userID` = `food`.`chefID`");
	$stmt->execute();
	$stmt2->execute();
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
<br>
<br>
<br>
<span><a href="addFood.php">Add New Post</a></span>
<br>
<span><a href="#">View Reviews</a></span>
</section>

<section class="activePosts">
	<h3>Current Posts</h3>
	<?php
	while($row=$stmt2->fetch()) {
	?>
	<div class="post">
			
			<p>Food: <?php echo($row["foodName"]);?> </p>
			<p>Description: <?php echo($row["description"]);?> </p>
			<br>
			<span><a href="editFood.php?id=<?php echo($row["foodID"]); ?>">Edit</a></span>
			<span><a href="deleteFood.php?id=<?php echo($row["foodID"]); ?>">Delete</a></span>
	</div>
	<?php } ?>
</section>

<?php include '../footer.php' ?>

<?php } ?>
