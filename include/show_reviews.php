<?php
$startrow = $_GET['page'];

int_assert($id);

$res = mysql_query("SELECT * FROM reviews WHERE mID=$id",$handle);
$reviews=false;

if ($res){
	echo "<table id='review'>\n";

	while ($hash = mysql_fetch_assoc($res)){
		$reviews = true;

		echo "<tr>";

		$owner="";
		if (is_numeric($hash['uID'])){
			$ra = getUser($hash['uID'],$handle);
			$owner = $ra['name'];
		}

		echo "<td><div style=\"height:100%;\"><a href=\"user.php?id={$hash['uID']}\" >$owner</a></div></td>\n";
		echo "<td>".$hash['overview']."\n";
		echo "<p><a href=\"review.php?id={$hash['rID']}\">Read More</a></p>";
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