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
// Owner name instead of id, 3m_specific (by Phitherek_)
$owr = mysql_query("SELECT name FROM users WHERE id=".$row[3], $handle);
$owar = mysql_fetch_array($owr);
// End of Phitherek_' s code
if (is_member_moderator($_SESSION['user'],$handle) || $_SESSION['user']==$owar['name'] || $_SESSION['user']==$row[3]){
}else{
SQLerror("Editing Denied","You do not own that entry, and you are not a moderator");
}

// --------------------------
// Load Variables
// --------------------------

$do=true;
$name=$_POST['mod_name'];
if ($name==""){
   $do=false;
   $name=$row[1];
}

$version=$_POST['mod_version'];
if ($version=="")
   $version=$row[2];

//3m release (by Phitherek_)
$mmmrel=$_POST['mmmrel'];
if($mmmrel=="") {
$mmmrel=$row[21];
}
//End of Phitherek_' s code

// Owner name instead of id (by Phitherek_)
$owner=$owar['name'];
// End of Phitherek_' s change

$desc=$_POST['mod_desc'];
if ($desc=="")
   $desc=$row[4];
   
$overview=$_POST['mod_ov'];
if ($overview=="")
   $overview = $row[22];

$tags=$_POST['mod_tags'];
if ($tags=="")
   $tags = $row[7];

$license=$_POST['mod_lic'];
if ($license=="")
   $license=$row[8];

// 3m repotype (by Phitherek_)
$mmmrt=$_POST['mmmrt'];
if($mmmrt =="") {
$mmmrt = $row[19];
}
// End of Phitherek_' s code

$file=$_POST['mod_file'];
if ($file=="")
   $file=$row[9];

$depend=$_POST['mod_dep'];
if ($depend=="")
   $depend=$row[10];

$basename=$_POST['mod_base'];
if ($basename=="")
   $basename=$row[11];

if ($do==true){
  include "scripts/entry_adders_sql_safe.php";
  mysql_query("UPDATE mods SET version='$version' WHERE name='$name'",$handle);
  // 3m release (by Phitherek_)
  mysql_query("UPDATE mods SET 3m_rele='$mmmrel' WHERE name='$name'",$handle) or SQLerror("Error on 3m_specific:rel","");
  // End of Phitherek_' s code
  mysql_query("UPDATE mods SET overview='$overview' WHERE name='$name'",$handle)or SQLerror("Error on overview","");
  mysql_query("UPDATE mods SET description='$desc' WHERE name='$name'",$handle) or SQLerror("Error on desc","");
  mysql_query("UPDATE mods SET tags='$tags' WHERE name='$name'",$handle)or SQLerror("Error on tags","");
  mysql_query("UPDATE mods SET license='$license' WHERE name='$name'",$handle)or SQLerror("Error on license","");
  // 3m repotype (by Phitherek_)
  mysql_query("UPDATE mods SET repotype='$mmmrt' WHERE name='$name'",$handle) or SQLerror("Error on 3m_specific:repotype","");
  // End of Phitherek_' s code
  mysql_query("UPDATE mods SET file='$file' WHERE name='$name'",$handle)or SQLerror("Error on file","");
  mysql_query("UPDATE mods SET depend='$depend' WHERE name='$name'",$handle)or SQLerror("Error on depend","");
  mysql_query("UPDATE mods SET basename='$basename' WHERE name='$name'",$handle)or SQLerror("Error on basename","");

  header("location: viewmod.php?id=$id");
  die("");
}
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
<td width="60%">Mod Name:* <input type="text" size="50" name="mod_name" value="<?php echo $name;?>"></td>
<!-- 3m release (by Phitherek_) -->
<td width="40%">
<table width="100%"><tr><td>Version:* <input type="text" size="10" name="mod_version" value="<?php echo $version;?>"></td><td>
3m Release: <input type="text" size="10" name="mmmrel" value="<?php echo $mmmrel;?>"></td>
<!-- End of Phitherek_ s change -->
</table>
</td>
<tr>

<!--Overview-->
<tr>
<td colspan="2">
<br />
Overview:* <input type="text" size=100 name="mod_ov" value="<?php echo $overview;?>">
</td>
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
<!--3m Repotype (by Phitherek_)-->
<td>3m Repotype: <select name="mmmrt" size="1">
<option value="archive" <?php if($mmmrt=="archive") echo "selected"; ?>>Archive</option>
<option value="git" <?php if($mmmrt=="git") echo "selected"; ?>>Git</option>
</select></td>
<!--End of Phitherek_ s code-->
<td>File URL: <input type="text" size="50" name="mod_file" value="<?php echo $file;?>"></td>
</tr>
<tr>
<td colspan=2><br />License: <input type="text" size="60" name="mod_lic" value="<?php echo $license;?>"><br /><br /></td>
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