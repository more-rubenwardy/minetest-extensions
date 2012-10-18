<?php
include "scripts/setup.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$redir=$_GET['redir'];

$message="";

if (authcheck($user,$pass,$handle)==true){
   login($user);
   if ($redir==""){
     if ($pass=="temp_pass"){
       header("location: user_password.php?auto=true&redir=user_email.php");
     }else{
      header("location: index.php");
     }
   }else{
      header("location: $redir");
   }
}else{
   $message="Incorrect username/password";
}

if ($user=="" || $pass==""){
  $message="Enter your login details or <a href=\"signup.php\">Sign Up</a>";
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

<?php
     include "scripts/pagefooter.php";
?>