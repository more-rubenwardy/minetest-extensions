<?php

//
//    LIKES
//
//


function likeMod($id,$user,$handle,$change){
    $mod = mysql_query("SELECT * FROM mods WHERE mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
    $mod = mysql_fetch_array($mod);

    $user_d = getUser($user,$handle);
    $owner_id= $user_d["id"];
    $vote = mysql_query("SELECT * FROM votes WHERE owner=$owner_id AND mod_id=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.votes");
    $vote = mysql_fetch_array($vote);

    if (!$vote){
        if ($change){
            mysql_query("INSERT INTO votes (mod_id,owner,liked) VALUES ($id,$owner_id,true)",$handle) or SQLerror("MySQL Query Error","Error on adding like");
            header("location: viewmod.php?id=$id");
            updateLikes($id,$handle);
        }else{
            return false;
        }
    }else{
        $liked=$vote['liked']==true;
        $nlike = 1-$liked;

        if ($change){
            mysql_query("UPDATE votes SET liked=$nlike WHERE owner=$owner_id AND mod_id=$id",$handle);
            updateLikes($id,$handle);
            header("location: viewmod.php?id=$id");
        }else{
            return $liked;
        }
    }
}
?>
