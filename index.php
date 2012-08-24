<?php
     include "scripts/setup.php";

     function listSearch($query,$title,$description,$num){
              echo "<tr><td width=16><img width=16 height=16 src=\"images/topicicon_read.jpg\" /></td><td><a href=\"search.php?id=$query\">$title</a></td><td>$description</td><td>$num<td></tr>";
     }
     
     function seperator($cols){
       echo "<tr bgcolor=#00000 height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Home - Minetest Mods";
     include "scripts/pageheader.php";
     echo "<table width=\"100%\"><tr><th colspan=2>Category</th><th>Description</th><th>Mods</th></tr>";

     //List Categories
     listSearch("","All","All Items",2);
     listSearch("mod","All Mods","All Mods",2);
     listSearch("modpack","All Mod Packs","All Mod Packs",0);
     listSearch("texture","All Texture Packs","All Texture Packs",0);

     seperator(4);
     listSearch("deco","Block Adder Mods","Adds basic decorating blocks to the game (eg: moreblocks, homedecor)",0);
     listSearch("fun","Fun Mods","Fun mods for the game (eg: Chess)",0);
     listSearch("server","Server Interaction Mods","Mods ideal for servers (eg: antigrief, money)",0);
     listSearch("mobs","Mob Mods","Mods that add Mobs",0);
     listSearch("3d","3D Object Mods","Mods that use NodeBoxes",1);

     seperator(4);
     listSearch("comic-txt","Comic Style","Cartoon Style Texture Packs",0);
     listSearch("real-txt","Realistic","Realistic Styled Texture Packs",0);
     listSearch("hd-txt","HD","HD Texture packs",0);

     seperator(4);
     listSearch("0.4.2","0.4.2","for 0.4.2-rc1",2);
     listSearch("0.4.1","0.4.1","for 0.4 Stable",2);
     listSearch("0.4","0.4","for 0.4",1);
     listSearch("0.3","0.3","for 0.3",0);
     listSearch("old_minetest","Older","for older versions of minetest",0);

?>
</div>
</body>
</html>

