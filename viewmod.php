<?php
include "scripts/setup.php";

include "scripts/voters.php";


$id=$_GET['id'];
$act=$_GET['action'];


if ($act=="like"){
	echo "Liking";
 likeMod($id,$_SESSION['user'],$handle);
}

$res=0;
$gen_num=0;

if ($id=="random"){
	$gen_num= rand(0,getNoTopics("",$handle));
	$res = mysql_query("SELECT * FROM mods LIMIT $gen_num, 1",$handle);
}else if (is_numeric($id)){
	$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
}else{
	SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$row = mysql_fetch_row($res) or SQLerror("Row Error","No results where found for a mod with the id $gen_num");
$page_title="View mod - {$row[1]}";
$id=$row[0];


// Substitute owner ID with owner name (by Phitherek_):
if (is_numeric($row[3])==true){
$r = mysql_query("SELECT name FROM users WHERE id=".$row[3],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
$ra = mysql_fetch_array($r);
$owner = $ra['name'];
}else{
  $owner = $row[3];
}
// End of Phitherek_' s code


$page_description=$row[22];
include "scripts/pageheader.php";


if (is_member_moderator($_SESSION['user'],$handle)){
$links="<a href=\"admin.php?mode=owner&id=$id\">Change Owner</a> - <a href=\"editentry.php?id=$id\">Edit</a> <a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a> <a href=\"deleteentry.php?id=$id\">Delete</a>";
}elseif (getUserId($_SESSION['user'],$handle)==$row[3]){
$links="<a href=\"editentry.php?id=$id\">Edit</a> <a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a> <a href=\"deleteentry.php?id=$id\">Delete</a>";
}else{
$links="";
}


echo "<table width=\"900\"><tr><td>\n";
echo "<table width=\"900\" bgcolor=\"#FFFFBD\"><tr><td width=\"100\"><a href=\"".getDownload($row)."\">Download</a></td>\n";

echo "<td width=\"650\">\n";    // Download Link
echo "<h1 align=center>{$row[1]} - by <a href=\"user.php?id={$row[3]}\">{$owner}</a></h1></td>\n";  // Title and User Link

echo "<td width=\"25\">{$row[2]}</td></tr></table></td></tr>\n"; // Version

echo "<tr><td><table width=\"900\"><tr><td><div style=\"width:870px;text-wrap: suppress;\"><p>";

require_once('scripts/formatcode.php');
// load Recruiting Parsers' file
$parser = new parser;
// start Recruiting Parser...
// output $text using all arguments available
//$p_text=$parser->p($row[4], 1, 1, 0, 0, 0, 1, "");
$parsed = $parser->p($row[4],1);

echo $parsed;

echo "</p></div></td>\n"; // Description

if (is_logged_in()==true){
  $like_ext="";
  if (checkLike($_SESSION['user'],$id,5,$handle)==true)
     $like_ext="_high";

  $dislike_ext="";
  echo "<td width=\"25\" style=\"vertical-align:top;\"><a href=\"viewmod.php?id=$id&action=like\"><img src=\"images/like_mod$like_ext.png\" alt=\"like\" /></a></td></tr>";   // Likes
}else{
  echo "<td></td></tr>";   // Likes
}
echo "</table></td></tr>\n";

echo "<tr height=30 bgcolor=\"#FFFFBD\"><td style=\"text-align:right;\">$links&#32;&#32;&#32;&#32;</td></tr>\n";

if (!($row[23]=="")){
echo "<tr><td><br />Recommended Mods<br /></td></tr><tr></tr><tr height=\"80\"><td>\n";
echo "<table height=\"80\"><tr>\n";

$rec=explode(",",$row[23]);

for ($i=0;$i<count($rec);$i++){
    $id_i = $rec[$i];
    if (is_numeric($id)){
       $mod_i = mysql_query("SELECT * FROM mods WHERE mod_id=$id_i",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id_i'");
       $row_i = mysql_fetch_row($mod_i) or SQLerror("Row Error","No results where found for a mod with the id $id_i");
       $image = "images/topicicon_read.jpg";
       
       if ($row_i[20])
          $image="icon/".$row_i[20];

       echo "<td style=\"text-align:center;\"><a href=\"viewmod.php?id=$id_i\"><img height=100 width=100 src=\"$image\" title=\"{$row_i[1]}\" /></a><br /><b>{$row_i[1]}</b></td>\n";
    }
}

echo "</tr></table></td></tr>";
}

include "scripts/loadposts.php";

include "scripts/pagefooter.php";
?>
