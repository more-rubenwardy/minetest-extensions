<?php
if ((include('entry_validation.php'))==0){
  return 0;
}

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
   
require_once "entry_adders_sql_safe.php";
//Substitute owner with ownerid (by Phitherek_)
mysql_query("INSERT INTO mods (name,version,owner,description,tags,likes,dislikes,license,file,depend,basename,date_released,repotype,3m_rele,overview)
VALUES ('$name','$version',$ownerid,'$desc','$tags',0,0,'$license','$file','$depend','$basename','$date','$mmmrt','$mmmrel','$overview')");
//End of Phitherek_' s change

$the_id=mysql_insert_id($handle);

header("location: viewmod.php?id=$the_id");
?>