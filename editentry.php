<?php
include "scripts/setup.php";
$page_title="Edit a Mod";
require_login();

$id=$_GET['id'];

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

include "scripts/pageheader.php";

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
$row = mysql_fetch_row($res) or die("row error");

if (is_member_moderator($_SESSION['user']) || $_SESSION['user']==$row[3]){
}else{
SQLerror("Editing Denied","You do not own that entry, and you are not a moderator");
}

// --------------------------
// Load Variables
// --------------------------

$name=$_POST['name'];
if ($name=="")
   $name=$row[1];

$version=$_POST['version'];
if ($version=="")
   $version=$row[2];

$owner=$row[3];

$desc=$_POST['desc'];
if ($desc=="")
   $desc=$row[4];

$tags=$_POST['mod_tag'];
if ($tags=="")
   $tags = $row[7];

$license=$_POST['mod_lic'];
if ($license=="")
   $license=$row[8];

$file=$_POST['mod_file'];
if ($file=="")
   $file=$row[9];

$depend=$_POST['mod_dep'];
if ($depend=="")
   $depend=$row[10];

$basename=$_POST['mod_base'];
$basename=$row[11];

// --------------------------
// End of loading variable
// --------------------------




?>
Help: <a href="help/markup.php" target="_blank">Description Markup</a> - <a href="help/tags.php" target="_blank">Tags</a>
<hr />
<form method="post" action="<?php echo curPageURL();?>">
<table width="100%">

<!--Tags, License, File, Depend, Basename-->

<!--Mod Name and Version-->
<tr>
<td width="60%">Mod Name: <input type="text" size="50" name="mod_name" value="<?php echo $name;?>"></td>
<td width="40%">Version: <input type="text" size="30" name="mod_version" value="<?php echo $version;?>"></td>
</tr>

<!--Description-->
<tr>
<td colspan="2">
<p><textarea name="mod_desc" cols="105" rows="15">
<?php echo $desc;?>
</textarea></p>
</td>
</tr>

<!--License and File-->
<tr>
<td>File URL: <input type="text" size="50" name="mod_file" value="<?php echo $file;?>"></td>
<td>License: <input type="text" size="30" name="mod_lic" value="<?php echo $license;?>"></td>
</tr>

<!--Depends and Basename-->
<tr>
<td>Depends (seperated by "," - no space): <input type="text" size="30" name="mod_dep" value="<?php echo $depend;?>"></td>
<td>Mod Namespace: <input type="text" size="30" name="mod_base" value="<?php echo $basename;?>"></td>
</tr>

<!--Tags-->
<tr><td colspan="2"><br /><br /><center><b>Tags</b> Users use tags to search and find mods</center></td></tr>

<tr>
<td colspan="2" width="100">
Tags: <input type="text" size=100 name="mod_tags" value="<?php echo $tags;?>">
</td>
</tr>

<tr>
<td colspan=2>
<br /><br /><center>
<input type="submit" value="Save Mod" />
</center>
</td>
</tr>

</table>
</form>

<?php
     include "scripts/pagefooter.php";
?>