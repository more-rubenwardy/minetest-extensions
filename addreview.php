<?php
require_once "include/include.php";

// Specialise
pingCurUser($handle);

// Get commands
$id=$_GET['id'];
require_login();

// Get the mod
int_assert($id,"Mod Error","Unable to find extension <i>(extension id not valid)</i>");
$mod = getMod($id,$handle);

// Validate the user
$ures = mysql_query("SELECT * FROM reviews WHERE uID=$current_user_id AND mID=$id",$handle);
if ( mysql_num_rows($ures) > 0){
	SQLerrorFancy("You have already reviewed this!","You can only review an extension once.");
}

// Get data
$overview = $_POST['overview'];
$desc = $_POST['description'];

// Submit code
if ($overview != "" && $desc != ""){
	require_once "include/validation/entry_adders_sql_safe.php";

	// Insert the data into table
	mysql_query("INSERT INTO reviews (mID,uID,overview,description)
				 VALUES ($id,$current_user_id,'$overview','$desc')") or die('insert error');

	// Get the id
	$the_id=mysql_insert_id($handle);

	// Display the extension
	header("location: review.php?id=$the_id");
}

// Write page
PageHeader("Review '".$mod['name']."'");
?>

		Help: <a href="help/markup.php" target="_blank">Description Markup</a> - Not creating? Make sure you filled in all sections.
		<hr />
		<form action="addreview.php?id=<?php echo $id;?>" method="post">
			<p>
			Overview: <input type="text" name="overview" maxlength="500" size="100" placeholder="A basic paragraph summarising your review" />
			</p>

			<textarea name="description" cols="105" rows="25" placeholder="Your article that will appear when the user clicks see more"></textarea>

			<center><input type="submit" value="Add Review" /></center>
		</form>

<?php
PageFooter();
?>