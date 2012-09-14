<?php
include "../../scripts/setup.php";

$id=$_GET['id'];
$id= mysql_real_escape_string ($id);
$res = mysql_query("SELECT * FROM mods WHERE name='$id'",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
header("Content-type: text/plain");
$row = mysql_fetch_row($res) or die("Name:\nDepends:\nFile:\nVersion:\n");



echo "{{$row[1]}}\n";
echo "[description]\n";
echo "{$row[3]}\n";
echo "[release]\n";
echo "{$row[2]}\n";
echo "[deps]\n";
echo "[depsend]\n";
echo "[repotype]\n";
echo "archive\n";
echo "[repoaddr]\n";
echo "{$row[9]}\n";
echo "{end}\n";


die("");
?>