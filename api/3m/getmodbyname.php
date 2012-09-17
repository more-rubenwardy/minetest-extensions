<?php
include "../../scripts/setup.php";

$id=$_GET['id'];
$id= mysql_real_escape_string ($id);
$res = mysql_query("SELECT * FROM mods WHERE basename='$id'",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
header("Content-type: text/plain");
$row = mysql_fetch_array($res) or die("error");


echo "{{$row['basename']}}\n";
echo "[description]\n";
echo "{$row['overview']}\n";
echo "[release]\n";
echo "{$row['3m_rele']}\n";
echo "[deps]\n";
$deps = $row['depend'];
$parseddeps = "";
for($i=0; $i < strlen($deps); $i++) {
	if($deps[$i] == ",") {
	$parseddeps .= "\n";	
	} else if($deps == " ") {
		
	} else {
	$parseddeps .= $deps[$i];	
	}
}
echo "{$parseddeps}\n";
echo "[depsend]\n";
echo "[repotype]\n";
echo "{$row['repotype']}\n";
echo "[repoaddr]\n";
echo "{$row['file']}\n";
echo "{end}\n";


die("");
?>