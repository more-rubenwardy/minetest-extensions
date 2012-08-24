<?php
include "../scripts/setup.php";

$id="mod";
$res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$id%' ORDER BY likes",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

header("Content-type: text/plain");

// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
      echo "{$hash['name']}\n";
}

die("");
?>