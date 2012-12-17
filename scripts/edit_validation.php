<?php
   $do=true;
$name=$_POST['mod_name'];
if ($name==""){
   $do=false;
   $name=$row[1];
}

$version=$_POST['mod_version'];
if ($version=="")
   $version=$row[2];

//3m release (by Phitherek_)
$mmmrel=$_POST['mmmrel'];
if($mmmrel=="") {
$mmmrel=$row[21];
}
//End of Phitherek_' s code

// Owner name instead of id (by Phitherek_)
$owner=$owar['name'];
// End of Phitherek_' s change

$desc=$_POST['mod_desc'];
if ($desc==""){
  echo "getting desc<br />";
   $desc=str_replace("\\'","'",$row[4]);
}
   
$overview=$_POST['mod_ov'];
if ($overview=="")
   $overview = str_replace("\\'","'",$row[22]);

$tags=$_POST['mod_tags'];
if ($tags=="")
   $tags = $row[7];

$license=$_POST['mod_lic'];
if ($license=="")
   $license=$row[8];

// 3m repotype (by Phitherek_)
$mmmrt=$_POST['mmmrt'];
if($mmmrt =="") {
$mmmrt = $row[19];
}
// End of Phitherek_' s code

$file=$_POST['mod_file'];
if ($file=="")
   $file=$row[9];

$depend=$_POST['mod_dep'];
if ($depend=="")
   $depend=$row[10];

$basename=$_POST['mod_base'];
if ($basename=="")
   $basename=$row[11];
   
return $do;
?>