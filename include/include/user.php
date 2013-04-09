<?php
	// Gets a user's row
	function getUser($id,$handle){
		if (is_numeric($id)){
			$res=mysql_query("SELECT * FROM users WHERE uID = $id",$handle);
			return mysql_fetch_array($res);
		}else{
			$res=mysql_query("SELECT * FROM users WHERE name = '$id'",$handle);
			return mysql_fetch_array($res);
		}
	}

	// Gets a user's row, and if it does not exist it creates it
	function pingUser($id,$handle){
		$user = getUser($id,$handle);

		if (!$user){
			global $forum_user;
			mysql_query("INSERT INTO users (name) VALUES ('".$forum_user['username']."')");
			$user = getUser($id,$handle);
		}

		return $user;
	}

	// Goes to log in form if no user is logged in
	function require_login(){
		if (logged_in()==false){
			header("location: ".FORUM_ROOT."login.php");
		}
	}

	// Checks to see if their is a user logged in
	function logged_in(){
		global $forum_user;
		return ($forum_user['username'] != "Guest");
	}

	// Checks to see if the current user is a moderator
	function is_member_moderator(){
		global $forum_user;
		return ($forum_user['group_id'] == 1);
	}

	// Updates the mod count column in the user table
	function update_mod_count($id,$handle){
		// Get their mods
		$res = mysql_query("SELECT * FROM mods WHERE uID=$id",$handle);
		$mods =  mysql_num_rows($res);

		mysql_query("UPDATE users SET mods=$mods WHERE uID=$id",$handle);

		return $mods;
	}

	// Returns true if the user does have content
	// Returns false if the user does not have any content (deletion is needed)
	function updateUser($id,$handle){
		// Get their mods
		$mods=update_mod_count($id,$handle);

		// Get their review
		$res = mysql_query("SELECT * FROM reviews WHERE uID=$id",$handle);
		$reviews =  mysql_num_rows($res);

		// Get their votes
		$res = mysql_query("SELECT * FROM votes WHERE uID=$id",$handle);
		$votes =  mysql_num_rows($res);

		return ($votes!=0 || $mods!=0 || $reviews!=0);

	}
