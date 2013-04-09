<?php
include "include/include.php";

function writeList($tag,$handle){
	searchMods($tag,function($mod,$handle){
		$owner = getUser($mod['uID'],$handle);

		if ($owner)
			echo "<li><a href=\"viewmod.php?id={$mod['mod_id']}\">{$mod['name']}</a> by {$owner['name']}</li>\n";
	},$handle,"tags");
}

function separator($cols){
    echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
}

PageHeader("Mods, Texture packs and Sound packs - the best mod listing and reviewing website")
?>

<h2>Welcome to Minetest Extensions</h2>

<p>
    Minetest's full potential can only be obtained by installing mods, and other stuff. So shall we get started?
</p>
<p>
    Here's how to install:
    <a href="http://minetest.net/wiki/doku.php?id=installing_mods">mods</a>,
    <a href="http://forum.minetest.net/viewtopic.php?id=1592">texture packs</a>
</p>

</div>
</div>

<div id="home_reco">
    <div class="constrain">
        <div style="clear: both;"></div>
		<h3><a style="color:white;" href="viewmod.php?id=random">Random Extension</a></h3>
		<p>
			Why dont you try something new? Click the above link to go randomly to one of our extensions.
		</p>
    </div>
</div>

<div id="hotlist">
    <div class="constrain">
        <div style="clear: both;"></div>

        <!--<h3><a href="viewmod.php?id=random">Random Extension</a></h3>
        <p>
            Why dont you try something new? Click the above link to go randomly to one of our extensions.
        </p>
        <br><br>-->

        <h3>Hottest Extensions</h3>
        <table style="border-spacing: 0; margin: 0; padding: 0; border: 0; width: 100%;">
            <tr>
                <td width="33%" valign="top" style="padding-right: 1em;">
                    <h4>Mods</h4>
                    <p>
                    <ul>
                        <?php writeList("mod",$handle);?>
                        <li><a href="listing.php?id=mod">More...</a></li>
                    </ul>
                    </p>
                </td>
                <td width="33%" valign="top" style="padding-right: 1em;">
                    <h4>Texture Packs</h4>
                    <p>
                    <ul>
                        <?php writeList("texture",$handle);?>
                        <li><a href="listing.php?id=texture">More...</a></li>
                    </ul>
                    </p>
                </td>
                <td width="33%" valign="top" style="padding-right: 1em;">
                    <h4>Sound Packs</h4>
                    <p>
                    <ul>
                        <?php writeList("sound",$handle);?>
                        <li><a href="search.php?id=sound">More...</a></li>
                    </ul>
                    </p>
                </td>
            </tr></table>


        <p>
            <a href="#statistics" onClick="toggle('bar_stat');">Statistics</a>
        </p>

        <?php

        function tabCol($title,$msg){
            echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
        }

        echo "<p><div id='bar_stat' style=\"display:none;\">";

        echo "<p>\n77 <b>users</b> contributing ".getNoTopics("",$handle)." <b>extensions</b>\n</p>\n";

        echo "<table id='statistics'><tbody>\n";

        tabCol("Mods",getNoTopics("mod",$handle));
        tabCol("Games",getNoTopics("game",$handle));
        tabCol("Code Mods",getNoTopics("code",$handle));
        tabCol("Texture Packs",getNoTopics("texture",$handle));
        tabCol("Visitors","380 a week");
        tabCol("Extension Views","unknown");
        tabCol("Downloads","unknown");
        echo "</tbody></table></div></p>\n";
        ?>

        <p>
            If you have any questions at all, do not hesitate to contact us on <a href="http://tinyurl.com/mtmdfrm">this project's forum topic</a>
        </p>

        <?php
        include "include/template/footer.php";
        ?>