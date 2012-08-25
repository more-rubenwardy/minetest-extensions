<?php

//configuration
$serverpath="http://multa.bugs3.com/minetest/forum";

function is_member_moderator($user){
         if ($user=="rubenwardy"){
            return true;
         }else{
            return false;
         }
}

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
         $pasw = sha1($pass);
	$row=getUser($user,$handle);
	if ($row==0){
          return false;
          }

	//echo "'{$row[3]}' vs '$passw'";
	if ($row[3]==$pasw){
		return true;
	}else{
		return false;
	}
}

function login($user){
         $_SESSION['auth']="somerandomkey";
         $_SESSION['user']=$user;
}

function is_logged_in(){
         if ($_SESSION['auth']=="somerandomkey"){
            return true;
         }
         return false;
}

function getUser($user,$handle){
         $us= mysql_real_escape_string ($user);
	 $res = mysql_query("SELECT * FROM users WHERE name='$us'",$handle) or die("query error");
	 
        if(mysql_num_rows($res)==0){
          return 0;
        }
	 $row = mysql_fetch_row($res) or die("");
	 return $row;
}

function require_login(){
         if (is_logged_in()==false){
            header("location: login.php?redir=".curPageURL());
         }
}

function getNoTopics($tag,$handle){
         $qu = mysql_real_escape_string ($tag);
         $res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$qu%' ORDER BY likes DESC",$handle);
         return mysql_num_rows($res);
}

function addUser($user,$pass,$passcon,$email,$handle){
         if ($user=="" || $pass=="" || $passcon=="" || $email==""){
            return 0;
         }
         if ($pass==$passcon){
           if (user_exists($user,$handle))
              return 4;

            $pasw=sha1($pass);
            if ($pasw=="")
               return 3;

            $res=mysql_query("INSERT INTO users (name,email,password) VALUES ('$user','$email','$pasw')");
            if ($res==1){
              return 1;
            }else{
              return 3;
            }
         }else{
               return 2;
         }
}

function user_exists($user,$handle){
         $qu = mysql_real_escape_string ($user);
         $res = mysql_query("SELECT * FROM users WHERE name='$qu'",$handle);
         return mysql_num_rows($res);
}


function entry_exists($name,$handle){
         $qu = mysql_real_escape_string ($name);
         $res = mysql_query("SELECT * FROM mods WHERE name='$qu'",$handle);
         return mysql_num_rows($res);
}
?>