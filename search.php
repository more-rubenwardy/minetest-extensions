<?php
include "include/include.php";

$query=$_GET['id'];
$mode=$_GET['mode'];

PageHeader("Search for $query","Search for the tag '$query'. Find mods, texture and sound packs.");

echo "<table width=\"100%\"><tr><th colspan=2>Mod Name</th><th>Description</th><th width=200>Tags</th><th>Likes</th></tr>\n";

// Globals definition
$alternate=1;
$is_result=false;
$count=0;

searchMods($query,function($hash,$handle){
	// Get Globals
	global $alternate,$is_result,$count;
	$count++;
	$is_result=true;

	// What color?
	if ($alternate==0){
		$bgcolor="#FFFFFF";
	}else{
		$bgcolor="#FFFFBD";
	}

	// Get owner name
	$name="unknown";
	$owner = getUser($hash['uID'],$handle);
	if ($owner)
		$name = $owner['name'];

	// Get icon
	$image="images/topicicon_read.jpg";
	if (file_exists("icon/".$hash['name'].".png")==true)
		$image="icon/".$hash['name'].".png";

	// Row start
	echo "<tr bgcolor=\"$bgcolor\"><td width=16><img width=16 height=16 src=\"$image\" /></td>";

	// Row title and owner
	echo "<td><a href=\"viewmod.php?id={$hash['mID']}\">{$hash['name']}</a><br />by $name</td>";

	// Row overview
	$overview=str_replace("\\'","'",$hash['overview']);
	echo "<td>$overview</td>";

	// Row tags
	echo "<td>".tagLinks($hash['tags'])."</td>";

	// Row likes
	echo "<td>{$hash['_likes']}</td></tr>\n";

	// Flip alternate
	$alternate=!$alternate;
},$handle,$mode);