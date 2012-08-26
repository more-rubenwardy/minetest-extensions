<?php
include "scripts/setup.php";

$id=$_GET['id'];

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
$row = mysql_fetch_row($res) or die("row error");
$page_title="View mod - {$row[1]}";

include "scripts/pageheader.php";
include "scripts/formatcode.php";

if (is_member_moderator($_SESSION['user']) || $_SESSION['user']==$row[3]){
$links="<a href=\"editentry.php?id=$id\">Edit</a>";
}else{
$links="";
}

echo "<table width=\"100%\"><tr bgcolor=\"#FFFFBD\"><td><a href=\"{$row[9]}\">Download</a></td><td>";
echo "<h1 align=center>{$row[1]} - by <a href=\"user.php?name={$row[3]}\">{$row[3]}</a></h1></td>";
echo "<td width=100>{$row[2]}</td></tr>";
echo "<tr><td colspan=3><div style=\"width:900px;text-wrap: suppress;\"><p>".formatbb($row[4])."</p></div></td><tr>";
echo "<tr height=30 bgcolor=\"#FFFFBD\"><td colspan=3 style=\"text-align:right;\">$links&#32;&#32;&#32;&#32;</td></tr>";

include "scripts/loadposts.php";

include "scripts/pagefooter.php";
?>