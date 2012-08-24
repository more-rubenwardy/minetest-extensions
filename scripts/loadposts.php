<?php
echo "<table width=100%><tr><th width=100></th><th></th><th width=100></th></tr>";

$res = mysql_query("SELECT * FROM posts WHERE topic=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$id'");

// Get posts loop
while ($hash = mysql_fetch_assoc($res)){
      echo "<tr><td>User: {$hash['owner']}</td>";
      echo "<td>{$hash['post']}</td><td></td></tr>";

}
echo "</table>";
?>