<?php
if ($mmmrel==0){
	$mmmrel=1;
}

if (isset($perc)==false){
    $perc=100;
}

if ($name=="")
    return 0;


if (strstr($name,"'")==true){
  $message="The name field may not contain '";
   return 0;
}

if ($version==""){
  $message="Mod version field required";
   return 0;
}

if ($desc==""){
    $message="Description field required";
   return 0;
}

if ($overview==""){
    $message="overview field required";
   return 0;
}

if ($valid_mode==1){
    if ($tags_type==""){
        $message="entry type field required";
       return 0;
    }


    if ($tags_msc==""){
        $message="more than one tag is required";
       return 0;
    }
}else{
    if ($tags==""){
        $message="more than one tag is required";
        return 0;
    }
}

if($mmmrt==""){
    $message="3m release version field required";
	return 0;
}

if ($file==""){
    $message="url to download required";
   return 0;
}

if ($owner=="")
   $owner=$_SESSION['user'];

if ($valid_mode==1){
    if ($tags_type=="mod"){
        if ($basename==""){
            $message="You must give your mod a namespace. It tells mod managers where to install the mod (what folder)";
            return 0;
        }
    }
}
   
return 1;
   
?>