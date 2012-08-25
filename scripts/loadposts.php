<?php
echo "<table width=100%><tr><th width=100></th><th></th><th width=100></th></tr>";

if (is_numeric($id)==false){
   SQLerror("Non Integer","Non integers are not allowed in the id field. <br /> <a href=\"index.php\">Back to home</a>");
}

$res = mysql_query("SELECT * FROM posts WHERE Topic=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.posts for '$id'");

// Get posts loop
while ($hash = mysql_fetch_assoc($res)){
      echo "<tr><td>User: {$hash[1]}</td>";
      echo "<td>{$hash[2]}</td><td></td></tr>";

}
echo "</table>";
?>