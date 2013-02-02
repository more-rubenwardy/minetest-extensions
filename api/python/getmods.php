<?php
$punbb_relative="../../";

include "../../scripts/setup.php";
$id=$_GET['id'];
if ($id==""){
   $id="mod";
}

$res = mysql_query("SELECT * FROM mods WHERE basename != '' AND tags LIKE '%$id%' AND tags LIKE '%mod%' ORDER BY mod_id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

header("Content-type: text/plain");

// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
      echo "{$hash['name']}\n";
}

die("");
?>