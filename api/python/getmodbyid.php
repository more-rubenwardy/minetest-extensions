<?php

$pun_decl=true;
//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', '../../../forum/');
require FORUM_ROOT.'include/common.php';

include "../../scripts/setup.php";

$id=$_GET['id'];

header("Content-type: text/plain");

if (is_numeric($id)==false){
   //SQLerror("error: Non Numeric Value","?id=$id is not allowed");
   die("Name:\nDepends:\nFile:\nVersion:\n");
}

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");

$row = mysql_fetch_row($res) or die("Name:\nDepends:\nFile:\nVersion:\n");



echo "Name:{$row[1]}\n";
echo "Depends:{$row[10]}\n";
echo "File:{$row[9]}\n";
echo "Version:{$row[2]}\n";

die("");
?>