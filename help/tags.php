<?php
$punbb_relative="../";

include "../scripts/setup.php";
$page_title="Tags - Help";
include "../scripts/pageheader.php";

function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
}

$switch=0;

function add_tag($tag,$desc){
global $switch;
$switch=1-$switch;
$color="FFFFFF";

if ($switch==1)
	$color="FFFFBD";

echo "<tr bgcolor=\"#$color\"><td width=20><img src=\"../icon/$tag.png\" width=20></td><td style=\"text-align:center;\">$tag</td><td>$desc</td></tr>";
}
echo "<p><table>\n<tr><th colspan=2 width=30%>Tag</th><th>Description</th></tr>";

add_tag("mod","A Mod (use \"type\" radio buttons)");
//add_tag("modpack","A Mod pack (use \"type\" radio buttons)");
add_tag("code","A C++ Code Modification (use \"type\" radio buttons)");
add_tag("texture","A texture pack (use \"type\" radio buttons)");
add_tag("sound","A sound pack (use \"type\" radio buttons)");
seperator(3);
add_tag("deco","Adds decorative blocks");
add_tag("tech","Adds technical mods");
add_tag("fun","Experiemental Mods");
add_tag("food","Mods that add food");
add_tag("growing","Mods that add Plants");
add_tag("mobs","Mods that add mobs");
add_tag("util","Mods that add new features and actions to the game (eg: bones,falling_items,throwing)");
add_tag("3d","Mods that use Node Boxes");
add_tag("* graphics","Mods that improve the graphics of Minetest (eg: animated_torches, different player textures)");
add_tag("* adventure","(Role Playing) Mods that add an adventurous theme to the game (eg: traps, magic)");
seperator(3);
add_tag("admin","Admin tools");
add_tag("grief","Griefing defence, and PvP mods");
add_tag("* server","Mods ideal for servers (low lag, tools)");
add_tag("* info","Informational - For those who love knowing all sorts of useful stuff about the server");
add_tag("* econ","Economy - money and trading");
add_tag("* chat","Chat Related - more commands, stuff like the IRC Mod");
seperator(3);
add_tag("envir","Changes the map generator");
add_tag("biome","Adds a new biome to the game");
seperator(3);
add_tag("comic-txt","Cartoon Style Texture Packs");
add_tag("real-txt","Realistic Style Texture Packs");
add_tag("hd-txt","HD Texture Packs");
?>
</table></p>

And make up your own for search box searching.

<p>
* These do not appear in the <a href="../listing.php">tag listings</a> they are purely search keywords<br />
+ Which versions your mod/texture pack works on. You may add more than one of these tags

<?php
     include "../scripts/pagefooter.php";
?>
