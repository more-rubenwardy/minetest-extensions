<?php
include "settings.php";


function is_member_moderator($user,$handle){
         $user_p=getUser($user,$handle);
         if (!$user_p){
            return 0;
         }

         if ($user_p[4]==2){
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

$handle = mysql_pconnect($sql_url,$sql_user,$sql_pass) or SQLerror("MySQL Database", "Error connecting to the MySQL database");

if (!$handle || $handle==0)
SQLerror("MySQL Database", "Error connecting to the MySQL database");

mysql_select_db($sql_db,$handle) or die("Error Switching DB");

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

function getUserId($user,$handle){
      $qu = mysql_real_escape_string ($user);
      $res = mysql_query("SELECT * FROM users WHERE name='$qu'",$handle);
      $row = mysql_fetch_row($res);

	if (!$row)
		return false;

      return $row[0];
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

function entry_read($id,$handle){
return false;
}

function cat_read($id,$handle){
return false;
}

function getDownload($mod){
if ($mod[19]=="git"){
   return $mod[9]."/zipball/master";
}else if ($mod[19]=="archive"){
  if (strstr($mod[7],"code")==true){
   return "code_mod.php?url=".$mod[9];
  }else{
    return $mod[9];
  }
}else{
}

return "";
}

?>
