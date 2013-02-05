<?php
     include "scripts/setup.php";
     $query=$_GET['id'];
     $mode=$_GET['mode'];
     if ($mode=="")
        $mode="tags";

     $page_title="Search for $query";
     $page_description="Search for the tag '$query'. Find mods, texture and sound packs.";

     if ($mode=="sb"){
         $page_description="Search for '$query'. Find mods, texture and sound packs.";
     }

     include "scripts/pageheader.php";

     include "scripts/loadmods.php";
     
     include "scripts/pagefooter.php";
?>