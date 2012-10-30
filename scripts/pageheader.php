<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-gb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<meta name="Generator" content="Serif WebPlus X5 (13.0.3.029)">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<title><?php echo $page_title ?> - Minetest Mods</title>
<meta name="keywords" content="">
<meta name="author" content="Andrew Ward">
<meta name="copyright" content="Copyright &#xA9; to Andrew Ward">
<meta http-equiv="Content-Language" content="en-gb">
<meta name="robots" content="index,follow">
<link rel="stylesheet" type="text/css" href="<?php echo $serverpath;?>/mainstyle.css" />
<!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
</head>


<body text="#000000" style="background-color:#ffffff; text-align:center; height:610px;">
<div style="background-color:transparent;text-align:left;margin-left:auto;margin-right:auto;position:relative;width:900px;">

<!--The Header-->
<img src="<?php echo $serverpath;?>/images/header.png" width="900" height="100" border="0" alt="" style="position:absolute;left:0px;top:0px;">

<div id="slogan" style="text-align:right;position:relative;left:250px;top:60px;width:400px;height=20px;">Mods - Texture Packs - Sound Packs - Code Mods</div>

<div id="userbar" style="text-align:right;position:relative;left:710px;top:55px;width:180px;height=30px;"><?php
if (is_logged_in()){
   echo "<a href=\"$serverpath/user.php?id=".getUserId($_SESSION['user'],$handle)."\"><font color=\"#FFFFFF\"><u>".$_SESSION['user']."</u></font></a> - <a href=\"$serverpath/logout.php\"><font color=\"#FFFFFF\"><u>Log Out</u></font></a>";
}else{
   echo "<a href=\"$serverpath/login.php\"><font color=\"#FFFFFF\"><u>Login</u></font></a> - ";
   echo "<a href=\"$serverpath/signup.php\"><font color=\"#FFFFFF\"><u>Sign Up</u></font></a>";
}
?></div>                                                                           

<div id="userbar" style="text-align:left;position:relative;left:10px;top:35px;width:180px;height=30px;"><?php
     echo "<a href=\"$serverpath/index.php\"><font color=\"#FFFFFF\"><u>Home</u></font></a> - ";
     echo "<a href=\"$serverpath/user.php\"><font color=\"#FFFFFF\"><u>User List</u></font></a>";
?></div>

<div style="position:relative;left:500px;top:70px;width:400px;text-align:right;">
<form method="get" action="<?php echo $serverpath;?>/search.php">
<input type="hidden" name="mode" value="sb">
<input type="text" placeholder="search for something" name="id"> <input type="submit" value="Search">
</form>
</div>

<!--Content Div-->
<div style="position:relative;left:5px;top:80px;width:900px;text-wrap: suppress;">
