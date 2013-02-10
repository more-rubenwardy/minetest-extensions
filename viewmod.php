<?php
include "scripts/setup.php";

include "scripts/voters.php";

$id=$_GET['id'];
$act=$_GET['action'];

if ($act=="like"){
	echo "Liking";
    likeMod($id,$_SESSION['user'],$handle);
}

$res=0;
$gen_num=$id;

if ($id=="random"){
	$gen_num= rand(0,getNoTopics("",$handle));
	$res = mysql_query("SELECT * FROM mods LIMIT $gen_num, 1",$handle);
}else if (is_numeric($id)){
	$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerrorFancy("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
}else{
	SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$row = mysql_fetch_array($res) or SQLerrorFancy("Row Error","No results where found for a mod with the id $gen_num");
$page_title="View mod - {$row['name']}";
$id=$row['mod_id'];
$page_keywords=$row['tags'];

// Substitute owner ID with owner name (by Phitherek_):
if (is_numeric($row['owner'])==true){
$r = mysql_query("SELECT name FROM users WHERE id=".$row['owner'],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
$ra = mysql_fetch_array($r);
$owner = $ra['name'];
}else{
  $owner = $row['owner'];
}
// End of Phitherek_' s code

$page_description=$row['overview'];

$dnw_content=true;

include "scripts/pageheader.php";


if (is_member_moderator($_SESSION['user'],$handle)){

$links="<li><a href=\"admin.php?mode=owner&id=$id\">Change Owner</a></li>";
$links.="<li><a href=\"editentry.php?id=$id\">Edit</a></li>";
$links.="<li><a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a></li>";
$links.="<li><a href=\"deleteentry.php?id=$id\">Delete</a></li>";

}elseif (getUserId($_SESSION['user'],$handle)==$row['owner']){

$links="<li><a href=\"editentry.php?id=$id\">Edit</a></li>";
$links.="<li><a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a></li>";
$links.="<li><a href=\"deleteentry.php?id=$id\">Delete</a></li>";

}else{
$links="";
}

echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;padding:20px;\">";

echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">{$row['name']} - by <a href=\"user.php?id={$row['owner']}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link

echo "</div>";

if ($row['mod_id']==38){
echo "<h1>Similar Code Part of 0.4.4</h1>Only use this for versions before this.<hr>";
}
?>
<div id="content">
    <div class="constrain" style="max-width:1000px;width:975px;">
        <div style="clear: both;"></div>
<?php

        echo "\n<div id='mod_bar'>\n";

        echo "<div id='bar_download'>\n";
        echo "<a href='".getDownload($row)."'>Download</a>\n";
        echo "</div>\n";

        if (is_logged_in()==true){
            $like_ext="";
            if (checkLike($_SESSION['user'],$id,5,$handle)==true)
                $like_ext="_high";

            echo "<p><a href=\"viewmod.php?id=$id&action=like\"><img src=\"images/like_mod$like_ext.png\" alt=\"like\" /></a></p>";
        }

	echo "<p class='bar_p'>{$row['overview']}</p>";


        function tabCol($title,$msg){
            echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
        }

        echo "<div class='bar_title'>\n";
        echo "Details\n";
        echo "</div>\n";

        echo "<p><table id='bar_stat'><tbody>\n";
        tabCol("Name",$row['basename']);
        tabCol("Version",$row['version']); // Version
        tabCol("Release",$row['3m_rele']);
        tabCol("License",$row['license']);
        tabCol("Method",$row['repotype']);
        tabCol("Depends",$row['depend']);
        tabCol("Tags",tagLinks($row['tags']));
        echo "</tbody></table></p>\n";


        if ($links!=""){
            echo "<div class='bar_title'>\n";
            echo "Control Panel\n";
            echo "</div>\n";

            echo "<div class='bar_p'><ul>$links</ul></div>\n";
        }

        echo "<p>";

        include_once "scripts/recommend.php";

        echo "</p>";

        echo "<div class='bar_title'>\n";
        echo "<a name='reviews'>Reviews</a>\n";
        echo "</div>\n";

        echo "<p>";
        include "scripts/show_reviews.php";
        echo "</p>";

        echo "</div>\n\n";
?>
        <div id="mod_main">

<?php

    require_once('scripts/formatcode.php');
    $parser = new parser;
    $parsed = $parser->p($row['description'],1);

    echo "<p>$parsed</p>";

?>

            <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
            <script src="slider.js"></script>

<?php

include "scripts/pagefooter.php";
?>
