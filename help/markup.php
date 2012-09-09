<?php
include "../scripts/setup.php";
$page_title="Mark Up - Help";
include "../scripts/pageheader.php";
?>

<p><table>
<tr><th width=30%>Code</th><th>Description</th><th>Example</th></tr>
<tr bgcolor="#FFFFBD"><td>[b]bold[/b]</td><td>Bold</td><td><b>bold</b></td></tr>
<tr><td>[i]italic[/i]</td><td>Italic</td><td><i>italic</i></td></tr>
<tr bgcolor="#FFFFBD"><td>[u]underline[/u]</td><td>Under Lined</td><td><u>underline</u></td></tr>
<tr><td>[h]header[/h]</td><td>Header (title)</td><td><h1>header</h1></td></tr>
<tr bgcolor="#FFFFBD"><td>[code]The code[/code]</td><td>Adds a code box</td><td><code>The code</code></td></tr>
<tr><td>[img]url_for_img[/img]</td><td>Adds an image</td><td><img height="20" src="../images/header.png"></td></tr>
<tr bgcolor="#FFFFBD"><td>[url=the_links_url=url]The Link Text[/url]</td><td>Adds an hyperlink</td><td><a href="the_links_url">The Links Text</a></td></tr>
<tr><td>[list]<br />[*]An Item[/*]<br />[*]Another Item[/*]<br />[/list]</td><td>A list</td><td><ul><li>An Item</li><li>Another Item</li></ul></td></tr>
</table>

<?php
include "../scripts/pagefooter.php";
?>