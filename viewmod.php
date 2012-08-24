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

echo "<table width=\"100%\"><tr><td>";
echo "<h1 align=center>{$row[1]} - by <a href=\"user.php?name={$row[3]}\">{$row[3]}</a></h1></td>";
echo "<td width=100>{$row[2]}</td></tr>";
echo "<td colspan=2>{$row[4]}</td>";

include "scripts/loadposts.php";
?>
</div>
</body>
</html>