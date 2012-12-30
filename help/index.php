<?php
$pun_decl=true;
//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', '../../forum/');
require FORUM_ROOT.'include/common.php';

include "../scripts/setup.php";
$page_title="Index - Help";
include "../scripts/pageheader.php";
?>

<h1>Help</h1>

<ul>
<li><a href="entries.php">Adding an Entry</a></li>
<li><a href="markup.php">Description Markup</a></li>
<li><a href="tags.php">Entry Tags</a></li>
</ul>

<?php
include "../scripts/pagefooter.php";
?>
