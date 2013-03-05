<?php
     include "scripts/setup.php";

    function writeList($tag,$handle){
        $qu_str="SELECT * FROM mods WHERE tags LIKE '%$tag%' AND tags NOT LIKE '%dns%'";
        $res = mysql_query($qu_str." ORDER BY likes DESC LIMIT 10",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

        while ($hash = mysql_fetch_assoc($res)){
            // Owner name from id (by Phitherek_)

            $name="";
            $q=0;
            $q = mysql_query("SELECT name FROM users WHERE id=".$hash['owner']);
            if ($q){
                $qr = mysql_fetch_array($q) or print("");
                $name=$qr['name'];
            }
            // End of Phitherek_' s code

            // Owner name instead of id (by Phitherek_)
            echo "<li><a href=\"viewmod.php?id={$hash['mod_id']}\">{$hash['name']}</a> by $name</li>\n";
        }
    }

     function seperator($cols){
       echo "<tr style=\"background-color:#000000;\" height=2><td colspan=$cols></td></tr>";
     }

     $page_title="Mods, Texture packs and Sound packs - the best mod listing and reviewing website";
     $dnd_intro_message = true;

     include "scripts/pageheader.php";
?>

<h2>Welcome to Minetest Extensions</h2>

<p>
    Welcome to Minetest Extensions, the Mod, texture pack, sound pack and other things database.

    <a href="#" onClick="toggle('bar_stat');">Statistics</a>
</p>

<?php

    function tabCol($title,$msg){
        echo "<tr><td><b>".$title.":</b></td><td>$msg</td></tr>\n";
    }

    echo "<p><div id='bar_stat' style=\"display:none;\">";

    echo "<p>\n77 <b>users</b> contributing ".getNoTopics("",$handle)." <b>extensions</b>\n</p>\n";

    echo "<table><tbody>\n";

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

</div>
</div>

<div id="home_reco">
    <div class="constrain">
        <div style="clear: both;"></div>
        <h3>Featured</h3>

        <table>
            <tr>
                <td style="background-image:url('http://mesecons.net/screenshots/1.png');"><a href="viewmod.php?id=2">Mesecons</a></td>
                <td style="background-image:url('http://multa.bugs3.com/minetest/my_mods/food/banner.png');"><a href="viewmod.php?id=12">Food</a></td>
                <td style="background-image:url('http://www.zimg.eu/i/944678586');"><a href="viewmod.php?id=16">Farming</a></td>
            </tr>
        </table>
    </div>
</div>

<div id="hotlist">
    <div class="constrain">
         <div style="clear: both;"></div>

	<h3><a href="viewmod.php?id=random">Random Extension</a></h3>
	<p>
	Why dont you try something new? Click the above link to go randomly to one of our extensions.
	</p>
	<br><br>

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

<?php
     include "scripts/pagefooter.php";
?>
