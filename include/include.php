<?php
	// Start session
	session_start();

	// Load the configuration file
	require_once "settings.php";

	require_once "include/error.php";

	// Connect to database
	$handle = mysql_pconnect($sql_url,$sql_user,$sql_pass) or SQLerror("MySQL Database", "Error connecting to the MySQL database");

	if (!$handle || $handle==0)
		SQLerror("MySQL Database", "Error connecting to the MySQL database");

	mysql_select_db($sql_db,$handle) or die("Error Switching DB");

	// Connect to forum
	define('FORUM_DISABLE_CSRF_CONFIRM', 1);
	define('FORUM_ROOT', $punbb_relative.$punbb_directory.'/');
	require FORUM_ROOT.'include/common.php';

	// Format
	function PageHeader($title,$desc="",$key="",$_dns_content=""){
		global $serverpath;
		global $forum_user;

		$page_title=$title;
		$page_description=$desc;
		$page_keywords=$key;
		$dns_content=$_dns_content;
		include_once "template/header.php";
	}

	// Run include modules
	require_once "include/user.php";
	require_once "include/extension.php";
	require_once "include/misc.php";

	// Current user id
	$current_user = getUser($forum_user['username'],$handle);
	$current_user_id = $current_user['uID'];

	// Check to see if the forum is locked down for editing
	if ($mt_lock_down==true){
		if (is_logged_in()==false || is_member_moderator($_SESSION['user'],$handle)==false){
			echo "<style>body{\nfont-family:arial;\n}</style>";
			SQLerror("Minetest Extensions","Sorry, but Minetest Extensions has been locked down for editing. <p><b>$mt_lock_msg</b></p>");
		}
	}

