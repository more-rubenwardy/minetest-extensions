<?php
include "scripts/setup.php";
$page_title="Edit a Mod";

require_login();

$id=$_GET['id'];

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

include "scripts/pageheader.php";

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error finding entry $id");
$row = mysql_fetch_array($res) or die("row error");

if (is_member_moderator($_SESSION['user'],$handle) || $_SESSION['user']==$row['owner']){
}else{
SQLerror("Deleting Denied","You do not own that entry, and you are not a moderator");
}

// --------------------------
// Delete Row
// --------------------------

$do=true;
$name=$_POST['mod_name'];
if ($name==""){
   $do=false;
   $name=$row['name'];
}

if ($do==true){
  $name=mysql_real_escape_string($name);
   mysql_query("DELETE FROM mods WHERE name='$name'",$handle) or SQLerror("MySQL Query Error","Error finding entry $name");
   header("location: index.php");
}
?>
<form method="post" action="<?php echo curPageURL();?>">
<h1>Delete an Entry</h1>
<input type="text" name="mod_name" readonly="true" style="background-color:#EEEEEE;" value="<?php echo $name;?>"> will be permanatly deleted<br /><br />
<input type="submit" value="OK">
</form>

<?php
     include "scripts/pagefooter.php";
?>