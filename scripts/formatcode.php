<?php
function formatbb($input){
$result=$input;

$result=str_replace("\\'","'",$result);

$result=str_replace("[img]","<img style=\"max-width:900px;\" src=\"",$result);
$result=str_replace("[/img]","\" />",$result);
$result=str_replace("[/img-enforce]","\" />",$result);

$result=str_replace("[url=","<a href=\"",$result);
$result=str_replace("=url]","\">",$result);
$result=str_replace("[/url]","</a>",$result);

$result=str_replace("\n","<br />",$result);
$result=str_replace("\t","&#9;",$result);
$result=str_replace("[tab]","&#9;",$result);

$result=str_replace("[h]","<h1>",$result);
$result=str_replace("[/h]","</h1>",$result);

$result=str_replace("[b]","<b>",$result);
$result=str_replace("[/b]","</b>",$result);

$result=str_replace("[u]","<u>",$result);
$result=str_replace("[/u]","</u>",$result);

$result=str_replace("[i]","<i>",$result);
$result=str_replace("[/i]","</i>",$result);

$result=str_replace("[list]","<ul>",$result);
$result=str_replace("[/list]","</ul>",$result);

$result=str_replace("[*]","<li>",$result);
$result=str_replace("[/*]","</li>",$result);

$result=str_replace("[code]","<p><code style=\"border:solid;\">",$result);
$result=str_replace("[/code]","</code></p>",$result);

$result=str_replace("[color=red]","<font color=\"#FF0000\">",$result);
$result=str_replace("[/color]","</font>",$result);

return $result;
}
?>
