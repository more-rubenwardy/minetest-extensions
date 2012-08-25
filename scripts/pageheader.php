<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-gb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<meta name="Generator" content="Serif WebPlus X5 (13.0.3.029)">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<title><?php echo $page_title ?></title>
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

<div id="userbar" style="text-align:right;position:relative;left:700px;top:50px;width:180px"><?php
if (is_logged_in()){
   echo $_SESSION['user']." - <a href=\"$serverpath/logout.php\"><font color=\"#FFFFFF\"><u>Log Out</u></font></a>";
}else{
   echo "<a href=\"$serverpath/login.php\"><font color=\"#FFFFFF\"><u>Login</u></font></a>";
}
?></div>

<!--Content Div-->
<div style="position:relative;left:5px;top:110px">
