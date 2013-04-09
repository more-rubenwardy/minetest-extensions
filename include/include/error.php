<?php
	// Error
	function SQLerror($title,$msg){
		echo "<h1>$title</h1>";
		die("$msg");
	}

	function SQLerrorFancy($title,$msg){
		global $serverpath;
		global $forum_user;

		$page_title=$title;
		include_once "template/header.php";

		echo "<h1>$title</h1>\n $msg";

		include_once "template/footer.php";
	}

	function int_assert($value,$title="Assert Error",$msg="Value must be integer"){
		if (is_numeric($value)==false){
			SQLerror($title,$msg);
		}
	}