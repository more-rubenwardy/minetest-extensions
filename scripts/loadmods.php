<?php
echo "<table width=\"100%\"><tr><th colspan=2>Mod Name</th><th>Description</th><th width=200>Tags</th><th>Likes</th></tr>\n";
$query= mysql_real_escape_string ($query);
$res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$query%' ORDER BY likes DESC",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

$alternate=1;
// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
  
      if ($alternate==0){
         $bgcolor="#FFFFFF";
      }else{
         $bgcolor="#FFFFBD";
      }

      // Owner name from id (by Phitherek_)

      $name="";
      $q=0;
      $q = mysql_query("SELECT name FROM users WHERE id=".$hash['owner']);
      if ($q){
      $qr = mysql_fetch_array($q) or print("");
      $name=$qr['name'];
      }
      // End of Phitherek_' s code

      // Owner name instead of id (by Phitherek_)
      echo "<tr bgcolor=\"$bgcolor\"><td width=16><img width=16 height=16 src=\"images/topicicon_read.jpg\" /></td><td><a href=\"viewmod.php?id={$hash['mod_id']}\">{$hash['name']}</a><br />by $name</td>";
      // End of Phitherek_' s change
      echo "<td>{$hash['overview']}</td>";
      echo "<td>{$hash['tags']}</td>";
      echo "<td>{$hash['likes']}</td></tr>\n";

      $alternate=1-$alternate;
}
echo "</table>";
?>
