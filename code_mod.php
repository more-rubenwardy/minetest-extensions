<?php
  include "scripts/setup.php";
  
  $id=$_GET['url'];
  $page_title="Downloading.. Code Mod";

  include "scripts/pageheader.php";
?>

<h1>Code Mod</h1>

This Mod is a modification to the minetest engine's source, and needs to be compiled (built, turned in to something useable).<br />
If you do not know how to compile, there should be a pre-compiled version on the mod's page. If not, ask someone how to do it.<br />

<p>
<a href="<?php echo $id; ?>">Continue to the Source</a>

<?php
  include "scripts/pagefooter.php";
?>