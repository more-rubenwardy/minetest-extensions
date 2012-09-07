<?php
     include "scripts/setup.php";
     $query=$_GET['id'];
     $page_title="Search for $query";
     include "scripts/pageheader.php";

     include "scripts/loadmods.php";
     
     include "scripts/pagefooter.php";
?>