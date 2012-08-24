<?php
function SQLerror($title,$msg){
         echo "<h1>$title</h1>";
         die("$msg");
}

session_start();

$handle = mysql_pconnect("mysql.serversfree.com","u372522788_admin","password");

if (!$handle)
die("MySQL - Error connecting to the MySQL database");

mysql_select_db("u372522788_minetest",$handle) or die("Error Switching DB");

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function authcheck($user,$pass,$handle){
	$row=getUser($user);
	if ($row[3]==$pass){
		return 1;
	}else{
		return 0;
	}
}

function is_logged_in(){
         if ($_SESSION['auth']=="somerandomkey"){
            return true;
         }
         return false;
}

function getUser($user){
         $us= mysql_escape_string ($user);
	$res = mysql_query("SELECT * FROM users WHERE name='$us'",$handle) or die("query error");
	$row = mysql_fetch_row($res) or die("row error");
	return $row;
}

function require_login(){
         if (is_logged_in()==false){
            header("location: login.php?redir=".curPageURL());
         }
}
?>