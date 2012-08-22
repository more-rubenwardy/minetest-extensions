<?php
$session_start();

$handle = mysql_pconnect("mysql.serversfree.com","u372522788_admin","password");

if (!$handle)
die("MySQL - Error connecting to the MySQL database");

mysql_select_db("u372522788_minetest",$handle) or die("Error Switching DB");

function checklogin($user,$pass,$handle){
	$us= mysql_escape_string ($user);
	$res = mysql_query("SELECT * FROM users WHERE name='$us'",$handle) or die("query error");
	$row = mysql_fetch_row($res) or die("row error");
	
	if ($row[3]==$pass){
		return 1;
	}else{
		return 0;
	}
}

function getUser($user){
	$res = mysql_query("SELECT * FROM users WHERE name='$us'",$handle) or die("query error");
	$row = mysql_fetch_row($res) or die("row error");
	return $row;
}
?>