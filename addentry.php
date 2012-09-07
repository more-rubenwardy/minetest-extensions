<?php
include "scripts/setup.php";
$page_title="Add a Mod";
include "scripts/pageheader.php";
require_login();

if ((include('scripts/addentry.php'))==1){
  echo "Entry already exists.<br /><br />";
}

?>
Help: <a href="help/markup.php" target="_blank">Description Markup</a> - <a href="help/tags.php" target="_blank">Tags</a>. Not creating? Make sure you fill in all *ed sections.
<hr />
<form method="post" action="<?php echo curPageURL();?>">
<?php
if (is_member_moderator($_SESSION['user'])==true){
   echo "<p>Owner is: <input type=\"text\" name=\"user\" value=\"{$_SESSION['user']}\"></p>";
}
?>
<table width="100%">

<!--Tags, License, File, Depend, Basename-->

<!--Mod Name and Version-->
<tr>
<td width="60%">Mod Name:* <input type="text" size="50" name="mod_name" value="<?php echo $name;?>"></td>
<td width="40%">Version:* <input type="text" size="30" name="mod_version" value="<?php echo $version;?>"></td>
</tr>

<!--Description-->
<tr>
<td colspan="2">
<p>*<Br /><textarea name="mod_desc" cols="105" rows="15">
<?php echo $desc;?>
</textarea></p>
</td>
</tr>

<!--License and File-->
<tr>
<td>File URL*: <input type="text" size="50" name="mod_file" value="<?php echo $file;?>"></td>
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
<td>*
<input type="radio" name="mod_tag_type" value="mod"> Mod
<input type="radio" name="mod_tag_type" value="mdpack"> Mod Pack
<input type="radio" name="mod_tag_type" value="texture"> Texture Pack
</td>
<td>
Other Tags: <input type="text" size=30 name="mod_tag_msc" value="<?php echo $tags_msc;?>">
</td>
</tr>

<tr>
<td colspan=2>
<br /><br /><center>
<input type="submit" value="Add Mod" />
</center>
</td>
</tr>

</table>
</form>

<?php
     include "scripts/pagefooter.php";
?>