<?php
include "scripts/setup.php";

include "scripts/voters.php";

// Get commands
$id=$_GET['id'];
$act=$_GET['action'];

// Check action
if ($act=="like"){
	echo "Liking";
    likeMod($id,$_SESSION['user'],$handle,true);
}else if ($act=="update"){
    updateLikes($id,$handle);
    header("location: viewmod.php?id=$id");
}

// Mod handlers
$res=0;
$gen_num=$id;

// Get the mod query
if ($id=="random"){
	$gen_num= rand(0,getNoTopics("",$handle));
	$res = mysql_query("SELECT * FROM mods LIMIT $gen_num, 1",$handle);
}else if (is_numeric($id)){
	$res = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerrorFancy("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
}else{
	SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

// Get the mod row
$row = mysql_fetch_array($res) or SQLerrorFancy("Unable to display extension","No results where found for an extension with the id $gen_num");
$id=$row['mod_id'];
$page_keywords=$row['tags'];

// Get the owner's name
if (is_numeric($row['owner'])==true){
	$r = mysql_query("SELECT name FROM users WHERE id=".$row['owner'],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
	$ra = mysql_fetch_array($r);
	$owner = $ra['name'];
}else{
	$owner = $row['owner'];
}

// Get the page description
$page_description=$row['overview'];

// Set pageheader.php attributes
$page_title="View mod - {$row['name']}";
$dnw_content=true;

// Run pageheader.php
include "scripts/pageheader.php";

// Get control panel content
if (is_member_moderator($_SESSION['user'],$handle) || getUserId($_SESSION['user'],$handle)==$row['owner']){
	$links="<li><a href=\"editentry.php?id=$id\">Edit</a></li>";
	$links.="<li><a href=\"3mrelinc.php?id=$id\">Increase 3m Release</a></li>";
	$links.="<li><a href=\"deleteentry.php?id=$id\">Delete</a></li>";
}else{
	$links="";
}

// Extension banner
echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;padding:20px;\">";
echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">{$row['name']} - by <a href=\"user.php?id={$row['owner']}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link
echo "</div>";
?>
<div id="content">
    <div class="constrain" style="max-width:1000px;width:975px;">
        <div style="clear: both;"></div>
<?php

		// Write the mod bar
        echo "\n<div id='mod_bar'>\n";

		// Download section
        echo "<div id='bar_download'>\n";
        echo "<a href='".getDownload($row)."'>Download</a>\n";
        echo "</div>\n";

        $like_ext="";

        if (is_logged_in()==true){
            if (likeMod($id,$_SESSION['user'],$handle,false)==true)
                $like_ext="_high";

            echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like{$like_ext}.png');\"><a class=\"big_link\" href=\"viewmod.php?id={$row['mod_id']}&action=like\">{$row['likes']}</a></div></p>";
        }else{
            echo "<p class='bar_p'><div class=\"like_button\" style=\"background-image:url('images/like_high.png');\"><span class=\"big_link\">{$row['likes']}</span></div></p>";
        }

        echo "<p class='bar_p'>{$row['overview']}</p>";


        function tabCol($title,$msg){
            echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
        }

		// Details section
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

        echo "<div style=\"margin-left:20px;margin-bottom:20px;\">";
        progressBar($row['progress'],260,$row['progress']."% completed");
        echo "</div>";

		// Control panel section
        if ($links!=""){
            echo "<div class='bar_title'>\n";
            echo "Control Panel\n";
            echo "</div>\n";

            echo "<div class='bar_p'><ul>$links</ul></div>\n";
        }

		// Admin section
        if (is_member_moderator($_SESSION['user'],$handle)){
            echo "<div class='bar_title'>\n";
            echo "Admin Scripts\n";
            echo "</div>\n";

            echo "<div class='bar_p'><ul>";
            echo "<li><a href=\"admin.php?mode=owner&id=$id\">Change Owner</a></li>";
            echo "<li><a href=\"viewmod.php?id=$id&action=update\">Update Like</a></li>";
            echo "</ul></div>\n";
        }

		// Recommended section
        echo "<p>";
        include_once "scripts/recommend.php";
        echo "</p>";

		// Reviews section
        echo "<div class='bar_title'>\n";
        echo "<a name='reviews'>Reviews</a>\n";
        echo "</div>\n";

        echo "<p>";
        include "scripts/show_reviews.php";
        echo "</p>";

		// End of the mod bar
        echo "</div>\n\n";
?>
        <div id="mod_main">

<?php
	// Parse the bbcode in the description
	require_once('scripts/formatcode.php');
	$parser = new parser;
	$parsed = $parser->p($row['description'],1);

	// Write the description
    echo "<p>$parsed</p>";

?>

            <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
            <script src="slider.js"></script>
        </div>

<?php

// Write the footer
include "scripts/pagefooter.php";
?>
