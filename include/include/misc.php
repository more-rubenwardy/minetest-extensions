<?php
function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function progressBar($percent,$length,$caption){
	echo "<div class=\"progressbar\" style=\"width: ".$length."px;\">";

	echo "<div class=\"progressbar_inner\" style=\"width: ".(($percent/100)*$length)."px;\"></div>";
	echo "<div class=\"progress_caption\">$caption</div>";

	echo "</div>";
}