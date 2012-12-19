<?php
function printNotice($title,$message){
echo "<div id=\"notice_bar\" style=\"display: block;\">\n";
echo "<div class=\"constrain\">\n";
echo "<div style=\"float:right;\"><a onClick=\"javascript:togglePrivInfo()\"><u>Close</u></a></div>\n";
echo "<b>$title</b><br>\n$message\n";
echo "</div></div>";
}


if ($_SESSION['msg']==0){
   $_SESSION['msg']=1;
   printNotice("Noticed any bugs? Any ideas to make this easier? We want your opinion!","Help us by telling us what you think about this interface. <a href=\"http://tinyurl.com/mtmdfrm\">Tell us</a>");
}

if ($_SESSION['user']=="RAPHAEL"){
   printNotice("Message to RAPHAEL from the admin","You have not specified many tags for your mods.<br>Tags group similar mods together, and help users search for and find them. For help, see the <a href=\"help/tags.php\">tags reference</a>");
}
?>