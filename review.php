<?php
require_once "include/include.php";

// Get commands
$id=$_GET['id'];
int_assert($id);

// Get the review row
$res = mysql_query("SELECT * FROM reviews WHERE rID=$id",$handle) or SQLerrorFancy("MySQL Query Error","Error on searching database.reviews.id for '$id'");
$row = mysql_fetch_array($res) or SQLerrorFancy("Row Error","No results where found for a mod with the id $id");

// Catch null
if (!$row)
    SQLerrorFancy("Result error","No results where found for a review with the id $id");

// Get mod row
$mod = getMod($row['mID'],$handle);


// Catch null
if (!$mod)
    SQLerrorFancy("Result error","No results where found for a mod with the id {$row['mID']}");

// Get review owner thame
int_assert($row['uID']);
$owner=getUser($row['uID'],$handle)['name'];

PageHeader("Review of '{$mod['name']}'",$row['overview'],null,true);

echo "<div width=\"900\" style=\"background-color:#E8E8E8;text-align:center;padding:20px;\">";

echo "<h1 style=\"margin: 0;padding:0;text-align:center;\">A review of '<a href='viewmod.php?id={$mod['mID']}'>{$mod['name']}</a>' - by <a href=\"user.php?id={$row['uID']}\">{$owner}</a></h1></th></tr>\n";  // Title and User Link

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
        echo "<a href='viewmod.php?id={$mod['mID']}'>Back to '{$mod['name']}'</a>\n";
        echo "</div>\n";

        echo "<p class='bar_p'>{$mod['overview']}</p>";

        echo "<div class='bar_title'>\n";
        echo "Summary\n";
        echo "</div>\n";

        echo "<p class='bar_p'>{$row['overview']}</p>";


        echo "</div>\n\n";

        echo "<div id='mod_main'>";


        require_once('include/libraries/bbcode.php');
        $parser = new parser;
        $parsed = $parser->p($row['description'],1);

        echo "<p>$parsed</p>";

		echo "</div>";

		PageFooter();
        ?>
