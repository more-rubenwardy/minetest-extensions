<?php
// 3m Release increasing (by Phitherek_)
include "scripts/setup.php";
require_login();
$id=$_GET['id'];

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$mmmres = mysql_query("SELECT 3m_rele FROM mods WHERE mod_id=".$id, $handle) or SQLerror("SQL Error", "Could not find the entry!");
$mmmarr = mysql_fetch_array($mmmres);
$mmmrel = $mmmarr['3m_rele'];
$mmmrel = $mmmrel + 1;
$q = mysql_query("UPDATE mods SET 3m_rele=".$mmmrel." WHERE mod_id=".$id, $handle) or SQLerror("SQL Error", "Could not increase 3m release value!");

header("location: viewmod.php?id=$id");
// End of Phitherek_' s code
?>

