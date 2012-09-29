<?php
$mmmrel=$_POST['mmmrel'];
if ($mmmrel=="")
	$mmmrel=1;

// Load Posted Values
$name=$_POST['mod_name'];
if ($name=="")
   return 0;

$version=$_POST['mod_version'];
if ($version=="")
   return 0;

//3m release (by Phitherek_)

//End of Phitherek_' s code

$desc=$_POST['mod_desc'];
if ($desc=="")
   return 0;
   
$overview=$_POST['mod_ov'];
if ($overview=="")
   return 0;

//Tag
$tags_type=$_POST['mod_tag_type'];
if ($tags_type=="")
   return 0;

$tags_msc=$_POST['mod_tag_msc'];
if ($tags_msc=="")
   return 0;

$license=$_POST['mod_lic'];

//3m repotype
$mmmrt=$_POST['mmmrt'];
if($mmmrt=="")
	return 0;
//End of Phitherek_' s code

$file=$_POST['mod_file'];
if ($file=="")
   return 0;

$depend=$_POST['mod_dep'];

$basename=$_POST['mod_base'];

$owner=$_POST['user'];

if ($owner=="")
   $owner=$_SESSION['user'];

//Extract ownerid from database (by Phitherek_)
$q = mysql_query("SELECT id FROM users WHERE name='".$owner."'");
$qr = mysql_fetch_array($q);
$ownerid = $qr['id'];
//End of Phitherek_' s code
//Load on_submit values
$date = date('Y-m-d H:i:s');
$tags = "$tags_type,$tags_msc,";

if (entry_exists($name,$handle))
   return 1;
//Substitute owner with ownerid (by Phitherek_)
mysql_query("INSERT INTO mods (name,version,owner,description,tags,likes,dislikes,license,file,depend,basename,date_released,repotype,3m_rele,overview)
VALUES ('$name','$version',$ownerid,'$desc','$tags',0,0,'$license','$file','$depend','$basename','$date','$mmmrt','$mmmrel','$overview')");
//End of Phitherek_' s change

$the_id=mysql_insert_id($handle);

header("location: viewmod.php?id=$the_id");
?>