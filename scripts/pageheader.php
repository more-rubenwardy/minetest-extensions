<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fi">
<head>
	<meta name="keywords" content="minetest,minetest-c55,mods,extensions,textures,game<?php
            if ($page_keywords!=""){
                echo ",$page_keywords";
            }
        ?>" />
	<meta name="description" content="<?php
          if ($page_description=="")
             $page_description="Minetest (minetest-c55) Extensions: Find mods, texture and sound packs to add content to your game.";
             
          echo $page_description;
        ?>" />
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo $serverpath;?>/mineteststyle.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $serverpath;?>/style.css" type="text/css" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="bookmark icon" href="/favicon.ico" />
	<title><?php echo $page_title;?> - Minetest Extensions</title>
</head>

<body>

<div id="navbar" class="navbar">
	<div class="constrain">
		<span class="inbar_main">
			<ul>
				<li class="navlink_normal"><a href="http://minetest.net/index.php">Home</a></li>
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
				<li class="navlink_normal"><a href="<?php echo $serverpath;?>/index.php">Home</a></li>
                <li class="navlink_normal"><a href="<?php echo $serverpath;?>/help/about.php">About</a></li>
                <li class="navlink_normal"><a href="<?php echo $serverpath;?>/user.php">User List</a></li>
                <li class="navlink_normal"><a href="<?php echo $serverpath;?>/help/">Help</a></li>
				<?php
				if ($forum_user['username']!="Guest"){
                                   echo "<li class=\"navlink_normal\"><a href=\"$serverpath/addentry.php\">Add a Mod</a></li>";
                                 }
                                 ?>
			</ul>
		</span>
		<span class="inbar_login">
			<ul>
<?php
if ($forum_user['username']!="Guest"){
echo "<li class=\"navlink_special\"><a href=\"".FORUM_ROOT."profile.php?id={$forum_user['id']}\">{$forum_user['username']}</a></li>";
echo "<li class=\"navlink_special\"><a href=\"".FORUM_ROOT."login.php?action=out&id={$forum_user['id']}\">Log Out</a></li>";
}else{
echo "<li class=\"navlink_special\"><a href=\"".FORUM_ROOT."login.php\">Login</a></li>";
echo "<li class=\"navlink_special\"><a href=\"".FORUM_ROOT."register.php\">Register</a></li>";
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
                          <input type="text" placeholder="search" name="id" size=11> <input type="submit" value="Search">
                    </form>
		</div>
		<span class="bigheader">
			<h1>Minetest Extensions</h1>
			<h2>Mods, Texture Packs and Sound Packs.</h2>
			
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
<?php
if ($dnw_content==true) // if the caller has told us not to do the following tags
    return;
?>

<div id="content">
	<div class="constrain">
		<div style="clear: both;"></div>
