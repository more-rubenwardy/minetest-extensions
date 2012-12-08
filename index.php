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

<img src="images/wpae096824_06.png" width="660" height="162" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:125px;top:50px;">
<div id="txt_1" style="position:absolute;left:392px;top:165px;width:362px;height:26px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C">Add features and more blocks to the game.</span></p>
</div>
<a href="listing.php?id=mod"><img src="images/wp5533b116.gif" width="654" height="162" border="0" alt="" style="position:absolute;left:123px;top:50px;"></a>
<img src="images/wpc5e55123_06.png" width="326" height="123" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:125px;top:214px;">
<div id="txt_2" style="position:absolute;left:147px;top:308px;width:296px;height:14px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C0">Change the way MT looks by adding a texture pack</span></p>
</div>
<img src="images/wp70bdea63_06.png" width="325" height="123" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:452px;top:214px;">
<div id="txt_3" style="position:absolute;left:471px;top:308px;width:300px;height:14px;overflow:hidden;">
<p class="Wp-Body-P"><span class="Body-C-C0">Change the way MT sounds by adding a sound pack</span></p>
</div>
<img src="images/wp796e836f_06.png" width="48" height="48" border="0" alt="" onload="OnLoadPngFix()" style="position:absolute;left:475px;top:236px;">
<img src="images/wp8da89ed3_06.png" width="47" height="47" border="0" alt="" style="position:absolute;left:142px;top:239px;">
<a href="search.php?id=sound"><img src="images/wp5533b116.gif" width="327" height="125" border="0" alt="" style="position:absolute;left:452px;top:213px;"></a>
<a href="listing.php?id=texture"><img src="images/wp5533b116.gif" width="326" height="125" border="0" alt="" style="position:absolute;left:124px;top:212px;"></a>



<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<h2>Welcome to Minetest Extensions</h2>
<?php
/*if ($_SESSION['msg']==0){
$_SESSION['msg']=1;
echo "<p><b>Help us be telling us what you think about this interface! <a href=\"http://tinyurl.com/mtmdfrm\">Tell us</a></b></p>";
}*/
?>
<p><b>Help us by telling us what you think about this interface! <a href=\"http://tinyurl.com/mtmdfrm\">Tell us</a></b></p>
Minetest Mods, Texture packs and Sound Packs! All the things that customise Minetest perfectly for you!


<?php
     include "scripts/pagefooter.php";
?>

