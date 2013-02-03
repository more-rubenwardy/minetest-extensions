<?php
function printNotice($title,$message){
echo "<div id=\"notice_bar\" style=\"display: block;\">\n";
echo "<div class=\"constrain\">\n";
echo "<div style=\"float:right;\"><a onClick=\"javascript:togglePrivInfo()\"><u>Close</u></a></div>\n";
echo "<b>$title</b><br>\n$message\n";
echo "</div></div>";
}


if ($_SESSION['msg']==0 && $dnd_intro_message == false){
   $_SESSION['msg']=1;
   printNotice("Noticed any bugs? Any ideas to make this easier? We want your opinion!","Help us by telling us what you think about this interface. <a href=\"http://tinyurl.com/mtmdfrm\">Tell us</a><p>For developers: <a href=\"https://github.com/rubenwardy/minetest-forum/wiki/The-APIs\">Minetest Mods API</a>");
}

if ($_SESSION['user']=="RAPHAEL"){
   printNotice("Message to RAPHAEL from the admin","Some of your mods do not have their basename/names spaces defined, and so have been hidden from the listings. <a href=\"http://multa.bugs3.com/minetest/forum/search.php?mode=sb&id=dns\">Hidden Mods</a>\n<p>In addition to this, you have not specified many tags for your mods.<br>Tags group similar mods together, and help users search for and find them. For help, see the <a href=\"help/tags.php\">tags reference</a>\n<p></p>");
}

if ($_SESSION['user']=="Zeg9"){
   printNotice("Message to Zeg9 from the admin","Some of your mods do not have their basename/names spaces defined, and so have been hidden from the listings. <a href=\"http://multa.bugs3.com/minetest/forum/search.php?mode=sb&id=dns\">Hidden Mods</a>\n<p>");
}

if ($_SESSION['user']=="hansuke123"){
   printNotice("Message to hansuke123 from the admin","One of your mods has been deleted as it is not applicable on this website");
}
?>