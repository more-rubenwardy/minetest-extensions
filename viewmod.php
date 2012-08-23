<?php
include "scripts/setup.php";

$id=$_GET['id'];
$id= mysql_escape_string ($id);
$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
$row = mysql_fetch_row($res) or die("row error");
$page_title="View mod - {$row[1]}";

include "scripts/pageheader.php";

?>
</div>
</body>
</html>