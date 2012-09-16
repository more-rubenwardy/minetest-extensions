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

<style type="text/css">
body {margin: 0px; padding: 0px;}
.Body-C
{
    font-family:"Verdana", sans-serif; font-size:16.0px; line-height:1.13em;
}
.Body-C-C0
{
    font-family:"Verdana", sans-serif; font-size:11.0px; line-height:1.18em;
}
</style>

<img src="images/wp9f108e24_06.png" width="651" height="162" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:50px;">
<div id="txt_1" style="position:absolute;left:267px;top:165px;width:362px;height:26px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C">Add features and more blocks to the game.</span></p>
</div>
<img src="images/wpc5e55123_06.png" width="326" height="123" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:0px;top:214px;">
<img src="images/wp906af827_06.png" width="324" height="123" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:327px;top:214px;">
<div id="txt_2" style="position:absolute;left:22px;top:308px;width:296px;height:14px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C0">Change the way MT looks by adding a texture pack</span></p>
</div>
<div id="txt_3" style="position:absolute;left:346px;top:308px;width:300px;height:14px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C0">Change the way MT sounds by adding a sound pack</span></p>
</div>
<a href="listing.php?id=mod"><img src="images/wp5533b116.gif" width="651" height="162" border="0" alt="" style="position:absolute;left:0px;top:50px;"></a>
<a href="listing.php?id=texture"><img src="images/wp5533b116.gif" width="326" height="125" border="0" alt="" style="position:absolute;left:0px;top:212px;"></a>
<map id="map0" name="map0">
    <area shape="rect" coords="0,50,2,176" href="listing.php?id=texture" alt="">
</map>
<a href="search.php?id=sound"><img src="images/wp5533b116.gif" width="326" height="125" border="0" alt="" usemap="#map0" style="position:absolute;left:325px;top:212px;"></a>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<?php
     include "scripts/pagefooter.php";
?>

