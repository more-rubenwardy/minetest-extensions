<?php
require_once "settings.php";

session_start();

function is_member_moderator($user,$handle){
        global $forum_user;

        if ($forum_user['username']==$user){
            return ($forum_user['group_id']==1);
        }else{
         $user_p=getUser($user,$handle);
         if (!$user_p){
            return 0;
         }

         if ($user_p['level']==2){
            return true;
         }else{
            return false;
         }
        }


}

function SQLerror($title,$msg){
         echo "<h1>$title</h1>";
         die("$msg");
}

function SQLerrorFancy($title,$msg){
	global $serverpath;
	global $forum_user;

	$page_title=$title;
	include_once "pageheader.php";

         echo "<h1>$title</h1>\n $msg";
         
        include_once "pagefooter.php";
}

$handle = mysql_pconnect($sql_url,$sql_user,$sql_pass) or SQLerror("MySQL Database", "Error connecting to the MySQL database");

if (!$handle || $handle==0)
SQLerror("MySQL Database", "Error connecting to the MySQL database");

mysql_select_db($sql_db,$handle) or die("Error Switching DB");




//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', $punbb_relative.$punbb_directory.'/');
require FORUM_ROOT.'include/common.php';

if ($forum_user['username']!="Guest"){
   if (user_exists($forum_user['username'],$handle)==false){
     addUser($forum_user['username'],$forum_user['group_id'],$handle);
   }
   login($forum_user['username']);
}else{
   $_SESSION['user']=="";
   $_SESSION['auth']=="";
}



if ($mt_lock_down==true){
  if (is_logged_in()==false || is_member_moderator($_SESSION['user'],$handle)==false){
    echo "<style>body{\nfont-family:arial;\n}</style>";
    SQLerror("Minetest Extensions","Sorry, but Minetest Extensions has been locked down for editing. <p><b>$mt_lock_msg</b></p>");
  }
}


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

function is_logged_in(){
        global $forum_user;
         if ($forum_user['username']!="Guest"){
            return true;
         }
         return false;
}

function login($user){
    $_SESSION['auth']="somerandomkey";
    $_SESSION['user']=$user;
}

function addUser($user,$level,$handle){
    if ($user==""){
        return 0;
    }
        if (user_exists($user,$handle))
            return 4;

        $res=mysql_query("INSERT INTO users (name,level) VALUES ('$user','$level')");
        if ($res==1){
            return 1;
        }else{
            return 3;
        }
}

function getUser($user,$handle){
         $us= mysql_real_escape_string ($user);
	 $res = mysql_query("SELECT * FROM users WHERE name='$us'",$handle) or die("query error");
	 
        if(mysql_num_rows($res)==0){
          return 0;
        }
	 $row = mysql_fetch_array($res) or die("");
	 return $row;
}

function require_login(){
         if (is_logged_in()==false){
            header("location: login.php?redir=".curPageURL());
         }
}

function getNoTopics($tag,$handle){
         $qu = mysql_real_escape_string ($tag);
         $res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$qu%' AND tags NOT LIKE '%dns%'",$handle);
         return mysql_num_rows($res);
}

function getUserId($user,$handle){
      $qu = mysql_real_escape_string ($user);
      $res = mysql_query("SELECT * FROM users WHERE name='$qu'",$handle);
      $row = mysql_fetch_array($res);

	if (!$row)
		return false;

      return $row['id'];
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
	if ($mod['repotype']=="git"){
		return $mod['file']."/zipball/master";
	}else if ($mod['repotype']=="archive"){
		if (strstr($mod['tags'],"code")==true){
			return "code_mod.php?url=".$mod[9];
		}else{
			return $mod['file'];
		}
	}else{
}

return "";
}

function tagLinks($tags){
        $array=explode(",",$tags);
        $result="";

       foreach ($array as &$a){
            $result.=" <a href=\"search.php?id=$a\">$a</a>";
       }
       
        return $result;
    }

function progressBar($percent,$length,$caption){
    echo "<div class=\"progressbar\" style=\"width: ".$length."px;\">";

    echo "<div class=\"progressbar_inner\" style=\"width: ".(($percent/100)*$length)."px;\"></div>";
    echo "<div class=\"progress_caption\">$caption</div>";

    echo "</div>";
}

function updateLikes($id,$handle){
    $res = mysql_query("SELECT * FROM votes WHERE mod_id=$id AND liked=true",$handle);
    $result =  mysql_num_rows($res);

    mysql_query("UPDATE mods SET likes=$result WHERE mod_id=$id",$handle);
}

function updateUser($id,$handle){
    $res = mysql_query("SELECT * FROM votes WHERE owner=$id",$handle);
    $votes =  mysql_num_rows($res);

    $res = mysql_query("SELECT * FROM mods WHERE owner=$id",$handle);
    $mods =  mysql_num_rows($res);

    mysql_query("UPDATE users SET mods=$mods WHERE id=$id",$handle);

    $res = mysql_query("SELECT * FROM reviews WHERE owner_id=$id",$handle);
    $reviews =  mysql_num_rows($res);

    return ($votes!=0 || $mods!=0 || $reviews!=0);

}

?>
