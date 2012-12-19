<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fi">
<head>
	<meta name="keywords" content="minetest minetest-c55" />
	<meta name="description" content="<?php
          if ($page_description=="")
             $page_description="Minetest (minetest-c55): An open source Infiniminer/Minecraft style game";
             
          echo $page_description;
        ?>" />
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="stylesheet" href="http://minetest.net/style_v2.css" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="bookmark icon" href="/favicon.ico" />
	<title><?php echo $page_title;?> - Minetest Mods</title>

<style>
.inbar_login {
	float: right;
}

#notice_bar {
	/*text-align: center;*/
	/*background: url("images/logo1.png") center top no-repeat;*/
	/*background: url("images/minetest-icon-120.png") left top no-repeat;*/
	background: #FACF73;
	color: #000000;
	display: block;
	width: auto;
	margin: 0px;
	padding: 1em 0 1em 0;
	border: 0px;
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
		<div style="float:right;vertical-align:top;">
		     <form method="get" action="<?php echo $serverpath;?>/search.php">
                          <input type="hidden" name="mode" value="sb">
                          <input type="text" placeholder="search for something" name="id"> <input type="submit" value="Search">
                    </form>
		</div>
		<span class="bigheader">
			<h1>Minetest Mods</h1>
			<h2>Customise Minetest perfectly for you</h2>
		</span>

	</div>
</div>
<script type="text/javascript">
function togglePrivInfo() {
	toggle('notice_bar');
}
function toggle(id) {
	var element = document.getElementById(id);
	var display = (element.style.display === 'none') ? '' : 'none';
	element.style.display = display;
}
</script>

<?php
  include_once "messages.php";
?>

<div id="content">
	<div class="constrain">
		<div style="clear: both;"></div>
