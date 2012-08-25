<?php
include "scripts/setup.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$passcon=$_POST['passcon'];
$email=$_POST['email'];

$page_title="Sign Up";
include "scripts/pageheader.php";
$message="Enter your details below.";

$res=addUser($user,$pass,$passcon,$email,$handle);

if ($res==1)
   header("location: login.php");
   
if ($res==2)
   $message="Passwords do not match";
   
if ($res==3)
   $message="Account Creation Failed";


echo "<p>$message</p>";
?>

<form method="post" action="signup.php">
Email: <input type="email" name="email"><br />
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />
Confirm: <input type="password" name="passcon"><br />
<input type="submit" value="Create">
</form>