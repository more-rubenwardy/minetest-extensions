<?php
$name=mysql_real_escape_string(str_replace("'","",str_replace("\"","",$name)));
$version=mysql_real_escape_string($version);
$owner=mysql_real_escape_string($owner);
$desc=mysql_real_escape_string(str_replace("'","",str_replace("\"","",$desc)));
$tags=mysql_real_escape_string($tags);
$license=mysql_real_escape_string($license);
$file=mysql_real_escape_string($file);
$depend=mysql_real_escape_string($depend);
$basename=mysql_real_escape_string($basename);
$mmmrt=mysql_real_escape_string($mmmrt);
$mmmrel=mysql_real_escape_string($mmmrel);
$perc=mysql_real_escape_string($perc);
$overview=mysql_real_escape_string(str_replace("'","",str_replace("\"","",$overview)));

$tags_type=mysql_real_escape_string($tags_type);
$tags_msc=mysql_real_escape_string($tags_msc);
?>