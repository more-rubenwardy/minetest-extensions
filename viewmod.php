<?php
include "scripts/setup.php";
include "scripts/voters.php";

$id=$_GET['id'];
$act=$_GET['action'];

if ($act=="like"){
 likeMod($id,$_SESSION['user'],$handle);
}

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
$row = mysql_fetch_row($res) or die("row error");
$page_title="View mod - {$row[1]}";

// Substitute owner ID with owner name (by Phitherek_):
if (is_numeric($row[3])==true){
$r = mysql_query("SELECT name FROM users WHERE id=".$row[3],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
$ra = mysql_fetch_array($r);
$owner = $ra['name'];
}else{
  $owner = $row[3];
}
// End of Phitherek_' s code
include "scripts/pageheader.php";
include "scripts/formatcode.php";



if (is_member_moderator($_SESSION['user'],$handle) || $_SESSION['user']==$row[3]){
//3m Release Increasing (by Phitherek_)
$links="<a href=\"editentry.php?id=$id\">Edit</a> <a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a> <a href=\"deleteentry.php?id=$id\">Delete</a>";
//End of Phitherek_' s change
}else{
$links="";
}

echo "<table width=\"100%\"><tr bgcolor=\"#FFFFBD\"><td><a href=\"{$row[9]}\">Download</a></td><td>";    // Download Link
echo "<h1 align=center>{$row[1]} - by <a href=\"user.php?name={$owner}\">{$owner}</a></h1></td>";     // Title and User Link
echo "<td width=150>{$row[2]}</td></tr>";                                                               // Version
echo "<tr><td colspan=2><div style=\"width:900px;text-wrap: suppress;\"><p>".formatbb($row[4])."</p></div></td>"; // Description
if (is_logged_in()==true){
echo "<td><a href=\"viewmod.php?id=$id&action=like\">+</a></td></tr>";   // Likes
}else{
  echo "<td></td></tr>";   // Likes
}
echo "<tr height=30 bgcolor=\"#FFFFBD\"><td colspan=3 style=\"text-align:right;\">$links&#32;&#32;&#32;&#32;</td></tr>";

include "scripts/loadposts.php";

include "scripts/pagefooter.php";
?>