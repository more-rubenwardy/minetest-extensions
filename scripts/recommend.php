
<?php
if (!($row[23]=="")){

    echo "<div class='bar_title'>\n";
    echo "Recommended\n";
    echo "</div>\n";

echo "<table>\n";
echo "<tr>\n";

$rec=explode(",",$row[23]);

$count=0;

for ($i=0;$i<count($rec);$i++){
    $id_i = $rec[$i];
    if (is_numeric($id)){
       $mod_i = mysql_query("SELECT * FROM mods WHERE mod_id=$id_i",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id_i'");
       $row_i = mysql_fetch_row($mod_i) or SQLerror("Row Error","No results where found for a mod with the id $id_i");
       $image = "images/topicicon_read.jpg";
       
       if ($row_i[20])
          $image="icon/".$row_i[20];

       echo "<td style=\"text-align:center;\"><a href=\"viewmod.php?id=$id_i\"><img height=64 width=64 src=\"$image\" title=\"{$row_i[1]}\" /></a><br /><b>{$row_i[1]}</b></td>\n";

        $count++;

        if ($count>2){
            $count=0;
            echo "</tr><tr>";
        }
    }
}

echo "</tr></table></center>";
}
