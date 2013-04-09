<?php
	// ------------------------
	// Individual MOD functions
	// ------------------------

	// get a mod by its ID
	function getMod($id,$handle){
		int_assert($id);
		$res=mysql_query("SELECT * FROM mods WHERE mID = $id",$handle);

		return mysql_fetch_array($res);
	}

	// get a mod by its Name
	function getModByName($id,$handle){
		$id = mysql_real_escape_string($id);
		$res=mysql_query("SELECT * FROM mods WHERE name = '$id'",$handle);

		return mysql_fetch_array($res);
	}

	// Get the download url link for the html interface
	function getDownload($mod){
		if ($mod['repotype']=="git"){
			// The download type is git
			return $mod['file']."/zipball/master";
		}else if ($mod['repotype']=="archive"){
			// The download type is archive
			if (strstr($mod['tags'],"code")==true){
				// It is a code mod
				return "code_mod.php?url=".$mod['file'];
			}else{
				// It is a lua mod
				return $mod['file'];
			}
		}else{
			return "";
		}
	}

	// Get the a license for that mod
	function getLicense($id,$handle){
		int_assert($id);
		$res=mysql_query("SELECT * FROM licenses WHERE lID = $id",$handle);

		return mysql_fetch_array($res);
	}

	// Format the MOD's tags into links
	function tagLinks($tags){
		$array=explode(",",$tags);
		$result="";

		foreach ($array as &$a){
			$result.=" <a href=\"search.php?id=$a\">$a</a>";
		}

		return $result;
	}

	function updateLikes($id,$handle){
		int_assert($id);

		$res = mysql_query("SELECT * FROM votes WHERE mId=$id AND liked=true",$handle);
		$result =  mysql_num_rows($res);

		mysql_query("UPDATE mods SET likes=$result WHERE mId=$id",$handle);
	}


	// ------------------------
	// Bulk MOD functions
	// ------------------------

	function getNoTopics($tag,$handle){
		$qu = mysql_real_escape_string ($tag);
		$res = mysql_query("SELECT * FROM mods WHERE tags LIKE '%$qu%' AND tags NOT LIKE '%dns%'",$handle);
		return mysql_num_rows($res);
	}

	function searchMods($query,$step,$handle,$mode=""){
		assert($handle);

		// Security
		$query = mysql_real_escape_string ($query);

		// Create query string
		$qu_str="";
		if ($mode=="sb"){
			if (is_numeric($query)==true){
				$qu_str="SELECT * FROM mods WHERE uID=$query";
			}else{
				$qu_str="SELECT * FROM mods WHERE tags NOT LIKE '%do-not-show%' AND (tags LIKE '%$query%' OR name LIKE '%$query%' OR overview LIKE '%$query%')";
			}
		}else{
			if ($query=="do-not-show"){
				$qu_str="SELECT * FROM mods WHERE tags LIKE '%$query%'";
			}else{
				$qu_str="SELECT * FROM mods WHERE tags LIKE '%$query%' AND tags NOT LIKE '%do-not-show%'";
			}
		}

		// Run query
		$res = mysql_query($qu_str." ORDER BY _likes DESC",$handle) or SQLerror("MySQL Query Error","Error on searching database.mods.tags for '$query'");

		// Loop extensions
		while ($hash = mysql_fetch_assoc($res)){
			if ($step)
				$step($hash,$handle);
		}
	}

