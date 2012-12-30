<?php

$pun_decl=true;
//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', '../../../forum/');
require FORUM_ROOT.'include/common.php';

include "../../scripts/setup.php";

$id=$_GET['id'];
$id= mysql_real_escape_string ($id);
$res = mysql_query("SELECT * FROM mods WHERE name='$id'",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
header("Content-type: text/plain");
$row = mysql_fetch_row($res) or die("Name:\nDepends:\nFile:\nVersion:\n");



echo "Name:{$row[1]}\n";
echo "Depends:{$row[10]}\n";
echo "File:{$row[9]}\n";
echo "Version:{$row[2]}\n";

die("");
?>