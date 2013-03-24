<?php
$punbb_relative="../";

include "../scripts/setup.php";
$id=$_GET['id'];
if ($id==""){
   die("");
}

function printMessage($hash,$sep){
    if ($sep==true){
        echo "###\n";
    }

    echo "Name:{$hash['name']}|\n";
    echo "Version:{$hash['version']}|\n";
    echo "Overview:{$hash['overview']}|\n";
}

$carray=explode(",",$id);

$tmp=false;
foreach($carray as $a){
    $a = mysql_real_escape_string($a);
    if ($a!=""){
        $res = mysql_query("SELECT * FROM mods WHERE basename = '$a'",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

        if ($res){
            $hash=mysql_fetch_array($res);
            if ($hash){
                printMessage($hash,$tmp);
                $tmp=true;
            }
        }
    }
}
header("Content-type: text/plain");

$tmp=false;

// Get projects loop

die("");
?>