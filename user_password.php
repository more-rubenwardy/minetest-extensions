<?php
include "scripts/setup.php";
require_login();

$redir=$_GET['redir'];
$pass_old=$_POST['old'];
$pass_new=$_POST['new'];
$pass_con=$_POST['new2'];

if (!($pass_new=="")){
   if ($pass_con==$pass_new){
     $res = mysql_query("SELECT * FROM users WHERE id=$id",$handle) or SQLerror("MySQL Query Error","Error on getting database.users");
     $hash = mysql_fetch_assoc($res)
     if (sha1($pass_old)==$hash['password']){
        if ($redir==""){
           header("location: index.php");
        }else{
          header("location:  $redir");
        }
     }
   }
}



$page_title="Change your password";
include "scripts/pageheader.php";
?>
<center>
<h1>Change your password</h1>
<form method="post" action="<?php curPageURL();?>">
Old Password: <input type="password" name="old"<?php

if ($_GET['auto']==true){
echo " value=\"temp_pass\" readonly=\"true\"";
}

?>><br />
<br />
New Password: <input type="password" name="new"><br />
Confirm Password: <input type="password" name="new_2"><br /><br />
<input type="submit" value="Change" />
</form>
</center>

<?php
  include "scripts/pagefooter.php";
?>