<?php
include "scripts/setup.php";
$page_title="Log In - Minetest Mods";
include "scripts/pageheader.php";
require_login();
?>
Help: <a href="help/markup.php" target="_blank">Markup</a> - <a href="help/tags.php" target="_blank">Tags</a>
<hr />
<form method="post" action="<?php echo curPageURL();?>">
<table width="100%">

<!--Tags, License, File, Depend, Basename-->

<!--Mod Name and Version-->
<tr>
<td width="60%">Mod Name: <input type="text" size="50" name="mod_name"></td>
<td width="40%">Version: <input type="text" size="30" name="mod_version"></td>
</tr>

<!--Description-->
<tr>
<td colspan="2">
<p><textarea name="mod_desc" cols="105" rows="15">
[modname], [version]

[img]url[/img]

[download]
</textarea></p>
</td>
</tr>

<!--License and File-->
<tr>
<td>File URL: <input type="text" size="50" name="mod_file"></td>
<td>License: <input type="text" size="30" name="mod_lic"></td>
</tr>

<!--Depends and Basename-->
<tr>
<td>Depends (seperated by ","): <input type="text" size="30" name="mod_dep"></td>
<td>Mod Namespace: <input type="text" size="30" name="mod_base"></td>
</tr>

<!--Tags-->
<tr><td colspan="2"><br /><br /><center><b>Tags</b> Users use tags to search and find mods</center></td></tr>

<tr>
<td>
<input type="radio" name="mod_tag_type" value="mod"> Mod
<input type="radio" name="mod_tag_type" value="modpack"> Mod Pack
<input type="radio" name="mod_tag_type" value="texture"> Texture Pack
</td>
<td>
Other keywords: <input type="text" size=30 name="mod_tag_msc">
</td>
</tr>

</table>
</form>