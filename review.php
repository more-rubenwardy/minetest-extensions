<?php
include "scripts/setup.php";

$id=$_GET['id'];

if (is_numeric($id)==false)
    SQLerrorFancy("Id error","Id needs to be numeric");

$res = mysql_query("SELECT * FROM reviews WHERE id=$id",$handle) or SQLerrorFancy("MySQL Query Error","Error on searching database.reviews.id for '$id'");
$row = mysql_fetch_array($res) or SQLerrorFancy("Row Error","No results where found for a mod with the id $id");

if (!$row)
    SQLerrorFancy("Result error","No results where found for a review with the id $id");

$mres = mysql_query("SELECT * FROM mods WHERE mod_id={$row['mod_id']}",$handle) or SQLerrorFancy("MySQL Query Error","Error on searching database.mods.mod_id for '{$row['mod_id']}'");
$mod = mysql_fetch_array($mres) or SQLerrorFancy("Row Error","No results where found for a mod with the id {$row['mod_id']}");

if (!$mod)
    SQLerrorFancy("Result error","No results where found for a mod with the id {$row['mod_id']}");

$page_title="Review of '{$mod['name']}'";
$id=$row['id'];

// Substitute owner ID with owner name (by Phitherek_):
if (is_numeric($row['owner_id'])==true){
    $r = mysql_query("SELECT name FROM users WHERE id=".$row['owner_id'],$handle) or SQLerror("MySQL Query Error","Error on getting owner name from users");
    $ra = mysql_fetch_array($r);
    $owner = $ra['name'];
}
// End of Phitherek_' s code

$page_description=$row['overview'];

$dnw_content=true;

include "scripts/pageheader.php";

echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;padding:20px;\">";

echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">A review of '<a href='viewmod.php?id={$mod['mod_id']}'>{$mod['name']}</a>' - by <a href=\"user.php?id={$row['owner_id']}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link

echo "</div>";

?>
<div id="content">
    <div class="constrain" style="max-width:1200px;width:1150px;">
        <div style="clear: both;"></div>
        <?php

        echo "\n<div id='mod_bar'>\n";

        /*echo "<div class='bar_title'>\n";
        echo "Details\n";
        echo "</div>\n";*/

        echo "<div id='bar_download'>\n";
        echo "<a href='viewmod.php?id={$mod['mod_id']}'>Back to '{$mod['name']}'</a>\n";
        echo "</div>\n";

        echo "<p class='bar_p'>{$mod['overview']}</p>";

        echo "<div class='bar_title'>\n";
        echo "Summary\n";
        echo "</div>\n";

        echo "<p class='bar_p'>{$row['overview']}</p>";


        echo "</div>\n\n";

        echo "<div id='mod_main'>";


        require_once('scripts/formatcode.php');
        $parser = new parser;
        $parsed = $parser->p($row['description'],1);

        echo "<p>$parsed</p>";

        include "scripts/pagefooter.php";
        ?>
