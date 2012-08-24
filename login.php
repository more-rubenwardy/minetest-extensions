<?php
include "scripts/setup.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$redir=$_GET['redir'];

$message="Enter your login details or Sign Up";

if (authcheck($user,$pass,$handle)==true){
   login($user);
   if ($redir==""){
      header("location: index.php");
   }else{
      header("location: $redir");
   }
}else{
   $message="Incorrect username/password";
}

if ($user=="" || $pass==""){
  $message="Enter your login details or Sign Up";
}

$page_title="Log In - Minetest Mods";
include "scripts/pageheader.php";
echo "<p>$message</p>";
?>

<form action="<?php echo curPageURL();?>" method="post">
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />
<input type="submit" value="Log In">
</form>