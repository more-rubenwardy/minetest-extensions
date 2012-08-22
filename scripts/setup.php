<?php
checklogin("rubenwardy","multas");

function checklogin($user,$pass){
	if (!file_exists("../data/users/$user/user.pass"))
		echo "User does not exist";

	
}
?>

<!--php
$handle = mysql_pconnect("mysql.serversfree.com","u372522788_admin","password");

if (!$handle)
die("MySQL - Error connecting to the MySQL database");

mysql_select_db("u372522788_minetest",$handle);

checklogin("rubenwardy","multas");

function checklogin($user,$pass){
	$user= mysql_escape_string ( $user );
	$res = mysql_query("SELECT * FROM users WHERE name='".$user."'",$handle) or die("ERROR");
	$row = mysql_fetch_row($res);
	echo $row[3];

	if ($row[3]==$pass){
		return 1;
	}else{
		return 0;
	}
}
-->