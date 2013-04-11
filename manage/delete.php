<?php
$punbb_relative="../";
include "../include/include.php";

// Check login
require_login();

// Commands
$id=$_GET['id'];
int_assert($id);

// Get mod
$row = getMod($id,$handle);

// Check mod
if (!$row)
	SQLerrorFancy("Unable to delete extension","The extension could not be found");

// Check user
if (!(is_member_moderator() || $current_user_id==$row['uID']))
	SQLerrorFancy("Deleting Denied","You do not own that extension, and you are not a moderator");

$do=true;
$name=$_POST['mod_name'];
if ($name==""){
	$do=false;
	$name=$row['name'];
}

if ($do==true){
	mysql_query("DELETE FROM mods WHERE mID=$id",$handle) or SQLerror("MySQL Query Error","Error finding entry $name");
	header("location: ../index.php");
}

PageHeader("Delete a mod");
?>
	<form method="post" action="<?php echo curPageURL();?>">
		<h1>Delete an extension</h1>
		<input type="text" name="mod_name" readonly="true" style="background-color:#EEEEEE;" value="<?php echo $name;?>"> will be permanently deleted<br /><br />
		<input type="submit" value="OK">
	</form>

<?php
PageFooter();
?>