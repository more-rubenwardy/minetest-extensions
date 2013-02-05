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

if ($name==""){
   $name=$row['name'];
}else{
    return 1;
}

if ($version=="")
    $version=$row['version'];


if($mmmrel=="")
    $mmmrel=$row['3m_rele'];



$desc=$_POST['mod_desc'];
if ($desc==""){
   $desc=str_replace("\\'","'",$row['description']);
}
   
$overview=$_POST['mod_ov'];
if ($overview=="")
   $overview = str_replace("\\'","'",$row['overview']);

$tags=$_POST['mod_tags'];
if ($tags=="")
   $tags = $row['tags'];

$license=$_POST['mod_lic'];
if ($license=="")
   $license=$row['license'];

// 3m repotype (by Phitherek_)
$mmmrt=$_POST['mmmrt'];
if($mmmrt =="") {
$mmmrt = $row['repotype'];
}
// End of Phitherek_' s code

$file=$_POST['mod_file'];
if ($file=="")
   $file=$row['file'];

$depend=$_POST['mod_dep'];
if ($depend=="")
   $depend=$row['depend'];

$basename=$_POST['mod_base'];
if ($basename=="")
   $basename=$row['basename'];
   
return 0;
?>