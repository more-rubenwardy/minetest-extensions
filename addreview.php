<?php
include "scripts/setup.php";
$id=$_GET['id'];
require_login();

// Validate the mod
if (is_numeric($id)==false)
	SQLerrorFancy("Mod Error","Unable to find extension <i>(extension id not valid)</i>");

$mres = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerrorFancy("Mod Error","Unable to find extension <i>(sql query error)</i>");
$mod = mysql_fetch_array($mres) or SQLerrorFancy("Mod Error","Unable to find mod");

// Validate the user
$user_id = getUserId($_SESSION['user'],$handle);
$ures = mysql_query("SELECT * FROM reviews WHERE owner_id=$user_id AND mod_id=$id",$handle);
if ( mysql_num_rows($ures) > 0){
	SQLerrorFancy("You have already reviewed this!","You can only review an extension once.");
}

// Get data
$overview = $_POST['overview'];
$desc = $_POST['description'];

// Submit code
if ($overview != "" && $desc != ""){
	require_once "scripts/entry_adders_sql_safe.php";

	// Insert the data into table
	mysql_query("INSERT INTO reviews (mod_id,owner_id,overview,description)
				 VALUES ($id,$user_id,'$overview','$desc')") or die('insert error');

	// Get the id
	$the_id=mysql_insert_id($handle);

	// Display the extension
	header("location: review.php?id=$the_id");
}

// Write page
$page_title="Review '".$mod['name']."'";
include "scripts/pageheader.php";
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
include "scripts/pagefooter.php";
?>