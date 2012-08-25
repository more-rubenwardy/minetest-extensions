<?php
     include "scripts/setup.php";

     function listSearch($query,$title,$description,$handle){
              echo "<tr><td width=16><img width=16 height=16 src=\"images/topicicon_read.jpg\" /></td><td><a href=\"search.php?id=$query\">$title</a></td><td>$description</td>";
              $num=getNoTopics($query,$handle);
              echo "<td>$num<td></tr>";
     }
     
     function seperator($cols){
       echo "<tr bgcolor=#00000 height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Home - Minetest Mods";
     include "scripts/pageheader.php";
     echo "<table width=\"100%\"><tr><th colspan=2>Category</th><th>Description</th><th>Mods</th></tr>";

     //List Categories
     listSearch("","All","All Items",$handle);
     listSearch("mod","All Mods","All Mods",$handle);
     listSearch("mpack","All Mod Packs","All Mod Packs",$handle);
     listSearch("texture","All Texture Packs","All Texture Packs",$handle);
     listSearch("sound","All Sound Packs and Sound Mods","All Texture Packs",$handle);


     seperator(4);
     listSearch("deco","Block Adder Mods","Adds basic decorating blocks to the game (eg: moreblocks, homedecor)",$handle);
     listSearch("fun","Fun Mods","Fun mods for the game (eg: Chess, Mesecons)",$handle);
     listSearch("server","Server Interaction Mods","Mods ideal for servers (eg: antigrief, money)",$handle);
     listSearch("mobs","Mob Mods","Mods that add Mobs",$handle);
     listSearch("3d","3D Object Mods","Mods that use NodeBoxes",$handle);
     
     seperator(4);
     listSearch("envir","Enviroment Mods","Changes the map generator",$handle);
     listSearch("biome","Biome Mods","Adds a new biome to the game",$handle);

     seperator(4);
     listSearch("comic-txt","Comic Style","Cartoon Style Texture Packs",$handle);
     listSearch("real-txt","Realistic","Realistic Styled Texture Packs",$handle);
     listSearch("hd-txt","HD","HD Texture packs",$handle);

     seperator(4);
     listSearch("0.4.2","0.4.2","for 0.4.2-rc1",$handle);
     listSearch("0.4.1","0.4.1","for 0.4 Stable",$handle);
     listSearch("0.4","0.4","for 0.4",$handle);
     //listSearch("0.3","0.3","for 0.3",0);
     //listSearch("old_minetest","Older","for older versions of minetest",0);

?>
</div>
</body>
</html>

