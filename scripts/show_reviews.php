<?php
require_once('formatcode.php');

$startrow = $_GET['page'];

if (is_numeric($id)==false)
    return;

$res = mysql_query("SELECT * FROM reviews WHERE mod_id=$id",$handle);
$reviews=false;

if ($res){
	echo "<table id='review'>\n";

	while ($hash = mysql_fetch_assoc($res)){
		$reviews = true;

		echo "<tr>";

		$owner="";
		if (is_numeric($hash['owner_id'])==true){
			$r = mysql_query("SELECT name FROM users WHERE id=".$hash['owner_id'],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
			$ra = mysql_fetch_array($r);
			$owner = $ra['name'];
		}

		echo "<td><div style=\"height:100%;\"><a href=\"user.php?id={$hash['owner_id']}\" >$owner</a></div></td>\n";
		echo "<td>".$hash['overview']."\n";
		echo "<p><a href=\"review.php?id={$hash['id']}\">Read More</a></p>";
		echo "</td>\n";

		echo "</tr>";
	}
	echo "</table>\n";
}

if ($reviews==false){
    echo "<i>No reviews available</i>";

	echo "<p>\n\tBe the first to  <a href=\"addreview.php?id=$id\">review this mod</a>\n</p>";
}else{
	echo "<p>\n\t<a href=\"addreview.php?id=$id\">Review this mod</a>\n</p>";
}

?>