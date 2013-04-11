<?php
require_once "include/include.php";
include "include/voters.php";

// Get data
$id = $_GET['id'];

int_assert($id);

$act=$_GET['action'];
$mod = getMod($id,$handle);

// Check for existence of mod
if (!$mod)
	SQLerrorFancy("Unable to find that extension","We could not locate the extension you requested");

// Get user name
$owner=getUser($mod['uID'],$handle)['name'];

// Check action
if ($act=="like"){
	pingCurUser($handle);
	likeMod($id,$current_user_id,$handle,true);
}else if ($act=="update"){
	updateLikes($id,$handle);
	header("location: viewmod.php?id=$id");
}

// Write page header
PageHeader($mod['name'],$mod['overview'],$mod['tags'],true);

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

		echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like{$like_ext}.png');\"><a class=\"big_link\" href=\"viewmod.php?id={$mod['mID']}&action=like\">{$mod['_likes']}</a></div></p>";
	}else{
		echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like_high.png');\"><span class=\"big_link\">{$mod['_likes']}</span></div></p>";
	}

	echo "<p class='bar_p'>{$mod['overview']}</p>";


	function tabCol($title,$msg){
		echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
	}

	// Details section
	echo "<div class='bar_title'>\n";
	echo "Details\n";
	echo "</div>\n";

	echo "<p><table id='bar_stat'><tbody>\n";
	tabCol("Name",$mod['basename']);
	tabCol("Version",$mod['version']); // Version
	//tabCol("Release",$mod['3m_rele']);
	tabCol("License",$mod['license']);
	tabCol("Method",$mod['repo_type']);
	tabCol("Tags",tagLinks($mod['tags']));
	echo "</tbody></table></p>\n";

	echo "<div style=\"margin-left:20px;margin-bottom:20px;\">";
	progressBar($mod['progress'],260,$mod['progress']."% completed");
	echo "</div>";

	// Control panel section
	if (is_member_moderator($_SESSION['user'],$handle) || $current_user_id==$mod['uID']){
		echo "<div class='bar_title'>\n";
		echo "Control Panel\n";
		echo "</div>\n";

		echo "<div class='bar_p'><ul>";
		echo "<li><a href=\"manage/edit.php?id=$id\">Edit</a></li>\n";
		echo "<li><a href=\"manage/delete.php?id=$id\">Delete</a></li>";
		echo "</ul></div>\n";
	}

	// Admin section
	if (is_member_moderator()){
		echo "<div class='bar_title'>\n";
		echo "Admin Scripts\n";
		echo "</div>\n";
		echo "<div class='bar_p'><ul>";
		echo "<li><a href=\"manage/admin.php?mode=owner&id=$id\">Change Owner</a></li>";
		echo "<li><a href=\"viewmod.php?id=$id&action=update\">Update Like</a></li>";
		echo "</ul></div>\n";
	}

	// Reviews section
	echo "<div class='bar_title'>\n";
	echo "<a name='reviews'>Reviews</a>\n";
	echo "</div>\n";

	echo "<p>";
	include "include/show_reviews.php";
	echo "</p>";

	// End of the mod bar
	echo "</div>\n\n";

	echo "<div id=\"mod_main\">";

	// Parse the bbcode in the description
	require_once('include/libraries/bbcode.php');
	$parser = new parser;
	$parsed = $parser->p($mod['description'],1);

	// Write the description
	echo "<p>$parsed</p>";

	echo "</div>";

	PageFooter();
