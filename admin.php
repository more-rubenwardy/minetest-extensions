<?php
include "scripts/setup.php";

$page_title="Control Panel";
require_login();

include "scripts/pageheader.php";

echo "<h1><a href='admin.php'>Admin</a></h1>\n";

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
     die("Value is not numeric!<p>ie: <a href='admin.php?mode=owner&id=12'>admin.php?mode=owner&id=MODID</a>");

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
         $ow_id=$user['id'];
         mysql_query("UPDATE mods SET owner=$ow_id WHERE mod_id=$id",$handle)or die("error on setting owner");
         header("location: viewmod.php?id=$id");
       }
     }else{
        $user = mysql_fetch_array($ur);
        $ow_id=$user['id'];
        mysql_query("UPDATE mods SET owner=$ow_id WHERE mod_id=$id",$handle)or die("error on setting owner");
        header("location: viewmod.php?id=$id");
     }
  }

  $q=0;
  $q = mysql_query("SELECT * FROM users WHERE id=".$hash['owner']);
  if ($q){
      echo "<!--User is relative-->";
      $qr = mysql_fetch_array($q) or print("");
      $qr=$qr['name'];
  }else{
      echo "<!--User is not relative-->";
      $qr = $hash['owner'];
  }

  echo "$message<br /><br /><form method=\"post\" action=\"".curPageURL()."\">";
  echo "<input type=\"text\" name=\"owner\" size=50 value=\"{$qr}\"><br /><br />";
  echo "<input type=\"checkbox\" name=\"override\"> Create account if it does not exist.<br />";
  echo "<br /><input type=\"submit\" value=\"Change\"></form></center>";
}else if ($mode=="likes"){
    echo "starting script...<br>\n";
	$starttime = microtime(true);
    $res = mysql_query("SELECT * FROM mods",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");
    while ($hash = mysql_fetch_assoc($res)){
        updateLikes($hash['mod_id'],$handle);
    }
$endtime = microtime(true);
$duration = $endtime - $starttime; //calculates total time taken
    echo "script completed in $duration seconds";
}else if ($mode=="clean_users"){
    $res = mysql_query("SELECT * FROM users",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");
    echo "starting script...<br>\n<ul>\n";
	$starttime = microtime(true);
    while ($hash = mysql_fetch_assoc($res)){
        if (updateUser($hash['id'],$handle)==false){
            echo "<li><b>deleting user: ".$hash['name']."</b></li>\n";
            mysql_query("DELETE FROM users WHERE id=".$hash['id'],$handle);
        }else{
            echo "<li>updating user: ".$hash['name']."</li>\n";
        }
    }
$endtime = microtime(true);
$duration = $endtime - $starttime; //calculates total time taken
    echo "</ul>\nscript completed in $duration seconds\n";
	
}else{
      ?>Welcome to the admin console.

<ul>
    <li><a href="admin.php?mode=owner">Change the owner of a mod</a></li>
    <li><a href="admin.php?mode=likes">Update mod list votes</a></li>
    <li><a href="admin.php?mode=clean_users">Clean and update user lists</a></li>
</ul>

<?php
}



include "scripts/pagefooter.php";
?>
