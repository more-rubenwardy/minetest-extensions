<?php
function likeMod($id,$user,$handle){
  echo "\n\n\n<!-- function likeMod($id,$user,$handle) is executing:\n";
  if (is_numeric($id)==false){
    echo "[Error]: is not numeric\n";
     return 0;
  }

$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
$row = mysql_fetch_row($res) or die("row error");
$user_d = getUser($user,$handle);

if (!$user_d){
  echo "[Error]: user is null\n";
  return 0;
}

echo "[Notice]: calculating\n";
if (strstr($user_d[5],$row[1].",")){
  echo "-decreasing likes\n";
  changeLikes($id,$user,-1,$handle);
}else{
  echo "-increasing likes\n";
  changeLikes($id,$user,1,$handle);
}
echo "\n\nend of execution-->\n\n\n";
}


function changeLikes($id,$user,$amount,$handle){
  echo "\n\n\n function changeLikes($id,$user,$amount,$handle) is executing\n";

  $res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
  $row = mysql_fetch_row($res) or die("row error");
  $user_d = getUser($user,$handle);

  if (!$user_d){
    echo "[Error]: user is null\n";
    return 0;
  }

  if ($amount==1){
       $tmp=$user_d[5].$row[1].",";
       mysql_query("UPDATE users SET liked='$tmp' WHERE name='$user'",$handle) or die("Error on searching database.users.name for '$user'");
       $tmp=$row[5]+1;
       mysql_query("UPDATE mods SET likes=$tmp WHERE mod_id=$id",$handle) or die("Error on searching database.mods.mod_id for '$id'");
  }else{
       $tmp=str_replace($row[1].",","",$user_d[5]);
       mysql_query("UPDATE users SET liked='$tmp' WHERE name='$user'",$handle) or die("Error on searching database.users.name for '$user'");
       $tmp=$row[5]-1;
       mysql_query("UPDATE mods SET likes=$tmp WHERE mod_id=$id",$handle) or die("Error on searching database.mods.mod_id for '$id'");
  }
}

function changeDislikes($id,$user,$amount,$handle){
  echo "\n\n\n function changeDislikes($id,$user,$amount,$handle) is executing\n";

  $res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
  $row = mysql_fetch_row($res) or die("row error");
  $user_d = getUser($user,$handle);

  if (!$user_d){
    echo "[Error]: user is null\n";
    return 0;
  }

  if ($amount==1){
       $tmp=$user_d[9].$row[1].",";
       mysql_query("UPDATE users SET dislikes='$tmp' WHERE name='$user'",$handle) or die("Error on searching database.users.name for '$user'");
       $tmp=$row[6]+1;
       mysql_query("UPDATE mods SET dislikes=$tmp WHERE mod_id=$id",$handle) or die("Error on searching database.mods.mod_id for '$id'");
  }else{
       $tmp=str_replace($row[1].",","",$user_d[9]);
       mysql_query("UPDATE users SET dislikes='$tmp' WHERE name='$user'",$handle) or die("Error on searching database.users.name for '$user'");
       $tmp=$row[6]-1;
       mysql_query("UPDATE mods SET dislikes=$tmp WHERE mod_id=$id",$handle) or die("Error on searching database.mods.mod_id for '$id'");
  }
}
?>