<?php
     include "scripts/setup.php";
     $query=$_GET['id'];
     $mode=$_GET['mode'];
     if ($mode=="")
        $mode="tags";

     $page_title="Search for $query";
     include "scripts/pageheader.php";

     include "scripts/loadmods.php";
     
     include "scripts/pagefooter.php";
?>