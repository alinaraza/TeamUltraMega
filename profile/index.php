<?php
session_start();

$page_title = "Settings";
$page = "chef";

if($_SESSION['logged-in'] !== true){
	echo("You are not allowed to view this page");
	?><a href="login.html">Go to login</a><?php
}else{
	
	
	$dbusername = "razaalin_alina";
	$dbpassword = "iZKoDeSbtiPLYSGT";
	$pdo = new PDO("mysql:host=localhost;dbname=razaalin_teamultramega", $dbusername, $dbpassword);

	$stmt = $pdo->prepare("SELECT * FROM `chefs` WHERE 1");
	
	$stmt->execute();
?>

<?php include '../header.php' ?>

<section>
<form action="processes/update-chef.php" method="POST"> 
<h2>Welcome To Your Profile</h2>
<?php $row = $stmt->fetch();   ?>  
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

<?php include '../footer.php' ?>

<?php } ?>