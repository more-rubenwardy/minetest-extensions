<?php
include "../scripts/setup.php";
$page_title="Mark Up - Help";
include "../scripts/pageheader.php";
?>

<p><table style="text-align: center; width: 500px;" border=1 id="smilies">

		<thead>

			<th>BBCode</th>

			<th>Preview</th>

		</thead>

		<tr>

			<td>[u]text[/u]</td>

			<td><span style="text-decoration: underline;">text</span></td>

		</tr>

		<tr>

			<td>[i]text[/i]</td>

			<td><em>text</em></td>



		</tr>

		<tr>

			<td>[b]text[/b]</td>

			<td><strong>text</strong></td>

		</tr>

		<tr>

			<td>[cool]text[/cool]</td>



			<td><span style="font-family: Verdana, Arial, Helvetica, sans-serif; letter-spacing: 2px; word-spacing: 3px; font-size: 13px; font-weight: bold; font-style: italic; color: #333399; font-variant: small-caps; height: 12px; padding-left: 9pt; padding-right: 6pt; vertical-align: middle; display: block;">text</span></td>

		</tr>

		<tr>

			<td>[code]text[/code]</td>

			<td><div style="width: 80%; overflow: auto; text-align: left; border: 1px solid #CCCCCC; display: block; padding-left: 20px;"><code style="white-space: pre;">text

</code></div></td>

		</tr>

		<tr>



			<td>[indent]text[/indent]</td>

			<td><blockquote>text</blockquote></td>

		</tr>

		<tr>

			<td>[lyrics]text[/lyrics]</td>

			<td><span style="margin-left: 30px; font-style: italic; display: block;">text</span></td>

		</tr>



		<tr>

			<td>[smallcaps]text[/smallcaps]</td>

			<td><span style="font-variant: small-caps;">text</span></td>

		</tr>

		<tr>

			<td>[big]text[/big]</td>

			<td><span style="font-size: 22px;">text</span></td>



		</tr>

		<tr>

			<td>[small]text[/small]</td>

			<td><span style="font-size: 10px;">text</span></td>

		</tr>

		<tr>

			<td>[tt]text[/tt]</td>



			<td><tt>text</tt></td>

		</tr>

		<tr>

			<td>[sub]text[/sub]</td>

			<td><sub>text</sub></td>

		</tr>

		<tr>



			<td>[sup]text[/sup]</td>

			<td><sup>text</sup></td>

		</tr>

		<tr>

			<td>[url]www.recgr.com[/url]</td>

			<td><a href="http://www.recgr.com" target="_blank">www.recgr.com</a></td>

		</tr>



		<tr>

			<td>[url=http://www.recgr.com]Recruiting Grounds[/url]</td>

			<td><a href="http://www.recgr.com" target="_blank">Recruiting Grounds</a></td>

		</tr>

		<tr>

			<td>[img]linux.gif[/img] (long live Linux!)</td>

			<td><img src="http://bbcparser.recgr.com/linux.gif" border="0" /> (long live Linux!)</td>



		</tr>

		<tr>

			<td>[email=nino@recgr.com]Nino[/email]</td>

			<td><a href="mailto: &#110&#105&#110&#111&#64&#114&#101&#99&#103&#114&#46&#99&#111&#109">Nino</a></td>

		</tr>

		<tr>

			<td>[email]nino@recgr.com[/email]</td>



			<td><a href="mailto: &#110&#105&#110&#111&#64&#114&#101&#99&#103&#114&#46&#99&#111&#109">&#110&#105&#110&#111&#64&#114&#101&#99&#103&#114&#46&#99&#111&#109</a></td>

		</tr>

		<tr>

			<td>[font=Arial]Text in Arial font[/font]</td>

			<td><span style="font-family: Arial;">Text in Arial font</span></td>

		</tr>

		<tr>

			<td>[color=red]Red Text[/color]</td>



			<td><span style="color: red;">Red Text</span></td>

		</tr>

		<tr>

			<td>[color=#FF66FF]Light Pink Text[/color]</td>

			<td><span style="color: #FF66FF;">Light Pink Text</span></td>

		</tr>

		<tr>



			<td>[bull /]</td>

			<td><big>&bull;</big></td>

		</tr>

		<tr>

			<td>[copyright /]</td>

			<td>&copy;</td>

		</tr>

		<tr>



			<td>[registered /]</td>

			<td>&reg;</td>

		</tr>

		<tr>

			<td>[tm /]</td>

			<td><big>&trade;</big></td>

		</tr>
		<tr>

			<td>[list]<br />item 1<br />item 2<br />[/list]</td>

			<td><ul><li>item 1</li><li>item 2</li></ul></td>

		</tr>

	</table>

<?php
include "../scripts/pagefooter.php";
?>
