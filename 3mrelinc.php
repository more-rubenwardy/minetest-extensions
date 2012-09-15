<?php
// 3m Release increasing (by Phitherek_)
include "scripts/setup.php";
$page_title="3m Release Increasing (by Phitherek_)";
require_login();
$id=$_GET['id'];

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

include "scripts/pageheader.php";

$mmmres = mysql_query("SELECT rel FROM 3m_specific WHERE id=".$id, $handle) or SQLerror("SQL Error", "Could not find the entry!");
$mmmarr = mysql_fetch_array($mmmres);
$mmmrel = $mmmarr['rel'];
$mmmrel = $mmmrel + 1;
$q = mysql_query("UPDATE 3m_specific SET rel=".$mmmrel." WHERE id=".$id, $handle) or SQLerror("SQL Error", "Could not increase 3m release value!");
echo("3m Release increased!<br />");

header("location: viewmod.php?id=$id");
// End of Phitherek_' s code
?>

