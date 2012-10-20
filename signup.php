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

if ($res==1){
   login($user);
   header("location: reg_complete.php");
}
   
if ($res==2)
   $message="Passwords do not match";
   
if ($res==3)
   $message="Account Creation Failed";
   
if ($res==4)
   $message="User already exists.<br />If you did not create an account, then it is likely an admin did to add your entry. Ask an admin for your password";
?>
<table><tr><td width="50%">
<?php
echo "<p>$message</p>";
?>
<form method="post" action="signup.php">
<b>Email:</b> <input type="email" name="email"><br /><br />
<b>Username:</b> <input type="text" name="user"><br /><br />
<b>Password:</b> <input type="password" name="pass"><br /><br />
<b>Confirm:</b> <input type="password" name="passcon"><br /><br />
<input type="submit" value="Create">
</form>
<td><td width="50%">
<h2>Sign Up for a Minetest Mod Forum account</h2>
<h3>Vote</h3>
Vote on which mod, mod pack, texture pack or sound pack is the best
<h3>Add a Mod</h3>
Add a mod, mod pack, texture pack or sound pack to this database
<h3>Secure</h3>
Your password is safe with SHA-1 encrypton, and we will never share your email address or other details
</td></tr>
</table>

<?php
     include "scripts/pagefooter.php";
?>