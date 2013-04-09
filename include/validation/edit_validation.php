<?php
// Load all of the posted values
$mmmrel=$_POST['mmmrel'];
$name=$_POST['mod_name'];
$version=$_POST['mod_version'];
$desc=$_POST['mod_desc'];
$overview=$_POST['mod_ov'];
$tags=$_POST['mod_tags'];
$license=$_POST['mod_lic'];
$mmmrt=$_POST['mmmrt'];
$file=$_POST['mod_file'];
$depend=$_POST['mod_dep'];
$basename=$_POST['mod_base'];
$perc=$_POST['mod_per'];

if ($name==""){
   $name=$row['name'];
}else{
    return 1;
}

if ($version=="")
    $version=$row['version'];


if($mmmrel=="")
    $mmmrel=$row['3m_rele'];

if ($desc==""){
   $desc=str_replace("\\'","'",$row['description']);
}

if ($overview=="")
   $overview = str_replace("\\'","'",$row['overview']);

if ($tags=="")
   $tags = $row['tags'];

if ($license=="")
   $license=$row['license'];

// 3m repotype (by Phitherek_)
if($mmmrt =="") {
$mmmrt = $row['repotype'];
}
// End of Phitherek_' s code
if ($file=="")
   $file=$row['file'];

$depend=$_POST['mod_dep'];
if ($depend=="")
   $depend=$row['depend'];

if ($basename=="")
   $basename=$row['basename'];


if ($perc=="")
    $perc=$row['progress'];
   
return 0;
?>