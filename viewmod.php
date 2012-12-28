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

$row = mysql_fetch_array($res) or SQLerror("Row Error","No results where found for a mod with the id $gen_num");
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

echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:left;\">";



echo "<table style=\"max-width:700px;\" align=\"center\">\n";
echo "<tr><th colspan=3 width=\"650\">\n";
echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">{$row[1]} - by <a href=\"user.php?id={$row[3]}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link

echo "<tr>";
echo "<td width=\"33%\"><b>Download:</b> <a href=\"".getDownload($row)."\">Latest</a></td>";
echo "<td width=\"33%\"><b>Version:</b> {$row['version']}</td>\n"; // Version
echo "<td width=\"33%\"><b>Name:</b> {$row['basename']}</td>\n"; // Version

echo "<tr id=\"extra_info\">";

echo "<td><b>Download Type:</b> {$row['repotype']}</td>";
echo "<td><b>3M Release:</b> {$row['3m_rele']}</td>";
echo "<td><b>License:</b> {$row['license']}</td>";

echo "</tr>";

echo "<tr id=\"extra_info_2\">";

echo "<td colspan=2><b>Tags:</b> {$row['tags']}</td>";
echo "<td><b>Depends:</b> {$row['depend']}</td>";

echo "</tr>";

echo "<tr><td colspan=3>";

include_once "scripts/recommend.php";

echo "</td></tr>";
echo "</table>";

echo "</div>";

?>
<script type="text/javascript">
function toggleCode() {
	toggle('extra_info');
	toggle('extra_info_2');
}
toggleCode();
</script>
<?php

require_once('scripts/formatcode.php');
// load Recruiting Parsers' file
$parser = new parser;
// start Recruiting Parser...
// output $text using all arguments available
//$p_text=$parser->p($row[4], 1, 1, 0, 0, 0, 1, "");
$parsed = $parser->p($row[4],1);

echo "<div style=\"float:right;text-align:right;\">";

echo "<a href=\"#\" onClick=\"javascript:toggleCode();\"><u>Show/Hide More</u></a><br>";

if (is_logged_in()==true){
  $like_ext="";
  if (checkLike($_SESSION['user'],$id,5,$handle)==true)
     $like_ext="_high";

echo "<a href=\"viewmod.php?id=$id&action=like\"><img src=\"images/like_mod$like_ext.png\" alt=\"like\" /></a>";
}

echo "</div>";   // Likes


echo "<p>$parsed</p>";

echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;height:32px;line-height:32px;\">$links&#32;&#32;&#32;&#32;</div>\n";

include "scripts/loadposts.php";

include "scripts/pagefooter.php";
?>
