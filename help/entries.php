<?php
$pun_decl=true;
//define('FORUM_QUIET_VISIT', 1);
//define('FORUM_TURN_OFF_MAINT', 1);
define('FORUM_DISABLE_CSRF_CONFIRM', 1);
define('FORUM_ROOT', '../../forum/');
require FORUM_ROOT.'include/common.php';

include "../scripts/setup.php";
$page_title="Adding and Entry - Help";
include "../scripts/pageheader.php";
?>

<h1>Entries</h1>
<h2>What is an Entry?</h3>
An entry is a mod, texture pack or sound pack that is in this website.
<h2>How do I add an Entry?</h3>
To add an entry you need a register user account. To get one, click "register" at the top-right side of any page.<br />
Go to the home page by clicking "home" in the top-left. Click "Add an Entry".
<hr />
<p>
<table width="100%">
<tr>
<td style="vertical-align:top;" width="400">
<img src="help.jpeg" width="375" alt="The add a mod menu" title="The add a mod menu"" />
</td>
<td style="vertical-align:top;">
<h3><u>Name</u></u></h3>
Your entry needs a <b>unique</b> name. Enter the entries name in the name field

<h3><u>Version</u></h3>
The version can be in any format from major-minor format (ie: 0.4.3) to date-based format (20120608).<br />
Enter the current version of the entry.

<h3><u>3m Release</u></h3>
3m is used by the 3m mod manager, and is a integer (whole number) that increases each time a new version is released.
</td></tr></table>
<h3><u>Overview</u></h3>
The overview is a one line description that can not contain mark up code.

<h3><u>Description</u></h3>
The description is an article, much like a minetest forum article. This may use <a href="markup.php">mark up code</a>. See <a href="articles.php">here</a> for the requirements in a description.

<h3><u><a name="download">Download URL and Type</a></u></h3>
Put a direct link to the latest download in the "file url" text box.

<p>
<b>Type</b><br />
There are two types: <b>git</b> and <b>archive</b>.<br />
<b>Archive</b> is a direct link to a (.zip, .rar, .7y, etc) file.<br />
<b>Git</b> is a link to the GitHub page, which is automatically processed when downloading.
</p>

<h3><u>License</u></h3>
The license is the license of the entry.

<h3><u>Depends</u></h3>
Depends is only for mod entries, and is what mods this mod depends on.

<h3><u>Mod Namespace</u></h3>
Mod Namespace is only for mod entries, and is the mod code for that mod.
A mod code is the name of the folder it is saved to, and is also what precedes each node registeration, ie: <b>moreblocks</b>:superglowglass.

<h3><u>Tags</u></h3>
<a href="tags.php">Tags</a> are used to categorise entries, and to sort them.<br />
You must select an entry type using the select boxes
</p>

<?php
include "../scripts/pagefooter.php";
?>
