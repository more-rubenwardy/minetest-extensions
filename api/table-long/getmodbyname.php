<?php
$punbb_relative="../../";

include "../../scripts/setup.php";

header("Content-type: text/plain");

$id=$_GET['id'];

if ($id==""){
    die("Name:\nDepends:\nFile:\nVersion:\nOverview:");
}

$id= mysql_real_escape_string ($id);
$res = mysql_query("SELECT * FROM mods WHERE basename='$id'",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");

$row = mysql_fetch_array($res) or die("Name:\nDepends:\nFile:\nVersion:\nOverview:\n");

echo "Name:{$row['basename']}\n";
echo "Depends:{$row['depend']}\n";
echo "File:".getDownload($row)."\n";
echo "Version:{$row['3m_rele']}\n";
echo "Overview:{$row['overview']}";

die("");
?>