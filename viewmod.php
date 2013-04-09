<?php
include "include/include.php";
include "include/voters.php";

// Get data
$id = $_GET['id'];
$act=$_GET['action'];
$mod = getMod($id,$handle);

// Check for existence of mod
if (!$mod)
	SQLerrorFancy("Unable to find that extension","We could not locate the extension you requested");

// Get user name
$owner=getUser($mod['uID'],$handle)['name'];

// Check action
if ($act=="like"){
	echo "Liking";
	likeMod($id,$_SESSION['user'],$handle,true);
}else if ($act=="update"){
	updateLikes($id,$handle);
	header("location: viewmod.php?id=$id");
}

// Write page header
PageHeader($mod['name'],$mod['overview'],$mod['tags']);

// Get control panel content
if (is_member_moderator($_SESSION['user'],$handle) || getUser($forum_user['username'],$handle)['uID']==$mod['uID']){
	$links="<li><a href=\"editentry.php?id=$id\">Edit</a></li>\n";
	$links.="<li><a href=\"deleteentry.php?id=$id\">Delete</a></li>";
}else{
	$links="";
}


// Extension banner
echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;padding:20px;\">";
echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">{$mod['name']} - by <a href=\"user.php?id={$mod['owner']}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link
echo "</div>";
?>
	<div id="content">
		<div class="constrain" style="max-width:1000px;width:975px;">
			<div style="clear: both;"></div>
<?php

	// Write the mod bar
	echo "\n<div id='mod_bar'>\n";

	// Download section
	echo "<div id='bar_download'>\n";
	echo "<a href='".getDownload($mod)."'>Download</a>\n";
	echo "</div>\n";

	$like_ext="";

    if (logged_in() && $current_user){
		if (likeMod($id,$current_user_id,$handle,false)==true)
			$like_ext="_high";

		echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like{$like_ext}.png');\"><a class=\"big_link\" href=\"viewmod.php?id={$row['mod_id']}&action=like\">{$row['likes']}</a></div></p>";
	}else{
		echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like_high.png');\"><span class=\"big_link\">{$row['likes']}</span></div></p>";
	}
