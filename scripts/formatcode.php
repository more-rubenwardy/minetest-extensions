<?php
function formatbb($input){
$result=$input;

$result=str_replace("[img]","<img src=\"",$result);
$result=str_replace("[/img]","\" />",$result);
$result=str_replace("[/img-enforce]","\" width=\"900\"/>",$result);

$result=str_replace("[url=","<a href=\"",$result);
$result=str_replace("=url]","\">",$result);
$result=str_replace("[/url]","</a>",$result);

$result=str_replace("\n","<br />",$result);

$result=str_replace("[h]","<h1>",$result);
$result=str_replace("[/h]","</h1>",$result);

$result=str_replace("[b]","<b>",$result);
$result=str_replace("[/b]","</b>",$result);

$result=str_replace("[u]","<u>",$result);
$result=str_replace("[/u]","</u>",$result);

$result=str_replace("[i]","<i>",$result);
$result=str_replace("[/i]","</i>",$result);

return $result;
}
?>