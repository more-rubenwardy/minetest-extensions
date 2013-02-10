<?php
     include "scripts/setup.php";

     function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Mods, Texture packs and Sound packs - the best mod listing and reviewing website";
     $dnd_intro_message = true;
$dnw_content=true;

     include "scripts/pageheader.php";
?>
<div id="content">
    <div class="constrain" style="max-width:1000px;width:975px;">
        <div style="clear: both;"></div>

<div id="mod_bar">
    <div id="bar_download">
    <a href="viewmod.php?id=random">Random Extension</a>
    </div>

    <p class="bar_p">
        Why dont you try something new?
    </p>

    <p class="bar_p">
        Click the above link to go randomly to one of our extensions, whether that be a mod, texture pack or a sound pack.
    </p>

    <p class="bar_p">
        or you can <a href="listing.php">view the categories</a>.
    </p>


    <?php
        function tabCol($title,$msg){
            echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
        }

        echo "<div class='bar_title'>\n";
        echo "Statistics\n";
        echo "</div>\n";

        echo "<p class=\"bar_p\">\n77 <b>users</b> contributing ".getNoTopics("",$handle)." <b>extensions</b>\n</p>\n";

        echo "<p><table id='bar_stat'><tbody>\n";

        tabCol("Mods",getNoTopics("mod",$handle));
        tabCol("Games",getNoTopics("game",$handle));
        tabCol("Code Mods",getNoTopics("code",$handle));
        tabCol("Texture Packs",getNoTopics("texture",$handle));
        tabCol("Visiters","380 a week");
        tabCol("Extension Views","unknown");
        tabCol("Downloads","unknown");
        echo "</tbody></table></p>\n";
    ?>

    <div class='bar_title'>
        This Project
    </div>

    <p class="bar_p">
        Minetest Extensions was created completely in code by Andrew "rubenwardy" Ward.
    </p>

    <p class="bar_p">
        <a href="help/about.php">Read More</a>
    </p>

    <p class="bar_p">
        <b>Help us by telling us what you think about this interface! <a href="http://tinyurl.com/mtmdfrm">Tell us</a></b>
    </p>

</div>

<div id='mod_main'>

<div class="slider" id="3">
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

    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="slider.js"></script>

<div id="itemBar">
    <ul>
        <li><a href="listing.php?id=mod">Mods</a></li>
        <li><a href="listing.php?id=texture">Texture Packs</a></li>
        <li><a href="search.php?id=sound">Sound</a></li>
        <?php
        if (is_logged_in()==true){
            echo "<li>|</li>\n";
            echo "<li><a href=\"addentry.php\">Add an Extension</a>\n";
        }
?>    </ul>
</div>


<div style="float:left;">
<img src="images/chest.png" width="256">
</div>

<h2>Welcome to Minetest Extensions</h2>

<p>
Here, at Minetest Extensions, you will find everything you will need to make Minetest perfect for you.
</p>

<p>
If you have any questions at all, do not hesitate to contact us on <a href="http://tinyurl.com/mtmdfrm">this project's forum topic</a>
</p>

<p>
Please, have a look round.
</p>




</div>


<?php
     include "scripts/pagefooter.php";
?>

