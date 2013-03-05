<?php
// Load all of the posted values
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
$perc=$_POST['mod_per'];

// Validation
$valid_mode = 1;

if ((include('entry_validation.php'))==0){
    return 0;
}

// Get owner id
$q = mysql_query("SELECT id FROM users WHERE name='".$owner."'");
$qr = mysql_fetch_array($q);
$ownerid = $qr['id'];

// Get the date
$date = date('Y-m-d H:i:s');
$tags = "$tags_type,$tags_msc,";

// Does the extensions already exist?
if (entry_exists($name,$handle))
    return 1;

// Convert values to SQL compatible
require_once "entry_adders_sql_safe.php";

// Insert the data into table
mysql_query("INSERT INTO mods (name,version,owner,description,tags,likes,license,file,depend,basename,date_released,repotype,3m_rele,overview,progress)
VALUES ('$name','$version',$ownerid,'$desc','$tags',0,'$license','$file','$depend','$basename','$date','$mmmrt','$mmmrel','$overview','$perc')");

// Get the id
$the_id=mysql_insert_id($handle);

// Display the extension
header("location: viewmod.php?id=$the_id");
?>