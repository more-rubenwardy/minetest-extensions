<?php
echo "<table width=\"100%\"><tr><th colspan=2>Mod Name</th><th>Populatity</th><th>Tags</th><th>License</th></tr>\n";
$query= mysql_real_escape_string ($query);
$res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$query%' ORDER BY likes DESC",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
      echo "<tr><td width=16><img width=16 height=16 src=\"images/topicicon_read.jpg\" /></td><td><a href=\"viewmod.php?id={$hash['mod_id']}\">{$hash['name']}</a><br />by {$hash['owner']}</td>";
      echo "<td>{$hash['likes']}</td>";
      echo "<td>{$hash['tags']}</td>";
      echo "<td>{$hash['license']}</td></tr>\n";

}
echo "</table>";
?>
