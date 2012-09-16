<?php
     include "scripts/setup.php";

     function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Home";
     include "scripts/pageheader.php";

     if (is_logged_in())
        echo "<a href=\"addentry.php\">Add an entry</a><br /><br />";
?>
        This page is being developed. See <a href="listing.php">here</a> to look for mods.

     <table width=100%>
     </table>


<?php
     include "scripts/pagefooter.php";
?>

