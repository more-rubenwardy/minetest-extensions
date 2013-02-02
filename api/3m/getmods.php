<?php
$punbb_relative="../../";

include "../../scripts/setup.php";
$id=$_GET['id'];
if ($id==""){
   $id="mod";
}
$res = mysql_query("SELECT * FROM mods WHERE basename != '' AND tags LIKE '%mod%' AND tags LIKE '%$id%' ORDER BY mod_id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

header("Content-type: text/plain");

// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
      echo "{{$hash['basename']}}\n";
      echo "[server]\n";
      echo "multa.bugs3.com\n";
      echo "[modinfo]\n";
      echo "/minetest/forum/api/3m/getmodbyname.php?id={$hash['basename']}\n";
      echo "{end}\n\n";
}

die("");
?>