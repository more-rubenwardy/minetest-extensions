<?php
     include "scripts/setup.php";

     function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Home";

     $dnw_content=true;
     $dnd_intro_message = true;
     include "scripts/pageheader.php";
?>

<div id="content">
    <div class="constrain" style="width:640px;">
        <div style="clear: both;"></div>
<?php

     if (is_logged_in())
        echo "<a href=\"addentry.php\">Add an entry</a> - ";
      
     echo "<a href=\"listing.php\">Index of Entries</a> - <a href=\"viewmod.php?id=random\">Random Extension</a><br /><br />";
     
?>



<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="slider.js"></script>

<div id="slider">
    <div id="slide_1" class="slideItem" style="background-image:url('http://mesecons.net/screenshots/1.png');">
        <div class="slideTitle">
            <div style="float:left;">
                <img src="icon/mesecon.png" alt="icon">
            </div>

            <a href="viewmod.php?id=2">Mesecons</a><br>
            Adds electrics and mechanics (Similar to Minecraft's Redstone)
        </div>
    </div>

    <div id="slide_2" class="slideItem" style="background-image:url('http://multa.bugs3.com/minetest/my_mods/food/banner.png');display:none;">
        <div class="slideTitle">
            <div style="float:left;">
                <img src="icon/food.png" alt="icon">
            </div>

            <a href="viewmod.php?id=12">Food</a><br>
            Adds many different types of food to the game. Drinks, Food, Desserts.
        </div>
    </div>

    <div id="slide_3" class="slideItem" style="background-image:url('http://www.zimg.eu/i/944678586');display:none;">
        <div class="slideTitle">
            <div style="float:left;">
                <img src="icon/farming.png" alt="icon">
            </div>

            <a href="viewmod.php?id=16">Farming</a><br>
            Adds farming and plants.
        </div>
    </div>

    <div id="slideLeft" onClick="buttonClick(1);"></div>
    <div id="slideRight" onClick="buttonClick(2);"></div>
</div>

<div id="itemBar">
    <ul>
        <li><a href="listing.php?id=mod">Mods</a></li>
        <li><a href="listing.php?id=texture">Texture Packs</a></li>
        <li><a href="search.php?id=sound">Sound</a></li>
    </ul>
</div>


<!--<h2>Welcome to Minetest Mods</h2>
<p><b>Help us by telling us what you think about this interface! <a href="http://tinyurl.com/mtmdfrm">Tell us</a></b></p>
Minetest Mods, Texture packs and Sound Packs! All the things that customise Minetest perfectly for you!

<p><font size=6>
<ul>
<li><a href="listing.php?id=mod"><font color="#0000FF">Mods</font></a></li>
<li><a href="listing.php?id=texture"><font color="#0000FF">Textures</font></a></li>
<li><a href="search.php?id=sound"><font color="#0000FF">Sounds</font></a></li>
</ul>
</font></p>-->


<?php
     include "scripts/pagefooter.php";
?>

