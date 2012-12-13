<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fi">
<head>
	<meta name="keywords" content="minetest minetest-c55" />
	<meta name="description" content="Minetest (minetest-c55): An open source Infiniminer/Minecraft style game" />
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" href="http://minetest.net/style_v2.css" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="bookmark icon" href="/favicon.ico" />
	<title><?php echo $page_title;?> - Minetest Extensions</title>

<style>
.inbar_login {
	float: right;
}
</style>
</head>

<body>

<div id="navbar" class="navbar">
	<div class="constrain">
		<span class="inbar_main">
			<ul>
				<li class="navlink_normal"><a href="http://minetest.net/index.php">About</a></li>
				<li class="navlink_normal"><a href="http://minetest.net/news.php">News</a></li>
				<li class="navlink_normal"><a href="http://minetest.net/download.php">Download</a></li>
				<li class="navlink_normal"><a href="http://minetest.net/contribute.php">Contribute</a></li>
			</ul>
		</span>
		<span class="inbar_separator">
			|
		</span>
		<span class="inbar_other">
			<ul>
				<!--<li class="navlink_special"><a href="http://c55.me/blog">Blog</a></li>
				<li class="navlink_special"><a href="http://wiki.minetest.com/wiki/">Wiki</a></li>
				<li class="navlink_special"><a href="http://minetest.net/forum/">Forum</a></li>
				<li class="navlink_special"><a href="https://github.com/celeron55/minetest">Github</a></li>
				<li class="navlink_special"><a href="http://api.minetest.net/">API</a></li>-->
				<li class="navlink_normal"><a href="<?php echo $serverpath;?>/index.php">Home</a></li>
				<li class="navlink_normal"><a href="<?php echo $serverpath;?>/user.php">User List</a></li>
			</ul>
		</span>
		<span class="inbar_login">
			<ul>
<?php
if (is_logged_in()==true){
echo "<li class=\"navlink_special\"><a href=\"user.php?id={$_SESSION['user']}\">{$_SESSION['user']}</a></li>";
echo "<li class=\"navlink_special\"><a href=\"logout.php\">Log Out</a></li>";
}else{
?>
				<li class="navlink_special"><a href="login.php">Login</a></li>
				<li class="navlink_special"><a href="signup.php">Sign Up</a></li>
<?php
}
?>
			</ul>
		</span>
	</div>
</div>
<div class="navbarbottom1">
</div>

<div id="logo">
	<div class="constrain">
		<img src="http://minetest.net/images/minetest-icon-120.png" alt="logo" id="logoimage">
		<span class="bigheader">
			<h1>Minetest</h1>
			<h2>Extensions</h2>
		</span>
	</div>
</div>

<div id="content">
	<div class="constrain">
		<div style="clear: both;"></div>
