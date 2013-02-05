<?php
     include "scripts/setup.php";

     function listSearch($query,$title,$description,$handle){
              if (file_exists("icon/$query.png")==true)
                 $icon="icon/$query.png";
              else
                 $icon="images/topicicon_read.jpg";

              echo "<tr><td width=16><img width=16 height=16 src=\"$icon\" /></td><td>";
              echo "<a href=\"search.php?id=$query\">$title</a></td>";
              echo "<td>$description</td>";

              $num=getNoTopics($query,$handle);
              echo "<td>$num<td></tr>\n";
     }
     
     function seperator($cols){
       echo "\n<!--Separator-->\n<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>\n\n";
     }
     $id=$_GET['id'];
     $page_title="Categories in $id";
     $page_description="Categories in the extensions group $id. Find mods, texture and sound packs.";

     include "scripts/pageheader.php";
     
     $id=$_GET['id'];

     if (is_logged_in()){
        $mtype=$id;
        if ($mtype==""){
          $mtype="n entry";
        }else{
          $mtype=" ".$mtype;
        }
        echo "<a href=\"addentry.php\">Add a$mtype</a> - ";
     }
     
     echo "<a href=\"listing.php\">Index of Entries</a> - <a href=\"viewmod.php?id=random\">Random Extension</a><br /><br />";


     echo "<table width=\"100%\"><tr><th colspan=2>Category</th><th>Description</th><th>Mods</th></tr>";

     //List Categories
     if ($id=="")
     listSearch("","All","All Items in order of popularity",$handle);
     if ($id=="mod" || $id==""){
     listSearch("mod","All Mods","All Mods in order of popularity",$handle);
     listSearch("game","All Game Packs","All Game packs in order of popularity",$handle);
     listSearch("modpack","All Mod Packs","All Mod Packs in order of popularity",$handle);
     listSearch("code","All C++ Code Mods","All C++ Code Mods in order of popularity",$handle);
     }

     if ($id=="texture" || $id=="")
     listSearch("texture","All Texture Packs","All Texture Packs in order of popularity",$handle);

     if ($id=="")
     listSearch("sound","All Sound Packs","All Sound Packs and Sound Mods in order of popularity",$handle);


     if ($id=="mod" || $id==""){
     seperator(4);
     listSearch("deco","Block Adder Mods","Adds basic decorating blocks to the game (eg: moreblocks, homedecor)",$handle);
     listSearch("tech","Technical Mods","Technical Mods (eg: Mesecons, Technic)",$handle,"icon/mesecon.png");
     listSearch("fun","Experimental Mods","Experimental mods for the game (eg: Chess, Mesecons, Carts)",$handle);
     listSearch("server","Server Interaction Mods","Mods ideal for servers (low lag, tools)(eg: antigrief, money)",$handle);
     listSearch("food","Food Mods","Mods that add food",$handle);
     listSearch("growing","Growing Mods","Mods that add Plants",$handle);
     listSearch("mobs","Mob Mods","Mods that add Mobs",$handle);
     listSearch("graphics","Graphics","Mods that improve the graphics of Minetest (eg: animated_torches, different player textures)",$handle);
     listSearch("util","Utility Mods","Mods that add new feature and actons to the game (eg: bones,falling_items,throwing)",$handle);
     listSearch("3d","3D Object Mods","Mods that use NodeBoxes",$handle);

     seperator(4);
     listSearch("envir","Enviroment Mods","Changes the map generator",$handle);
     listSearch("biome","Biome Mods","Adds a new biome to the game",$handle);
     }

     if ($id=="texture" || $id==""){
     seperator(4);
     listSearch("comic-txt","Comic Style Textures","Cartoon Style Texture Packs",$handle);
     listSearch("real-txt","Realistic Textures","Realistic Styled Texture Packs",$handle);
     listSearch("hd-txt","HD Textures","HD Texture packs",$handle);
     }

     /*seperator(4);
     listSearch("0.4.3","0.4.3","for 0.4.3 stable",$handle);
     listSearch("0.4.2","0.4.2","for 0.4.2",$handle);
     listSearch("0.4.1","0.4.1","for 0.4 stable",$handle);
     listSearch("0.4","0.4","for 0.4",$handle);*/
     
     echo "</table>";
     //listSearch("0.3","0.3","for 0.3",0);
     //listSearch("old_minetest","Older","for older versions of minetest",0);

     include "scripts/pagefooter.php";
?>

