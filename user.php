<?php
include "scripts/setup.php";

$page_title="Users";
include "scripts/pageheader.php";

$id=$_GET['id'];

if ($id==""){
   echo "<table width=\"100%\"><tr><th colspan=2>Username</th></tr>\n";
   echo "</table>";
}else{
}

include "scripts/pagefooter.php";
?>