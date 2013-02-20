<?php
$punbb_relative="../../";

include "../../scripts/setup.php";

$id=$_GET['id'];

header("Content-type: text/plain");

if (is_numeric($id)==false){
   //SQLerror("error: Non Numeric Value","?id=$id is not allowed");
   die("Name:\nDepends:\nFile:\nVersion:\n");
}

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");

$row = mysql_fetch_array($res) or die("Name:\nDepends:\nFile:\nVersion:\n");



echo "Name:{$row['basename']}\n";
echo "Depends:{$row['depend']}\n";
echo "File:".getDownload($row)."\n";
echo "Version:{$row['version']}\n";

die("");
?>