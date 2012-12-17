<?php
$mmmrel=$_POST['mmmrel'];
$name=$_POST['mod_name'];
$version=$_POST['mod_version'];
$desc=$_POST['mod_desc'];
$overview=$_POST['mod_ov'];
$tags_type=$_POST['mod_tag_type'];
$tags_msc=$_POST['mod_tag_msc'];
$license=$_POST['mod_lic'];
$mmmrt=$_POST['mmmrt'];
$file=$_POST['mod_file'];
$depend=$_POST['mod_dep'];
$basename=$_POST['mod_base'];
$owner=$_POST['user'];

if ($mmmrel==0){
	$mmmrel=1;
}

if ($name=="")
   return 0;

if (strstr($name,"'")==true){
  $message="The name field may not contain '";
   return 0;
}

if ($version==""){
  $message="Mod version field required";
   return 0;
}

if ($desc==""){
    $message="Description field required";
   return 0;
}

if ($overview==""){
    $message="overview field required";
   return 0;
}

if ($tags_type==""){
    $message="entry type field required";
   return 0;
}


if ($tags_msc==""){
    $message="more than one tag is required";
   return 0;
}

if($mmmrt==""){
    $message="3m release version field required";
	return 0;
}

if ($file==""){
    $message="url to download required";
   return 0;
}

if ($owner=="")
   $owner=$_SESSION['user'];
   
return 1;
   
?>