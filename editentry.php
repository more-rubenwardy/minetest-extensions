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
$row = mysql_fetch_array($res) or die("row error");

$owr = mysql_query("SELECT name FROM users WHERE id=".$row['owner'], $handle);
$owar = mysql_fetch_array($owr);

if (is_member_moderator($_SESSION['user'],$handle) || $_SESSION['user']==$owar['name'] || $_SESSION['user']==$row[3]){
}else{
SQLerror("Editing Denied","You do not own that entry, and you are not a moderator");
}

// --------------------------
// Load Variables
// --------------------------



if ((include('scripts/edit_validation.php'))==1){
    if ((include('scripts/entry_validation.php'))==1){

        // Convert values to SQL compatible
        include "scripts/entry_adders_sql_safe.php";

        // Set all the rows data
        mysql_query("UPDATE mods SET version='$version' WHERE name='$name'",$handle);
        mysql_query("UPDATE mods SET 3m_rele='$mmmrel' WHERE name='$name'",$handle) or SQLerror("Error on 3m_specific:rel","");
        mysql_query("UPDATE mods SET overview='$overview' WHERE name='$name'",$handle)or SQLerror("Error on overview","");
        mysql_query("UPDATE mods SET description='$desc' WHERE name='$name'",$handle) or SQLerror("Error on desc","");
        mysql_query("UPDATE mods SET tags='$tags' WHERE name='$name'",$handle)or SQLerror("Error on tags","");
        mysql_query("UPDATE mods SET license='$license' WHERE name='$name'",$handle)or SQLerror("Error on license","");
        mysql_query("UPDATE mods SET repotype='$mmmrt' WHERE name='$name'",$handle) or SQLerror("Error on 3m_specific:repotype","");
        mysql_query("UPDATE mods SET file='$file' WHERE name='$name'",$handle)or SQLerror("Error on file","");
        mysql_query("UPDATE mods SET depend='$depend' WHERE name='$name'",$handle)or SQLerror("Error on depend","");
        mysql_query("UPDATE mods SET basename='$basename' WHERE name='$name'",$handle)or SQLerror("Error on basename","");
        mysql_query("UPDATE mods SET progress='$perc' WHERE name='$name'",$handle)or SQLerror("Error on percentage","");

        // Display the extension
        header("location: viewmod.php?id=$id");
        die("");
    }
}
// --------------------------     
// End of loading variable
// --------------------------




?>
Help: <a href="help/markup.php" target="_blank">Description Markup</a> - <a href="help/tags.php" target="_blank">Tags</a>
<hr /><?php
 echo "<p style=\"color:#ff0000;\">$message</p>\n";
?>
<form method="post" action="<?php echo curPageURL();?>">
<table width="100%">

<!--Tags, License, File, Depend, Basename-->

<!--Mod Name and Version-->
<tr>
<td width="60%">Mod Name:* <input type="text" size="50" name="mod_name" value="<?php echo $name;?>"></td>

<td width="40%">
<table width="100%"><tr><td>Version:* <input type="text" size="10" name="mod_version" value="<?php echo $version;?>"></td><td>
3m Release: <input type="text" size="10" name="mmmrel" value="<?php echo $mmmrel;?>"></td>

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

    <tr><td colspan="2">Percentage Complete: <input type="text" size="10" placeholder="100" name="mod_per" value="<?php echo $perc;?>">%</td></tr>

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
