<?php

$pun_decl=true;
//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', '../../../forum/');
require FORUM_ROOT.'include/common.php';

include "../../scripts/setup.php";
$id=$_GET['id'];
if ($id==""){
   $id="mod";
}
$res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$id%' ORDER BY mod_id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

header("Content-type: text/plain");

// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
      echo "{$hash['name']}\n";
}

die("");
?>