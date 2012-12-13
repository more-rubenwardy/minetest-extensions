<?php
     include "scripts/setup.php";

     function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Home";
     include "scripts/pageheader.php";

     if (is_logged_in())
        echo "<a href=\"addentry.php\">Add an entry</a> - ";
      
     echo "<a href=\"listing.php\">Index of Entries</a> - <a href=\"viewmod.php?id=random\">Random Extension</a><br /><br />";
     
?>


<h2>Welcome to Minetest Extensions</h2>
<?php
/*if ($_SESSION['msg']==0){
$_SESSION['msg']=1;
echo "<p><b>Help us be telling us what you think about this interface! <a href=\"http://tinyurl.com/mtmdfrm\">Tell us</a></b></p>";
}*/
?>
<p><b>Help us by telling us what you think about this interface! <a href="http://tinyurl.com/mtmdfrm">Tell us</a></b></p>
Minetest Mods, Texture packs and Sound Packs! All the things that customise Minetest perfectly for you!

<p>
<ul>
<li><a href="listing.php?id=mod">Mods</a></li>
<li><a href="listing.php?id=texture">Textures</a></li>
<li><a href="search.php?id=sound">Sounds</a></li>
</ul>
</p>


<?php
     include "scripts/pagefooter.php";
?>

