<?php

//
//    LIKES
//
//


function likeMod($id,$user,$handle,$change){
    $mod = mysql_query("SELECT * FROM mods WHERE mID=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.mod_id for '$id'");
    $mod = mysql_fetch_array($mod);

    $user_d = getUser($user,$handle);
    $owner_id= $user_d["id"];
    $vote = mysql_query("SELECT * FROM votes WHERE uID=$owner_id AND mID=$id",$handle) or SQLerror("MySQL Query Error","Error on searching database.votes");
    $vote = mysql_fetch_array($vote);

    if (!$vote){
        if ($change){
            mysql_query("INSERT INTO votes (mID,owner,liked) VALUES ($id,$owner_id,true)",$handle) or SQLerror("MySQL Query Error","Error on adding like");
            header("location: viewmod.php?id=$id");
            updateLikes($id,$handle);
        }else{
            return false;
        }
    }else{
        $liked=$vote['liked']==true;
        $nlike = 1-$liked;

        if ($change){
            mysql_query("UPDATE votes SET liked=$nlike WHERE uID=$owner_id AND mID=$id",$handle);
            updateLikes($id,$handle);
            header("location: viewmod.php?id=$id");
        }else{
            return $liked;
        }
    }
}
?>
