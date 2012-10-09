<?php
include "scripts/setup.php";

$page_title="Users";
include "scripts/pageheader.php";

$id=$_GET['id'];

if ($id==""){
   echo "<table width=\"100%\"><tr><th colspan=2>Username</th></tr>\n";
   $res = mysql_query("SELECT * FROM users",$handle) or SQLerror("MySQL Query Error","Error on getting database.users");
$alternate=1;
// Get projects loop
while ($hash = mysql_fetch_assoc($res)){
   if ($alternate==0){
         $bgcolor="#FFFFFF";
      }else{
         $bgcolor="#FFFFBD";
      }
      echo "<tr bgcolor=\"$bgcolor\"><td width=16><img width=16 height=16 src=\"images/topicicon_read.jpg\" /></td><td><a href=\"user.php?id={$hash['id']}\">{$hash['name']}</a></td></tr>\n";
      $alternate=1-$alternate;
}
   echo "</table>";
}else{
  if (is_numeric($id)==false){
    die("Id is not a number!");
  }
  $res = mysql_query("SELECT * FROM users WHERE id=$id",$handle) or SQLerror("MySQL Query Error","Error on getting database.users");
  $hash = mysql_fetch_assoc($res);
  echo "<h1>{$hash['name']}</h1>";
  echo "{$hash['name']} is a level {$hash['level']} member.";
}

include "scripts/pagefooter.php";
?>