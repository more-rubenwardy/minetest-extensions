<?php
include "scripts/setup.php";

$page_title="Control Panel";
require_login();

include "scripts/pageheader.php";

echo "<h1>Admin</h1>\n";

$id=$_GET['id'];
$mode=$_GET['mode'];

if ($id=="clear"){
    session_destroy();
}

if (is_member_moderator($_SESSION['user'],$handle)==false){
   die ("You do not have admin or moderator position on this forum.");
}



if($mode=="owner"){

  if(is_numeric($id)==false)
     die("Value is not numeric!");

  $res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
  $hash = mysql_fetch_assoc($res);
  
  echo "<center><h2>Change owner of '{$hash['name']}'</h2>\n";

  $owner=$_POST['owner'];
  $ov=$_POST['override'];
  $message="Change the owner of the entry <b>{$hash['name']}</b>";
  if (!$owner==""){
     $user = mysql_real_escape_string ($owner);
     $ur = mysql_query("SELECT * FROM users WHERE name='$user'",$handle);
     if (mysql_num_rows($ur)<1){
       if ($ov==false){
         $message="User '$owner' does not exist";
       }else{
         addUser($user,"temp_pass","temp_pass","temp@email.co.uk",$handle);
         $ur = mysql_query("SELECT * FROM users WHERE name='$user'",$handle);
         $user = mysql_fetch_array($ur);
         $ow_id=$user[0];
         mysql_query("UPDATE mods SET owner=$ow_id WHERE mod_id=$id",$handle)or die("error on setting owner");
         header("location: viewmod.php?id=$id");
       }
     }else{
        $user = mysql_fetch_array($ur);
        $ow_id=$user[0];
        mysql_query("UPDATE mods SET owner=$ow_id WHERE mod_id=$id",$handle)or die("error on setting owner");
        header("location: viewmod.php?id=$id");
     }
  }

  $q=0;
  $q = mysql_query("SELECT * FROM users WHERE id=".$hash['owner']);
  if ($q){
      echo "<!--User is relative-->";
      $qr = mysql_fetch_array($q) or print("");
      $qr=$qr[1];
  }else{
      echo "<!--User is not relative-->";
      $qr = $hash['owner'];
  }

  echo "$message<br /><br /><form method=\"post\" action=\"".curPageURL()."\">";
  echo "<input type=\"text\" name=\"owner\" size=50 value=\"{$qr}\"><br /><br />";
  echo "<input type=\"checkbox\" name=\"override\"> Create account if it does not exist.<br />";
  echo "<br /><input type=\"submit\" value=\"Change\"></form></center>";
}else{
      echo "Welcome to the admin console.";
}



include "scripts/pagefooter.php";
?>